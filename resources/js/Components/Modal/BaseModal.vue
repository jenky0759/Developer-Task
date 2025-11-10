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
    <VueFinalModal class="modal" content-class="modal-content" :modal-id="modalId">
        <slot name="header" />
        <div>
            <slot />
        </div>
    </VueFinalModal>
</template>

<style>
.modal {
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    min-width: 300px;
    min-height: 200px;
}
</style>
