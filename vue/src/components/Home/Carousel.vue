<template>
  <swiper :options="swiperOption" class="swiper">
    <template v-for="(slide, index) in swiperSlides">
      <swiper-slide :key="index" style="width:100%;">
        <!--:style="'background-position: center;background-size: cover;height=200px;' + 'background: url(' + require('./../assets/banner/banner-'+(index+1)+'.png') + ');'"-->
        <!--  webpack 打包的时候图片的路径会变，需要require过来  -->
        <img :alt="'Banner-' + slide" :src="require('@/assets/banner/banner-' + (index+1) +'.png')"/>
      </swiper-slide>
    </template>
    <div slot="pagination" class="swiper-pagination"></div>
    <div slot="button-prev" class="swiper-button-prev"></div>
    <div slot="button-next" class="swiper-button-next"></div>
  </swiper>
</template>

<script>
  import 'swiper/dist/css/swiper.css';
  // noinspection ES6CheckImport
  import {swiper, swiperSlide} from 'vue-awesome-swiper';


  export default {
    name: "Banner",
    components: {
      swiper,
      swiperSlide
    },
    data: function () {
      return {
        swiperSlides: [1, 2, 3],
        swiperOption: {
          pagination: {
            el: '.swiper-pagination',
            clickable: true
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
          autoplay: {
            delay: 3000,
            stopOnLastSlide: false,
            disableOnInteraction: true
          },
          loop: true,
        },
      }
    },
  }
</script>

<style scoped>
  img {
    width: 100%;
    height: 100%
  }
</style>
