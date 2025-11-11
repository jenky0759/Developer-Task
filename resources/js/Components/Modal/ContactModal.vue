<script setup>

import BaseModal from "@/Components/Modal/BaseModal.vue";
import Button from "@/Components/Button/Button.vue";
import Header from "@/Components/Header/Header.vue";
import {ref} from "vue";
import Contact from "@/Models/Contact.js";

defineProps({
    contact: {
        type: Contact
    }
});

const contactModalId = 'contact-modal';

const contact = ref(new Contact());

const onBackClick = () => {
    contact.value = new Contact();
};

const onSaveClick = async () => {

    //todo whether create/update and customer exists
};

</script>

<template>
    <BaseModal
        class="contact-modal"
        :modal-id="contactModalId"
    >
        <Header heading="Contacts - Detail">
            <div class="action-container">
                <Button variant="secondary" @onClick="onBackClick">
                    Back
                </Button>
                <Button @onClick="onSaveClick">
                    Save
                </Button>
            </div>
        </Header>
        <div class="section">
            <Header
                heading="General"
            />
            <form>
                <div class="form-inputs-container">
                    <div class="form-control-group">
                        <label for="start_date">First Name*</label>
                        <input name="start_date" class="form-input" type="text" v-model="contact.first_name"/>
                    </div>
                    <div class="form-control-group">
                        <label for="last_name">Last Name*</label>
                        <input name="last_name" class="form-input" type="text" v-model="contact.last_name"/>
                    </div>
                </div>
            </form>
        </div>
    </BaseModal>
</template>

<style>
.contact-modal .modal-content{
    width: 100%;
    max-width: 500px;
    gap: 20px;
}
</style>

<style scoped>
.contact-modal .action-container {
    display: flex;
    gap: 20px;
    width: 100%;
    max-width: 500px;
}
</style>
