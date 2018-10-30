//根目录加载封装过的axios类
import request from './request.js'

export function asPermissionCreate(data){
    return request({
        url:'/permission_create',
        method:'post',
        data
    })
}

export function asPermissionGive(data){
    return request({
        url:'/permission_give',
        method:'post',
        data
    })
}