import Vue from "vue";
import Vuex from "vuex";
import getters from './getters';

import student from './modules/student';

Vue.use(Vuex);

export default new Vuex.Store({
  strict: true,
  modules: {
    student,
  },
  state: {
    logoText: "eamis-helper",
    logoMiniText: "e-helper",
    menus: [
      {
        path: "/StudentInfo",
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
        path: "/all-students",
        icon: "heart",
        text: "查看所有用户信息"
      }
    ],
    studentTab: [
      {
        link: '/StudentInfo/timeline',
        title: '时间线',
      }, {
        link: '/StudentInfo/setting',
        title: '设置',
      }
    ]
  },
  getters: getters,
  mutations: {

  },
  actions: {

  }
});

