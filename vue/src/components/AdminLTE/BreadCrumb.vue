<template>
  <ol class="breadcrumb">
    <router-link to="/">
      <i class="fa fa-home"></i>
    </router-link>
    <template v-for="(item, index) in $route.matched">
      <li :key="index">
        <router-link :to="item.path ===''? '/' : item.path">
          {{ item.name }}
        </router-link>
      </li>
    </template>
  </ol>
</template>

<script>
  export default {
    name: "BreadCrumb",
  }
</script>

<style scoped>
  ol > a {
    color: #444;
  }
</style>
