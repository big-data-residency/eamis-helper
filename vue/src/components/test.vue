<template>
  <button
    class="btn btn-primary"
    @click="submit">{{ msg }}</button>
</template>

<script>

  export default {
    name: 'Test',
    props: {
      msg: {
        type: String,
        default: '',
      }
    },
    data: function() {
      return {data: this.msg};
    },
    methods: {
      submit: function () {
        this.$axios({
          type: 'get',
          url: '/student/index',
          data: {},
        })
      }
    }
  }
</script>
