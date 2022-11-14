<script setup>
import { ref } from 'vue';
import DataGrid from '@/Components/DataGrid.vue'

const headers = ref([
    { text: "Name", value: "name" },
    { text: "Height (cm)", value: "height", sortable: true },
    { text: "Weight (kg)", value: "weight", sortable: true },
    { text: "Age", value: "age", sortable: true }
]);

const items = ref([
    { "name": "Curry", "height": 178, "weight": 77, "age": 20 },
    { "name": "James", "height": 180, "weight": 75, "age": 21 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
    { "name": "Jordan", "height": 181, "weight": 73, "age": 22 },
]);

</script>
<template>
    <DataGrid :headers="headers" :items="items" />
</template>