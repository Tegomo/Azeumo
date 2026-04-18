<template>
  <Link
    :href="`/services#${slug}`"
    class="group relative bg-white rounded-2xl overflow-hidden transition-all duration-500 card-hover service-card-shadow"
  >
    <!-- Background gradient on hover -->
    <div class="absolute inset-0 bg-gradient-to-br from-navy to-navy-700 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

    <!-- Content -->
    <div class="relative p-8">
      <!-- Icon container -->
      <div class="relative mb-6">
        <div
          class="w-16 h-16 rounded-2xl bg-gold/10 flex items-center justify-center transition-all duration-500 group-hover:bg-gold group-hover:scale-110 group-hover:rotate-3"
        >
          <Icon :name="icon" size="xl" class="text-gold transition-all duration-500 group-hover:text-white" />
        </div>
        <!-- Decorative circle -->
        <div class="absolute -right-2 -top-2 w-6 h-6 border-2 border-gold/20 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 group-hover:scale-125"></div>
      </div>

      <!-- Title -->
      <h3 class="font-display font-bold text-xl text-navy mb-3 transition-colors duration-300 group-hover:text-white">
        {{ title }}
      </h3>

      <!-- Summary -->
      <p class="text-gray-600 text-sm leading-relaxed mb-6 transition-colors duration-300 group-hover:text-gray-300">
        {{ summary }}
      </p>

      <!-- Read more link -->
      <div class="flex items-center gap-2 text-gold font-semibold text-sm">
        <span class="transition-all duration-300 group-hover:translate-x-1">
          {{ locale === 'fr' ? 'En savoir plus' : 'Learn more' }}
        </span>
        <svg
          class="w-5 h-5 transition-all duration-300 group-hover:translate-x-2"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
      </div>
    </div>

    <!-- Bottom border accent -->
    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gold transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import Icon from './Icon.vue'
import { useRoute } from '../../composables/useI18n'

defineProps({
  icon: String,
  title: String,
  summary: String,
  slug: String
})

const { locale } = useRoute()
</script>
