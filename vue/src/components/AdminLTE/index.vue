<template>
  <div class="wrapper skin-blue-light">
    <NaviBar :logo-text="logoText" :logo-mini-text="logoMiniText" :user_info="user_info"/>
    <SideBar :menus="menus" :user_info="user_info"/>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>{{ $route.name }}&nbsp;</h1>
        <BreadCrumb></BreadCrumb>
      </section>
      <section class="content">
        <router-view name="mainContent"></router-view>
      </section>
    </div>
  </div>
</template>

<script>

  import "admin-lte/bower_components/bootstrap/dist/js/bootstrap";
  import "admin-lte/dist/js/adminlte";

  import "admin-lte/bower_components/bootstrap/dist/css/bootstrap.css";
  import "admin-lte/bower_components/font-awesome/css/font-awesome.css";
  import "admin-lte/dist/css/AdminLTE.css";
  import "admin-lte/dist/css/skins/_all-skins.min.css";


  import {mapState, mapGetters} from "vuex";

  import SideBar from "@/components/AdminLTE/SideBar";
  import NaviBar from "@/components/AdminLTE/NaviBar";
  import BreadCrumb from "@/components/AdminLTE/BreadCrumb";

  export default {
    name: "AdminLTE",
    components: {
      NaviBar,
      SideBar,
      BreadCrumb
    },
    data: function () {
      return {};
    },
    computed: {
      ...mapState([
        "logoText",
        "logoMiniText",
        "menus"
      ]),
      ...mapGetters([
        'user_info'
      ])
    }

  }
</script>

<style scoped>
  .content-wrapper {
    height: 100%;
  }

  .wrapper {
    overflow: hidden;
  }
</style>
