<template>
  <header class="main-header">
    <a href="index.html" class="logo">
      <span class="logo-mini">{{ logoMiniText }}</span>
      <span class="logo-lg">{{ logoText }}</span>
    </a>

    <nav class="navbar navbar-static-top">
      <a class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- left-top -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"> 10<!-- TODO --> </span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">you have 10 notifications</li>
              <li>
                <ul class="menu">
                  <template><!-- TODO v-for --></template>
                </ul>
              </li>
              <li class="footer">
                <a href="javascript:void(0);">View all</a>
              </li>
            </ul>

          </li>
          <li class="dropdown user user-menu">
            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
              <img src="./../../assets/default-avatar.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">EXAMPLE: USERNAME<!-- TODO --></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="./../../assets/default-avatar.jpg" class="img-circle" alt="User Image">
                <p>EXAMPLE: USER NAME
                  <small>EXAMPLE: SMALL INFO</small>
                </p>
              </li>
              <!--    -->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="javascript:void(0);" class="btn btn-default btn-flat">个人信息</a>
                </div>
                <div class="pull-right">
                  <a href="javascript:void(0);" class="btn btn-default btn-flat">退出登录</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
</template>

<script>
  export default {
    name: "NaviBar",
    props: {
      logoText: {
        default: "",
        type: String
      },
      logoMiniText: {
        default: "",
        type: String
      }
    }
  }
</script>

<!--<style scoped>-->

<!--</style>-->
