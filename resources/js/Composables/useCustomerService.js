import {ref} from "vue";
import CustomerService from "@/Services/CustomerService.js";

export default function useCustomerService() {
    const error = ref();
    const isLoading = ref(false);

    const getCustomers = async () => {
        isLoading.value = true;
        error.value = null;
        try {
            return await CustomerService.getList();
        } catch (e) {
            error.value = e;
        }
        finally {
            isLoading.value = false;
        }
    };

    const getCustomerById = async (id) => {
        isLoading.value = true;
        error.value = null;
        try {
            return await CustomerService.getById(`${id}`);
        } catch (e) {
            error.value = e;
        }
        finally {
            isLoading.value = false;
        }
    };

    const createCustomer = async (customer) => {
        isLoading.value = true;
        error.value = null;
        try {
            return await CustomerService.create(customer);
        } catch (e) {
            error.value = e;
        }
        finally {
            isLoading.value = false;
        }
    };

    const updateCustomer = async (customer) => {
        isLoading.value = true;
        error.value = null;
        try {
            return await CustomerService.update(customer);
        } catch (e) {
            error.value = e;
        }
        finally {
            isLoading.value = false;
        }
    };

    const deleteCustomerById = async (id) => {
        isLoading.value = true;
        error.value = null;
        try {
            return await CustomerService.deleteById(`${id}`);
        } catch (e) {
            error.value = e;
        }
        finally {
            isLoading.value = false;
        }
    };

    return {
        error,
        isLoading,
        getCustomers,
        getCustomerById,
        createCustomer,
        updateCustomer,
        deleteCustomerById
    };
}
