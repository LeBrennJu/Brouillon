<template>
  <div>
    <HeaderLayout />
    <HomePage />
    <FooterLayout />
  </div>
</template>

<script>
// @ is an alias to /src
import HeaderLayout from '@/components/templates/HeaderLayout.vue'
import HomePage from '@/components/HomePage.vue'
import FooterLayout from '@/components/templates/FooterLayout.vue'

export default {
  name: 'HomeView',
  components: {
    HeaderLayout,
    HomePage,
    FooterLayout
  }
}
</script>
