# eamis-helper

## 开始

1. 软件安装
   - 安装`xampp`，选择`php`为7以上的版本
   - 安装`composer`
   - 安装`Node.js`
2. 将项目拷贝至`xampp`安装目录下的`htdocs`目录下
3. 在`vue` 和`micro-app`目录下分别用命令行执行`npm install` `composer install`安装所需的第三方插件
4. 把`.env`拷贝置`micro-app`目录下
5. 项目启动
   1. 开启`xampp`启动`Apache`、`mysql`开启`yii`后端（如果`mysql`已经通过其他方式启动就不用启动`mysql`了）
   2. 在`vue`目录下使用命令行执行`npm run dev`启动`vue`前端
   3. 这时应该能够通过```http://localhost:8080```和`http://localhost/eamis-helper/micro-app/web/{ controllerName }/{ actionName }`来访问`vue`前端、和`yii`后端接口



## 连接数据库

在`.env`中能找到



## 文件目录

> |-- micro-app                                      // yii 后端代码

> |   |-- README.md                            // 后端代码说明

> |-- vue                                        	     // vue 前端代码

> |   |-- README.md                            // 前端代码说明
> .



## 学习资料

- `vue`我也不知道
- `yii`
  - https://www.yiichina.com/doc/guide/2.0 官方文档
  - https://www.imooc.com/learn/404  一个基础的视频教程能让你快速能够写yii代码不过它包括了MVC三个模块，而我们只用了Model、Controller两个模块，关于接口的部分还得再找找
  - https://www.yiichina.com/doc/guide/2.0/rest-quick-start RESTful APIs



