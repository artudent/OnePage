const path = require('path');

module.exports = {
  productionSourceMap: false,
  lintOnSave: false,
  devServer: {
    overlay: false
  },
  css: {
    sourceMap: true,
    loaderOptions: {
      sass: {
        additionalData: `
          @import "@/assets/scss/variables.scss";
          @import "@/assets/scss/mixins.scss";
        `
      }
    }
  },
  configureWebpack: {
    resolve: {
      alias: {
        '@asset': path.join(__dirname, 'src/assets/'), 
        '@scss': path.join(__dirname, 'src/assets/scss/'),
        '@img': path.join(__dirname, 'src/assets/img/'),
      },
      extensions: [".js", ".vue", ".json"],
    }
  }
}