<template>
  <component
    :is="href ? (external ? 'a' : Link) : 'button'"
    :href="href"
    :target="external ? '_blank' : undefined"
    :rel="external ? 'noopener noreferrer' : undefined"
    :type="!href ? (type || 'button') : undefined"
    class="group relative inline-flex items-center justify-center font-display font-semibold text-sm tracking-wide transition-all duration-300 overflow-hidden"
    :class="[sizeClass, variantClass, { 'cursor-not-allowed opacity-60': disabled }]"
    :disabled="disabled"
  >
    <!-- Shine effect -->
    <span
      v-if="variant === 'primary'"
      class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"
    ></span>

    <!-- Icon left -->
    <span v-if="$slots.iconLeft" class="mr-2 transition-transform duration-300 group-hover:-translate-x-0.5">
      <slot name="iconLeft" />
    </span>

    <!-- Content -->
    <span class="relative z-10">
      <slot />
    </span>

    <!-- Icon right -->
    <span v-if="$slots.iconRight || showArrow" class="ml-2 transition-transform duration-300 group-hover:translate-x-1">
      <slot name="iconRight">
        <svg v-if="showArrow" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
        </svg>
      </slot>
    </span>
  </component>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
  href: String,
  variant: { type: String, default: 'primary' },
  size: { type: String, default: 'md' },
  external: Boolean,
  type: String,
  disabled: Boolean,
  showArrow: Boolean,
  rounded: { type: Boolean, default: true }
})

const sizeClass = computed(() => {
  const sizes = {
    sm: 'px-4 py-2 text-xs',
    md: 'px-6 py-3 text-sm',
    lg: 'px-8 py-4 text-base'
  }
  const rounded = props.rounded ? 'rounded-full' : 'rounded-lg'
  return `${sizes[props.size]} ${rounded}`
})

const variantClass = computed(() => {
  const variants = {
    primary: 'bg-primary-gradient text-white hover:shadow-lg hover:shadow-gold/30 active:scale-95',
    secondary: 'bg-navy text-white hover:bg-navy-700 hover:shadow-lg active:scale-95',
    outline: 'border-2 border-gold text-[#FF7400] hover:bg-gold hover:text-white active:scale-95',
    'outline-light': 'border-2 border-white text-white hover:bg-white hover:text-navy active:scale-95',
    ghost: 'text-navy hover:bg-navy/5 active:scale-95',
    'ghost-light': 'text-white hover:bg-white/10 active:scale-95'
  }
  return variants[props.variant] || variants.primary
})
</script>
