//根目录加载封装过的axios类
import request from './request.js'

export function asTest(data){
    return request({
        url:'/test/test',
        method:'post',
        data
    })
}