<template>
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('services.title')" :subtitle="t('services.subtitle')" />
      <div class="space-y-16">
        <section v-for="s in services" :key="s.slug" :id="s.slug" class="scroll-mt-20">
          <div class="flex items-start gap-4 mb-4">
            <span class="text-4xl">{{ s.icon }}</span>
            <h2 class="font-display font-bold text-navy text-2xl leading-snug">{{ s.title }}</h2>
          </div>
          <div class="border-l-4 border-gold pl-6">
            <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ s.body }}</p>
          </div>
        </section>
      </div>
      <div class="mt-16 bg-navy text-white rounded-xl p-8 text-center">
        <h3 class="font-display font-bold text-2xl mb-3">{{ t('services.order_cta') }}</h3>
        <Button href="/contact">{{ t('hero.cta_contact') }}</Button>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import Button from '../Components/UI/Button.vue'
import { useRoute } from '../composables/useI18n'
defineProps({ services: Array })
const { t } = useRoute()
</script>
