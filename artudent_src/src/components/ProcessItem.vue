<template>
  <div class="process-item">
    <div class="process-item__item" v-for="(item, idx) in items" :key="idx">
      <p class="process-item__item__num" data-aos-anchor-placement="top-bottom" data-aos-offset="-800" data-aos="fade-up" data-aos-duration="1000">{{ getStringNum(idx+1) }}</p>
      <img v-if="item.img2x" :src="getImgPath(item.img)" alt="" 
        :srcset="`${getImgPath(item.img)} 1x, ${getImgPath(item.img2x)} 2x`" data-aos-anchor-placement="top-bottom" data-aos-offset="-800" data-aos="fade-up" data-aos-duration="1000">
      <img v-else :src="getImgPath(item.img)" alt="" data-aos-anchor-placement="top-bottom" data-aos-offset="-800" data-aos="fade-up" data-aos-duration="1000">
      <p class="process-item__item__txt" data-aos-anchor-placement="top-bottom" data-aos-offset="-800" data-aos="fade-up" data-aos-duration="1000">{{ item.text }}</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ['items'],
  methods: {
    getImgPath(img) {
      return require('@/assets/img/'+img);
    },
    getStringNum(num) {
      return num < 10 ? "0"+num : num;
    }
  }
}
</script>

<style lang="scss" scoped>
@import "@scss/components/process-item.scss"
</style>