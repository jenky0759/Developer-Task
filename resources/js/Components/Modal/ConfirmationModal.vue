<script setup>

import BaseModal from "@/Components/Modal/BaseModal.vue";
import Button from "@/Components/Button/Button.vue";
import {useVfm} from "vue-final-modal";

const props = defineProps({
    modalId: {
        type: String,
        required: true
    }
});

const emit = defineEmits(['onCancel', 'onConfirm']);

const vfm = useVfm();

const onCancel = () => {
    vfm.close(props.modalId);
    emit('onCancel');
};

const onConfirm = () => {
    vfm.close(props.modalId);
    emit('onConfirm');
};


</script>

<template>
    <BaseModal class="confirmation-modal" :modalId="modalId">
        <slot />
        <div class="modal-footer">
            <Button variant="secondary" @click="onCancel">Cancel</Button>
            <Button variant="primary" @click="onConfirm">Confirm</Button>
        </div>
    </BaseModal>
</template>

<style>
.confirmation-modal .modal-content{
    padding: 20px;
    background: #F2F2F2;
    display: flex;
    gap: 20px;
    flex-direction: column;
    justify-content: space-between;
}
</style>

<style scoped>
.modal-footer {
    display: flex;
    justify-content: space-between;
    flex: 0;
}
</style>
