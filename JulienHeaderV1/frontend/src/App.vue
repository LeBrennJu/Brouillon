<template>
  <router-view/>
</template>

<style lang="scss">
@import "./assets/css/style.scss";
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,400&display=swap');

#app {
  font-family: 'Montserrat', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  min-height: 100vh;
  display: grid;
  grid-template-rows: auto 1fr auto;
  background-color: $blue-light-bg; 
  color: $white;
}


</style>
