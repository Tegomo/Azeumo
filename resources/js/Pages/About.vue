<template>
  <AppLayout>
    <!-- Hero Section -->
    <section class="relative bg-navy text-white py-32 overflow-hidden">
      <div class="absolute inset-0">
        <img src="/images/pages/about-bg.jpg" alt="" class="w-full h-full object-cover opacity-15" />
        <div class="absolute inset-0 bg-gradient-to-r from-navy via-navy/95 to-navy/80"></div>
      </div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
          <div class="inline-flex items-center gap-3 mb-6 animate-fade-up">
            <span class="w-12 h-px bg-gold"></span>
            <span class="text-gold font-semibold text-sm tracking-widest uppercase">
              {{ locale === 'fr' ? 'À propos' : 'About' }}
            </span>
          </div>
          <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6 animate-fade-up delay-100">
            {{ t('about.title') }}
          </h1>
          <p class="text-gray-300 text-lg animate-fade-up delay-200">
            {{ locale === 'fr' ? 'Consultant indépendant en Intelligence Économique' : 'Independent Consultant in Economic Intelligence' }}
          </p>
        </div>
      </div>
    </section>

    <!-- Bio Section -->
    <section id="biographie" class="section-padding bg-white scroll-mt-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-start">
          <!-- Image -->
          <div class="relative animate-fade-right">
            <div class="aspect-[4/5] bg-gray-100 rounded-3xl overflow-hidden relative">
              <img src="/images/profile/portrait.jpg" alt="Steve William Azeumo" class="absolute inset-0 w-full h-full object-cover object-top" />
              <!-- Decorative frame -->
              <div class="absolute -bottom-4 -right-4 w-full h-full border-2 border-gold rounded-3xl -z-10"></div>
            </div>

            <!-- Experience badge -->
            <div class="absolute -right-4 lg:-right-8 top-8 bg-gold text-navy rounded-2xl p-6 shadow-2xl animate-float">
              <span class="font-display font-bold text-4xl block">10+</span>
              <span class="text-sm">{{ locale === 'fr' ? "Ans d'expertise" : 'Years of Expertise' }}</span>
            </div>
          </div>

          <!-- Content -->
          <div class="animate-fade-left">
            <SectionTitle
              :tag="locale === 'fr' ? 'Mon parcours' : 'My Journey'"
              :showLine="false"
            >
              Steve William <span class="text-gold">Azeumo</span>
            </SectionTitle>

            <div class="prose prose-lg max-w-none text-gray-600 space-y-4 mb-8">
              <p v-for="(para, index) in bio" :key="index" class="animate-fade-up" :style="{ transitionDelay: `${index * 100}ms` }">
                {{ para }}
              </p>
            </div>

            <!-- Info list -->
            <div class="space-y-3 mb-8">
              <div class="flex items-center gap-3 text-gray-600 animate-fade-up delay-300">
                <span class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-lg">📅</span>
                <span>{{ locale === 'fr' ? 'Né le' : 'Born' }} 01/06/1987, Yaoundé, Cameroun</span>
              </div>
              <div class="flex items-center gap-3 text-gray-600 animate-fade-up delay-400">
                <span class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-lg">🗣️</span>
                <span>{{ locale === 'fr' ? 'Langues' : 'Languages' }}: Français, Anglais, Italien</span>
              </div>
            </div>

            <Button href="/contact" showArrow class="animate-fade-up delay-500">
              {{ locale === 'fr' ? 'Me contacter' : 'Contact Me' }}
            </Button>
          </div>
        </div>
      </div>
    </section>

    <!-- Skills Section -->
    <section class="section-padding bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <SectionTitle
          :title="t('about.skills')"
          :tag="locale === 'fr' ? 'Compétences' : 'Skills'"
          centered
        />

        <div class="grid sm:grid-cols-3 gap-8">
          <div
            v-for="(s, index) in skills"
            :key="s.labelFr"
            class="bg-white rounded-2xl p-8 text-center shadow-sm hover:shadow-xl transition-all duration-300 card-hover animate-fade-up"
            :style="{ transitionDelay: `${index * 100}ms` }"
          >
            <AnimatedCounter
              :value="parseInt(s.exp)"
              :label="locale === 'fr' ? s.labelFr : s.labelEn"
              suffix=" ans"
              :showDecoration="false"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- Education Timeline -->
    <section class="section-padding bg-navy text-white relative overflow-hidden">
      <div class="absolute top-0 right-0 w-96 h-96 bg-gold/5 rounded-full blur-3xl"></div>

      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <SectionTitle
          :title="t('about.education')"
          :tag="locale === 'fr' ? 'Formation' : 'Education'"
          light
          centered
        />

        <div class="relative">
          <!-- Timeline line -->
          <div class="absolute left-4 lg:left-1/2 top-0 bottom-0 w-px bg-gold/30 -translate-x-1/2"></div>

          <div class="space-y-8">
            <div
              v-for="(e, index) in education"
              :key="e.degree"
              class="relative pl-12 lg:pl-0 animate-fade-up"
              :style="{ transitionDelay: `${index * 50}ms` }"
              :class="index % 2 === 0 ? 'lg:pr-1/2 lg:text-right' : 'lg:pl-1/2 lg:ml-auto'"
            >
              <!-- Timeline dot -->
              <div
                class="absolute left-4 lg:left-1/2 w-3 h-3 bg-gold rounded-full -translate-x-1/2 mt-2"
              ></div>

              <div
                class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl p-6 hover:bg-white/10 transition-all duration-300"
                :class="index % 2 === 0 ? 'lg:mr-8' : 'lg:ml-8'"
              >
                <span class="inline-block px-3 py-1 bg-gold/20 text-gold text-sm font-semibold rounded-full mb-3">
                  {{ e.period }}
                </span>
                <h3 class="font-display font-bold text-lg text-white mb-2">{{ e.degree }}</h3>
                <p class="text-gray-400 text-sm">
                  {{ e.institution }}{{ e.mention ? ` — ${e.mention}` : '' }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Bibliography Section -->
    <section id="bibliographie" class="section-padding bg-white scroll-mt-24">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <SectionTitle
          :title="t('about.bibliography')"
          :tag="locale === 'fr' ? 'Publication' : 'Publication'"
          centered
        />

        <div class="bg-gradient-to-br from-gold/10 to-gold/5 rounded-3xl p-8 lg:p-12 border border-gold/20 animate-scale">
          <div class="flex flex-col lg:flex-row items-center gap-8">
            <!-- Book cover -->
            <div class="w-40 h-56 rounded-lg shadow-2xl overflow-hidden flex-shrink-0">
              <img src="/images/profile/book-cover.jpg" alt="L'Intelligence Économique Camerounaise" class="w-full h-full object-cover" />
            </div>

            <div class="text-center lg:text-left">
              <h3 class="font-display font-bold text-navy text-2xl mb-3">
                L'Intelligence Économique Camerounaise (IEC)
              </h3>
              <p class="text-gray-600 mb-2">Éditions Harmattan Cameroun, 2013</p>
              <p class="text-gray-500 text-sm mb-6">ISBN 978-2-343-01199-8</p>

              <div class="flex flex-wrap justify-center lg:justify-start gap-3">
                <Button
                  href="https://www.editions-harmattan.fr/livre-l_intelligence_economique_camerounaise_iec_steve_william_azeumo-9782343011998-40537.html"
                  variant="outline"
                  external
                >
                  Harmattan
                </Button>
                <Button
                  href="https://www.amazon.com/Lintelligence-%C3%A9conomique-camerounaise-Harmattan-Cameroun-ebook/dp/B00K35UKT8"
                  variant="outline"
                  external
                >
                  Amazon
                </Button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import Button from '../Components/UI/Button.vue'
import AnimatedCounter from '../Components/UI/AnimatedCounter.vue'
import Icon from '../Components/UI/Icon.vue'
import { useRoute } from '../composables/useI18n'

const { t, locale } = useRoute()

const bio = [
  "Consultant indépendant, agissant en tant que partenaire stratégique et opérationnel au sein de projets innovants d'organisations du continent africain et du monde entier.",
  "Auteur de « L'intelligence économique Camerounaise » publié en 2013 aux éditions l'Harmattan Cameroun ; ISBN 978-2-343-01199-8.",
  "Je crois au potentiel humain et que dans tout projet ou entreprise nous devons mettre l'être humain au centre de tout ; raison pour laquelle je milite aux côtés des entrepreneurs de l'économie de communion et du mouvement The Economy of Francesco.",
]

const skills = [
  { exp: '10', labelFr: "Conception et Gestion des projets d'IE", labelEn: 'EI Project Design & Management' },
  { exp: '10', labelFr: 'Veille · Due Diligence · Protection des données', labelEn: 'Watch · Due Diligence · Data Protection' },
  { exp: '10', labelFr: 'Conseils en Gestion des Organisations', labelEn: 'Organisational Management Consulting' },
]

const education = [
  { period: '2026', degree: 'CAS — Ethical Management', institution: 'Université de Fribourg' },
  { period: '2025', degree: 'Certification Gestion financière (développement)', institution: 'ITCILO (ILO)' },
  { period: '2024', degree: 'CAS — Integral Economics', institution: 'Université de Fribourg' },
  { period: '2021', degree: 'Certification Conception et gestion de projet', institution: 'ITCILO (ILO)' },
  { period: '2019', degree: "Certificat Intelligence des marchés Africain", institution: 'CAVIE / ACCI' },
  { period: '2018–2019', degree: "Master 2 Pro — Administration des Affaires (BAC+5)", institution: 'Université de Dschang', mention: 'Assez bien' },
  { period: '2011–2014', degree: "Licence Pro — Gestion de l'information (BAC+3)", institution: 'ESSTIC — UYII-Soa', mention: 'Assez bien' },
]
</script>
