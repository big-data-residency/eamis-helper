<template>
  <div class="login-box">
    <div class="login-logo">
      <router-link to="/">
        <b>Eamis</b>-helper
      </router-link>
    </div>
    <div class="login-box-body">
      <p class="login-box-msg">登录</p>
      <form id="login-form" @submit.once="login">
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
            <input v-model="rememberMe" type="checkbox" title="remember-me"> Remember Me
          </div>
          <div class="col-md-4">
            <button id="login-button" class="btn btn-default btn-block" type="button" @click="login">Sign in</button>
          </div>
        </div>
      </form>
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

  import Auth from '@/utils/auth';


  export default {
    name: "Login",
    data: function () {
      return {
        username: '',
        password: '',
        rememberMe: false,
      }
    },

    mounted: function () {

    },

    methods: {
      login: function () {
        this.$axios.post('/auth/login',{
          username: this.username,
          password: this.password,
          rememberMe: this.rememberMe
        }).then((res) => {
            if (res.data.token) {
              Auth.Login(res.data.token);
              this.$router.push({path: '/'});
            }
            else {
              alert('服务器错误');
            }
          }).catch(err => {
            console.log(err);
          })
      }
    }
  }
</script>

<style scoped>

</style>
