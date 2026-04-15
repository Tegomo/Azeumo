<template>
  <AppLayout>
    <!-- Hero Section -->
    <section class="relative bg-navy text-white py-32 overflow-hidden">
      <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-gold/10 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-gold/5 rounded-full blur-3xl"></div>
      </div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
          <div class="inline-flex items-center gap-3 mb-6 animate-fade-up">
            <span class="w-12 h-px bg-gold"></span>
            <span class="text-gold font-semibold text-sm tracking-widest uppercase">
              {{ locale === 'fr' ? 'Articles' : 'Articles' }}
            </span>
          </div>
          <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6 animate-fade-up delay-100">
            {{ t('blog.title') }}
          </h1>
          <p class="text-gray-300 text-lg animate-fade-up delay-200">
            {{ locale === 'fr' ? "Réflexions et analyses sur l'intelligence économique et le conseil stratégique." : "Thoughts and analysis on economic intelligence and strategic consulting." }}
          </p>
        </div>
      </div>
    </section>

    <!-- Blog Posts -->
    <section class="section-padding bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Empty state -->
        <div v-if="!posts.length" class="text-center py-20">
          <div class="w-20 h-20 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
            <Icon name="document" size="2xl" class="text-gray-400" />
          </div>
          <p class="text-gray-500 text-lg">{{ t('blog.empty') }}</p>
        </div>

        <!-- Posts grid -->
        <div v-else class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <article
            v-for="(p, index) in posts"
            :key="p.slug"
            class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 card-hover animate-fade-up"
            :style="{ transitionDelay: `${index * 100}ms` }"
          >
            <!-- Image placeholder -->
            <div class="aspect-[16/10] bg-gradient-to-br from-navy to-navy-700 relative overflow-hidden">
              <div class="absolute inset-0 flex items-center justify-center">
                <span class="text-6xl opacity-30">📄</span>
              </div>
              <!-- Overlay on hover -->
              <div class="absolute inset-0 bg-gold/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

              <!-- Date badge -->
              <div class="absolute top-4 left-4 bg-white/90 backdrop-blur rounded-lg px-3 py-2 text-center">
                <span class="block text-2xl font-display font-bold text-navy leading-none">
                  {{ formatDay(p.published_at) }}
                </span>
                <span class="text-xs text-gray-600 uppercase">
                  {{ formatMonth(p.published_at) }}
                </span>
              </div>
            </div>

            <!-- Content -->
            <div class="p-6">
              <!-- Tags -->
              <div v-if="p.tags?.length" class="flex flex-wrap gap-2 mb-4">
                <span
                  v-for="tag in p.tags"
                  :key="tag"
                  class="text-xs bg-gold/10 text-gold px-3 py-1 rounded-full font-medium"
                >
                  {{ tag }}
                </span>
              </div>

              <!-- Title -->
              <h2 class="font-display font-bold text-navy text-xl mb-3 group-hover:text-gold transition-colors duration-300 line-clamp-2">
                <Link :href="`/blog/${p.slug}`">{{ p.title }}</Link>
              </h2>

              <!-- Excerpt -->
              <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-3">
                {{ p.excerpt }}
              </p>

              <!-- Read more -->
              <Link
                :href="`/blog/${p.slug}`"
                class="inline-flex items-center gap-2 text-gold font-semibold text-sm group/link"
              >
                <span>{{ locale === 'fr' ? 'Lire la suite' : 'Read more' }}</span>
                <svg class="w-4 h-4 transition-transform duration-300 group-hover/link:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
              </Link>
            </div>
          </article>
        </div>
      </div>
    </section>
  </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../Components/Layout/AppLayout.vue'
import Icon from '../../Components/UI/Icon.vue'
import { useRoute } from '../../composables/useI18n'

defineProps({ posts: Array })
const { t, locale } = useRoute()

function formatDay(dateStr) {
  if (!dateStr) return '--'
  const date = new Date(dateStr)
  return date.getDate().toString().padStart(2, '0')
}

function formatMonth(dateStr) {
  if (!dateStr) return '---'
  const date = new Date(dateStr)
  const months = locale === 'fr'
    ? ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc']
    : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  return months[date.getMonth()]
}
</script>
