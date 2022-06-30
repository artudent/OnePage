<template>
  <div class="circle-item">
    <div v-for="(item, idx) in items" :key="idx" class="circle-item__item" :class="{'circle-item__item--hover': item.hover}">
      <div>
        <img v-if="item.img2x" :src="getImgPath(item.img)" alt="" 
          :srcset="`${getImgPath(item.img)} 1x, ${getImgPath(item.img2x)} 2x`" data-aos-anchor-placement="top-bottom" data-aos-offset="-500" data-aos="fade-up" data-aos-duration="1000">
        <img v-else :src="getImgPath(item.img)" alt="">
        <p class="circle-item__txt" data-aos-anchor-placement="top-bottom" data-aos-offset="-500" data-aos="fade-up" data-aos-duration="1000">{{ item.text }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['items'],
  methods: {
    getImgPath(img) {
      return require('@/assets/img/'+img);
    }
  }

}
</script>

<style lang="scss" scoped>
@import "@scss/components/circle-item.scss";
</style>