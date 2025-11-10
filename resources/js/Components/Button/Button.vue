<script setup>
defineEmits(['onClick'])

defineProps({
    variant: {
        type: String,
        default: "primary",
        validator(value) {
            const valueToLowerCase = value.toLowerCase();
            const valid = ['primary', 'secondary'].includes(valueToLowerCase);

            if(!valid) {
                console.warn("Prop type variant can only have 'primary' or 'secondary' as values");
            }

            return valueToLowerCase;
        }
    }
})
</script>

<template>
    <button
        class="btn"
        :class="{ 'primary-btn': variant !== 'secondary'}"
        @click="$emit('onClick')"
    >
        <slot />
    </button>
</template>

<style scoped>
.btn {
    padding: 8px;
    background: none;
    border: none;
    cursor: pointer;
}
.btn.primary-btn {
    background: dodgerblue;
    color: white;
    border-radius: 8px;
    border: 1px solid black;
}
</style>
