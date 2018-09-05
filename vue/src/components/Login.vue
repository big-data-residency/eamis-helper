<template>
  <div class="login-box">
    <div class="login-logo">
      <router-link to="/">
        <b>Eamis</b>-helper
      </router-link>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">登录</p>
      <form @submit.prevent="login">
        <div class="form-group has-feedback">
          <input v-model="username" type="text" name="username" placeholder="请输入用户名" title="username"
                 class="form-control"/>
          <i class="fa fa-user form-control-feedback"></i>
        </div>
        <div class="form-group has-feedback">
          <input v-model="password" type="password" name="password" placeholder="请输入密码" title="password"
                 class="form-control">
          <i class="fa fa-lock form-control-feedback"></i>
        </div>

        <div class="row">
          <div class="col-md-8">
            <input type="checkbox" title="remember-me"> Remember Me
          </div>
          <div class="col-md-4">
            <button class="btn btn-default btn-block" type="submit" @click="login">Sign in</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import Auth from '@/utils/auth';

  export default {
    name: "Login",
    data: function () {
      return {
        username: '',
        password: '',
      }
    },

    mounted: function () {

    },

    methods: {
      login: function () {
        let obj = {
          username: this.username,
          password: this.password
        };
        this.$axios.post('/auth/login', obj)
          .then((res) => {
            if (res.data.success) {
              Auth.Login(res.data.token);
              this.$router.push({path: '/'});
            }
            else {
              alert("密码错误");
            }
          })
      }
    }
  }
</script>

<style scoped>

</style>
