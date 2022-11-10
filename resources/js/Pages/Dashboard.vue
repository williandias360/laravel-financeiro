<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import BarChart from '@/Components/BarChart.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import { formatBrl } from '@/formatters.js'
import { onBeforeMount } from 'vue';
const { Filtros } = defineProps(['Totalizador', 'Filtros'])

const meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
const anos = [];
const listarAnos = () => {
    const anoAtual = new Date().getFullYear();
    const anoInicial = anoAtual - 5;

    for (let index = anoAtual; index >= anoInicial; index--) {
        anos.push(index);
    }
}

const form = useForm("getparams", {
    ano: Filtros.ano,
    mes: Filtros.mes,
})

const submit = () => {
    form.get(route('dashboard'))
}

onBeforeMount(() => {
    listarAnos();
})


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
                            <div class="flex flex-col">
                                <label class="font-bold">Mês</label>
                                <select v-model="form.mes">
                                    <option :value="index + 1" v-for="(mes, index) in meses" :key="index">{{ mes }}</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="font-bold">Ano</label>
                                <select v-model="form.ano">
                                    <option :value="ano" v-for="ano in anos" :key="ano">{{ ano }}</option>
                                </select>
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
                                <label class="font-semibold">Débitos</label>
                                <span class="font-bold text-sm md:text-base">{{ formatBrl(Totalizador.Debito) }}</span>
                            </div>
                            <div class="bg-green-500 rounded p-4 md:p-8 text-white shadow-sm flex flex-col text-center">
                                <label class="font-semibold">Créditos</label>
                                <span class="font-bold text-sm md:text-base">{{ formatBrl(Totalizador.Credito) }}</span>
                            </div>
                            <div class="rounded p-4 md:p-8 text-white shadow-sm flex flex-col text-center"
                            :class="[Totalizador.Saldo > 0 ? 'bg-green-500' : 'bg-red-500']">
                                <label class="font-semibold">Saldo</label>
                                <span class="font-bold text-sm md:text-base">{{ formatBrl(Totalizador.Saldo) }}</span>
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
