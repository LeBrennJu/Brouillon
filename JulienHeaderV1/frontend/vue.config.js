const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true
})

// allows access to the sass variable
module.exports = {
  css: {
    loaderOptions: {
      sass: {
        additionalData:
        `@import "@/assets/css/variables.scss";`      
      }
    }
  }
};