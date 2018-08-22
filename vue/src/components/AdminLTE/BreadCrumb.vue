<template>
  <ol class="breadcrumb">
    <i class="fa fa-home"></i>
    <template v-for="(item, index) in $route.meta.crumbList">
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

</style>
