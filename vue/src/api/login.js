//根目录加载封装过的axios类
import request from '@/request.js'

export function axUserLogin(email,password){
    return request({
        url:'/login',
        method:'post',
        data:{
            email,
            password
        }
    })
}