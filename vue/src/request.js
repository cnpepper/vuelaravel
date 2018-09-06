import axios from 'axios'

// 创建axios实例
const service = axios.create({
    baseURL: '',
    timeout: 0
})

service.interceptors.request.use(
    config=> {
        // 添加token
        return config
    },
    error=>{
        // Do something with request error
        console.log(error) // for debug
        Promise.reject(error)
    }
    
)

export default service