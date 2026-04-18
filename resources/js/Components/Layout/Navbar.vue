<template>
  <header
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
    :class="scrolled ? 'bg-white shadow-lg py-2' : 'bg-transparent py-4'"
  >
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
      <!-- Logo -->
      <Link href="/" class="relative z-10 group flex-shrink-0">
        <span
          class="font-display font-bold text-2xl tracking-tight transition-colors duration-300"
          :class="scrolled ? 'text-navy' : 'text-white'"
        >
          <span class="text-gold">A</span>ZEUMO
        </span>
        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gold transition-all duration-300 group-hover:w-full"></span>
      </Link>

      <!-- Desktop Navigation -->
      <nav class="hidden xl:flex items-center gap-0.5">

        <!-- À propos -->
        <div class="relative" @mouseenter="openDropdown('about')" @mouseleave="closeDropdown">
          <a
            href="/a-propos"
            class="flex items-center gap-1 px-3 py-2 text-sm font-medium transition-all duration-300 group rounded-lg"
            :class="isActive('/a-propos') ? 'text-gold' : scrolled ? 'text-navy hover:text-gold' : 'text-white/90 hover:text-white'"
          >
            {{ locale === 'fr' ? 'À propos' : 'About' }}
            <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="activeDropdown === 'about' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </a>
          <Transition
            enter-active-class="transition-all duration-200 ease-out"
            enter-from-class="opacity-0 translate-y-1"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition-all duration-150 ease-in"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 translate-y-1"
          >
            <div v-if="activeDropdown === 'about'" class="absolute top-full left-0 mt-1 w-52 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 overflow-hidden">
              <a href="/a-propos#biographie" class="dropdown-item">
                <div class="dropdown-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>
                <span>{{ locale === 'fr' ? 'Biographie' : 'Biography' }}</span>
              </a>
              <a href="/a-propos#bibliographie" class="dropdown-item">
                <div class="dropdown-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg></div>
                <span>{{ locale === 'fr' ? 'Bibliographie' : 'Bibliography' }}</span>
              </a>
            </div>
          </Transition>
        </div>

        <!-- Services -->
        <div class="relative" @mouseenter="openDropdown('services')" @mouseleave="closeDropdown">
          <a
            href="/services"
            class="flex items-center gap-1 px-3 py-2 text-sm font-medium transition-all duration-300 rounded-lg"
            :class="isActive('/services') ? 'text-gold' : scrolled ? 'text-navy hover:text-gold' : 'text-white/90 hover:text-white'"
          >
            {{ locale === 'fr' ? 'Services' : 'Services' }}
            <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="activeDropdown === 'services' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </a>
          <Transition
            enter-active-class="transition-all duration-200 ease-out"
            enter-from-class="opacity-0 translate-y-1"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition-all duration-150 ease-in"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 translate-y-1"
          >
            <div v-if="activeDropdown === 'services'" class="absolute top-full left-0 mt-1 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 overflow-hidden">
              <a
                v-for="svc in serviceLinks"
                :key="svc.href"
                :href="svc.href"
                class="dropdown-item"
              >
                <div class="dropdown-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></div>
                <span>{{ locale === 'fr' ? svc.labelFr : svc.labelEn }}</span>
              </a>
              <!-- CTA -->
              <div class="px-3 pt-2 pb-1 mt-1 border-t border-gray-100">
                <a
                  href="/contact"
                  class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-gold text-white font-semibold text-sm rounded-xl transition-all duration-300 hover:shadow-md"
                >
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                  {{ locale === 'fr' ? 'Commander un service' : 'Order a service' }}
                </a>
              </div>
            </div>
          </Transition>
        </div>

        <!-- Méthode -->
        <div class="relative" @mouseenter="openDropdown('method')" @mouseleave="closeDropdown">
          <a
            href="/methode"
            class="flex items-center gap-1 px-3 py-2 text-sm font-medium transition-all duration-300 rounded-lg"
            :class="isActive('/methode') ? 'text-gold' : scrolled ? 'text-navy hover:text-gold' : 'text-white/90 hover:text-white'"
          >
            {{ locale === 'fr' ? 'Méthode' : 'Method' }}
            <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="activeDropdown === 'method' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </a>
          <Transition
            enter-active-class="transition-all duration-200 ease-out"
            enter-from-class="opacity-0 translate-y-1"
            enter-to-class="opacity-100 translate-y-0"
            leave-active-class="transition-all duration-150 ease-in"
            leave-from-class="opacity-100 translate-y-0"
            leave-to-class="opacity-0 translate-y-1"
          >
            <div v-if="activeDropdown === 'method'" class="absolute top-full left-0 mt-1 w-52 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 overflow-hidden">
              <a href="/methode#conseil" class="dropdown-item">
                <div class="dropdown-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
                <span>{{ locale === 'fr' ? 'Conseil' : 'Consulting' }}</span>
              </a>
              <a href="/methode#formation" class="dropdown-item">
                <div class="dropdown-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/></svg></div>
                <span>{{ locale === 'fr' ? 'Formation' : 'Training' }}</span>
              </a>
              <a href="/methode#intervention" class="dropdown-item">
                <div class="dropdown-icon"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
                <span>{{ locale === 'fr' ? 'Intervention' : 'Intervention' }}</span>
              </a>
            </div>
          </Transition>
        </div>

        <!-- Blog -->
        <Link
          href="/blog"
          class="px-3 py-2 text-sm font-medium transition-all duration-300 rounded-lg"
          :class="isActive('/blog') ? 'text-gold' : scrolled ? 'text-navy hover:text-gold' : 'text-white/90 hover:text-white'"
        >
          {{ locale === 'fr' ? 'Blog' : 'Blog' }}
        </Link>

        <!-- Média -->
        <Link
          href="/media"
          class="px-3 py-2 text-sm font-medium transition-all duration-300 rounded-lg"
          :class="isActive('/media') ? 'text-gold' : scrolled ? 'text-navy hover:text-gold' : 'text-white/90 hover:text-white'"
        >
          {{ locale === 'fr' ? 'Média' : 'Media' }}
        </Link>

        <!-- Contact -->
        <Link
          href="/contact"
          class="px-3 py-2 text-sm font-medium transition-all duration-300 rounded-lg"
          :class="isActive('/contact') ? 'text-gold' : scrolled ? 'text-navy hover:text-gold' : 'text-white/90 hover:text-white'"
        >
          Contact
        </Link>
      </nav>

      <!-- Right side: Language + CTA -->
      <div class="hidden xl:flex items-center gap-4">
        <!-- Language Switcher -->
        <div class="flex items-center gap-1 text-sm">
          <a
            href="/locale/fr"
            class="px-2.5 py-1 rounded-lg transition-all duration-300 font-medium"
            :class="locale === 'fr'
              ? 'bg-gold text-white font-semibold'
              : scrolled ? 'text-navy/60 hover:text-navy' : 'text-white/60 hover:text-white'"
          >FR</a>
          <span :class="scrolled ? 'text-navy/30' : 'text-white/30'">|</span>
          <a
            href="/locale/en"
            class="px-2.5 py-1 rounded-lg transition-all duration-300 font-medium"
            :class="locale === 'en'
              ? 'bg-gold text-white font-semibold'
              : scrolled ? 'text-navy/60 hover:text-navy' : 'text-white/60 hover:text-white'"
          >EN</a>
        </div>
      </div>

      <!-- Mobile Menu Button -->
      <button
        class="xl:hidden relative w-10 h-10 flex items-center justify-center"
        @click="toggleMenu"
        :aria-expanded="open"
        aria-label="Menu"
      >
        <div class="relative w-6 h-5">
          <span
            class="absolute left-0 w-full h-0.5 transition-all duration-300 ease-out"
            :class="[scrolled ? 'bg-navy' : 'bg-white', open ? 'top-2 rotate-45' : 'top-0']"
          ></span>
          <span
            class="absolute left-0 top-2 w-full h-0.5 transition-all duration-300"
            :class="[scrolled ? 'bg-navy' : 'bg-white', open ? 'opacity-0 translate-x-3' : 'opacity-100']"
          ></span>
          <span
            class="absolute left-0 w-full h-0.5 transition-all duration-300 ease-out"
            :class="[scrolled ? 'bg-navy' : 'bg-white', open ? 'top-2 -rotate-45' : 'top-4']"
          ></span>
        </div>
      </button>
    </div>

    <!-- Mobile Menu -->
    <Transition
      enter-active-class="transition-all duration-300 ease-out"
      enter-from-class="opacity-0 -translate-y-4"
      enter-to-class="opacity-100 translate-y-0"
      leave-active-class="transition-all duration-200 ease-in"
      leave-from-class="opacity-100 translate-y-0"
      leave-to-class="opacity-0 -translate-y-4"
    >
      <nav
        v-if="open"
        class="xl:hidden absolute top-full left-0 right-0 bg-white shadow-2xl border-t border-gray-100 max-h-[85vh] overflow-y-auto"
      >
        <div class="max-w-7xl mx-auto px-4 py-4 divide-y divide-gray-100">

          <!-- À propos accordion -->
          <div class="py-2">
            <button
              @click="toggleMobile('about')"
              class="flex items-center justify-between w-full px-3 py-2.5 text-navy font-semibold text-sm rounded-lg hover:bg-gold/5 transition-colors"
            >
              <span>{{ locale === 'fr' ? 'À propos de moi' : 'About Me' }}</span>
              <svg class="w-4 h-4 transition-transform duration-200" :class="mobileOpen === 'about' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
            <div v-if="mobileOpen === 'about'" class="mt-1 ml-4 space-y-1">
              <a href="/a-propos#biographie" @click="open = false" class="mobile-subitem">{{ locale === 'fr' ? 'Biographie' : 'Biography' }}</a>
              <a href="/a-propos#bibliographie" @click="open = false" class="mobile-subitem">{{ locale === 'fr' ? 'Bibliographie' : 'Bibliography' }}</a>
            </div>
          </div>

          <!-- Services accordion -->
          <div class="py-2">
            <button
              @click="toggleMobile('services')"
              class="flex items-center justify-between w-full px-3 py-2.5 text-navy font-semibold text-sm rounded-lg hover:bg-gold/5 transition-colors"
            >
              <span>Services</span>
              <svg class="w-4 h-4 transition-transform duration-200" :class="mobileOpen === 'services' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
            <div v-if="mobileOpen === 'services'" class="mt-1 ml-4 space-y-1">
              <a
                v-for="svc in serviceLinks"
                :key="svc.href"
                :href="svc.href"
                @click="open = false"
                class="mobile-subitem leading-snug"
              >{{ locale === 'fr' ? svc.labelFr : svc.labelEn }}</a>
              <a
                href="/contact"
                @click="open = false"
                class="flex items-center gap-2 px-3 py-2 mt-2 bg-gold text-white font-semibold text-sm rounded-lg"
              >
                {{ locale === 'fr' ? 'Commander un service' : 'Order a service' }}
              </a>
            </div>
          </div>

          <!-- Méthode accordion -->
          <div class="py-2">
            <button
              @click="toggleMobile('method')"
              class="flex items-center justify-between w-full px-3 py-2.5 text-navy font-semibold text-sm rounded-lg hover:bg-gold/5 transition-colors"
            >
              <span>{{ locale === 'fr' ? 'Méthode' : 'Method' }}</span>
              <svg class="w-4 h-4 transition-transform duration-200" :class="mobileOpen === 'method' ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </button>
            <div v-if="mobileOpen === 'method'" class="mt-1 ml-4 space-y-1">
              <a href="/methode#conseil" @click="open = false" class="mobile-subitem">{{ locale === 'fr' ? 'Conseil' : 'Consulting' }}</a>
              <a href="/methode#formation" @click="open = false" class="mobile-subitem">{{ locale === 'fr' ? 'Formation' : 'Training' }}</a>
              <a href="/methode#intervention" @click="open = false" class="mobile-subitem">{{ locale === 'fr' ? 'Intervention' : 'Intervention' }}</a>
            </div>
          </div>

          <!-- Direct links -->
          <div class="py-2 space-y-1">
            <Link href="/blog" @click="open = false" class="block px-3 py-2.5 text-navy font-semibold text-sm rounded-lg hover:bg-gold/5 transition-colors">
              {{ locale === 'fr' ? 'Blog / Articles' : 'Blog / Articles' }}
            </Link>
            <Link href="/media" @click="open = false" class="block px-3 py-2.5 text-navy font-semibold text-sm rounded-lg hover:bg-gold/5 transition-colors">
              Média
            </Link>
            <Link href="/contact" @click="open = false" class="block px-3 py-2.5 text-navy font-semibold text-sm rounded-lg hover:bg-gold/5 transition-colors">
              Contact
            </Link>
          </div>

          <!-- Language -->
          <div class="py-4">
            <div class="flex items-center gap-3 px-3">
              <span class="text-sm text-gray-500">{{ locale === 'fr' ? 'Langue' : 'Language' }}:</span>
              <a href="/locale/fr" class="text-sm px-3 py-1 rounded-full transition-colors" :class="locale === 'fr' ? 'bg-gold text-white font-semibold' : 'text-gray-600 hover:text-gold'">Français</a>
              <a href="/locale/en" class="text-sm px-3 py-1 rounded-full transition-colors" :class="locale === 'en' ? 'bg-gold text-white font-semibold' : 'text-gray-600 hover:text-gold'">English</a>
            </div>
          </div>
        </div>
      </nav>
    </Transition>
  </header>

  <!-- Spacer for fixed header -->
  <div class="h-20"></div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { Link } from '@inertiajs/vue3'
