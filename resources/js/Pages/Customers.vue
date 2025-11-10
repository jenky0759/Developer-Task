<script setup>
import Header from "@/Components/Header/Header.vue";
import Table from "@/Components/Table/Table.vue";
import CustomerModal from "@/Components/Modal/CustomerModal.vue";
import {useVfm} from "vue-final-modal";
import Button from "@/Components/Button/Button.vue";
import {onMounted, ref} from "vue";
import useCustomerService from "@/Composables/useCustomerService.js";
import ConfirmationModal from "@/Components/Modal/ConfirmationModal.vue";

const action = {
    header: 'Edit | Delete',
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
        header: 'Name',
        field: 'name'
    },
    {
        header: 'Reference',
        field: 'reference'
    },
    {
        header: 'Category',
        field: 'category'
    },
    {
        header: 'No of Contacts',
        field: 'noOfContacts'
    }
];

const deleteModalId = 'delete-confirmation';
const customerModalId = 'customer-modal';
const selectedCustomer = ref();
const customers = ref();

const {
    getCustomers,
    deleteCustomerById,
    error,
    isLoading
} = useCustomerService();

const vfm = useVfm();

const openCustomerModal = async () => {
    await vfm.open(customerModalId);
};

const onEdit = async (customer) => {
    selectedCustomer.value = customer;
    await openCustomerModal();
};

const onDelete = async (customer) => {
    selectedCustomer.value = customer;
    await vfm.open(deleteModalId)
}

const internalGetCustomers = async () => {
    const response = await getCustomers();

    if(response) {
        customers.value = response.map((customer) => {
            return {
                id: customer.id,
                name: customer.name,
                reference: customer.reference,
                category: customer.category.name,
                noOfContacts: 0,
            };
        });
        return;
    }

    customers.value = null;
};

const onConfirmDelete = async () => {
    const response = await deleteCustomerById(selectedCustomer.value.id);

    if(response) {
        await internalGetCustomers();

        alert(`Deleted ${selectedCustomer.value.name} ref: ${selectedCustomer.value.reference}`);
    }

    selectedCustomer.value = null;
};

const onCancel = () => {
  selectedCustomer.value = null;
};

onMounted(internalGetCustomers);

</script>

<template>
    <div>
        <Header heading="Customers">
            <Button @onClick="openCustomerModal">
                Create
            </Button>
        </Header>
        <div class="table-wrapper">
            <Table
                v-if="!isLoading && customers && customers.length"
                :rows="customers"
                :columns="columns"
                :action="action"
                @edit="onEdit"
                @delete="onDelete"
            />
            <div v-if="isLoading">Loading...</div>
            <div v-if="!customers || !customers.length || error">No Customers</div>
        </div>

        <CustomerModal
            :customerId="selectedCustomer?.id"
            heading="Customers - Details"
            @onBackClick="onCancel"
            @onSaveClick="internalGetCustomers"
        />
        <ConfirmationModal
            :modalId="deleteModalId"
            @onCancel="onCancel"
            @onConfirm="onConfirmDelete"
        >
            <div class="confirmation-modal-slot-wrapper">
                <Header variant="h3" heading="Delete Customer"/>
                <div class="question">
                    <div>Are you sure you wish to delete customer {{selectedCustomer?.name}} ref: {{selectedCustomer?.reference}}?</div>
                </div>
            </div>
        </ConfirmationModal>
    </div>
</template>

<style scoped>
.table-wrapper {
    margin-top: 20px;
}

.confirmation-modal-slot-wrapper {
    display: flex;
    flex-direction: column;
    flex: 1;
}

.question {
    flex: 1;
    display: flex;
    align-items: center;
}
</style>
