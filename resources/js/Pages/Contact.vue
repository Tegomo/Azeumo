<template>
  <AppLayout>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle :title="t('contact.title')" />
      <div class="grid md:grid-cols-2 gap-12">
        <!-- Coordonnées -->
        <div>
          <div class="space-y-4 mb-8">
            <div>
              <p class="text-sm font-semibold text-navy mb-1">Email</p>
              <a href="mailto:contact@azeumo.com" class="text-gold hover:underline">contact@azeumo.com</a>
            </div>
            <div>
              <p class="text-sm font-semibold text-navy mb-1">{{ locale === 'fr' ? 'Téléphone' : 'Phone' }}</p>
              <a href="tel:+237674463867" class="text-gray-700 hover:text-gold block">+237 674 46 38 67</a>
              <a href="tel:+237696550555" class="text-gray-700 hover:text-gold block">+237 696 55 05 55</a>
            </div>
            <div>
              <p class="text-sm font-semibold text-navy mb-1">{{ locale === 'fr' ? 'Localisation' : 'Location' }}</p>
              <p class="text-gray-600">Yaoundé, Cameroun</p>
            </div>
          </div>
          <a href="https://wa.me/237674463867" target="_blank" rel="noopener noreferrer"
             class="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded font-semibold text-sm transition-colors">
            💬 {{ t('contact.whatsapp') }}
          </a>
        </div>

        <!-- Formulaire -->
        <form @submit.prevent="submit" class="space-y-5">
          <div v-if="$page.props.flash?.success" class="text-green-600 text-sm p-3 bg-green-50 rounded">
            {{ t('contact.success') }}
          </div>
          <div>
            <input v-model="form.name" :placeholder="t('contact.name') + ' *'"
              class="w-full border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold" />
            <p v-if="form.errors.name" class="text-red-500 text-xs mt-1">{{ form.errors.name }}</p>
          </div>
          <div>
            <input v-model="form.email" type="email" :placeholder="t('contact.email') + ' *'"
              class="w-full border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold" />
            <p v-if="form.errors.email" class="text-red-500 text-xs mt-1">{{ form.errors.email }}</p>
          </div>
          <div>
            <input v-model="form.subject" :placeholder="t('contact.subject') + ' *'"
              class="w-full border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold" />
            <p v-if="form.errors.subject" class="text-red-500 text-xs mt-1">{{ form.errors.subject }}</p>
          </div>
          <div>
            <textarea v-model="form.message" :placeholder="t('contact.message') + ' *'" rows="5"
              class="w-full border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold resize-none" />
            <p v-if="form.errors.message" class="text-red-500 text-xs mt-1">{{ form.errors.message }}</p>
          </div>
          <Button type="submit" :class="{ 'opacity-60 cursor-not-allowed': form.processing }">
            {{ form.processing ? '…' : t('contact.send') }}
          </Button>
        </form>
      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '../Components/Layout/AppLayout.vue'
import SectionTitle from '../Components/UI/SectionTitle.vue'
import Button from '../Components/UI/Button.vue'
import { useRoute } from '../composables/useI18n'

const { t, locale } = useRoute()
const form = useForm({ name: '', email: '', subject: '', message: '' })
function submit() { form.post('/contact') }
</script>
