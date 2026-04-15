<template>
  <div
    ref="counterRef"
    class="text-center"
  >
    <div class="relative inline-block">
      <span
        class="font-display font-bold text-5xl lg:text-6xl text-gold transition-all duration-300"
        :class="isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
      >
        {{ displayValue }}{{ suffix }}
      </span>
      <div
        v-if="showDecoration"
        class="absolute -right-4 -top-2 w-8 h-8 border-2 border-gold/30 rounded-full animate-pulse-glow"
      ></div>
    </div>
    <p
      class="mt-3 text-sm lg:text-base font-medium transition-all duration-500 delay-200"
      :class="[
        light ? 'text-gray-300' : 'text-gray-600',
        isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-2'
      ]"
    >
      {{ label }}
    </p>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, computed } from 'vue'

const props = defineProps({
  value: { type: Number, required: true },
  label: { type: String, required: true },
  suffix: { type: String, default: '' },
  duration: { type: Number, default: 2000 },
  light: { type: Boolean, default: false },
  showDecoration: { type: Boolean, default: true }
})

const counterRef = ref(null)
const isVisible = ref(false)
const currentValue = ref(0)
const observer = ref(null)

const displayValue = computed(() => {
  return Math.floor(currentValue.value).toLocaleString()
})

function animateCount() {
  const startTime = performance.now()
  const startValue = 0
  const endValue = props.value

  const update = (currentTime) => {
    const elapsed = currentTime - startTime
    const progress = Math.min(elapsed / props.duration, 1)

    // Easing: easeOutExpo
    const eased = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress)
    currentValue.value = startValue + (endValue - startValue) * eased

    if (progress < 1) {
      requestAnimationFrame(update)
    } else {
      currentValue.value = endValue
    }
  }

  requestAnimationFrame(update)
}

onMounted(() => {
  observer.value = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && !isVisible.value) {
          isVisible.value = true
          animateCount()
          observer.value.unobserve(entry.target)
        }
      })
    },
    { threshold: 0.3 }
  )

  if (counterRef.value) {
    observer.value.observe(counterRef.value)
  }
})

onUnmounted(() => {
  if (observer.value) {
    observer.value.disconnect()
  }
})
</script>
