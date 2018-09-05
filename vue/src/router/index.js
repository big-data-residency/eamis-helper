import Vue from 'vue';
import Router from 'vue-router';
import routes from './routes';
import Auth from '@/utils/auth';
Vue.use(Router);

const router = new Router({
  routes: routes,
  mode: 'history'
});

router.beforeEach((to, from, next) => {
  console.log(to.matched);
  console.log(Auth.authenticated()? "authenticated": "unauthenticated");
  if (to.meta.requireAuth && !Auth.authenticated()) {
    next({
      path: '/login',
    })
  }
  else {
    next();
  }
});

export default router;
