const studentRoutes = {
  name: '学生信息',
  path: 'student/:id',
  redirect: 'student/:id/timeline',
  components: {mainContent: () => import('@/components/StudentInfo/index')},
  children: [
    {
      name: '时间线',
      path: 'timeline',
      components: {studentTabContent: () => import('@/components/timeline')},
    },
    {
      name: '设置',
      path: 'setting',
      components: {studentTabContent: '@/components/studentSetting'}
    }
  ],
  meta: {
    role: ['admin', 'student']
  }
};

studentRoutes.children.forEach(child => {
  child.meta = child.meta || studentRoutes.meta;
});

export default studentRoutes;
