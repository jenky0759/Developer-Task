<script setup>

import NavMenu from "@/Components/Nav/NavMenu.vue";
import Logo from "@/Components/Brand/Logo.vue";
</script>

<template>
    <div>
        <div class="logo-container">
            <RouterLink to="/">
                <Logo />
            </RouterLink>
        </div>
        <div class="nav-menu-container">
            <NavMenu />
        </div>
    </div>
</template>

<style scoped>
    .logo-container {
        border-bottom: 2px solid black;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .nav-menu-container {
        padding: 20px 20px 40px 20px;
        border-bottom: 2px solid black;
    }
</style>
