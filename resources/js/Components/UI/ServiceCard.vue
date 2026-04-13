<template>
  <Link :href="`/services#${slug}`"
    class="block p-6 border border-gray-200 rounded-lg hover:border-gold hover:shadow-md transition-all duration-200 group">
    <span class="text-3xl mb-4 block">{{ icon }}</span>
    <h3 class="font-display font-bold text-navy text-lg mb-2 group-hover:text-gold transition-colors">
      {{ title }}
    </h3>
    <p class="text-gray-600 text-sm leading-relaxed">{{ summary }}</p>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({ icon: String, title: String, summary: String, slug: String })
</script>