import { useRoute } from '../../composables/useI18n'

const { locale } = useRoute()
const open = ref(false)
const scrolled = ref(false)
const activeDropdown = ref(null)
const mobileOpen = ref(null)
let closeTimer = null

const serviceLinks = [
  {
    href: '/services#conseil-management',
    labelFr: 'Conseil en Management des Organisations',
    labelEn: 'Organisational Management Consulting',
  },
  {
    href: '/services#intelligence-economique',
    labelFr: 'Intelligence économique en Afrique',
    labelEn: 'Economic Intelligence in Africa',
  },
  {
    href: '/services#veille-due-diligence',
    labelFr: 'Veille Stratégique · Due Diligence · Protection des données',
    labelEn: 'Strategic Watch · Due Diligence · Data Protection',
  },
  {
    href: '/services#projets-developpement',
    labelFr: 'Projets de développement',
    labelEn: 'Development Projects',
  },
  {
    href: '/services#conception-gestion-projets',
    labelFr: 'Conception et Gestion des projets',
    labelEn: 'Project Design and Management',
  },
]

function openDropdown(name) {
  clearTimeout(closeTimer)
  activeDropdown.value = name
}

function closeDropdown() {
  closeTimer = setTimeout(() => {
    activeDropdown.value = null
  }, 120)
}

function toggleMobile(name) {
  mobileOpen.value = mobileOpen.value === name ? null : name
}

function isActive(href) {
  return window.location.pathname.startsWith(href) && (href !== '/' || window.location.pathname === '/')
}

function toggleMenu() {
  open.value = !open.value
  document.body.style.overflow = open.value ? 'hidden' : ''
}

function handleScroll() {
  scrolled.value = window.scrollY > 50
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll, { passive: true })
  handleScroll()
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
  document.body.style.overflow = ''
  clearTimeout(closeTimer)
})
</script>

<style scoped>
.dropdown-item {
  @apply flex items-center gap-3 px-3 py-2.5 text-sm text-navy hover:text-gold hover:bg-gold/5 transition-all duration-200 cursor-pointer;
}
.dropdown-icon {
  @apply w-7 h-7 rounded-lg bg-gold/10 flex items-center justify-center text-gold flex-shrink-0;
}
.mobile-subitem {
  @apply block px-3 py-2 text-sm text-gray-600 hover:text-gold hover:bg-gold/5 rounded-lg transition-colors;
}
</style>
