<template>
  <header
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-500"
    :class="scrolled ? 'bg-white shadow-lg py-2' : 'bg-transparent py-4'"
  >
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between">
      <!-- Logo -->
      <Link href="/" class="relative z-10 group">
        <span
          class="font-display font-bold text-2xl tracking-tight transition-colors duration-300"
          :class="scrolled ? 'text-navy' : 'text-white'"
        >
          <span class="text-gold">A</span>ZEUMO
        </span>
        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gold transition-all duration-300 group-hover:w-full"></span>
      </Link>

      <!-- Desktop Navigation -->
      <nav class="hidden lg:flex items-center gap-1">
        <Link
          v-for="link in links"
          :key="link.href"
          :href="link.href"
          class="relative px-4 py-2 text-sm font-medium transition-all duration-300 group"
          :class="[
            isActive(link.href)
              ? 'text-gold'
              : scrolled ? 'text-navy hover:text-gold' : 'text-white/90 hover:text-white'
          ]"
        >
          {{ t(link.key) }}
          <span
            class="absolute bottom-0 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-gold transition-all duration-300 group-hover:w-3/4"
            :class="isActive(link.href) ? 'w-3/4' : ''"
          ></span>
        </Link>
      </nav>

      <!-- Right side: Language + CTA -->
      <div class="hidden lg:flex items-center gap-6">
        <!-- Language Switcher -->
        <div class="flex items-center gap-2 text-sm">
          <a
            href="/locale/fr"
            class="px-2 py-1 rounded transition-all duration-300"
            :class="locale === 'fr'
              ? 'bg-gold text-navy font-semibold'
              : scrolled ? 'text-navy/60 hover:text-navy' : 'text-white/60 hover:text-white'"
          >FR</a>
          <span :class="scrolled ? 'text-navy/30' : 'text-white/30'">|</span>
          <a
            href="/locale/en"
            class="px-2 py-1 rounded transition-all duration-300"
            :class="locale === 'en'
              ? 'bg-gold text-navy font-semibold'
              : scrolled ? 'text-navy/60 hover:text-navy' : 'text-white/60 hover:text-white'"
          >EN</a>
        </div>

        <!-- CTA Button -->
        <Link
          href="/contact"
          class="btn-animated px-6 py-2.5 bg-gold text-navy font-display font-semibold text-sm rounded-full hover:bg-gold-dark hover:shadow-lg transition-all duration-300"
        >
          {{ t('nav.contact') }}
        </Link>
      </div>

      <!-- Mobile Menu Button -->
      <button
        class="lg:hidden relative w-10 h-10 flex items-center justify-center"
        @click="toggleMenu"
        :aria-expanded="open"
        aria-label="Menu"
      >
        <div class="relative w-6 h-5">
          <span
            class="absolute left-0 w-full h-0.5 transition-all duration-300 ease-out"
            :class="[
              scrolled ? 'bg-navy' : 'bg-white',
              open ? 'top-2 rotate-45' : 'top-0'
            ]"
          ></span>
          <span
            class="absolute left-0 top-2 w-full h-0.5 transition-all duration-300"
            :class="[
              scrolled ? 'bg-navy' : 'bg-white',
              open ? 'opacity-0 translate-x-3' : 'opacity-100'
            ]"
          ></span>
          <span
            class="absolute left-0 w-full h-0.5 transition-all duration-300 ease-out"
            :class="[
              scrolled ? 'bg-navy' : 'bg-white',
              open ? 'top-2 -rotate-45' : 'top-4'
            ]"
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
        class="lg:hidden absolute top-full left-0 right-0 bg-white shadow-2xl border-t border-gray-100"
      >
        <div class="max-w-7xl mx-auto px-4 py-6 space-y-1">
          <Link
            v-for="(link, index) in links"
            :key="link.href"
            :href="link.href"
            @click="open = false"
            class="block px-4 py-3 text-navy hover:text-gold hover:bg-gold/5 rounded-lg transition-all duration-200 font-medium"
            :style="{ animationDelay: `${index * 50}ms` }"
          >
            {{ t(link.key) }}
          </Link>

          <div class="pt-4 mt-4 border-t border-gray-100">
            <div class="flex items-center gap-4 px-4">
              <span class="text-sm text-gray-500">{{ locale === 'fr' ? 'Langue' : 'Language' }}:</span>
              <a
                href="/locale/fr"
                class="text-sm px-3 py-1 rounded-full transition-colors"
                :class="locale === 'fr' ? 'bg-gold text-navy font-semibold' : 'text-gray-600 hover:text-gold'"
              >Français</a>
              <a
                href="/locale/en"
                class="text-sm px-3 py-1 rounded-full transition-colors"
                :class="locale === 'en' ? 'bg-gold text-navy font-semibold' : 'text-gray-600 hover:text-gold'"
              >English</a>
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

const { t, locale } = useRoute()
const open = ref(false)
const scrolled = ref(false)

const links = [
  { href: '/', key: 'nav.home' },
  { href: '/a-propos', key: 'nav.about' },
  { href: '/services', key: 'nav.services' },
  { href: '/methode', key: 'nav.method' },
  { href: '/blog', key: 'nav.blog' },
  { href: '/media', key: 'nav.media' },
]

function isActive(href) {
  if (href === '/') {
    return window.location.pathname === '/'
  }
  return window.location.pathname.startsWith(href)
}

function toggleMenu() {
  open.value = !open.value
  if (open.value) {
    document.body.style.overflow = 'hidden'
  } else {
    document.body.style.overflow = ''
  }
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
})
</script>
