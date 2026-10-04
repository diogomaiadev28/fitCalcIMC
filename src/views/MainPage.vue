<template>
    <DashboardHeader />
    <main class="flex flex-col items-center space-y-6 mb-6">
        <div class="space-y-3 flex flex-col items-center">
            <h1 class="font-semibold text-3xl">Calculadora de IMC</h1>

            <p>Calcule seu Índice de Massa Corporal e monitore a sua saúde</p>
        </div>
        <div class="flex space-x-4 justify-center w-full px-6">
            <div class="rounded-lg w-1/2 bg-white shadow-lg px-6 py-8 flex flex-col space-y-3">
                <div class="flex space-x-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="blue" class="bi bi-calculator"
                        viewBox="0 0 16 16" data-component-line="76">
                        <path
                            d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path
                            d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                    </svg>
                    <h2 class="text-xl font-semibold">Dados para Cálculo</h2>
                </div>
                <form class="flex flex-col space-y-3" method="POST" action="home.php">
                    <DashboardInput p-name="weight" p-placeholder="Ex: 70.5" p-label="Peso (kg)">
                        <template v-slot:icon>
                            <i class="p-2 bg-gray-100 rounded-l-lg border border-gray-200 bi bi-duffle"></i>
                        </template>
                    </DashboardInput>
                    <DashboardInput p-name="height" p-placeholder="Ex: 1.75" p-label="Altura (m)">
                        <template v-slot:icon>
                            <i class="p-2 bg-gray-100 rounded-l-lg border border-gray-200 bi bi-rulers" id="heightIcon"></i>
                        </template>
                    </DashboardInput>
                    <br><br>
                    <SubmitButton p-text="Calcular IMC"/>
                </form>
            </div>

            <div class="rounded-lg w-1/2 bg-white shadow-lg p-6 flex-1">
                <h2 class="text-xl font-semibold">Resultado</h2>

                <div class="flex flex-col h-full items-center justify-center pb-6">
                    <div class="flex flex-col items-center space-y-2">
                            <p v-if="result">Seu IMC é: 22,91</p>
                            <p v-if="result">Categoria: Peso normal</p>

                            <i v-if="!result" class="text-4xl text-gray-500 bi bi-calculator"></i>
                            <p v-if="!result">Preencha os dados ao lado para ver o resultado</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <section class="px-6">
        <div class="mt-6 w-full rounded-2xl bg-white p-6 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Histórico de Verificações
                </h2>
                <span class="text-sm text-gray-500">Últimos registros</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                        <th class="py-3 px-4">Data</th>
                        <th class="py-3 px-4">Peso</th>
                        <th class="py-3 px-4">Altura</th>
                        <th class="py-3 px-4">IMC</th>
                        <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50 text-sm font-medium text-gray-700">
                        <ImcRow :p-data="pData"></ImcRow>

                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</template>

<script setup>

import { onMounted, onUnmounted } from 'vue'
import DashboardHeader from '@/components/DashboardHeader.vue'
import DashboardInput from '@/components/DashboardInput.vue';
import SubmitButton from '@/components/SubmitButton.vue';
import ImcRow from '@/components/ImcRow.vue';

const result = true

onMounted(() => {
    document.body.classList.add('bg-gray-100', 'min-h-screen' , 'h-fit')
})

onUnmounted(() => {
    document.body.classList.remove('bg-gray-100', 'min-h-screen', 'h-fit' )
})

const pData = []

pData.created_at = '2025-05-28'
pData.weight = 68.7
pData.height = 1.76
pData.result = 21.34
pData.bmi_range = 'Obesidade grau I'

console.log(pData)

</script>