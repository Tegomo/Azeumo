<template>
  <div class="mb-10">
    <h2 class="font-display text-3xl font-bold mb-3" :class="light ? 'text-white' : 'text-navy'">
      {{ title }}
    </h2>
    <div class="w-16 h-1 bg-gold rounded mb-4" />
    <p v-if="subtitle" class="text-lg max-w-2xl" :class="light ? 'text-gray-300' : 'text-gray-600'">
      {{ subtitle }}
    </p>
  </div>
</template>

<script setup>
defineProps({ title: String, subtitle: String, light: Boolean })
</script>
