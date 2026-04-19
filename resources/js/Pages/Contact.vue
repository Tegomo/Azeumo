<template>
  <AppLayout>
    <!-- Hero Section -->
    <section class="relative bg-navy text-white py-32 overflow-hidden">
      <div class="absolute inset-0">
        <img src="/images/pages/contact.jpg" alt="" class="w-full h-full object-cover opacity-20" />
        <div class="absolute inset-0 bg-gradient-to-r from-navy via-navy/90 to-navy/70"></div>
      </div>

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
          <div class="inline-flex items-center gap-3 mb-6 animate-fade-up">
            <span class="w-12 h-px bg-gold"></span>
            <span class="text-gold font-semibold text-sm tracking-widest uppercase">
              {{ locale === 'fr' ? 'Contact' : 'Contact' }}
            </span>
          </div>
          <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6 animate-fade-up delay-100">
            {{ t('contact.title') }}
          </h1>
          <p class="text-gray-300 text-lg animate-fade-up delay-200">
            {{ locale === 'fr' ? "Discutons de votre projet et trouvons ensemble la meilleure solution." : "Let's discuss your project and find the best solution together." }}
          </p>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section class="section-padding bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-5 gap-12 lg:gap-16">
          <!-- Contact Info -->
          <div class="lg:col-span-2">
            <div class="sticky top-32">
              <SectionTitle
                :tag="locale === 'fr' ? 'Informations' : 'Information'"
                :showLine="false"
              >
                {{ locale === 'fr' ? 'Restons en contact' : 'Stay in touch' }}
              </SectionTitle>

              <p class="text-gray-600 mb-10">
                {{ locale === 'fr' ? "N'hésitez pas à me contacter pour toute question ou demande de collaboration." : "Feel free to contact me for any questions or collaboration requests." }}
              </p>

              <!-- Contact cards -->
              <div class="space-y-4 mb-10">
                <a
                  href="mailto:contact@azeumo.com"
                  class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl hover:bg-gold/10 transition-all duration-300 group animate-fade-up"
                >
                  <div class="w-12 h-12 rounded-xl bg-gold/10 flex items-center justify-center group-hover:bg-gold group-hover:text-navy transition-all duration-300">
                    <svg class="w-5 h-5 text-gold group-hover:text-navy" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </div>
                  <div>
                    <p class="text-sm text-gray-500">Email</p>
                    <p class="font-semibold text-navy group-hover:text-gold transition-colors">contact@azeumo.com</p>
                  </div>
                </a>


                <div
                  class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl animate-fade-up delay-200"
                >
                  <div class="w-12 h-12 rounded-xl bg-gold/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                  </div>
                  <div>
                    <p class="text-sm text-gray-500">{{ locale === 'fr' ? 'Localisation' : 'Location' }}</p>
                    <p class="font-semibold text-navy">Yaoundé, Cameroun</p>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Contact Form -->
          <div class="lg:col-span-3">
            <div class="bg-gray-50 rounded-3xl p-8 lg:p-12 animate-scale">
              <h3 class="font-display font-bold text-2xl text-navy mb-2">
                {{ locale === 'fr' ? 'Envoyez-moi un message' : 'Send me a message' }}
              </h3>
              <p class="text-gray-600 mb-8">
                {{ locale === 'fr' ? "Je vous répondrai dans les plus brefs délais." : "I will get back to you as soon as possible." }}
              </p>

              <!-- Success message -->
              <Transition
                enter-active-class="transition-all duration-300"
                enter-from-class="opacity-0 -translate-y-2"
                enter-to-class="opacity-100 translate-y-0"
              >
                <div v-if="$page.props.flash?.success" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                  <div class="flex items-center gap-3">
                    <span class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                      <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </span>
                    <p class="text-green-700 font-medium">{{ t('contact.success') }}</p>
                  </div>
                </div>
              </Transition>

              <form @submit.prevent="submit" class="space-y-6">
                <div class="grid sm:grid-cols-2 gap-6">
                  <div class="animate-fade-up">
                    <label class="block text-sm font-medium text-navy mb-2">
                      {{ t('contact.name') }} <span class="text-red-500">*</span>
                    </label>
                    <input
                      v-model="form.name"
                      type="text"
                      class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 text-navy placeholder-gray-400 focus:outline-none focus:border-gold focus:ring-0 transition-colors"
                      :placeholder="locale === 'fr' ? 'Votre nom' : 'Your name'"
                    />
                    <p v-if="form.errors.name" class="text-red-500 text-sm mt-2">{{ form.errors.name }}</p>
                  </div>

                  <div class="animate-fade-up delay-100">
                    <label class="block text-sm font-medium text-navy mb-2">
                      {{ t('contact.email') }} <span class="text-red-500">*</span>
                    </label>
                    <input
                      v-model="form.email"
                      type="email"
                      class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 text-navy placeholder-gray-400 focus:outline-none focus:border-gold focus:ring-0 transition-colors"
                      :placeholder="locale === 'fr' ? 'votre@email.com' : 'your@email.com'"
                    />
                    <p v-if="form.errors.email" class="text-red-500 text-sm mt-2">{{ form.errors.email }}</p>
                  </div>
                </div>

                <div class="animate-fade-up delay-200">
                  <label class="block text-sm font-medium text-navy mb-2">
                    {{ t('contact.subject') }} <span class="text-red-500">*</span>
                  </label>
                  <input
                    v-model="form.subject"
                    type="text"
                    class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 text-navy placeholder-gray-400 focus:outline-none focus:border-gold focus:ring-0 transition-colors"
                    :placeholder="locale === 'fr' ? 'Sujet de votre message' : 'Subject of your message'"
                  />
                  <p v-if="form.errors.subject" class="text-red-500 text-sm mt-2">{{ form.errors.subject }}</p>
                </div>

                <div class="animate-fade-up delay-300">
                  <label class="block text-sm font-medium text-navy mb-2">
                    {{ t('contact.message') }} <span class="text-red-500">*</span>
                  </label>
                  <textarea
                    v-model="form.message"
                    rows="6"
                    class="w-full bg-white border-2 border-gray-200 rounded-xl px-4 py-3 text-navy placeholder-gray-400 focus:outline-none focus:border-gold focus:ring-0 transition-colors resize-none"
                    :placeholder="locale === 'fr' ? 'Décrivez votre projet ou votre demande...' : 'Describe your project or request...'"
                  ></textarea>
                  <p v-if="form.errors.message" class="text-red-500 text-sm mt-2">{{ form.errors.message }}</p>
                </div>

                <div class="animate-fade-up delay-400">
                  <Button
                    type="submit"
                    size="lg"
                    :disabled="form.processing"
                    class="w-full sm:w-auto"
                    showArrow
                  >
                    <span v-if="form.processing" class="flex items-center gap-2">
                      <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                      </svg>
                      {{ locale === 'fr' ? 'Envoi en cours...' : 'Sending...' }}
                    </span>
                    <span v-else>{{ t('contact.send') }}</span>
                  </Button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
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

function submit() {
  form.post('/contact', {
    onSuccess: () => form.reset(),
  })
}
</script>
