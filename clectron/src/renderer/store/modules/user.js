// 加载API接口
import {
  axUserLogin
} from '@/api/userLogin'

const state = {
  token: ''
}

const getters = {
  GetToken: state => {
    return state.token
  }
}

const mutations = {
  SET_TOKEN(state, token) {
    state.token = token
  }
}

const actions = {
  UserLogin(context, login_form) {
    return new Promise((resolve, reject) => {
      //请求登录API
      axUserLogin(login_form.email, login_form.password).then(response => {
        console.log(response)
        let code = response.data.code
        if (0 == code) {
          let user_token = response.data.result.token
          //Cookies.set('USER_LOGIN_TOKEN', user_token) 客户端先不设定cookie
          context.commit('SET_TOKEN', user_token)
        }
        resolve(status)
      }).catch(error => {
        reject(error)
      })
    })
  }
}

export default {
  state,
  getters,
  mutations,
  actions
}