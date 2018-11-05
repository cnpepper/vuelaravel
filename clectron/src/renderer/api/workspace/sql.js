//根目录加载封装过的axios类
import request from '@/api/request.js'

export function asCreateSql(data){
    return request({
        url:'/workspace/sql/create',
        method:'post',
        data
    })
}

export function asQuerySql(data){
    return request({
        url:'/workspace/sql/query',
        method:'post',
        data
    })
}

export function asCheckQuerySql(data){
    return request({
        url:'/workspace/sql/check_query',
        method:'post',
        data
    })
}