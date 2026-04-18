<template>
  <AppLayout>
    <!-- Hero Section -->
    <section class="relative bg-navy text-white py-32 overflow-hidden">
      <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-gold/10 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-gold/5 rounded-full blur-3xl"></div>
      </div>

      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <Link href="/blog" class="inline-flex items-center gap-2 text-gold/80 hover:text-gold text-sm mb-8 transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
          </svg>
          Blog
        </Link>

        <div v-if="post.tags?.length" class="flex flex-wrap gap-2 mb-6 animate-fade-up">
          <span
            v-for="tag in post.tags"
            :key="tag"
            class="text-xs bg-gold/20 text-gold px-3 py-1 rounded-full font-medium"
          >
            {{ tag }}
          </span>
        </div>

        <h1 class="font-display font-bold text-4xl sm:text-5xl leading-tight mb-6 animate-fade-up delay-100">
          {{ post.title }}
        </h1>

        <p class="text-gray-400 text-sm animate-fade-up delay-200">{{ post.published_at }}</p>
      </div>
    </section>

    <!-- Article Content -->
    <section class="py-16 bg-white">
      <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg max-w-none text-gray-700 whitespace-pre-line leading-relaxed">
          {{ post.body }}
        </div>

        <div class="mt-12 pt-8 border-t border-gray-100">
          <Link href="/blog" class="inline-flex items-center gap-2 text-gold font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
            </svg>
            Retour au blog
          </Link>
        </div>
      </div>
    </section>
  </AppLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import AppLayout from '../../Components/Layout/AppLayout.vue'
defineProps({ post: Object })
</script>
