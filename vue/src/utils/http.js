import axios from 'axios';
import router from '../router';
import Auth from './auth';

axios.defaults.timeout = 30000;
axios.defaults.baseURL = process.env.AXIOS_BASE_URL;

axios.interceptors.request.use(
  config => {
    if (Auth.authenticated()) {
      let token = Auth.getToken();
      config.headers.common['Authorization'] = `Bearer ${token}`;
    }
    return config;
  },
  error => {
    return Promise.reject(error);
  }
);

axios.interceptors.response.use(
  response => {
    return response;
  },
  error => {
    if (error.response) {
      let err = error.response.data;
      switch (error.response.status) {
        case 401:
          Auth.Logout();
          router.replace({
            path: '/login',
          });
          break;

        case 500:
          console.log(err.message);
          if (err['stack-trace'] && err['stack-trace'].length > 0) {
            err['stack-trace'].forEach(stack => console.log(stack))
          }
          break;

        default:
          console.log(error.response.data);
      }
    }
    return Promise.reject(error);
  }
);

export default axios;

