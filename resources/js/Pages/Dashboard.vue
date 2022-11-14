<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DatePicker from '@/Components/DatePicker.vue'
import BarChart from '@/Components/BarChart.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import { formatBrl } from '@/formatters.js'
const { Filtros } = defineProps(['Totalizador', 'Filtros'])

const form = useForm("getparams", {
    data_inicio: Filtros.data_inicio,
    data_final: Filtros.data_final,
    filtroData: [Filtros.data_inicio, Filtros.data_final]
})

const submit = () => {
    form.transform((data) => ({
        data_inicio: data.filtroData[0],
        data_final: data.filtroData[1]
    })).get(route('dashboard'))
}

</script>

<template>

    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <div class="grid grid-cols-3 gap-2 px-6 pt-2">
                            <div class="flex flex-col col-span-2">
                                <label>Informe um período</label>
                                <DatePicker v-model="form.filtroData" />
                            </div>
                            <div class="pt-5">
                                <button
                                    class="bg-blue-500 w-full text-white p-3 rounded-md font-semibold">Filtrar</button>
                            </div>
                        </div>
                    </form>
                    <div class="p-6">
                        <div class="grid grid-cols-3 gap-2 md:gap-4">
                            <div class="bg-red-500 rounded p-4 md:p-8 text-white shadow-sm flex flex-col text-center">
                                <label class="font-semibold text-xs md:text-base">Débitos</label>
                                <span class="font-bold text-xs md:text-base">{{ formatBrl(Totalizador.Debito) }}</span>
                            </div>
                            <div class="bg-green-500 rounded p-4 md:p-8 text-white shadow-sm flex flex-col text-center">
                                <label class="font-semibold text-xs md:text-base">Créditos</label>
                                <span class="font-bold text-xs md:text-base">{{ formatBrl(Totalizador.Credito) }}</span>
                            </div>
                            <div class="rounded p-4 md:p-8 text-white shadow-sm flex flex-col text-center"
                                :class="[Totalizador.Saldo > 0 ? 'bg-green-500' : 'bg-red-500']">
                                <label class="font-semibold text-xs md:text-base">Saldo</label>
                                <span class="font-bold text-xs md:text-base">{{ formatBrl(Totalizador.Saldo) }}</span>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <BarChart :chartData="Totalizador.Movimentos" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
