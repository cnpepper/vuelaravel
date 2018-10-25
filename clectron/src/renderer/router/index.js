import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

// 0. 如果使用模块化机制编程，导入Vue和VueRouter，要调用 Vue.use(VueRouter)
// 1. 定义 (路由) 组件。
// 可以从其他文件 import 进来
import Layout from '@/components/Layout'
import Login from '@/components/Login'
import Home from '@/components/Home'
import Svn from '@/components/Svn'

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
          path: '/svn',
          component: Svn
        },
      ]
    },
  ]
})