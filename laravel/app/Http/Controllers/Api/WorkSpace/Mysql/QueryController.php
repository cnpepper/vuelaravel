<?php

namespace App\Http\Controllers\Api\Mysql;

use App\Domain\Mysql\QuerySql;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

/**
 * 数据库模块
 *
 * @Resource("Api", uri="/mysql")
 */
class QueryController extends Controller
{
/**
 * 查询SQL语句
 *
 * 查询用户提交的SQL语句。
 *
 * @Post("/query")
 * @Versions({"v1"})
 * @Parameters({
 *      @Parameter("page", description="The page of results to view.", default=1),
 *      @Parameter("limit", description="The amount of results per page.", default=10)
 * })
 * @Transaction({
 *      @Request({"username": "foo", "password": "bar"}),
 *      @Response(200, body={"id": 10, "username": "foo"}),
 *      @Response(422, body={"error": {"username": {"Username is already taken."}}})
 * })
 */
    public function index(Request $request)
    {
        try {
            $req = $request->all();
            //创建待审核的SQL语句
            $sql = new QuerySql();
            $user_id = Auth::id();
            $res = $sql->Query($user_id);
            return $this->returnInfo(0,'ok',$res);
        } catch (Exception $e) {
            return $this->returnInfo(-1, $e->getMessage());
        }

    }
}
