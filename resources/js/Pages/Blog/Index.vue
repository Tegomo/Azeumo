<template>
  <AppLayout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('blog.title')" />
      <p v-if="!posts.length" class="text-gray-500">{{ t('blog.empty') }}</p>
      <div class="space-y-8">
        <article v-for="p in posts" :key="p.slug" class="border-b border-gray-100 pb-8">
          <p class="text-sm text-gold font-mono mb-2">{{ p.published_at }}</p>
          <h2 class="font-display font-bold text-navy text-xl mb-2 hover:text-gold transition-colors">
            <Link :href="`/blog/${p.slug}`">{{ p.title }}</Link>
          </h2>
          <p class="text-gray-600 text-sm leading-relaxed mb-3">{{ p.excerpt }}</p>
          <div v-if="p.tags?.length" class="flex flex-wrap gap-2">
            <span v-for="tag in p.tags" :key="tag"
              class="text-xs bg-gold/10 text-gold px-2 py-0.5 rounded">{{ tag }}</span>
          </div>
        </article>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../Components/Layout/AppLayout.vue'
import SectionTitle from '../../Components/UI/SectionTitle.vue'
import { useRoute } from '../../composables/useI18n'
defineProps({ posts: Array })
const { t } = useRoute()
</script>
