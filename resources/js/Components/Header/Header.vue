<script setup>
defineProps({
    heading: String,
    variant: {
        type: String,
        default: "h1",
        validator(value) {
            const valueToLowerCase = value.toLowerCase();
            const valid = ["h1", "h2", "h3", "h4"].includes(valueToLowerCase);

            if(!valid){
                console.warn("Prop type variant can only have 'h1', 'h2', 'h3' or 'h4' as values");
            }

            return valueToLowerCase;
        }
    }
});

</script>

<template>
    <div class="header">
        <h1 v-if="variant === 'h1'">{{heading}}</h1>
        <h1 v-if="variant === 'h2'">{{heading}}</h1>
        <h1 v-if="variant === 'h3'">{{heading}}</h1>
        <h1 v-if="variant === 'h4'">{{heading}}</h1>
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
