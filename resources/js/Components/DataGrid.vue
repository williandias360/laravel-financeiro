<script setup>

const props = defineProps({
    headers: {
        type: Array,
        required: true
    },
    items: {
        type: Array,
        required: true
    },
    alternating: {
        type: Boolean,
        default: true
    },
    borderCell: {
        type: Boolean,
        default: true
    },
    buttonsPagination: {
        type: Boolean,
        default: false
    },
    emptyMessage: {
        type: String,
        default: 'Nenhum registro encontrado'
    },
    fixedCheckbox: {
        type: Boolean,
        default: true,
    },
    fixedExpand: {
        type: Boolean,
        default: false,
    },
    fixedHeader: {
        type: Boolean,
        default: true
    },
    fixedIndex: {
        type: Boolean,
        default: false,
    },
    tableHeight: {
        type: Number,
        default: 500
    },
    tableMinHeight: {
        type: Number,
        default: 90
    },
    rowsPerPage: {
        type: Number,
        default: 15
    },
    rowsOfPageSeparatorMessage: {
        type: String,
        default: 'de'
    },
    rowsPerPageMessage: {
        type: String,
        default: 'Linhas por página'
    },
    showIndex: {
        type: Boolean,
        default: false
    },
    hideFooter: {
        type: Boolean,
        default: false
    },
    loading: {
        type: Boolean,
        default: false
    }
})
</script>
<template>
    <EasyDataTable :headers="headers" :items="items" :alternating="alternating" :border-cell="borderCell"
        :buttons-pagination="buttonsPagination" :empty-message="emptyMessage" :fixed-expand="fixedExpand"
        :fixed-header="fixedHeader" :fixed-index="fixedIndex" :table-height="tableHeight"
        :table-min-height="tableMinHeight" :fixed-checkbox="fixedCheckbox" :rows-per-page="rowsPerPage"
        :rows-of-page-separator-message="rowsOfPageSeparatorMessage" :rows-per-page-message="rowsPerPageMessage"
        :show-index="showIndex" :hide-footer="hideFooter" :loading="loading" />
</template>