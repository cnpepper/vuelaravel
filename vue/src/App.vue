<template>
  <div id="app">
    <h1>Hello App!</h1>
  <p>
    <!-- 使用 router-link 组件来导航. -->
    <!-- 通过传入 `to` 属性指定链接. -->
    <!-- <router-link> 默认会被渲染成一个 `<a>` 标签 -->
    <router-link to="/hello">Go to Hello</router-link>
  </p>
  <!-- 路由出口 -->
  <!-- 路由匹配到的组件将渲染在这里 -->
  <el-button v-on:click="foo">登录</el-button>
  <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'app',
  methods:{
    foo(){
        // vuex提交登录
        this.$store.dispatch('login')
    }
  }
}
</script>

<style>
</style>
