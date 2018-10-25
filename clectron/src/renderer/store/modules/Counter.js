// 加载API接口
import {axUserLogin} from '@/api/userLogin'

const state = {
  main: 0,
  token: ''
}

const getters = {
  authToken: state => {
    console.log('state-token:' + state.token)
    return state.token
  }
}

const mutations = {
  DECREMENT_MAIN_COUNTER (state) {
    state.main--
  },
  INCREMENT_MAIN_COUNTER (state) {
    state.main++
  },
  SET_TOKEN(state, token) {
    console.log('toke:' + token)
    state.token = token
    console.log('set-token:' + state.token)
  }
}

const actions = {
  someAsyncTask ({ commit }) {
    // do something async
    commit('INCREMENT_MAIN_COUNTER')
  },
  UserLogin(context, login_form) {
    return new Promise((resolve, reject) => {
      //请求登录API
      axUserLogin(login_form.email, login_form.password).then(response => {
        console.log(response);
        let status = response.data.status
        if (0 == status) {
          let user_token = response.data.info.token
          //Cookies.set('USER_LOGIN_TOKEN', user_token)
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
