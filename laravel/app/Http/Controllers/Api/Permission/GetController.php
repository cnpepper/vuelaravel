<?php

namespace App\Http\Controllers\Api\Permission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Permission\PermissionDomain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GetController extends Controller
{
    //
    public function index(){
        $per = new PermissionDomain();
        $res = $per->getUserPermission(Auth::id());
        Log::debug('getUserPermission',array($res));
        return $this->returnInfo(0,'ok',$res);
    }
}
