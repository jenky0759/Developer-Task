<script setup>
import Header from "@/Components/Header/Header.vue";
import BaseModal from "@/Components/Modal/BaseModal.vue";
</script>

<template>
    <BaseModal
        class="customer-modal"
        heading="Customers - Detail"
        modalId="customer-modal"
    >
        <Header heading="Customers - Detail">
            To Do buttons
        </Header>
        <div>
            <div>
                <form @submit.prevent="">
                    <div class="section">
                        <Header
                            heading="General"
                            variant="h2"
                        />
                    </div>
                    <div class="section">
                        <Header
                            heading="Details"
                            variant="h2"
                        />
                    </div>
                </form>
            </div>
        </div>
    </BaseModal>
</template>

<style>
.customer-modal .modal-content{
    width: 100%;
    padding: 20px;
    margin: 20px;
    background: #F2F2F2;
}
</style>

<style scoped>
.customer-modal form {
    display: flex;
    gap: 20px;
}

.customer-modal form .section{
    flex: 1;
    display: flex;
}
</style>
