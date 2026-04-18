<template>
  <AppLayout>
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center bg-navy overflow-hidden">
      <!-- Animated background shapes -->
      <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 right-10 w-72 h-72 bg-gold/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-gold/5 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] border border-white/5 rounded-full"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] border border-white/5 rounded-full"></div>
      </div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
          <!-- Text content -->
          <div class="text-white">
            <div class="inline-flex items-center gap-3 mb-6 animate-fade-up">
              <span class="w-12 h-px bg-gold"></span>
              <span class="text-gold font-semibold text-sm tracking-widest uppercase">
                {{ t('hero.tag') }}
              </span>
            </div>

            <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl xl:text-7xl leading-tight mb-6 animate-fade-up delay-100">
              Steve William
              <span class="block text-gold mt-2">Azeumo</span>
            </h1>

            <p class="text-gray-300 text-lg lg:text-xl leading-relaxed mb-8 max-w-xl animate-fade-up delay-200">
              {{ t('hero.subtitle') }}
            </p>

            <!-- Quote -->
            <blockquote class="relative pl-6 border-l-2 border-gold/50 mb-10 animate-fade-up delay-300">
              <p class="text-gray-400 italic text-sm lg:text-base">
                "I've a dream that one day, Africa will be one Country with one Authority and one Nation."
              </p>
              <cite class="text-gold text-sm mt-2 block not-italic">— Lofty Azeumo</cite>
            </blockquote>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-4 animate-fade-up delay-400">
              <Button href="/services" size="lg" showArrow>
                {{ t('hero.cta_services') }}
              </Button>
              <Button href="/contact" variant="outline-light" size="lg">
                {{ t('hero.cta_contact') }}
              </Button>
            </div>
          </div>

          <!-- Image/Visual -->
          <div class="hidden lg:block relative animate-fade-left delay-300">
            <div class="relative">
              <!-- Main circle with gradient border -->
              <div class="w-80 h-80 xl:w-96 xl:h-96 mx-auto rounded-full bg-gradient-to-br from-gold/20 to-transparent p-1">
                <div class="w-full h-full rounded-full bg-navy-700 relative overflow-hidden">
                  <img src="/images/profile/portrait-square.jpg" alt="Steve William Azeumo" class="w-full h-full object-cover object-top" />
                  <!-- Shine effect -->
                  <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/5 to-transparent"></div>
                </div>
              </div>

              <!-- Floating decorations -->
              <div class="absolute -top-4 -right-4 w-20 h-20 border-2 border-gold/30 rounded-full animate-float"></div>
              <div class="absolute -bottom-8 -left-8 w-16 h-16 bg-gold/20 rounded-full blur-xl animate-float" style="animation-delay: -2s;"></div>

              <!-- Experience badge -->
              <div class="absolute -right-4 top-1/2 -translate-y-1/2 bg-white rounded-2xl shadow-2xl p-4 animate-float" style="animation-delay: -1s;">
                <div class="text-center">
                  <span class="font-display font-bold text-3xl text-navy">10+</span>
                  <p class="text-xs text-gray-600 mt-1">{{ locale === 'fr' ? "Ans d'expérience" : 'Years Experience' }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Scroll indicator -->
      <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-white/30 rounded-full flex items-start justify-center p-2">
          <div class="w-1 h-2 bg-gold rounded-full animate-pulse"></div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white relative -mt-20 z-20">
      <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12 grid grid-cols-2 lg:grid-cols-4 gap-8">
          <AnimatedCounter :value="10" :label="locale === 'fr' ? `Années d'expérience` : 'Years Experience'" suffix="+" />
          <AnimatedCounter :value="50" :label="locale === 'fr' ? 'Projets réalisés' : 'Projects Completed'" suffix="+" />
          <AnimatedCounter :value="30" :label="locale === 'fr' ? 'Clients satisfaits' : 'Happy Clients'" suffix="+" />
          <AnimatedCounter :value="5" :label="locale === 'fr' ? 'Pays' : 'Countries'" suffix="+" />
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section class="section-padding bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <SectionTitle
          :title="t('services.title')"
          :subtitle="t('services.subtitle')"
          :tag="locale === 'fr' ? 'Nos expertises' : 'Our Expertise'"
          centered
        />

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <div
            v-for="(s, index) in services"
            :key="s.slug"
            class="animate-fade-up"
            :style="{ transitionDelay: `${index * 100}ms` }"
          >
            <ServiceCard :icon="s.icon" :title="s.title" :summary="s.summary" :slug="s.slug" />
          </div>
        </div>

        <div class="text-center mt-12 animate-fade-up">
          <Button href="/services" variant="secondary" showArrow>
            {{ locale === 'fr' ? 'Tous les services' : 'All Services' }}
          </Button>
        </div>
      </div>
    </section>

    <!-- Method Section -->
    <section class="section-padding bg-navy text-white relative overflow-hidden">
      <!-- Background decoration -->
      <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-gold/5 to-transparent"></div>
      </div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
          <div>
            <SectionTitle
              :title="t('method.title')"
              :tag="locale === 'fr' ? 'Notre approche' : 'Our Approach'"
              light
              :showLine="false"
            />

            <div class="space-y-6">
              <div
                v-for="(m, index) in modes"
                :key="m.titleKey"
                class="group bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all duration-300 animate-fade-up"
                :style="{ transitionDelay: `${index * 100}ms` }"
              >
                <div class="flex items-start gap-4">
                  <div class="w-14 h-14 rounded-xl bg-gold/20 flex items-center justify-center flex-shrink-0 group-hover:bg-gold group-hover:scale-110 transition-all duration-300">
                    <Icon :name="m.icon" size="lg" class="text-gold group-hover:text-white transition-colors duration-300" />
                  </div>
                  <div>
                    <h3 class="font-display font-bold text-gold text-lg mb-2">{{ t(m.titleKey) }}</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">{{ t(m.descKey) }}</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="mt-8 animate-fade-up delay-400">
              <Button href="/methode" variant="outline-light" showArrow>
                {{ locale === 'fr' ? 'En savoir plus' : 'Learn more' }}
              </Button>
            </div>
          </div>

          <!-- Visual -->
          <div class="hidden lg:block relative animate-fade-left delay-200">
            <div class="relative">
              <div class="w-full aspect-square bg-gradient-to-br from-gold/20 to-transparent rounded-3xl p-8 flex items-center justify-center">
                <div class="text-center">
                  <div class="w-32 h-32 mx-auto bg-gold/20 rounded-full flex items-center justify-center mb-6 animate-pulse-glow">
                    <Icon name="target" size="3xl" class="text-gold" :stroke-width="1.5" />
                  </div>
                  <p class="text-white/60 text-sm">{{ locale === 'fr' ? 'Excellence & Résultats' : 'Excellence & Results' }}</p>
                </div>
              </div>

              <!-- Floating elements -->
              <div class="absolute top-4 right-4 flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur rounded-full text-sm text-white animate-float">
                <Icon name="handshake" size="xs" /> {{ locale === 'fr' ? 'Partenariat' : 'Partnership' }}
              </div>
              <div class="absolute bottom-4 left-4 flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur rounded-full text-sm text-white animate-float" style="animation-delay: -2s;">
                <Icon name="academic" size="xs" /> {{ locale === 'fr' ? 'Formation' : 'Training' }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="section-padding bg-primary-gradient text-white relative overflow-hidden">
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-full h-full" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
      </div>

      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h2 class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl mb-6 animate-fade-up">
          {{ locale === 'fr' ? 'Prêt à transformer votre organisation ?' : 'Ready to transform your organization?' }}
        </h2>
        <p class="text-white/80 text-lg mb-10 max-w-2xl mx-auto animate-fade-up delay-100">
          {{ locale === 'fr' ? "Discutons de vos enjeux et trouvons ensemble les solutions adaptées à vos besoins." : "Let's discuss your challenges and find solutions tailored to your needs." }}
        </p>
        <div class="flex flex-wrap justify-center gap-4 animate-fade-up delay-200">
          <Button href="/contact" variant="secondary" size="lg" showArrow>
            {{ locale === 'fr' ? 'Planifier un rendez-vous' : 'Schedule a meeting' }}
          </Button>
          <Button href="tel:+237674463867" variant="ghost-light" size="lg">
            📞 +237 674 463 867
          </Button>
        </div>
      </div>
    </section>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import ServiceCard from '../Components/UI/ServiceCard.vue'
import Button from '../Components/UI/Button.vue'
import AnimatedCounter from '../Components/UI/AnimatedCounter.vue'
import Icon from '../Components/UI/Icon.vue'
import { useRoute } from '../composables/useI18n'

defineProps({ services: Array })

const { t, locale } = useRoute()

const modes = [
  { icon: 'handshake', titleKey: 'method.conseil', descKey: 'method.conseil_desc' },
  { icon: 'academic', titleKey: 'method.formation', descKey: 'method.formation_desc' },
  { icon: 'wrench', titleKey: 'method.intervention', descKey: 'method.intervention_desc' },
]
</script>
