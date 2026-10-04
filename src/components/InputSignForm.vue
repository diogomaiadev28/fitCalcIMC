<template>
    <div>
        <label :for="pId">{{ pLabel }}</label>
        <div class="relative">
            <span class="absolute top-1/2 left-[10px] -translate-y-1/2">
                <slot name="icon"></slot>
            </span>
            <input :type="pType" :name="pId" class="pl-8 py-2 w-full bg-white border border-gray-200 rounded-lg text-sm font-medium"
                :id="pId" :placeholder="pPlaceholder" required>
        </div>
    </div>
</template>

<script setup>
    defineProps({
        pId: String,
        pLabel: String,
        pPlaceholder: String,
        pType: String
    })
</script>