<template>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/static/images/avatars/default.jpg" class="img-circle" alt="User Image">
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
          <router-link :to="item.path" :key="index" tag="li" active-class="active">
            <a>
              <i :class="['fa', 'fa-' + item.icon]"></i>
              <span>{{ item.text }}</span>
            </a>
          </router-link>
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
        type: Array,
        default: function () {
          return [];
        }
      }
    },
    computed: {
      path: function () {
        console.log(location);
        return location.pathname;
      }
    },

    mounted: function () {
      console.log(this.$route);
    }
  }
</script>

<style scoped>

</style>
