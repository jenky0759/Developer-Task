<script setup>

import Page from "@/Pages/Page.vue";
</script>

<template>
    <RouterView v-slot="{ Component }">
        <Page>
            <component :is="Component"/>
        </Page>
    </RouterView>
</template>

<style scoped>

</style>
