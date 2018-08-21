import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import AdminLTE from '@/components/AdminLTE/AdminLTE';
import Home from '@/components/Home';
import StudentInfo from '@/components/StudentInfo';
import StudentTimeline from '@/components/StudentTimeline';
import StudentSetting from '@/components/StudentSetting';


Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: '首页',
      components: {
        mainContent: Home
      }
    }, {
      path: '/student-info',
      name: "学生信息",
      components: {
        mainContent: StudentInfo
      },
      children: [
        {
          name: '时间线',
          path: 'timeline',
          components: {
            studentTab: StudentTimeline
          }
        }, {
          name: '设置',
          path: 'setting',
          components: {
            studentTab: StudentSetting
          }
        }
      ]
    }
  ],
  mode: 'history'
})
