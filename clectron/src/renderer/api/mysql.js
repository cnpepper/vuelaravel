//根目录加载封装过的axios类
import request from './request.js'

export function asCreateSql(data){
    return request({
        url:'/create_sql',
        method:'post',
        data
    })
}

export function asQuerySql(){
    return request({
        url:'/query_sql',
        method:'post',
    })
}