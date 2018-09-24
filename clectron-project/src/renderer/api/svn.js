//根目录加载封装过的axios类
import request from './request.js'

export function asSvnUpdate(){
    return request({
        url:'/svn_update',
        method:'post',
    })
}