<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue'
import { Head } from '@inertiajs/inertia-vue3';
import MovimentoDataGrid from '@/Components/MovimentoDataGrid.vue';
</script>
<template>

    <Head title="Movimento" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Movimento
            </h2>
        </template>
        <div class="py-6">
            <div class="max-w-7xl mx-auto">
                <div class="bg-white shadow p-4 rounded-lg">
                    <div class="my-2">
                        <PrimaryButton class="bg-green-600 hover:bg-green-700 shadow">
                            Novo Movimento
                        </PrimaryButton>
                    </div>
                    <MovimentoDataGrid />
                </div>
            </div>
        </div>


    </AuthenticatedLayout>
</template>