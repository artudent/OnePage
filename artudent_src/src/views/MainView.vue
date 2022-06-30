<template>
  <section>
    <article class="intro">
      <div class="intro__inner">
        <p class="intro__tit" data-aos-anchor-placement="top-bottom" data-aos-offset="-500" data-aos="fade" data-aos-duration="2000">every artist<br>was<br>first an amateur</p>
        <div class="intro__box-sns">
          <p class="intro__box-sns__sns">
            <a href="https://www.youtube.com/channel/UCaTvJnTdGJZSz0R3g_XcZKw" target="_blank">
              <img src="@img/icon-youtube-mo.png" alt="" srcset="@img/icon-youtube-mo.png 1x, @img/icon-youtube-mo@2x.png 2x">
              <img src="@img/icon-youtube.png" alt="" srcset="@img/icon-youtube.png 1x, @img/icon-youtube@2x.png 2x">
            </a>
          </p>
          <p class="intro__box-sns__sns">
            <a href="https://www.instagram.com/art.udent/" target="_blank">
              <img src="@img/icon-insta-mo.png" alt="" srcset="@img/icon-insta-mo.png 1x, @img/icon-insta-mo@2x.png 2x">
              <img src="@img/icon-insta.png" alt="" srcset="@img/icon-insta.png 1x, @img/icon-insta@2x.png 2x">
            </a>
          </p>
        </div>
      </div>
    </article>

    <article class="about" id="about" data-aos-anchor-placement="top-bottom" data-aos="fade-up" data-aos-duration="1500">
      <title-box>who we are</title-box>
      <desc-box>
        ARTUDENT는 학생 작가 및 예비작가에게<br class="mo"> 다양한 온/오프라인 지원 서비스를 제공함으로써<br class="mo"> 작가들의 가치를 높이는 서비스 플랫폼입니다.<br class="mo"><br>
        국내 학생작가는 낮은 인지도와 경력의 부족함으로 인하여,<br class="mo"> 작가로서 활동할 수 있는 기회가 축소되고 있습니다.<br class="mo"><br>
        학생작가의 활동을 지원하는 다양한 서비스를 통해<br class="mo"> 유망한 작가를 발견하고 성장시키며,<br class="mo"> 작가로서의 새로운 가치를 발견하도록 도와줍니다.<br class="mo"><br>
        플랫폼 내에 다양한 작가 지원 서비스를 통해<br class="mo"> 작가들은 경력 부족에 대한 문제를 해결하고,<br>
        더불어 작품촬영, 전시, 판매, 그리고 홍보까지의 작품활동에 대한 고민을 해결합니다. 
      </desc-box>
      <hr>
      <desc-box>
        나아가 ARTUDENT는 '예술의 대중화'라는 브랜드 철학을 필두로<br class="mo"> 신세대 예술가들을 통해 국내 미술시장을 활성화하고<br> 
        전 세계의 미술 시장을 새롭게 변화시키는 것을 목표로 하고 있습니다.
      </desc-box>
    </article>

    <article class="service" id="service">
      <title-box>service</title-box>
      <div class="service__wrap">
        <circle-item :items="circleItems"></circle-item>
      </div>
    </article>

    <article class="want line-bottom" id="want">
      <title-box>we want you</title-box>
      <div class="want__desc">
        미대생들의 졸업 전시회가 시작되는 10월에는<br class="mo"> 스튜디오와의 협업을 통한 온라인 작품 전시,<br>
        12월에는 서울 일러스트 페어에 소속 작가들의 작품을 전시함으로써<br class="mo"> ARTUDENT의 첫 시작을 준비하고 있습니다
      </div>
      <process-item :items="processItems"></process-item>
    </article>

    <article class="join line-bottom" id="join" data-aos-anchor-placement="top-bottom" data-aos-offset="-1000" data-aos="fade-up" data-aos-duration="2000">
      <title-box>join</title-box>
      <join-form></join-form>
    </article>

    <article class="contact" id="contact">
      <title-box>contact</title-box>
      <div class="contact__wrap">
        <div class="contact__box-map" id="mapBox"></div>
        <info-item :items="infoItems"></info-item>
      </div>
    </article>
  </section>
