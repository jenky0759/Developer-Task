import {ref} from "vue";
import ContactService from "@/Services/ContactService.js";

export default function useContactService() {
    const error = ref();
    const isLoading = ref(false);

    const getContacts = async () => {
        isLoading.value = true;
        error.value = null;
        try {
            return await ContactService.getList();
        } catch (e) {
            error.value = e;
        }
        finally {
            isLoading.value = false;
        }
    };

    const getContactById = async (id) => {
        isLoading.value = true;
        error.value = null;
        try {
            return await ContactService.getById(`${id}`);
        } catch (e) {
            error.value = e;
        }
        finally {
            isLoading.value = false;
        }
    };

    const createContact = async (contact) => {
        isLoading.value = true;
        error.value = null;
        try {
            return await ContactService.create(contact);
        } catch (e) {
            error.value = e;
        }
        finally {
            isLoading.value = false;
        }
    };

    const updateContact = async (contact) => {
        isLoading.value = true;
        error.value = null;
        try {
            return await ContactService.update(contact);
        } catch (e) {
            error.value = e;
        }
        finally {
            isLoading.value = false;
        }
    };

    const deleteContactById = async (id) => {
        isLoading.value = true;
        error.value = null;
        try {
            return await ContactService.deleteById(`${id}`);
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
        getContacts,
        getContactById,
        createContact,
        updateContact,
        deleteContactById
    };
}
