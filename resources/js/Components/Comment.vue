<script setup>
const props = defineProps({
    writer: {
        type: Object,
    },
    body: {
        type: String,
    },
});
</script>

<template>
<div class="flex justify-center mt-4 bg-blue-300 p-3">
    <p class="">{{ writer.name }} : {{ body }}</p>
</div>
</template>

<style scoped>

</style>
