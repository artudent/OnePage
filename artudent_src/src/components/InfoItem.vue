<template>
  <div class="info-item">
    <div class="info-item__box" :class="{'info-item__box--full': item.isFull}" v-for="(item, idx) in items" :key="idx">
      <p class="info-item__title">{{ item.title }}</p>
      <div class="info-item__data" v-for="(data, idx) in item.data" :key="idx">
        <p class="info-item__data__label" data-aos-anchor-placement="top-bottom" data-aos-offset="-1600" data-aos="fade-up" data-aos-duration="1000">{{ data.label }}</p>
        <p class="info-item__data__cont" v-html="data.cont" data-aos-anchor-placement="top-bottom" data-aos-offset="-1600" data-aos="fade-up" data-aos-duration="1000"></p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['items'],
}
</script>

<style lang="scss" scoped>
@import '@scss/components/info-item.scss';
</style>
<style lang="scss">
.info-item {
  &__data {
    a {
      @include fontStyle();
    }
  }
}
</style>