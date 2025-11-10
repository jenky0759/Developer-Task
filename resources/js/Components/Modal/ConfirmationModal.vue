<script setup>

import BaseModal from "@/Components/Modal/BaseModal.vue";
import Button from "@/Components/Button/Button.vue";

defineProps({
    modalId: {
        type: String,
        required: true
    }
});

defineEmits(['onCancel', 'onConfirm']);
</script>

<template>
    <BaseModal class="confirmation-modal" :modalId="modalId" @click-outside="() => console.log('clicked outside')">
        <slot />
        <div class="modal-footer">
            <Button variant="secondary" @click="$emit('onCancel')">Cancel</Button>
            <Button variant="primary" @click="$emit('onConfirm')">Confirm</Button>
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
