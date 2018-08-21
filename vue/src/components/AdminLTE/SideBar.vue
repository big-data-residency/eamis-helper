<template>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="./../../assets/default-avatar.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-right">
          <p>EXAMPLE: USER NAME</p>
          <a href="javascript:void(0);">
            <i class="fa fa-circle text-success">
              Online
            </i>
          </a>
        </div>
      </div>

      <ul class="sidebar-menu tree">
        <li class="header">
          EAMIS-HELPER
        </li>
        <template v-for="(item, index) in menus">
          <li :key="index">
            <!--<a :href="item.path">-->
            <!--<i :class="['fa', 'fa-' + item.icon]"></i>-->
            <!--<span>{{ item.text }}</span>-->
            <!--</a>-->
            <router-link :to="item.path">
              <i :class="['fa', 'fa-' + item.icon]"></i>
              <span>{{ item.text }}</span>
            </router-link>
          </li>
        </template>
      </ul>
    </section>
  </aside>
</template>

<script>
  export default {
    name: "SideBar",
    props: {
      menus: {
        default: function () {
          return [];
        },
        type: Array
      }
    },
    computed: {
      path: function () {
        return location.pathname;
      }
    }
  }
</script>

<style scoped>

</style>
