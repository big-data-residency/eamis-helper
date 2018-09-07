import setting from './settting';
import axios from 'http';

export default {
  Login(token){
    localStorage.setItem(setting.userToken, token);
  },

  authenticated(){
    let t = localStorage.getItem(setting.userToken);
    return t && t.length > 0;
  },

  getToken(){
    return localStorage.getItem(setting.userToken);
  },

  Logout(){
    localStorage.setItem(setting.userToken, '');
  }
}

