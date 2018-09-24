<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// 获取模型
use App\Model\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    //test
    public function create(){
        echo "hello!create!";
        //创建了角色
        $role = Role::create(['name' => 'writer']);  // 创建角色
        //创建了权限
        $permission = Permission::create(['name' => 'edit articles']);// 创建权限
    }

    public function push(){
        //给角色添加权限
        try{
            $user = User::findOrFail(1);
            
            //print_r($user);
        }catch (Exception $e) {
            Log::debug(print_r($e,true));
            return false;
        }
        
        
    }
}
