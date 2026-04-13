<template>
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('method.title')" />
      <div class="grid md:grid-cols-3 gap-8 mb-20">
        <div v-for="m in modes" :key="m.titleKey" class="bg-gray-50 rounded-xl p-6 border border-gray-200">
          <span class="text-4xl block mb-4">{{ m.icon }}</span>
          <h2 class="font-display font-bold text-navy text-xl mb-3">{{ t(m.titleKey) }}</h2>
          <p class="text-gray-600 text-sm leading-relaxed">{{ t(m.descKey) }}</p>
        </div>
      </div>

      <SectionTitle :title="locale === 'fr' ? 'Tableau des missions IE' : 'EI Missions'" />
      <div class="overflow-x-auto mb-16">
        <table class="w-full text-sm border-collapse">
          <thead>
            <tr class="bg-navy text-white">
              <th class="text-left p-3 font-display">{{ locale === 'fr' ? 'Année' : 'Year' }}</th>
              <th class="text-left p-3 font-display">{{ locale === 'fr' ? 'Objet' : 'Object' }}</th>
              <th class="text-left p-3 font-display">{{ locale === 'fr' ? 'Localisation' : 'Location' }}</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(m, i) in missions" :key="i" :class="i % 2 === 0 ? 'bg-white' : 'bg-gray-50'">
              <td class="p-3 font-mono text-gold font-semibold whitespace-nowrap">{{ m.year }}</td>
              <td class="p-3 text-gray-700">{{ m.object }}</td>
              <td class="p-3 text-gray-500">{{ m.location }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="text-center">
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

defineProps({ missions: Array })
const { t, locale } = useRoute()

const modes = [
  { icon: '🤝', titleKey: 'method.conseil', descKey: 'method.conseil_desc' },
  { icon: '🎓', titleKey: 'method.formation', descKey: 'method.formation_desc' },
  { icon: '🔧', titleKey: 'method.intervention', descKey: 'method.intervention_desc' },
]
</script>
