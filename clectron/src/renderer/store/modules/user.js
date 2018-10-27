// 加载API接口
import {
  axUserLogin
} from '@/api/userLogin'

const state = {
  user_id:0,
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
  },
  SET_USER_ID(state, user_id) {
    state.user_id = user_id
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
          let user_id = response.data.result.user
          //Cookies.set('USER_LOGIN_TOKEN', user_token)
          context.commit('SET_TOKEN', user_token)
          context.commit('SET_USER_ID', user_id)
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