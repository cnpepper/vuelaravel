import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

// 0. 如果使用模块化机制编程，导入Vue和VueRouter，要调用 Vue.use(VueRouter)
// 1. 定义 (路由) 组件。
// 可以从其他文件 import 进来
import Layout from '@/views/layout/layout'
import Login from '@/views/home/login'
import Home from '@/views/home/home'

// mysql 管理页面
import CheckSql from '@/views/control/mysql/check'
import SelectSql from '@/views/control/mysql/select'
import QuerySql from '@/views/control/mysql/query'

// 2. 定义路由
export default new Router({
  routes: [
    {
      path: '/',
      component: Login
    },
    {
      path: '/app',
      component: Layout,
      children: [{
          path: '/home',
          component: Home
        },
        {
          path: '/check',
          component :CheckSql
        },
        {
          path: '/select',
          component :SelectSql
        },
        {
          path: '/query',
          component :QuerySql
        }
      ]
    },
  ]
})
