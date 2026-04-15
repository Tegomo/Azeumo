<template>
  <div class="mb-12 lg:mb-16" :class="centered ? 'text-center' : ''">
    <!-- Subtitle/Tag -->
    <div
      v-if="tag"
      class="inline-flex items-center gap-2 mb-4 animate-fade-up"
    >
      <span class="w-8 h-px" :class="light ? 'bg-gold' : 'bg-gold'"></span>
      <span
        class="text-sm font-semibold tracking-widest uppercase"
        :class="light ? 'text-gold' : 'text-gold'"
      >
        {{ tag }}
      </span>
      <span class="w-8 h-px" :class="light ? 'bg-gold' : 'bg-gold'"></span>
    </div>

    <!-- Main Title -->
    <h2
      class="font-display font-bold text-3xl sm:text-4xl lg:text-5xl leading-tight animate-fade-up delay-100"
      :class="light ? 'text-white' : 'text-navy'"
    >
      <slot>{{ title }}</slot>
    </h2>

    <!-- Subtitle -->
    <p
      v-if="subtitle"
      class="mt-4 text-lg max-w-2xl animate-fade-up delay-200"
      :class="[
        light ? 'text-gray-300' : 'text-gray-600',
        centered ? 'mx-auto' : ''
      ]"
    >
      {{ subtitle }}
    </p>

    <!-- Decorative line -->
    <div
      v-if="showLine"
      class="mt-6 flex items-center gap-2 animate-fade-up delay-300"
      :class="centered ? 'justify-center' : ''"
    >
      <span class="w-12 h-1 bg-gold rounded-full"></span>
      <span class="w-3 h-1 bg-gold/50 rounded-full"></span>
      <span class="w-2 h-1 bg-gold/30 rounded-full"></span>
    </div>
  </div>
</template>

<script setup>
defineProps({
  title: String,
  subtitle: String,
  tag: String,
  light: { type: Boolean, default: false },
  centered: { type: Boolean, default: false },
  showLine: { type: Boolean, default: true }
})
</script>
