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
              {{ locale === 'fr' ? 'Presse & Médias' : 'Press & Media' }}
            </span>
          </div>
          <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6 animate-fade-up delay-100">
            {{ t('media.title') }}
          </h1>
          <p class="text-gray-300 text-lg animate-fade-up delay-200">
            {{ locale === 'fr' ? 'Retrouvez mes interventions, publications et présences médiatiques.' : 'Find my interventions, publications and media appearances.' }}
          </p>
        </div>
      </div>
    </section>

    <!-- Media Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-16">
      <section v-for="cat in categories" :key="cat" class="mb-14">
        <h2 class="font-display font-bold text-navy text-xl mb-6 pb-3 border-b-2 border-gold/40 flex items-center gap-3">
          <span class="w-8 h-0.5 bg-gold"></span>{{ cat }}
        </h2>
        <ul class="space-y-5">
          <li v-for="item in byCategory(cat)" :key="item.label" class="flex items-start gap-4 group">
            <div class="mt-1 w-8 h-8 rounded-lg bg-gold/10 flex items-center justify-center flex-shrink-0 group-hover:bg-gold transition-colors duration-300">
              <Icon :name="icons[item.type]" size="sm" class="text-gold group-hover:text-white transition-colors duration-300" />
            </div>
            <div>
              <a v-if="item.href" :href="item.href" target="_blank" rel="noopener noreferrer"
                 class="text-navy font-medium hover:text-gold transition-colors underline-offset-2 hover:underline">
                {{ item.label }}
              </a>
              <span v-else class="text-navy font-medium">{{ item.label }}</span>
              <p v-if="item.meta" class="text-gray-500 text-sm mt-0.5 italic">{{ item.meta }}</p>
            </div>
          </li>
        </ul>
      </section>
    </div>
  </AppLayout>
</template>

<script setup>
import { computed } from 'vue'
import AppLayout from '../Components/Layout/AppLayout.vue'
import Icon from '../Components/UI/Icon.vue'
import { useRoute } from '../composables/useI18n'

const props = defineProps({ items: Array })
const { t, locale } = useRoute()

const icons = { social: 'chat', book: 'book', video: 'video', article: 'newspaper' }
const categories = computed(() => [...new Set(props.items.map(i => i.category))])
function byCategory(cat) { return props.items.filter(i => i.category === cat) }
</script>
