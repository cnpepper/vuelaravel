//根目录加载封装过的axios类
import request from '../request.js'

export function asTestQuery(){
    return request({
        url:'/test/query',
        method:'post',
    })
}