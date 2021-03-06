import axios from 'axios'
import store from '@/store'
import router from '../router'
// 创建axios实例
const service = axios.create({
    baseURL: 'http://admin.dev/api', // WIN
    //baseURL: 'http://homestead.test/api', // MAC
    timeout: 0
})

service.interceptors.request.use(
    config=> {
        // 添加token
        config.headers['Authorization'] = 'Bearer '+store.getters.GetToken
        return config
    },
    error=>{
        // Do something with request error
        //console.log(error) // for debug
        Promise.reject(error)
    }
    
)

service.interceptors.response.use(
    response=>{
        //todo..
        console.log(response)
        
        if(0 != response.data.code){
            // todo 给出警告
        }
        else{
            return response
        }
    },
    error=>{
        console.log(error)
        //router.push('/')
        return error
    }
)

export default service
