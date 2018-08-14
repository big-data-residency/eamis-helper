# vue

> eamis-helper's frontend

## vue前端结构

> |-- build                                      // 项目构建(webpack)相关代码<br/>
> |   |-- build.js                             // 生产环境构建代码<br/>
> |   |-- check-version.js             // 检查node、npm等版本<br/>
> |   |-- dev-client.js                    // 热重载相关<br/>
> |   |-- dev-server.js                  // 构建本地服务器<br/>
> |   |-- utils.js                             // 构建工具相关<br/>
> |   |-- webpack.base.conf.js  // webpack基础配置<br/>
> |   |-- webpack.dev.conf.js    // webpack开发环境配置<br/>
> |   |-- webpack.prod.conf.js  // webpack生产环境配置<br/>
> |-- config                                  // 项目开发环境配置<br/>
> |   |-- dev.env.js                      // 开发环境变量<br/>
> |   |-- index.js                         // 项目一些配置变量<br/>
> |   |-- prod.env.js                   // 生产环境变量<br/>
> |   |-- test.env.js                     // 测试环境变量<br/>
> |-- src                                       // 源码目录<br/>
> |   |-- components                // vue公共组件<br/>
> |   |-- store                             // vuex的状态管理（尚未安装）<br/>
> |   |-- App.vue                       // 页面入口文件<br/>
> |   |-- main.js                        // 程序入口文件，加载各种公共组件<br/>
> |-- static                                // 静态文件，比如一些图片，json数据等<br/>
> |   |-- data                        <br/>
> |-- .babelrc                            // ES6语法编译配置<br/>
> |-- .editorconfig                   // 定义代码格式<br/>
> |-- .gitignore                         // git上传需要忽略的文件格式<br/>
> |-- README.md                   // 项目说明<br/>
> |-- favicon.ico <br/>
> |-- index.html                       // 入口页面<br/>
> |-- package.json                  // 项目基本信息<br/>
> .<br/>

**注意事项**：
1. 静态文件存放目录有`/src/assets`和`/static`，`/src/assets`应该是用来存放页面中的静态文件的比如`css`、`js`、`png`而`/static`下应该是存放的是用户能够下载的资源？比如用户上传的文件、用户头像等
2. `vuex`所需的`/src/store`尚未生成，等待使用的时候在弄吧
3. `/test`里包含了一些测试的模块，大概要好久之后才会用到吧



## Build Setup

``` bash
# install dependencies
npm install

# serve with hot reload at localhost:8080
npm run dev

# build for production with minification
npm run build

# build for production and view the bundle analyzer report
npm run build --report

# run unit tests
npm run unit

# run e2e tests
npm run e2e

# run all tests
npm test
```

For a detailed explanation on how things work, check out the [guide](http://vuejs-templates.github.io/webpack/) and [docs for vue-loader](http://vuejs.github.io/vue-loader).
