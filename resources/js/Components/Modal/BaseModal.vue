<script setup>
import {VueFinalModal} from "vue-final-modal";
defineProps({
    modalId: {
        type: String,
        required: true
    }
});

</script>

<template>
    <VueFinalModal class="modal" content-class="modal-content" :modal-id="modalId" :click-to-close="false">
        <slot />
    </VueFinalModal>
</template>

<style>
.modal {
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal .modal-content {
    min-width: 300px;
    min-height: 200px;
    display: flex;
    flex-direction: column;
    padding: 20px;
    margin: 20px;
    background: #F2F2F2;
}
</style>
