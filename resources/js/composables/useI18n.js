import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

export function useRoute() {
  const page = usePage()
  const locale = computed(() => page.props.locale ?? 'fr')
  const translations = computed(() => page.props.translations ?? {})

  function t(key) {
    return translations.value[key] ?? key
  }

  return { t, locale }
}
