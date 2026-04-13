<template>
  <div>
    <Navbar />
    <main class="pt-16">
      <slot />
    </main>
    <Footer />
  </div>
</template>

<script setup>
import Navbar from './Navbar.vue'
import Footer from './Footer.vue'
</script>
