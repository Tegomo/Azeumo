<template>
  <header class="fixed top-0 left-0 right-0 z-50 bg-navy/95 backdrop-blur-sm border-b border-white/10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16">
      <Link href="/" class="font-display font-bold text-white text-lg hover:text-gold transition-colors">
        AZEUMO
      </Link>

      <!-- Desktop nav -->
      <nav class="hidden md:flex items-center gap-6">
        <Link v-for="link in links" :key="link.href" :href="link.href"
          class="text-sm font-medium transition-colors"
          :class="isActive(link.href) ? 'text-gold' : 'text-gray-300 hover:text-white'">
          {{ t(link.key) }}
        </Link>
      </nav>

      <!-- Locale switcher -->
      <div class="hidden md:flex items-center gap-2 ml-6">
        <a href="/locale/fr" class="text-xs font-semibold"
           :class="locale === 'fr' ? 'text-gold' : 'text-gray-400 hover:text-white'">FR</a>
        <span class="text-gray-600">|</span>
        <a href="/locale/en" class="text-xs font-semibold"
           :class="locale === 'en' ? 'text-gold' : 'text-gray-400 hover:text-white'">EN</a>
      </div>

      <!-- Mobile burger -->
      <button class="md:hidden text-white p-2" @click="open = !open">
        <span class="block w-5 h-0.5 bg-white mb-1" />
        <span class="block w-5 h-0.5 bg-white mb-1" />
        <span class="block w-5 h-0.5 bg-white" />
      </button>
    </div>

    <!-- Mobile menu -->
    <nav v-if="open" class="md:hidden bg-navy border-t border-white/10 px-4 pb-4">
      <Link v-for="link in links" :key="link.href" :href="link.href"
        @click="open = false"
        class="block py-2 text-gray-300 hover:text-gold transition-colors">
        {{ t(link.key) }}
      </Link>
      <div class="flex gap-3 pt-2">
        <a href="/locale/fr" class="text-xs" :class="locale === 'fr' ? 'text-gold font-bold' : 'text-gray-400'">FR</a>
        <a href="/locale/en" class="text-xs" :class="locale === 'en' ? 'text-gold font-bold' : 'text-gray-400'">EN</a>
      </div>
    </nav>
  </header>
</template>

<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'
import { useRoute } from '../../composables/useI18n'

const { t, locale } = useRoute()
const open = ref(false)

const links = [
  { href: '/a-propos', key: 'nav.about' },
  { href: '/services', key: 'nav.services' },
  { href: '/methode', key: 'nav.method' },
  { href: '/blog', key: 'nav.blog' },
  { href: '/media', key: 'nav.media' },
  { href: '/contact', key: 'nav.contact' },
]

function isActive(href) {
  return window.location.pathname.startsWith(href)
}
</script>
