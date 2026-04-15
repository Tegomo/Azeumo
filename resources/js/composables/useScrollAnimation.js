import { onMounted, onUnmounted, ref } from 'vue'

export function useScrollAnimation(options = {}) {
  const {
    threshold = 0.1,
    rootMargin = '0px 0px -50px 0px',
    once = true
  } = options

  const observer = ref(null)

  const initObserver = () => {
    observer.value = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible')
          if (once) {
            observer.value.unobserve(entry.target)
          }
        } else if (!once) {
          entry.target.classList.remove('is-visible')
        }
      })
    }, { threshold, rootMargin })

    // Observe all elements with animation classes
    document.querySelectorAll('.animate-on-scroll, .animate-fade-up, .animate-fade-left, .animate-fade-right, .animate-scale').forEach((el) => {
      observer.value.observe(el)
    })
  }

  onMounted(() => {
    initObserver()
  })

  onUnmounted(() => {
    if (observer.value) {
      observer.value.disconnect()
    }
  })

  return { observer }
}

export function useCounter(targetValue, duration = 2000) {
  const count = ref(0)
  const isVisible = ref(false)

  const startCounting = () => {
    if (isVisible.value) return
    isVisible.value = true

    const startTime = performance.now()
    const startValue = 0

    const updateCount = (currentTime) => {
      const elapsed = currentTime - startTime
      const progress = Math.min(elapsed / duration, 1)

      // Easing function for smooth animation
      const easeOutQuart = 1 - Math.pow(1 - progress, 4)
      count.value = Math.floor(startValue + (targetValue - startValue) * easeOutQuart)

      if (progress < 1) {
        requestAnimationFrame(updateCount)
      } else {
        count.value = targetValue
      }
    }

    requestAnimationFrame(updateCount)
  }

  return { count, startCounting, isVisible }
}

export function useParallax(speed = 0.5) {
  const offset = ref(0)

  const handleScroll = () => {
    offset.value = window.scrollY * speed
  }

  onMounted(() => {
    window.addEventListener('scroll', handleScroll, { passive: true })
  })

  onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
  })

  return { offset }
}

export function useScrollProgress() {
  const progress = ref(0)

  const handleScroll = () => {
    const scrollTop = window.scrollY
    const docHeight = document.documentElement.scrollHeight - window.innerHeight
    progress.value = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0
  }

  onMounted(() => {
    window.addEventListener('scroll', handleScroll, { passive: true })
  })

  onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
  })

  return { progress }
}
