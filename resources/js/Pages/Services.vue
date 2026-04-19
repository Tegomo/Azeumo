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
              {{ locale === 'fr' ? 'Nos expertises' : 'Our Expertise' }}
            </span>
          </div>
          <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6 animate-fade-up delay-100">
            {{ t('services.title') }}
          </h1>
          <p class="text-gray-300 text-lg animate-fade-up delay-200">
            {{ t('services.subtitle') }}
          </p>
        </div>
      </div>
    </section>

    <!-- Services List -->
    <section class="section-padding bg-white">
      <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-24">
          <article
            v-for="(s, index) in services"
            :key="s.slug"
            :id="s.slug"
            class="scroll-mt-24 animate-fade-up"
            :style="{ transitionDelay: `${index * 100}ms` }"
          >
            <div class="grid lg:grid-cols-2 gap-12 items-center" :class="index % 2 === 1 ? 'lg:flex lg:flex-row-reverse' : ''">
              <!-- Image -->
              <div class="relative rounded-3xl overflow-hidden aspect-[4/3] shadow-2xl">
                <img
                  :src="serviceImages[s.slug]"
                  :alt="s.title"
                  class="w-full h-full object-cover transition-transform duration-700 hover:scale-105"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-navy/60 to-transparent"></div>
                <!-- Number badge -->
                <div class="absolute bottom-6 left-6 w-14 h-14 rounded-full bg-gold flex items-center justify-center shadow-lg">
                  <span class="font-display font-bold text-white text-xl">0{{ index + 1 }}</span>
                </div>
              </div>

              <!-- Content -->
              <div :class="index % 2 === 1 ? 'lg:pr-8' : 'lg:pl-8'">
                <div class="flex items-center gap-3 mb-4">
                  <div class="w-12 h-12 rounded-xl bg-gold/10 flex items-center justify-center">
                    <Icon :name="s.icon" size="lg" class="text-gold" />
                  </div>
                  <span class="text-gold font-mono text-sm font-semibold">0{{ index + 1 }}</span>
                </div>

                <h2 class="font-display font-bold text-navy text-2xl lg:text-3xl mb-6">
                  {{ s.title }}
                </h2>

                <div class="relative pl-6 border-l-4 border-gold/50 mb-8">
                  <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ s.body }}</p>
                </div>

                <Button href="/contact" variant="outline" showArrow>
                  {{ locale === 'fr' ? 'Demander un devis' : 'Request a quote' }}
                </Button>
              </div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="section-padding bg-navy text-white relative overflow-hidden">
      <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-full h-full opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23FF7400\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
      </div>

      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="animate-fade-up">
          <span class="inline-block px-4 py-2 bg-gold/20 text-gold rounded-full text-sm font-semibold mb-6">
            {{ locale === 'fr' ? 'Consultation gratuite' : 'Free Consultation' }}
          </span>
        </div>

        <h2 class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl mb-6 animate-fade-up delay-100">
          {{ t('services.order_cta') }}
        </h2>

        <p class="text-gray-300 text-lg mb-10 max-w-2xl mx-auto animate-fade-up delay-200">
          {{ locale === 'fr' ? "Prenez rendez-vous pour discuter de vos besoins et découvrir comment nous pouvons vous accompagner." : "Schedule a meeting to discuss your needs and discover how we can support you." }}
        </p>

        <div class="flex flex-wrap justify-center gap-4 animate-fade-up delay-300">
          <Button href="/contact" size="lg" showArrow>
            {{ t('hero.cta_contact') }}
          </Button>
          <Button href="tel:+237696550555" variant="outline-light" size="lg">
            <template #iconLeft>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </template>
            {{ locale === 'fr' ? 'Appelez-nous' : 'Call Us' }}
          </Button>
        </div>
      </div>
    </section>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import Button from '../Components/UI/Button.vue'
import Icon from '../Components/UI/Icon.vue'
import { useRoute } from '../composables/useI18n'

defineProps({ services: Array })
const { t, locale } = useRoute()

const serviceImages = {
  'conseil-management':        '/images/services/conseil-management.jpg',
  'conception-gestion-projets':'/images/services/conception-gestion-projets.jpg',
  'intelligence-economique':   '/images/services/intelligence-economique.jpg',
  'veille-due-diligence':      '/images/services/veille.jpg',
  'projets-developpement':     '/images/services/afrique.jpg',
}
</script>
