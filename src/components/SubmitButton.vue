<template>
    <button type="submit" class="cursor-pointer hover:opacity-90 transition duration-200 bg-gradient-to-br from-[#667eea] to-[#764ba2] text-white font-semibold text-sm p-3 rounded-lg">{{ pText }}</button>
</template>

<script setup>
    defineProps({
        pText: String
    })
</script>