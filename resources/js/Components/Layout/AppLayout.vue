<template>
  <div class="min-h-screen flex flex-col">
    <Navbar />
    <main class="flex-1" style="margin-top: -80px;">
      <slot />
    </main>
    <Footer />

    <!-- Scroll to top button -->
    <Transition
      enter-active-class="transition-all duration-300"
      enter-from-class="opacity-0 translate-y-4"
      enter-to-class="opacity-100 translate-y-0"
      leave-active-class="transition-all duration-200"
      leave-from-class="opacity-100 translate-y-0"
      leave-to-class="opacity-0 translate-y-4"
    >
      <button
        v-if="showScrollTop"
        @click="scrollToTop"
        class="fixed bottom-8 right-8 z-50 w-12 h-12 bg-gold text-navy rounded-full shadow-lg hover:bg-gold-dark hover:shadow-xl transition-all duration-300 flex items-center justify-center group"
        aria-label="Scroll to top"
      >
        <svg class="w-5 h-5 transition-transform duration-300 group-hover:-translate-y-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
      </button>
    </Transition>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'
import { useScrollAnimation } from '../../composables/useScrollAnimation'

// Initialize scroll animations
useScrollAnimation()

const showScrollTop = ref(false)

function handleScroll() {
  showScrollTop.value = window.scrollY > 500
}

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' })
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll, { passive: true })
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})
</script>
