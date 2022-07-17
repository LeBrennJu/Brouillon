<template>
<HeaderLayout />
<HomePage />
</template>

<script>
// @ is an alias to /src
import HeaderLayout from '@/components/layout/HeaderLayout.vue'
import HomePage from '@/components/HomePage.vue'

export default {
  name: 'HomeView',
  components: {
    HeaderLayout,
    HomePage
  }
}
</script>
