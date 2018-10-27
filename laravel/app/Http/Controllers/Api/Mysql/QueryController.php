<?php

namespace App\Http\Controllers\Api\Mysql;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @api {post} url/user 查询SQL申请列表
 *
 * @apiVersion 0.1.0
 * @apiName Nan
 * @apiGroup Mysql
 * @apiDescription 新建SQL语句供人审核后执行修改线上数据库
 *
 * @apiSuccess {Number} code 状态码0为成功,非0为失败
 * @apiSuccess {String} msg 错误信息
 * @apiSuccess {Object} data 返回json对象
 *
 * @apiSuccessExample {json} Response:
 *     {
 *       "status": 0,
 *       "info": []
 *     }
 */
class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->m_control_name = '\Mysql\QueryController';

        try {
            
            $req = $request->all();
            Log::debug($this->m_control_name,$req);
            //创建待审核的SQL语句
            $db = DB::table('sql_create_sql as scs')
            ->join('users as us', 'us.id', '=', 'scs.creator')
            ->select(
                'scs.sentence', 'scs.status', 'us.name as creator', 'scs.check_user', 
                'scs.check_time', 'scs.created'
            );
            if(!empty($req['user_id'])){
                $db->where('creator',$req['user_id']);
            }
            $res = $db->get();
            return $this->returnInfo(0, 'ok', $res);
        
        } catch (Exception $e) {
            return $this->returnInfo(-1, $e->getMessage());
        }

    }
}
