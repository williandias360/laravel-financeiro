<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps(["ListaTipoMovimento"])

</script>
<template>

    <Head title="Tipo Movimento" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tipo Movimento
            </h2>
        </template>
        <div v-for="tipoMovimento in ListaTipoMovimento" :key="tipoMovimento.CodigoTipoMovimento">
            {{tipoMovimento.Descricao}}
        </div>
    </AuthenticatedLayout>
</template>