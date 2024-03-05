<script setup>
const props =defineProps({
    "url": {
        type: String,
    },
    "title": {
        type: String,
    },
    "id": {
        type: String,
    }
});

const dist = "http://localhost:8000/images/" + props.id;


</script>

<template>
<div class="w-48 items-center text-center bg-white">
    <a :href="dist">
        <img :src="url" alt="#" class="rounded-2xl p-2">
        <h3>{{title}}</h3>
    </a>
</div>
</template>

<style scoped>

</style>
