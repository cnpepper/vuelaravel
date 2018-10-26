import axios from 'axios'
import store from '@/store'

// 创建axios实例
const service = axios.create({
    baseURL: 'http://admin.dev/api',
    timeout: 0
})

service.interceptors.request.use(
    config=> {
        // 添加token
        config.headers['Authorization'] = 'Bearer '+store.getters.authToken
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
        if(200 != response.status){
            const hash = window.location.search.slice(1)
            window.opener.location.href = window.location.origin + '/' + hash
            window.close()
        }
        else{
            if(0 != response.data.code){
                // todo 给出警告
            }
            else{
                return response
            }
        }
    },
    error=>{
        console.log(error)
        //window.location.href= 'admin.dev'
        return error
    }
)

export default service
