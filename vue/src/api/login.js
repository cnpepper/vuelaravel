//根目录加载封装过的axios类
import request from '@/request.js'

export function login(email,password){
    return request({
        url:'http://homestead.test/api/login',
        method:'post',
        data:{
            email:'liujianjun@wangdian.cn',
            password:'111111'
        }
    })
}