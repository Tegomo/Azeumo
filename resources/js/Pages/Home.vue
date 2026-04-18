<template>
  <AppLayout>
    <!-- Hero Slider -->
    <section class="relative min-h-screen overflow-hidden">

      <!-- Slides -->
      <div class="relative min-h-screen">
        <TransitionGroup name="slide-fade">
          <div
            v-for="(slide, index) in slides"
            :key="slide.id"
            v-show="currentSlide === index"
            class="absolute inset-0 min-h-screen"
          >
            <!-- Background image -->
            <img
              :src="slide.image"
              :alt="slide.title"
              class="absolute inset-0 w-full h-full object-cover"
            />
            <!-- Dark overlay gradient -->
            <div class="absolute inset-0 bg-gradient-to-r from-navy/90 via-navy/70 to-navy/50"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-navy/80 via-transparent to-navy/30"></div>

            <!-- Slide content -->
            <div class="relative z-10 min-h-screen flex items-center">
              <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 w-full">
                <div class="max-w-3xl">
                  <!-- Tag -->
                  <div class="inline-flex items-center gap-3 mb-6">
                    <span class="w-12 h-px bg-gold"></span>
                    <span class="text-gold font-semibold text-sm tracking-widest uppercase">
                      {{ slide.tag }}
                    </span>
                  </div>

                  <!-- Title -->
                  <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl xl:text-7xl leading-tight mb-6 text-white">
                    {{ slide.title }}
                    <span v-if="slide.subtitle" class="block text-gold mt-2 text-3xl sm:text-4xl lg:text-5xl">
                      {{ slide.subtitle }}
                    </span>
                  </h1>

                  <!-- Description -->
                  <p class="text-gray-300 text-lg lg:text-xl leading-relaxed mb-10 max-w-2xl">
                    {{ slide.description }}
                  </p>

                  <!-- CTA -->
                  <div class="flex flex-wrap gap-4 items-center">
                    <a
                      :href="slide.cta.href"
                      class="inline-flex items-center gap-2 px-8 py-3.5 bg-gold text-white font-display font-semibold rounded-full hover:shadow-lg transition-all duration-300"
                    >
                      {{ slide.cta.label }}
                      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                      </svg>
                    </a>

                    <!-- Watch Video button -->
                    <button
                      @click="openVideo(slide)"
                      class="group inline-flex items-center gap-3 text-white hover:text-gold transition-colors duration-300"
                    >
                      <!-- Play circle -->
                      <span class="relative flex-shrink-0 w-14 h-14 rounded-full bg-white/20 backdrop-blur border border-white/40 flex items-center justify-center group-hover:bg-gold group-hover:border-gold transition-all duration-300">
                        <svg class="w-5 h-5 ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                          <path d="M8 5v14l11-7z"/>
                        </svg>
                        <!-- Pulse ring -->
                        <span class="absolute inset-0 rounded-full border border-white/40 animate-ping opacity-40"></span>
                      </span>
                      <span class="font-semibold text-sm">
                        {{ locale === 'fr' ? 'Voir la vidéo' : 'Watch video' }}
                      </span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </TransitionGroup>
      </div>

      <!-- Slide counter & dots -->
      <div class="absolute bottom-24 left-1/2 -translate-x-1/2 z-20 flex items-center gap-3">
        <button
          v-for="(slide, index) in slides"
          :key="index"
          @click="goToSlide(index)"
          :aria-label="`Slide ${index + 1}`"
          class="transition-all duration-300"
          :class="currentSlide === index
            ? 'w-8 h-2 bg-gold rounded-full'
            : 'w-2 h-2 bg-white/50 rounded-full hover:bg-white/80'"
        ></button>
      </div>

      <!-- Arrow navigation -->
      <button
        @click="prevSlide"
        class="absolute left-4 lg:left-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/10 backdrop-blur border border-white/20 flex items-center justify-center text-white hover:bg-gold hover:border-gold transition-all duration-300"
        aria-label="Précédent"
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
      </button>
      <button
        @click="nextSlide"
        class="absolute right-4 lg:right-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/10 backdrop-blur border border-white/20 flex items-center justify-center text-white hover:bg-gold hover:border-gold transition-all duration-300"
        aria-label="Suivant"
      >
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </button>

      <!-- Slide number -->
      <div class="absolute bottom-24 right-8 z-20 text-white/60 text-sm font-mono">
        <span class="text-white font-semibold">{{ String(currentSlide + 1).padStart(2, '0') }}</span>
        /{{ String(slides.length).padStart(2, '0') }}
      </div>

      <!-- Progress bar -->
      <div class="absolute bottom-0 left-0 right-0 z-20 h-1 bg-white/10">
        <div
          class="h-full bg-gold transition-all duration-300"
          :style="{ width: progressWidth + '%' }"
        ></div>
      </div>

      <!-- Scroll indicator -->
      <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 animate-bounce">
        <div class="w-6 h-10 border-2 border-white/30 rounded-full flex items-start justify-center p-2">
          <div class="w-1 h-2 bg-gold rounded-full animate-pulse"></div>
        </div>
      </div>
    </section>

    <!-- Video Modal -->
    <Teleport to="body">
      <Transition
        enter-active-class="transition-all duration-300 ease-out"
        enter-from-class="opacity-0"
        enter-to-class="opacity-100"
        leave-active-class="transition-all duration-200 ease-in"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <div
          v-if="videoModal.open"
          class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-navy/95 backdrop-blur-sm"
          @click.self="closeVideo"
        >
          <Transition
            enter-active-class="transition-all duration-300 ease-out"
            enter-from-class="opacity-0 scale-95"
            enter-to-class="opacity-100 scale-100"
            leave-active-class="transition-all duration-200 ease-in"
            leave-from-class="opacity-100 scale-100"
            leave-to-class="opacity-0 scale-95"
          >
            <div v-if="videoModal.open" class="relative w-full max-w-4xl">
              <!-- Header -->
              <div class="flex items-center justify-between mb-4 px-1">
                <div>
                  <span class="text-gold text-xs font-semibold tracking-widest uppercase">{{ videoModal.tag }}</span>
                  <h3 class="text-white font-display font-bold text-xl mt-1">{{ videoModal.title }}</h3>
                </div>
                <button
                  @click="closeVideo"
                  class="w-10 h-10 rounded-full bg-white/10 hover:bg-gold flex items-center justify-center text-white transition-all duration-200 flex-shrink-0"
                  aria-label="Fermer"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                  </svg>
                </button>
              </div>

              <!-- Video iframe -->
              <div class="relative aspect-video w-full rounded-2xl overflow-hidden bg-black shadow-2xl">
                <iframe
                  v-if="videoModal.url"
                  :src="videoModal.url"
                  class="absolute inset-0 w-full h-full"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                  frameborder="0"
                ></iframe>
                <!-- Placeholder si pas de URL -->
                <div v-else class="absolute inset-0 flex flex-col items-center justify-center bg-navy-700 text-white/40">
                  <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                  </svg>
                  <p class="text-sm">{{ locale === 'fr' ? 'Vidéo à venir' : 'Video coming soon' }}</p>
                </div>
              </div>

              <!-- ESC hint -->
              <p class="text-center text-white/30 text-xs mt-4">
                {{ locale === 'fr' ? 'Appuyez sur Échap pour fermer' : 'Press Esc to close' }}
              </p>
            </div>
          </Transition>
        </div>
      </Transition>
    </Teleport>

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
import { ref, computed, onMounted, onUnmounted } from 'vue'
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

