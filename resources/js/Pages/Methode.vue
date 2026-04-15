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
              {{ locale === 'fr' ? 'Notre approche' : 'Our Approach' }}
            </span>
          </div>
          <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6 animate-fade-up delay-100">
            {{ t('method.title') }}
          </h1>
          <p class="text-gray-300 text-lg animate-fade-up delay-200">
            {{ locale === 'fr' ? "Une méthodologie éprouvée pour des résultats concrets." : "A proven methodology for concrete results." }}
          </p>
        </div>
      </div>
    </section>

    <!-- Modes Section -->
    <section class="section-padding bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <SectionTitle
          :tag="locale === 'fr' ? 'Modes d\'intervention' : 'Intervention Modes'"
          centered
        >
          {{ locale === 'fr' ? 'Comment je travaille' : 'How I Work' }}
        </SectionTitle>

        <div class="grid md:grid-cols-3 gap-8">
          <div
            v-for="(m, index) in modes"
            :key="m.titleKey"
            class="group relative bg-white rounded-3xl p-8 border border-gray-100 hover:border-gold/30 shadow-sm hover:shadow-xl transition-all duration-500 card-hover animate-fade-up"
            :style="{ transitionDelay: `${index * 100}ms` }"
          >
            <!-- Icon -->
            <div class="w-16 h-16 rounded-2xl bg-gold/10 flex items-center justify-center mb-6 group-hover:bg-gold group-hover:scale-110 transition-all duration-300">
              <Icon :name="m.icon" size="xl" class="text-gold group-hover:text-white transition-colors duration-300" />
            </div>

            <!-- Content -->
            <h2 class="font-display font-bold text-navy text-xl mb-4 group-hover:text-gold transition-colors duration-300">
              {{ t(m.titleKey) }}
            </h2>
            <p class="text-gray-600 text-sm leading-relaxed">{{ t(m.descKey) }}</p>

            <!-- Number badge -->
            <div class="absolute top-6 right-6 w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center font-display font-bold text-gray-400 text-sm group-hover:bg-gold group-hover:text-navy transition-all duration-300">
              {{ index + 1 }}
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Process Section -->
    <section class="section-padding bg-gray-50">
      <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <SectionTitle
          :tag="locale === 'fr' ? 'Processus' : 'Process'"
          centered
        >
          {{ locale === 'fr' ? 'Étapes de collaboration' : 'Collaboration Steps' }}
        </SectionTitle>

        <div class="relative">
          <!-- Vertical line -->
          <div class="absolute left-8 lg:left-1/2 top-0 bottom-0 w-px bg-gold/30 -translate-x-1/2 hidden md:block"></div>

          <div class="space-y-12">
            <div
              v-for="(step, index) in steps"
              :key="step.title"
              class="relative pl-20 md:pl-0 animate-fade-up"
              :style="{ transitionDelay: `${index * 100}ms` }"
            >
              <!-- Step number (mobile) -->
              <div class="absolute left-0 w-16 h-16 rounded-full bg-gold flex items-center justify-center md:hidden">
                <span class="font-display font-bold text-navy text-xl">{{ index + 1 }}</span>
              </div>

              <div class="md:grid md:grid-cols-2 md:gap-12 items-center" :class="index % 2 === 0 ? '' : 'md:flex-row-reverse'">
                <!-- Content -->
                <div :class="index % 2 === 0 ? 'md:text-right md:pr-12' : 'md:order-2 md:pl-12'">
                  <h3 class="font-display font-bold text-navy text-xl mb-3">{{ step.title }}</h3>
                  <p class="text-gray-600">{{ step.desc }}</p>
                </div>

                <!-- Step number (desktop) -->
                <div class="hidden md:flex items-center" :class="index % 2 === 0 ? 'md:order-2 justify-start' : 'justify-end'">
                  <div class="w-16 h-16 rounded-full bg-gold flex items-center justify-center shadow-lg shadow-gold/30 relative z-10">
                    <span class="font-display font-bold text-navy text-xl">{{ index + 1 }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Missions Table -->
    <section class="section-padding bg-navy text-white">
      <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <SectionTitle
          :title="locale === 'fr' ? 'Tableau des missions IE' : 'EI Missions'"
          :tag="locale === 'fr' ? 'Expérience' : 'Experience'"
          light
          centered
        />

        <div class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl overflow-hidden animate-scale">
          <div class="overflow-x-auto">
            <table class="w-full text-sm">
              <thead>
                <tr class="bg-gold/20">
                  <th class="text-left p-4 font-display font-bold text-gold">{{ locale === 'fr' ? 'Année' : 'Year' }}</th>
                  <th class="text-left p-4 font-display font-bold text-gold">{{ locale === 'fr' ? 'Objet' : 'Object' }}</th>
                  <th class="text-left p-4 font-display font-bold text-gold">{{ locale === 'fr' ? 'Localisation' : 'Location' }}</th>
                </tr>
              </thead>
              <tbody>
                <tr
                  v-for="(m, i) in missions"
                  :key="i"
                  class="border-t border-white/10 hover:bg-white/5 transition-colors"
                >
                  <td class="p-4 font-mono text-gold font-semibold whitespace-nowrap">{{ m.year }}</td>
                  <td class="p-4 text-gray-300">{{ m.object }}</td>
                  <td class="p-4 text-gray-400">{{ m.location }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="section-padding bg-primary-gradient text-white">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display font-bold text-3xl sm:text-4xl mb-6 animate-fade-up">
          {{ locale === 'fr' ? 'Prêt à collaborer ?' : 'Ready to collaborate?' }}
        </h2>
        <p class="text-white/80 text-lg mb-10 max-w-2xl mx-auto animate-fade-up delay-100">
          {{ locale === 'fr' ? "Contactez-moi pour discuter de votre projet et définir ensemble la meilleure approche." : "Contact me to discuss your project and define the best approach together." }}
        </p>
        <div class="animate-fade-up delay-200">
          <Button href="/contact" variant="secondary" size="lg" showArrow>
            {{ t('hero.cta_contact') }}
          </Button>
        </div>
      </div>
    </section>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import Button from '../Components/UI/Button.vue'
import Icon from '../Components/UI/Icon.vue'
import { useRoute } from '../composables/useI18n'

defineProps({ missions: Array })
const { t, locale } = useRoute()

const modes = [
  { icon: 'handshake', titleKey: 'method.conseil', descKey: 'method.conseil_desc' },
  { icon: 'academic', titleKey: 'method.formation', descKey: 'method.formation_desc' },
  { icon: 'wrench', titleKey: 'method.intervention', descKey: 'method.intervention_desc' },
]

const steps = [
  {
    title: locale === 'fr' ? 'Analyse & Diagnostic' : 'Analysis & Diagnosis',
    desc: locale === 'fr' ? "Évaluation approfondie de votre situation et identification des enjeux clés." : "In-depth assessment of your situation and identification of key issues."
  },
  {
    title: locale === 'fr' ? 'Stratégie & Planification' : 'Strategy & Planning',
    desc: locale === 'fr' ? "Élaboration d'une feuille de route adaptée à vos objectifs et contraintes." : "Development of a roadmap tailored to your objectives and constraints."
  },
  {
    title: locale === 'fr' ? 'Mise en œuvre' : 'Implementation',
    desc: locale === 'fr' ? "Accompagnement opérationnel et suivi des actions définies." : "Operational support and monitoring of defined actions."
  },
  {
    title: locale === 'fr' ? 'Évaluation & Optimisation' : 'Evaluation & Optimization',
    desc: locale === 'fr' ? "Mesure des résultats et ajustements pour une amélioration continue." : "Results measurement and adjustments for continuous improvement."
  },
]
</script>
