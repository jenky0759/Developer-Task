<script setup>

import {ref} from "vue";

const response = ref();

const getTest = async () => {
    try{
        response.value = await axios.get("/api/test-me");
    } catch (e) {
        response.value = null;
        console.log(e);
    }
};
</script>

<template>
    <h1>Home</h1>
    <RouterLink to="/test">Go to test page</RouterLink>
    <div>
        <button @click="getTest">Test API</button>
        <p v-if="response">{{response.data}}</p>
    </div>
</template>

<style scoped>

</style>
