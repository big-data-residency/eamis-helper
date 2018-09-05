import setting from './settting';
export default {
  Login(data){
    localStorage.setItem(setting.userToken, data);
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
