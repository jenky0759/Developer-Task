<script setup>
import Header from "@/Components/Header/Header.vue";
import BaseModal from "@/Components/Modal/BaseModal.vue";
import Button from "@/Components/Button/Button.vue";
import { ref, watch} from "vue";
import useCustomerService from "@/Composables/useCustomerService.js";
import Customer from "@/Models/Customer.js";
import {useVfm} from "vue-final-modal";
import Table from "@/Components/Table/Table.vue";
import ContactModal from "@/Components/Modal/ContactModal.vue";
import ConfirmationModal from "@/Components/Modal/ConfirmationModal.vue";

const props = defineProps({
    customerId: Number
});
const emit = defineEmits(['onBackClick', 'onSaveClick']);
const customerModalId = 'customer-modal';

const action = {
    header: 'Action',
    items: [
        {
            label: 'Edit',
            name: 'edit'
        },
        {
            label: 'Delete',
            name: 'delete',
        }
    ]
};

const columns = [
    {
        header: 'First Name',
        field: 'first_name'
    },
    {
        header: 'Last Name',
        field: 'last_name'
    }
];

const customer = ref(new Customer());
const validationErrors = ref([]);
const selectedContact = ref();

const {
    getCustomerById,
    createCustomer,
    updateCustomer,
    isLoading
} = useCustomerService();

const vfm = useVfm();

const onBackClick = () => {
    vfm.close(customerModalId);
    customer.value = new Customer();
    validationErrors.value = [];
    emit('onBackClick');
};

const onSaveClick = async () => {
    validationErrors.value = [];
    if(!customer.value.name) {
        validationErrors.value.push("Name is required");
    }

    if(!customer.value.reference) {
        validationErrors.value.push("Reference is required");
    }

    if(!customer.value.category_id) {
        validationErrors.value.push("Category is required");
    }

    if(validationErrors.value.length){
        return;
    }

    let result;
    let message;

    if(props.customerId) {
        result = await updateCustomer(customer.value);
        message = "Updated customer";
    } else {
        result = await createCustomer(customer.value);
        message = 'Created customer';
    }

    if(!result) {
        alert('An error occurred, please try again');
        return;
    }

    customer.value = new Customer();
    alert(message);
    await vfm.close(customerModalId);
    emit('onSaveClick');
};

watch(props, async (_oldId, newId) => {

    if(!newId?.customerId || vfm.openedModals.filter(p => p.props.modalId === customerModalId).length === 0) {
        customer.value = new Customer();
        return;
    }

    const response = await getCustomerById(newId.customerId);

    if(response) {
        customer.value = new Customer(response);
        return;
    }

    customer.value = new Customer();
});

</script>

<template>
    <BaseModal
        class="customer-modal"
        heading="Customers - Detail"
        modalId="customer-modal"
    >
        <Header heading="Customers - Detail">
            <div class="action-container">
                <Button variant="secondary" @onClick="onBackClick">
                    Back
                </Button>
                <Button @onClick="onSaveClick">
                    Save
                </Button>
            </div>
        </Header>
        <div>
            <div v-if="!isLoading">
                <form @submit.prevent="">
                    <div class="section">
                        <Header
                            heading="General"
                            variant="h2"
                        />
                        <div class="form-inputs-container">
                            <div v-if="validationErrors.length">
                                <div v-for="validationError in validationErrors">
                                    - {{validationError}}
                                </div>
                            </div>
                            <div class="form-control-group">
                                <label for="name">Name*</label>
                                <input name="name" class="form-input" type="text" required autofocus v-model="customer.name"/>
                            </div>
                            <div class="form-control-group">
                                <label for="reference">Reference*</label>
                                <input name="reference" class="form-input" type="text" required v-model="customer.reference"/>
                            </div>
                            <div class="form-control-group">
                                <label for="category">Category*</label>
                                <select name="category" class="form-input" required v-model="customer.category_id">
                                    <!--Normally would make request to populate-->
                                    <option :selected="customer.category_id === 1" :value="1">Gold</option>
                                    <option :selected="customer.category_id === 2" :value="2">Silver</option>
                                    <option :selected="customer.category_id === 3" :value="3">Bronze</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <Header
                            heading="Details"
                            variant="h2"
                        />
                        <div class="form-inputs-container">
                            <div class="form-control-group">
                                <label for="start_date">Start Date</label>
                                <input name="start_date" class="form-input" type="date" v-model="customer.start_date"/>
                            </div>
                            <div class="form-control-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-input" v-model="customer.description"/>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="section">
                    <Header
                        heading="Contacts"
                        variant="h2">
                        <Button>
                            Create
                        </Button>
                    </Header>
                    <Table v-if="customer && customer.contacts && customer.contacts.length"
                        :rows="customer.contacts"
                        :columns="columns"
                        :action="action"
                        @edit="vfm.open('contact-modal')"
                    />
                </div>
            </div>
            <div v-if="isLoading">Loading...</div>
        </div>
        <ContactModal />
        <ConfirmationModal
            modal-id="delete-contact"
        >
            <div class="confirmation-modal-slot-wrapper">
                <Header variant="h3" heading="Delete Contact"/>
                <div class="question">
                    <div>Are you sure you wish to delete contact?</div>
                </div>
            </div>
        </ConfirmationModal>
    </BaseModal>
</template>

<style>
.customer-modal .modal-content{
    width: 100%;
    gap: 20px;
}
</style>

<style scoped>
.customer-modal .action-container {
    display: flex;
    gap: 20px;
}

.customer-modal form {
    display: flex;
    gap: 20px;
}

.customer-modal form .section{
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
</style>
