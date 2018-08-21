// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import axios from 'axios'

import AdminLTE from '@/components/AdminLTE/AdminLTE';
import Home from '@/components/Home';
import StudentInfo from '@/components/StudentInfo';

Vue.config.productionTip = false;
// axios
Vue.prototype.$axios = axios;
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;


/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: {App, AdminLTE, Home, StudentInfo},
  template: `<AdminLTE/>`
});
