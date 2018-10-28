<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 测试一下API怎么获取登录信息
        
        // 如果接口用session登录了 Auth 还能获取信息么？
        $user_info = Auth::user();
        Log::debug('TestController',array($user_info)); 
        return $this->returnInfo(0,'ok');
    }
}
