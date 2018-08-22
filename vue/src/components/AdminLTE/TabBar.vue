<template>
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <template v-for="(item, index) in tabs">
        <li :key="index">
          <router-link :to="item.link">{{ item.title }}</router-link>
        </li>
      </template>
      <!--<li>-->
      <!--<router-link to="/student-info/timeline">时间线</router-link>-->
      <!--</li>-->
      <!--<li>-->
      <!--<router-link to="/student-info/setting">设置</router-link>-->
      <!--</li>-->
    </ul>
    <div class="tab-content">
      <router-view name="studentTabContent"></router-view>
    </div>
  </div>
</template>
<script>
  export default {
    name: 'TabBar',
    props: {
      tabs: {
        type: Array,
        default: function () {
          return [];
        }
      }
    },
  }
</script>
