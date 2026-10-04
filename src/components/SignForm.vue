<template>
    <main class="flex justify-center items-center flex-col min-h-screen h-fit-content">
        <form method="POST" class="bg-gray-100 rounded-2xl w-76 sm:w-100 p-8 flex flex-col justify-center space-y-4">
            <TopSignForm v-if="pPage == 'login'" p-title="Calculadora IMC" p-subtitle="Entre com suas credenciais"/>
            <TopSignForm v-else-if="pPage == 'register'" p-title="Criar Conta" p-subtitle="Preencha seus dados"/>
            <InputSignForm v-if="pPage == 'register'" p-id="name" p-label="Nome completo" p-placeholder="Digite seu nome" p-type="text">
                <template #icon>
                    <svg class="w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="8" r="5" />
                        <path d="M20 21a8 8 0 0 0-16 0" />
                    </svg>
                </template>
            </InputSignForm>
            <InputSignForm p-id="email" p-label="Email" p-placeholder="seu@email.com" p-type="email">
                <template #icon>
                    <svg class="w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="16" x="2" y="4" rx="2" />
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                    </svg>
                </template>
            </InputSignForm>
            <InputSignForm p-id="password" p-label="Senha" p-placeholder="Digite sua senha" p-type="password">
                <template #icon>
                    <svg class="w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                </template>
            </InputSignForm>
            <InputSignForm v-if="pPage == 'register'" p-id="confirmPassword" p-label="Confirmar senha" p-placeholder="Confirme sua senha" p-type="password">
                <template #icon>
                    <svg class="w-4 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                </template>
            </InputSignForm>
            <SubmitButton v-if="pPage == 'login'" p-text="Entrar"/>
            <SubmitButton v-else-if="pPage == 'register'" p-text="Cadastre-se"/>
            <p v-if="pPage == 'login'" class="text-sm text-center">Não tem uma conta? <RouterLink to="/register" class="text-blue-600 font-semibold hover:underline">Cadastre-se</RouterLink></p>
            <p v-else-if="pPage == 'register'" class="text-sm text-center">Já possui uma conta? <RouterLink to="/" class="text-blue-600 font-semibold hover:underline">Entrar</RouterLink></p>
        </form>

        <p></p>
    </main>
</template>

<script setup>

import InputSignForm from './InputSignForm.vue';
import TopSignForm from './TopSignForm.vue';
import SubmitButton from './SubmitButton.vue';

defineProps({
    pPage: String
})



</script>