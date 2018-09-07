import Auth from "@/utils/auth";
import axios from '@/utils/http';
export default {
  state: {
    basic_info: {}
  },

  mutations: {
    SET_INFO: (state, info) => {
      state.basic_info = info;
    }
  },

  actions: {
    getUserInfo({commit, state}) {
      return new Promise((resolve, reject) => {
        axios.get('student/info',{
          params: Auth.getToken()
        }).then(res => {
          resolve(res);
        }).catch(err => {
          reject(err);
        })
      })
    }
  }
}
