<template>
  <div class="container">
    <div class="row clearfix">
      <div class="col-md-12">
        <Banner></Banner>
      </div>
    </div>
  </div>

</template>

<script>

  import Banner from './Banner';
  import Desk from './Desk';

  export default {
    name: "Home",
    components: {
      Banner,
      Desk
    },
    data: function () {
      return {
        msg: "我是首页"
      };
    }
  }
</script>

<style scoped>

</style>