</template>

<script>
import TitleBox from '../components/TitleBox'
import DescBox from '../components/DescBox'
import CircleItem from '../components/CircleItem'
import ProcessItem from '../components/ProcessItem'
import InfoItem from '../components/InfoItem'
import JoinForm from '../components/JoinForm.vue'
import AOS from 'aos'
import "aos/dist/aos.css"

export default {
  components: {
    TitleBox,
    DescBox,
    CircleItem,
    ProcessItem,
    InfoItem,
    JoinForm,
  },
  data() {
    return {
      circleItems: [
        {
          text: '온라인 / 오프라인 전시회',
          img: 'service-item01.png',
          img2x: 'service-item01@2x.png',
        },
        {
          text: '작가 홍보 및 홍보 영상 제작',
          img: 'service-item02.png',
          img2x: 'service-item02@2x.png',
        },
        {
          text: '스튜디오 비용 할인',
          img: 'service-item03.png',
          img2x: 'service-item03@2x.png',
          hover: true
        },
        {
          text: '작품가 예상 측정',
          img: 'service-item04.png',
          img2x: 'service-item04@2x.png',
          hover: true,
        }
      ],
      processItems: [
        {
          text: '하단 폼 입력',
          img: 'want-process01.png',
          img2x: 'want-process01@2x.png',
        },
        {
          text: '자사 확인 후 승인',
          img: 'want-process02.png',
          img2x: 'want-process02@2x.png',
        },
        {
          text: '가입 확인 메일 발송',
          img: 'want-process03.png',
          img2x: 'want-process03@2x.png',
        },
      ],
      infoItems: [
        {
          title: 'ARTUDENT',
          isFull: true,
          data: [
            {
              label: 'E-MAIL',
              cont: '<a href="mailto:master@artudent.co.kr">master@artudent.co.kr</a>'
            },
            {
              label: 'ADDRESS',
              cont: '서울특별시 성동구 행당로 79 129동 501호'
            }
          ]
        },
        {
          title: '개발팀',
          data: [
            {
              label: 'E-MAIL',
              cont: '<a href="mailto:yoona7553@gmail.com">yoona7553@gmail.com</a>'
            },
          ]
        },
        {
          title: '마케팅팀',
          data: [
            {
              label: 'E-MAIL',
              cont: '<a href="mailto:ghk3218@gmail.com">ghk3218@gmail.com</a>'
            },
          ]
        },
        {
          title: '디자인팀',
          data: [
            {
              label: 'E-MAIL',
              cont: '<a href="mailto:junwon2008@naver.com">junwon2008@naver.com</a>'
            },
          ]
        },
        {
          title: '영업팀',
          data: [
            {
              label: 'E-MAIL',
              cont: '<a href="mailto:de32ws@daum.net">de32ws@daum.net</a>'
            },
          ]
        },
      ],
    }
  },
  created() {
    AOS.init({
      once: true
    });
  },
  mounted() {
    window.kakao && window.kakao.maps ? this.initMap() : this.addMapScript();
  },
  methods: {
    initMap() {
      const mapBox = document.getElementById('mapBox');
      const options = {
        center: new kakao.maps.LatLng(37.5582053468995, 127.027507006183),
        level: 3,
      }
      const map = new kakao.maps.Map(mapBox, options);

      const marker = new kakao.maps.Marker({
        position: map.getCenter()
      })
      marker.setMap(map);
    },
    addMapScript() {
      const script = document.createElement('script');
      script.onload = () => kakao.maps.load(this.initMap);
      script.src = `http://dapi.kakao.com/v2/maps/sdk.js?autoload=false&appkey=f26695b3b580641220eab6717ce50820`;
      document.head.appendChild(script);
    }
  }
}
</script>

<style lang="scss" scoped>
@import '@scss/layout/main.scss';
</style>
<style lang="scss">
// aos
  html:not(.no-js) [data-aos=fade-up]:not(article) {
    transform: translate3d(0, 20px, 0);
  }
  @media (min-width:1068px) {
    body {zoom:0.7;}
  }
  @media (min-width:1660px) {
    body {zoom:0.8;}
  }
</style>