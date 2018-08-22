import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    logoText: "eamis-helper",
    logoMiniText: "e-helper",
    menus: [
      {
        path: "/student-info",
        icon: "user",
        text: "用户首页"
      }, {
        path: "javascript:void(0);",
        icon: "book",
        text: "查看所有课程"
      }, {
        path: "javascript:void(0);",
        icon: "bookmark",
        text: "查看已修课程"
      }, {
        path: "javascript:void(0);",
        icon: "edit",
        text: "推荐课程"
      }, {
        path: "javascript:void(0);",
        icon: "heart",
        text: "查看所有用户信息"
      }
    ],
    studentTab: [
      {
        link: '/student-info/timeline',
        title: '时间线',
      }, {
        link: '/student-info/setting',
        title: '设置',
      }
    ]
  },
  getters: {

  },
  mutations: {

  },
  actions: {

  }
});

