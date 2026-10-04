<template>
  <VLibras />
  <SignForm p-page="login">
  </SignForm>
</template>

<script setup>
import VLibras from '@/components/VLibras.vue'
import SignForm from '@/components/SignForm.vue'
import { onMounted, onUnmounted } from 'vue'

onMounted(() => {
  document.body.classList.add('bg-gradient-to-br', 'from-[#667eea]', 'to-[#764ba2]', 'min-h-screen' , 'h-fit')
})

onUnmounted(() => {
  document.body.classList.remove('bg-gradient-to-br', 'from-[#667eea]', 'to-[#764ba2]', 'min-h-screen' , 'h-fit')
})

</script>
