import Vue from 'vue';
import Router from 'vue-router';
import store from '@/store'
import routes from './routes';
import Auth, {getInfo} from '@/utils/auth';

Vue.use(Router);

const router = new Router({
  routes: routes,
  mode: 'history'
});

router.beforeEach((to, from, next) => {
  console.log('beforeEach');
  if (Auth.authenticated()) {
    console.log('authenticated');
    if (to.path === '/login') {
      /* auto Login */
      next();
    } else {
      if (true) {
        console.log('getINfo');
        store.dispatch('getUserInfo').then(res => {
          store.commit('SET_INFO', res.data);
        })
      }
      next();
    }
  } else {
    if(to.path === '/login') {
      next();
    } else {
      next('/login');
    }
  }
});

export default router;
