<script setup>

import Nav from "@/Components/Nav/Nav.vue";
</script>

<template>
    <div class="page">
        <div class="nav-section">
            <Nav />
        </div>
        <div class="content-section">
            <slot />
        </div>
    </div>
</template>

<style scoped>
    .page {
        display: flex;
        min-height: 100vh;
    }

    .nav-section {
        flex: 1;
        border-right: 1px solid black;
        max-width: 300px;
    }

    .content-section {
        flex: 2;
        padding: 20px;
    }
</style>
