import studentRoute from './modules/studentRoutes';

/**
 *
 */
export default [
  {
    path: '',
    component: () => import('@/components/AdminLTE'),
    redirect: 'home',
    children: [
      {
        name: '首页',
        path: 'home',
        components: {
          mainContent: () => import('@/components/Home/index')
        },
        meta: {
          requireAuth: true,
          role: ['admin, student'],
          hidden: false
        },
      },
      {
        name: '所有学生信息',
        path: 'all-students',
        components: {
          mainContent: () => import('@/components/AllStudents')
        },
        meta: {
          role: ['admin']
        }
      },
      studentRoute
    ]
  },
  {
    name: '登录',
    path: '/login',
    component: () => import('@/components/login'),
    meta: {
      requireAuth: false
    },
  },

];
