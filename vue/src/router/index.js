import Vue from 'vue';
import Router from 'vue-router';

import AdminLTE from '@/views/AdminLTE';
import Home from '@/components/Home';
import StudentInfo from '@/components/StudentInfo';
import StudentTimeline from '@/components/Timeline';
import StudentSetting from '@/components/StudentSetting';

Vue.use(Router);

/**
 * @type {{name: string, path: string, component: {name, components, data, computed}, children: *[]}[]}
 * @name string 页面名字
 * @path string 页面路径
 * @component(s) :{view-name: component}
 * @alias 用于调用默认渲染的组件
 */
const pathList = [
  {
    name: '首页',
    path: '/',
    component: AdminLTE,
    children: [
      {
        path: '/home',
        components: {mainContent: Home},
        alias: ''
      },
      {
        name: '学生信息',
        path: 'student-info',
        components: {mainContent: StudentInfo},
        children: [
          {
            name: '时间线',
            path: 'timeline',
            components: {studentTabContent: StudentTimeline},
            alias: ''
          },
          {
            name: '设置',
            path: 'setting',
            components: {studentTabContent: StudentSetting}
          }
        ]
      }
    ]
  }
];

const router = new Router({
  routes: pathList,
  mode: 'history'
});

const crumbList = [];

router.beforeEach((to, from, next) => {
  to.meta.crumbList = to.matched;
  next()
});

export default router;
