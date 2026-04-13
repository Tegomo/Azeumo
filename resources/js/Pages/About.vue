<template>
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('about.title')" />

      <!-- Bio -->
      <div class="prose prose-lg max-w-none text-gray-700 mb-16 space-y-4">
        <p v-for="para in bio" :key="para">{{ para }}</p>
        <ul class="list-none p-0 space-y-1 text-sm text-gray-600">
          <li>📅 {{ locale === 'fr' ? 'Né le' : 'Born' }} 01/06/1987, Yaoundé, Cameroun</li>
          <li>🗣️ {{ locale === 'fr' ? 'Langues' : 'Languages' }} : Français, Anglais, Italien</li>
        </ul>
      </div>

      <!-- Compétences -->
      <SectionTitle :title="t('about.skills')" />
      <div class="grid sm:grid-cols-3 gap-4 mb-16">
        <div v-for="s in skills" :key="s.labelFr" class="border border-gray-200 rounded-lg p-4 text-center">
          <span class="block text-2xl font-display font-bold text-gold mb-1">{{ s.exp }}</span>
          <span class="text-sm text-gray-600">{{ locale === 'fr' ? s.labelFr : s.labelEn }}</span>
        </div>
      </div>

      <!-- Éducation -->
      <SectionTitle :title="t('about.education')" />
      <div class="space-y-3 mb-16">
        <div v-for="e in education" :key="e.degree"
          class="flex flex-col sm:flex-row sm:items-start gap-2 py-3 border-b border-gray-100">
          <span class="text-sm font-mono text-gold font-semibold whitespace-nowrap min-w-[110px]">{{ e.period }}</span>
          <div>
            <p class="font-medium text-navy">{{ e.degree }}</p>
            <p class="text-sm text-gray-500">{{ e.institution }}{{ e.mention ? ` — ${e.mention}` : '' }}</p>
          </div>
        </div>
      </div>

      <!-- Bibliographie -->
      <SectionTitle :title="t('about.bibliography')" />
      <div class="border border-gold/30 rounded-lg p-6 bg-gold/5 mb-6">
        <h3 class="font-display font-bold text-navy text-lg mb-2">L'Intelligence Économique Camerounaise (IEC)</h3>
        <p class="text-gray-600 text-sm mb-4">Éditions Harmattan Cameroun, 2013 — ISBN 978-2-343-01199-8</p>
        <div class="flex flex-wrap gap-3">
          <Button href="https://www.editions-harmattan.fr/livre-l_intelligence_economique_camerounaise_iec_steve_william_azeumo-9782343011998-40537.html" variant="outline" external>Harmattan</Button>
          <Button href="https://www.amazon.com/Lintelligence-%C3%A9conomique-camerounaise-Harmattan-Cameroun-ebook/dp/B00K35UKT8" variant="outline" external>Amazon</Button>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import Button from '../Components/UI/Button.vue'
import { useRoute } from '../composables/useI18n'

const { t, locale } = useRoute()

const bio = [
  "Consultant indépendant, agissant en tant que partenaire stratégique et opérationnel au sein de projets innovants d'organisations du continent africain et du monde entier.",
  "Auteur de « L'intelligence économique Camerounaise » publié en 2013 aux éditions l'Harmattan Cameroun ; ISBN 978-2-343-01199-8.",
  "Je crois au potentiel humain et que dans tout projet ou entreprise nous devons mettre l'être humain au centre de tout ; raison pour laquelle je milite aux côtés des entrepreneurs de l'économie de communion et du mouvement The Economy of Francesco.",
]

const skills = [
  { exp: '10 ans', labelFr: "Conception et Gestion des projets d'IE", labelEn: 'EI Project Design & Management' },
  { exp: '10 ans', labelFr: 'Veille · Due Diligence · Protection des données', labelEn: 'Watch · Due Diligence · Data Protection' },
  { exp: '10 ans', labelFr: 'Conseils en Gestion des Organisations', labelEn: 'Organisational Management Consulting' },
]

const education = [
  { period: '2026', degree: 'CAS — Ethical Management', institution: 'Université de Fribourg' },
  { period: '2025', degree: 'Certification Gestion financière (développement)', institution: 'ITCILO (ILO)' },
  { period: '2024', degree: 'CAS — Integral Economics', institution: 'Université de Fribourg' },
  { period: '2021', degree: 'Certification Conception et gestion de projet', institution: 'ITCILO (ILO)' },
  { period: '2019', degree: "Certificat Intelligence des marchés Africain", institution: 'CAVIE / ACCI' },
  { period: '2018–2019', degree: "Master 2 Pro — Administration des Affaires (BAC+5)", institution: 'Université de Dschang', mention: 'Assez bien' },
  { period: '2011–2014', degree: "Licence Pro — Gestion de l'information (BAC+3)", institution: 'ESSTIC — UYII-Soa', mention: 'Assez bien' },
  { period: '2009–2010', degree: 'Sciences économiques et gestion', institution: 'Université de Yaoundé II' },
  { period: '2008', degree: 'Baccalauréat Scientifique Mathématiques', institution: '—', mention: 'Passable' },
]
</script>
