<template>
  <AppLayout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-20">
      <Link href="/blog" class="text-sm text-gold hover:underline mb-8 inline-block">← Blog</Link>
      <p class="text-sm text-gray-400 font-mono mb-3">{{ post.published_at }}</p>
      <h1 class="font-display font-bold text-navy text-3xl sm:text-4xl mb-8 leading-tight">
        {{ post.title }}
      </h1>
      <div class="prose prose-lg max-w-none text-gray-700 whitespace-pre-line leading-relaxed">
        {{ post.body }}
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../Components/Layout/AppLayout.vue'
defineProps({ post: Object })
</script>