// ─── Slider ───────────────────────────────────────────────────────────────────
const SLIDE_DURATION = 6000 // ms

const slides = computed(() => [
  {
    id: 1,
    image: '/images/slider/voxafrica-1.jpg',
    tag: 'VoxAfrica · Voxbook 2014',
    title: locale.value === 'fr' ? 'L\'Intelligence Économique Africaine' : 'African Economic Intelligence',
    subtitle: 'Voxbook 2014 (I)',
    description: locale.value === 'fr'
      ? 'Première partie de l\'interview accordée à VoxAfrica sur l\'intelligence économique camerounaise et les enjeux stratégiques pour le continent africain.'
      : 'First part of the interview given to VoxAfrica on Cameroonian economic intelligence and strategic challenges for the African continent.',
    cta: { href: '/media', label: locale.value === 'fr' ? 'Voir les médias' : 'See media' },
    // Remplacez par l'URL d'embed YouTube réelle : https://www.youtube.com/embed/VIDEO_ID
    videoUrl: null,
  },
  {
    id: 2,
    image: '/images/slider/voxafrica-2.jpg',
    tag: 'VoxAfrica · Voxbook 2014',
    title: locale.value === 'fr' ? 'Stratégie & Compétitivité' : 'Strategy & Competitiveness',
    subtitle: 'Voxbook 2014 (II)',
    description: locale.value === 'fr'
      ? 'Deuxième partie de l\'interview : comment bâtir une stratégie d\'intelligence économique efficace pour les entreprises et États africains.'
      : 'Second part of the interview: how to build an effective economic intelligence strategy for African businesses and states.',
    cta: { href: '/media', label: locale.value === 'fr' ? 'Voir les médias' : 'See media' },
    videoUrl: null,
  },
  {
    id: 3,
    image: '/images/slider/economie-communion.jpg',
    tag: locale.value === 'fr' ? 'Économie de Communion · IT' : 'Economy of Communion · IT',
    title: locale.value === 'fr' ? 'Économie de Communion' : 'Economy of Communion',
    subtitle: locale.value === 'fr' ? 'Technologies & Humanisme' : 'Technology & Humanism',
    description: locale.value === 'fr'
      ? 'L\'apport des technologies de l\'information au service d\'une économie centrée sur l\'humain — une vision pour l\'Afrique de demain.'
      : 'The contribution of information technologies in service of a human-centred economy — a vision for tomorrow\'s Africa.',
    cta: { href: '/a-propos', label: locale.value === 'fr' ? 'En savoir plus' : 'Learn more' },
    videoUrl: null,
  },
])

