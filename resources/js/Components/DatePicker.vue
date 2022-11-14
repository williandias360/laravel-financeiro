<script setup>
import { ref, toRefs, watch } from 'vue';
import LitepieDatepicker from 'litepie-datepicker';

const emit = defineEmits(['update:modelValue'])
const props = defineProps({
  modelValue: {
    type: Array
  },
  placeHolder: {
    type: String,
    default: 'Informe uma data'
  },
  separator: {
    default: ' - '
  },
  formatter: {
    type: Object,
    default: () => {
      return {
        date: 'DD/MM/YYYY',
        month: 'MM'
      }
    }
  },
  autoApply: {
    type: Boolean,
    default: true
  },
  shortcuts: {
    type: Boolean,
    default: false
  },
})

watch(() => props.modelValue, (data) => emit('update:modelValue', data))
</script>
<template>
  <div class="flex">
    <litepie-datepicker v-model="modelValue" :placeholder="placeHolder" :separator="separator" :formatter="formatter"
      :auto-apply="autoApply" :shortcuts="shortcuts" i18n="pt-br" ref="dateValue" readonly>
    </litepie-datepicker>
  </div>
</template>