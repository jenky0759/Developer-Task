<script setup>

import Page from "@/Pages/Page.vue";
import {ModalsContainer} from "vue-final-modal";
</script>

<template>
    <RouterView v-slot="{ Component }">
        <Page>
            <component :is="Component"/>
            <ModalsContainer />
        </Page>
    </RouterView>
</template>

<style scoped>

</style>