const currentSlide = ref(0)
const progress = ref(0)
let autoTimer = null
let progressTimer = null

// ─── Video Modal ──────────────────────────────────────────────────────────────
const videoModal = ref({ open: false, url: null, title: '', tag: '' })

function openVideo(slide) {
  videoModal.value = {
    open: true,
    url: slide.videoUrl,
    title: slide.title + (slide.subtitle ? ' — ' + slide.subtitle : ''),
    tag: slide.tag,
  }
  // Pause slider
  clearTimeout(autoTimer)
  clearInterval(progressTimer)
  document.body.style.overflow = 'hidden'
}

function closeVideo() {
  videoModal.value = { open: false, url: null, title: '', tag: '' }
  document.body.style.overflow = ''
  // Resume slider
  startAuto()
}

function handleKeydown(e) {
  if (e.key === 'Escape' && videoModal.value.open) closeVideo()
}

function goToSlide(index) {
  currentSlide.value = index
  resetProgress()
}

function nextSlide() {
  currentSlide.value = (currentSlide.value + 1) % slides.value.length
  resetProgress()
}

function prevSlide() {
  currentSlide.value = (currentSlide.value - 1 + slides.value.length) % slides.value.length
  resetProgress()
}

const progressWidth = computed(() => progress.value)

function resetProgress() {
  clearInterval(autoTimer)
  clearInterval(progressTimer)
  progress.value = 0
  startAuto()
}

function startAuto() {
  const step = 100 / (SLIDE_DURATION / 50)
  progressTimer = setInterval(() => {
    progress.value = Math.min(progress.value + step, 100)
  }, 50)

  autoTimer = setTimeout(() => {
    currentSlide.value = (currentSlide.value + 1) % slides.value.length
    progress.value = 0
    startAuto()
  }, SLIDE_DURATION)
}

onMounted(() => {
  startAuto()
  window.addEventListener('keydown', handleKeydown)
})
onUnmounted(() => {
  clearTimeout(autoTimer)
  clearInterval(progressTimer)
  window.removeEventListener('keydown', handleKeydown)
  document.body.style.overflow = ''
})
</script>
