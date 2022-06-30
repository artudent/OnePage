<template>
  <div>
    <header-area></header-area>
    <router-view></router-view>
    <footer-area></footer-area>
  </div>
</template>

<script>
import HeaderArea from './components/HeaderArea'
import FooterArea from './components/FooterArea'

export default {
  components: {
    HeaderArea,
    FooterArea
  },
}
</script>

<style lang="scss">
@import '@scss/base.scss';
</style>