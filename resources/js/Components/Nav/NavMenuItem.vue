<script setup>
defineProps({
    label: String,
    path: String
});
</script>

<template>
    <li>
        <RouterLink class="nav-item" :to="path">
            <img src="/resources/assets/doc-icon.png" height="20" width="20" />
            {{label}}
        </RouterLink>
    </li>
</template>

<style scoped>
.nav-item {
    display: flex;
    align-items: center;
    font-weight: bold;
    text-decoration: none;
    color: #000000;
}

.nav-item img {
    margin-right: 5px;
}

</style>
