<template>
  <div class="wrapper skin-blue-light">
    <NaviBar :logo-text="logoText" :logo-mini-text="logoMiniText"/>
    <SideBar :menus="menus"/>
    <div class="content-wrapper">
      <section class="content-header">
        {{ $route.name }}
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


  import {mapState} from "vuex";

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
      ])
    }

  }
</script>

<style scoped>

</style>
