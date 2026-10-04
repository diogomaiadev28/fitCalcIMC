<template>
    <label class="text-xs font-semibold" :for="pName">{{ pLabel }}</label>
    <div class="flex">
        <slot name="icon"></slot>
        <input type="number" :name="pName" class="w-full px-4 py-2 text-sm font-semibold rounded-r-lg border-r border-t border-b border-gray-200" :placeholder="pPlaceholder" :id="pName"
            step="0.01" required>
    </div>
</template>

<script setup>
    defineProps({
        pName: String,
        pPlaceholder: String,
        pLabel: String
    })
</script>