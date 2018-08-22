// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import router from './router'
import store from './store'
import axios from 'axios'

Vue.config.productionTip = false;
// axios
Vue.prototype.$axios = axios;
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;


/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  template: `<router-view></router-view>`
});
