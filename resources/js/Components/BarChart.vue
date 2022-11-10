<template>
    <div class="w-full">
        <Bar :chart-options="chartOptions" :chart-data="getChartData" :chart-id="chartId" :dataset-id-key="datasetIdKey"
            :plugins="plugins" :css-classes="cssClasses" :styles="styles" :height="height" />
    </div>
</template>

<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)

export default {
    name: "BarChart",
    components: { Bar },
    props: {
        chartId: {
            type: String,
            default: 'bar-chart'
        },
        datasetIdKey: {
            type: String,
            default: 'label'
        },
        height: {
            type: Number,
            default: 400
        },
        cssClasses: {
            default: '',
            type: String
        },
        styles: {
            type: Object,
            default: () => { }
        },
        plugins: {
            type: Object,
            default: () => { }
        },
        chartData:{
            type:Object
        }
    },
    computed:{
        getChartData(){
            let labels = this.chartData.map(m => m.MesExtenso)
            let datasets = [{
                label: "Entradas",
                backgroundColor: '#528c38',
                data: this.chartData.map(m => m.ValorCredito)
            },{
                label: "Saídas",
                backgroundColor: '#f87979',
                data: this.chartData.map(m => m.ValorDebito)
            }]

            return {
                labels,
                datasets
            }
        }
    },
    data() {
        return {
            /*chartData: {
                labels: ['January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December'],
                datasets: [
                    {
                        label: 'Data One',
                        backgroundColor: '#f87979',
                        data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
                    }
                ]
            },*/
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    }
}
</script>