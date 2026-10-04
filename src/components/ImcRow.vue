<template>
    <tr class="hover:bg-gray-50 transition-colors">
        <td class="py-3 px-4 text-gray-500">{{ pData.created_at }}</td>
        <td class="py-3 px-4">{{ pData.weight }} kg</td>
        <td class="py-3 px-4">{{ pData.height }} m</td>
        <td class="py-3 px-4 font-bold text-gray-900">{{ pData.result }}</td>
        <td class="py-3 px-4">
            <span v-if="pData.bmi_range === 'Baixo peso'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-sky-100 text-sky-800">
                {{ pData.bmi_range }}
            </span>
            <span v-else-if="pData.bmi_range === 'Peso normal'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                {{ pData.bmi_range }}
            </span>
            <span v-else-if="pData.bmi_range === 'Sobrepeso'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                {{ pData.bmi_range }}
            </span>
            <span v-else-if="pData.bmi_range === 'Obesidade grau I'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-orange-100 text-orange-800">
                {{ pData.bmi_range }}
            </span>
            <span v-else-if="pData.bmi_range === 'Obesidade grau II'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                {{ pData.bmi_range }}
            </span>
            <span v-else-if="pData.bmi_range === 'Obesidade grau III'" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                {{ pData.bmi_range }}
            </span>
        </td>
    </tr>
</template>

<script setup>
    defineProps({
        pData: Array
    })
</script>