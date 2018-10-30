<?php

namespace App\Http\Controllers\Api\Permission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Permission\PermissionDomain;

class CreateController extends Controller
{
    //
    public function index(Request $request){
        $req = $request->all();
        $permission = new PermissionDomain();
        if(!$permission->create($req['name'])){
            return $this->returnInfo(-1,'fail');
        }
        return $this->returnInfo(0,'ok');
    }
}
