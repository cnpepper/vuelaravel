<?php

namespace App\Http\Controllers\Api\WorkSpace\Sql;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

// 模型引用
use App\Domain\WorkSpace\Sql\QuerySql;

class QueryController extends Controller
{
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
