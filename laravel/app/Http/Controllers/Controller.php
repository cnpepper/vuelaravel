<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function __construct(){}

	public function returnInfo($status=200,$msg='ok',$result=[]){
		if(!is_array($result)){
			$result = ['extra'=>$result];
		}
		$info = ['status'=>$status,'msg'=>$msg,'info'=>$result];
		Log::info('controller_response:',$info);
		return response()->json($info);
	}
}
