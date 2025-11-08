<script setup>

import NavMenuItem from "@/Components/Nav/NavMenuItem.vue";
import myImageUrl from "../../../assets/doc-icon.png";
</script>

<template>
    <nav>
        <b>Demo Menu</b>
        <ul>
            <NavMenuItem
                label="Customers"
                path="/customers"
            />
        </ul>
    </nav>
</template>

<style scoped>
nav ul {
    list-style: none;
    padding: 0;
}
</style>
