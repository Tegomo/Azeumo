<template>
  <AppLayout>
    <!-- Hero -->
    <section class="bg-navy text-white min-h-[90vh] flex items-center">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
        <div>
          <p class="text-gold font-display font-semibold text-sm tracking-widest uppercase mb-4">
            {{ t('hero.tag') }}
          </p>
          <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6">
            Steve William<br /><span class="text-gold">Azeumo</span>
          </h1>
          <p class="text-gray-300 text-lg leading-relaxed mb-8 max-w-lg">{{ t('hero.subtitle') }}</p>
          <blockquote class="border-l-2 border-gold pl-4 text-gray-400 italic text-sm mb-8 max-w-md">
            "I've a dream that one day, Africa will be one Country with one Authority and one Nation." — Lofty Azeumo
          </blockquote>
          <div class="flex flex-wrap gap-4">
            <Button href="/services">{{ t('hero.cta_services') }}</Button>
            <Button href="/contact" variant="outline">{{ t('hero.cta_contact') }}</Button>
          </div>
        </div>
        <div class="hidden md:flex justify-center">
          <div class="w-72 h-72 rounded-full border-4 border-gold/30 overflow-hidden bg-navy flex items-center justify-center">
            <span class="text-6xl">👤</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Services -->
    <section class="py-20 bg-gray-50">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <SectionTitle :title="t('services.title')" :subtitle="t('services.subtitle')" />
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <ServiceCard v-for="s in services" :key="s.slug"
            :icon="s.icon" :title="s.title" :summary="s.summary" :slug="s.slug" />
        </div>
      </div>
    </section>

    <!-- Method teaser -->
    <section class="py-20 bg-navy text-white">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <SectionTitle :title="t('method.title')" light />
        <div class="grid md:grid-cols-3 gap-8 mb-10">
          <div v-for="m in modes" :key="m.titleKey" class="bg-white/5 border border-white/10 rounded-lg p-6">
            <span class="text-3xl block mb-3">{{ m.icon }}</span>
            <h3 class="font-display font-bold text-gold text-lg mb-2">{{ t(m.titleKey) }}</h3>
            <p class="text-gray-300 text-sm leading-relaxed">{{ t(m.descKey) }}</p>
          </div>
        </div>
        <Button href="/methode" variant="outline">{{ locale === 'fr' ? 'En savoir plus' : 'Learn more' }}</Button>
      </div>
    </section>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import ServiceCard from '../Components/UI/ServiceCard.vue'
import Button from '../Components/UI/Button.vue'
import { useRoute } from '../composables/useI18n'

defineProps({ services: Array })

const { t, locale } = useRoute()

const modes = [
  { icon: '🤝', titleKey: 'method.conseil', descKey: 'method.conseil_desc' },
  { icon: '🎓', titleKey: 'method.formation', descKey: 'method.formation_desc' },
  { icon: '🔧', titleKey: 'method.intervention', descKey: 'method.intervention_desc' },
]
</script>
