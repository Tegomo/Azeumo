<template>
  <footer class="bg-navy text-gray-400 py-10 mt-20">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex flex-col md:flex-row items-center justify-between gap-4">
      <p class="text-sm">© {{ year }} Steve William Azeumo · Yaoundé, Cameroun</p>
      <div class="flex gap-6 text-sm">
        <a href="https://www.linkedin.com/in/azeumo/" target="_blank" rel="noopener noreferrer"
           class="hover:text-gold transition-colors">LinkedIn</a>
        <a href="https://twitter.com/loftyazeumo" target="_blank" rel="noopener noreferrer"
           class="hover:text-gold transition-colors">Twitter</a>
        <Link href="/mentions-legales" class="hover:text-gold transition-colors">
          {{ t('footer.legal') }}
        </Link>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { useRoute } from '../../composables/useI18n'
const { t } = useRoute()
const year = new Date().getFullYear()
</script>
