<template>
<HeaderLayout />
<HomePage />
<FooterLayout />
</template>

<script>
// @ is an alias to /src
import HeaderLayout from '@/components/layout/HeaderLayout.vue'
import HomePage from '@/components/HomePage.vue'
import FooterLayout from '@/components/layout/FooterLayout.vue'

export default {
  name: 'HomeView',
  components: {
    HeaderLayout,
    HomePage,
    FooterLayout
  }
}
</script>
