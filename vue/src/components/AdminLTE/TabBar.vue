<template>
  <div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
      <template v-for="(item, index) in tabs">
        <li :key="index">
          <router-link :to="item.link">{{ item.title }}</router-link>
        </li>
      </template>
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
