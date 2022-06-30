<template>
  <header :class="{'scroll-on':isScroll}">
    <div class="header-wrap">
      <div class="header-bar">
        <div class="header-bar__wrap">
          <p class="header-bar__logo">
            <a href="/">
              <img src="@img/logo-mo.png" alt="" srcset="@img/logo-mo.png 1x, @img/logo-mo@2x.png 2x">
              <img src="@img/logo.png" alt="" srcset="@img/logo.png 1x, @img/logo@2x.png 2x">
            </a>
          </p>
          <p class="header-bar__btn-open" @click="moMenuToggle">
            <img src="@img/btn-menu.png" alt="" srcset="@img/btn-menu.png 1x, @img/btn-menu@2x.png 2x">
          </p>
        </div>
      </div>
      <div class="header-line"></div>
      <div class="header-inner" :class="{'header-inner--on': moMenuOn}">
        <div class="header-inner__box-btn">
          <p class="header-inner__box-btn__btn-close" @click="moMenuToggle">
            <img src="@img/btn-menu-close.png" alt="" srcset="@img/btn-menu-close.png 1x, @img/btn-menu-close@2x.png 2x">
          </p>
        </div>
        <nav>
          <ul>
            <li><a href="#about">ARTUDENT</a></li>
            <li><a href="#service">SERVICE</a></li>
            <li><a href="#want">ARTIST</a></li>
            <li><a href="#join">JOIN</a></li>
            <li><a href="#contact">CONTACT</a></li>
          </ul>
        </nav>
        <p class="header-inner__link">
          <a href="https://www.notion.so/ARTUDENT-95c372e07c364de8942eee98b06f92dc" target="_blank">NOTION</a>
        </p>
      </div>
      <div class="header-overlay" :class="{'header-overlay--on': moMenuOn}" @click="moMenuToggle"></div>
    </div>
  </header>
</template>

<script>
export default {
  data() {
    return {
      moMenuOn: false,
      isScroll: false,
    }
  },
  methods: {
    moMenuToggle() {
      this.moMenuOn = !this.moMenuOn;
    },
    headerChk() {
      const st = document.querySelector('html').scrollTop;
      this.isScroll = st > 10 ? true : false;
    }
  },
  created() {
    window.addEventListener('scroll', this.headerChk);
  },
  destroyed() {
    window.removeEventListener('scroll', this.headerChk);
  }
}
</script>

<style lang="scss" scoped>
@import "@scss/layout/header.scss";
</style>