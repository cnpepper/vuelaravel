import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

// 加载API接口
import { login } from '@/api/login'

const store = new Vuex.Store({
  state: {
    count: 0,
    token: ''
  },
  mutations: {
    increment (state) {
      state.count++
    },
    login(state,token){
        state.token = token
        console.log(state.token)
    }
  },
  actions: {
    login (context) {
        login().then(response=>{
            context.commit('login',response.data.success.token)
        })
    }
  }
})

export default store