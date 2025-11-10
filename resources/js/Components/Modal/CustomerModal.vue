<script setup>
import Header from "@/Components/Header/Header.vue";
import BaseModal from "@/Components/Modal/BaseModal.vue";
import Button from "@/Components/Button/Button.vue";
import { ref, watch} from "vue";
import useCustomerService from "@/Composables/useCustomerService.js";
import Customer from "@/Models/Customer.js";
import {useVfm} from "vue-final-modal";

const customerId = defineProps(['customerId']);
defineEmits('onBackClick', 'onSaveClick');

const {
    getCustomerById,
    createCustomer,
    updateCustomer,
    isLoading
} = useCustomerService();

const vfm = useVfm();

const customer = ref(new Customer());
const errors = ref([]);


const onBackClick = () => {
    vfm.close('customer-modal');
    customer.value = new Customer();
    this.$emit('onBackClick');
};

const onSaveClick = async () => {
    errors.value = [];
    if(!customer.value.name) {
        errors.value.push("Name is required");
    }

    if(!customer.value.reference) {
        errors.value.push("Reference is required");
    }

    if(!customer.value.category_id) {
        errors.value.push("Category is required");
    }

    if(errors.value.length){
        return;
    }

    if(customerId) {
        await updateCustomer(customer.value);
        alert(`Updated customer`);
    } else {
        await createCustomer(customer.value);

        alert(`Created customer`);
    }

    await vfm.close('customer-modal');
    this.$emit('onSaveClick');
};

watch(customerId, async (_oldId, newId) => {
//todo this shouldn't fire unless modal is open
    if(!newId) {
        customer.value = null;
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
                            <div class="form-control-group">
                                <label for="name">Name*</label>
                                <input class="form-input" type="text" required autofocus v-model="customer.name"/>
                            </div>
                            <div class="form-control-group">
                                <label for="reference">Reference*</label>
                                <input class="form-input" type="text" required v-model="customer.reference"/>
                            </div>
                            <div class="form-control-group">
                                <label for="category">Category*</label>
                                <select class="form-input" required v-model="customer.category_id">
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
                                <label for="startDate">Start Date</label>
                                <input class="form-input" type="date" v-model="customer.start_date"/>
                            </div>
                            <div class="form-control-group">
                                <label for="description">Description</label>
                                <textarea class="form-input" v-model="customer.description"/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div v-if="isLoading">Loading...</div>
        </div>
    </BaseModal>
</template>

<style>
.customer-modal .modal-content{
    width: 100%;
    padding: 20px;
    margin: 20px;
    background: #F2F2F2;
    display: flex;
    gap: 20px;
    flex-direction: column;
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

.customer-modal .form-inputs-container {
    display: flex;
    gap: 10px;
    flex-direction: column;
}
</style>
