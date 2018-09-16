import Vue from 'vue'
import Vuex from 'vuex'
import Cookies from 'js-cookie'
Vue.use(Vuex)

//mutations名称常量

// 加载API接口
import {
  axUserLogin
} from '@/api/login'

const store = new Vuex.Store({
  state: {
    count: 0,
    token: ''
  },
  mutations: {
    SET_TOKEN(state, token) {
      state.token = token
    }
  },
  actions: {
    UserLogin(context,login_form) {
      return new Promise((resolve, reject) => {
        if (!Cookies.get('USER_LOGIN_TOKEN')) {
          axUserLogin(login_form.email,login_form.password).then(response => {
            let user_token = response.data.success.token;
            Cookies.set('USER_LOGIN_TOKEN', user_token)
            context.commit('SET_TOKEN', user_token)
            resolve()
          }).catch(error => {
            reject(error)
          })
        }
      })
    }
  }
})

export default store