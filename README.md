# vuelaravel
参考大神的前端项目练习写的后台系统

现在前端主要开发客户端版本

clectron-project 项目是打包客户端代码
laravel 是服务端代码
vue 是web端代码

目前项目主要用来练习全栈建构和熟悉使用vue+laravel

技术栈

前端
vue
vuex
axios
elementUI
webpakage

后端
laravel
dingo
passport
laravel-cors
laravel-pormission

客户端
clectron-vue

其他工具

目录说明
clectron 客户端目录
laravel 服务端目录 主要说下有区别的目录
app 目录下边新增了 domain目录和model目录，model目录官方文档有介绍就不多说了。主要讲解下domain目录的作用。
domain主要是参考领域设计，作为项目的业务逻辑层存在，而controller主要是接口层，逻辑很薄。而model层也可以写业务逻辑，
但是当业务逻辑的量很大的时候，在跟数据库操作会很乱。所以还是把model作为数据交互层。
真正的业务逻辑都写在业务层domain里，可以增强代码的复用，解决业务之间的耦合性还有接口跟业务冲突等问题。
vue web端目录

生成API文档的命令
php artisan api:docs --name APIDoc --use-version v1 --output-file ./App/Http/Apidoc/readme.md
