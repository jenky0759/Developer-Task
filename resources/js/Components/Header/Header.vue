<script setup>
defineProps(['heading'])
</script>

<template>
    <div class="header">
        <h1>{{heading}}</h1>
        <div>
            <slot />
        </div>
    </div>
</template>

<style scoped>
    .header {
        display: flex;
        justify-content: space-between;
    }
</style>
