<template>
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('media.title')" />
      <section v-for="cat in categories" :key="cat" class="mb-12">
        <h2 class="font-display font-bold text-navy text-xl mb-4 border-b border-gold/30 pb-2">{{ cat }}</h2>
        <ul class="space-y-3">
          <li v-for="item in byCategory(cat)" :key="item.href">
            <a :href="item.href" target="_blank" rel="noopener noreferrer"
               class="flex items-center gap-3 group hover:text-gold transition-colors">
              <Icon :name="icons[item.type]" size="sm" class="text-gold flex-shrink-0" />
              <span class="text-gray-700 group-hover:text-gold underline underline-offset-2">{{ item.label }}</span>
            </a>
          </li>
        </ul>
      </section>
    </div>
  </AppLayout>
</template>

<script setup>
import { computed } from 'vue'
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import Icon from '../Components/UI/Icon.vue'
import { useRoute } from '../composables/useI18n'

const props = defineProps({ items: Array })
const { t } = useRoute()

const icons = { social: 'chat', book: 'book', video: 'video', article: 'newspaper' }
const categories = computed(() => [...new Set(props.items.map(i => i.category))])
function byCategory(cat) { return props.items.filter(i => i.category === cat) }
</script>
