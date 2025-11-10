<script setup>
import Header from "@/Components/Header/Header.vue";
import Table from "@/Components/Table/Table.vue";
import CustomerModal from "@/Components/Modal/CustomerModal.vue";
import {useVfm} from "vue-final-modal";
import Button from "@/Components/Button/Button.vue";
import {onMounted, ref} from "vue";
import useCustomerService from "@/Composables/useCustomerService.js";

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

const selectedCustomerId = ref();

const customers = ref();

const vfm = useVfm();

const openCustomerModal = () => {
    vfm.open('customer-modal');
};

const onEdit = (customer) => {

    selectedCustomerId.value = customer.id;
    openCustomerModal();
}

const { getCustomers, error, isLoading } = useCustomerService();

onMounted(async () => {
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
});

</script>

<template>
        <div>
            <Header heading="Customers">
                <Button @onClick="openCustomerModal">
                    Create
                </Button>
            </Header>
            <div>
                <Table
                    v-if="!isLoading && customers && customers.length"
                    :rows="customers"
                    :columns="columns"
                    :action="action"
                    @edit="onEdit"
                    @delete="(x) => console.log('Emitted event delete', x)"
                />
                <div v-if="isLoading">Loading...</div>
                <div v-if="!customers || !customers.length || error">No Customers</div>
            </div>

            {{selectedCustomerId}}
            <CustomerModal
                :customerId="selectedCustomerId"
                heading="Customers - Details"
            />
        </div>
</template>

<style scoped>
</style>
