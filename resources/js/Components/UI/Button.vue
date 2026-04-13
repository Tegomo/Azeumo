<template>
  <component :is="href ? (external ? 'a' : Link) : 'button'"
    :href="href"
    :target="external ? '_blank' : undefined"
    :rel="external ? 'noopener noreferrer' : undefined"
    :type="!href ? (type || 'button') : undefined"
    class="inline-flex items-center justify-center px-6 py-3 rounded font-display font-semibold text-sm tracking-wide transition-colors duration-200"
    :class="variantClass">
    <slot />
  </component>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  href: String,
  variant: { type: String, default: 'primary' },
  external: Boolean,
  type: String,
})

const variantClass = computed(() => ({
  'bg-gold text-navy hover:bg-gold-dark': props.variant === 'primary',
  'border-2 border-gold text-gold hover:bg-gold hover:text-navy': props.variant === 'outline',
}))
</script>
