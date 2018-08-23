const Mock = require('mockjs');

Mock.mock(`/mock\/example`, 'get', {
  'data|1-2':[{
    'title':'@title',
    'article':'@csentence'
  }]
});
