<template>
  <footer class="bg-navy text-white pt-20 pb-8 relative overflow-hidden">
    <!-- Decorative shapes -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-gold/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
      <!-- Main footer content -->
      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
        <!-- Brand column -->
        <div class="lg:col-span-1">
          <Link href="/" class="inline-block mb-6">
            <span class="font-display font-bold text-3xl">
              <span class="text-gold">A</span>ZEUMO
            </span>
          </Link>
          <p class="text-gray-400 text-sm leading-relaxed mb-6">
            {{ t('footer.description') }}
          </p>
          <!-- Social links -->
          <div class="flex gap-3">
            <a
              v-for="social in socials"
              :key="social.name"
              :href="social.url"
              target="_blank"
              rel="noopener noreferrer"
              class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-gold hover:text-navy transition-all duration-300 group"
              :aria-label="social.name"
            >
              <component :is="social.icon" class="w-5 h-5" />
            </a>
          </div>
        </div>

        <!-- Quick Links -->
        <div>
          <h4 class="font-display font-bold text-lg mb-6 relative inline-block">
            {{ t('footer.quick_links') }}
            <span class="absolute -bottom-2 left-0 w-8 h-0.5 bg-gold"></span>
          </h4>
          <ul class="space-y-3">
            <li v-for="link in quickLinks" :key="link.href">
              <Link
                :href="link.href"
                class="text-gray-400 hover:text-gold transition-colors duration-300 flex items-center gap-2 group"
              >
                <span class="w-0 h-px bg-gold transition-all duration-300 group-hover:w-3"></span>
                {{ t(link.key) }}
              </Link>
            </li>
          </ul>
        </div>

        <!-- Services -->
        <div>
          <h4 class="font-display font-bold text-lg mb-6 relative inline-block">
            {{ t('footer.services') }}
            <span class="absolute -bottom-2 left-0 w-8 h-0.5 bg-gold"></span>
          </h4>
          <ul class="space-y-3">
            <li v-for="service in serviceLinks" :key="service">
              <Link
                href="/services"
                class="text-gray-400 hover:text-gold transition-colors duration-300 flex items-center gap-2 group"
              >
                <span class="w-0 h-px bg-gold transition-all duration-300 group-hover:w-3"></span>
                {{ service }}
              </Link>
            </li>
          </ul>
        </div>

        <!-- Contact -->
        <div>
          <h4 class="font-display font-bold text-lg mb-6 relative inline-block">
            {{ t('footer.contact') }}
            <span class="absolute -bottom-2 left-0 w-8 h-0.5 bg-gold"></span>
          </h4>
          <ul class="space-y-4">
            <li class="flex items-start gap-3">
              <svg class="w-5 h-5 text-gold mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span class="text-gray-400 text-sm">Yaoundé, Cameroun</span>
            </li>
            <li class="flex items-start gap-3">
              <svg class="w-5 h-5 text-gold mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <a href="mailto:contact@azeumo.com" class="text-gray-400 text-sm hover:text-gold transition-colors">
                contact@azeumo.com
              </a>
            </li>
            <li class="flex items-start gap-3">
              <svg class="w-5 h-5 text-gold mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
              <a href="tel:+237696550555" class="text-gray-400 text-sm hover:text-gold transition-colors">
                +237 696 550 555
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Divider -->
      <div class="border-t border-white/10 pt-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
          <p class="text-gray-500 text-sm">
            © {{ year }} Steve William Azeumo. {{ t('footer.rights') }}
          </p>
          <div class="flex items-center gap-6">
            <Link href="/mentions-legales" class="text-gray-500 text-sm hover:text-gold transition-colors">
              {{ t('footer.legal') }}
            </Link>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { useRoute } from '../../composables/useI18n'
import { h } from 'vue'

const { t, locale } = useRoute()
const year = new Date().getFullYear()

// SVG Icons as render functions
const LinkedInIcon = {
  render: () => h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
    h('path', { d: 'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z' })
  ])
}

const TwitterIcon = {
  render: () => h('svg', { fill: 'currentColor', viewBox: '0 0 24 24' }, [
    h('path', { d: 'M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z' })
  ])
}

const socials = [
  { name: 'LinkedIn', url: 'https://www.linkedin.com/in/azeumo/', icon: LinkedInIcon },
  { name: 'Twitter', url: 'https://twitter.com/loftyazeumo', icon: TwitterIcon },
]

const quickLinks = [
  { href: '/', key: 'nav.home' },
  { href: '/a-propos', key: 'nav.about' },
  { href: '/services', key: 'nav.services' },
  { href: '/methode', key: 'nav.method' },
  { href: '/contact', key: 'nav.contact' },
]

const serviceLinks = [
  'Intelligence Économique',
  'Due Diligence',
  'Veille Stratégique',
  'Conseil en Organisation',
]
</script>
