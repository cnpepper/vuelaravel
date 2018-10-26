<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public $m_user_id = 0;
	public $m_control_name = 'BaseController';

	public function __construct(){
		$this->m_user_id = Auth::id();
		Log::debug('auth_info:',array('id'=>Auth::id()));
		Log::debug('auth_info:',array('user'=>Auth::user()));
	}

	public function returnInfo($status=200,$message='ok',$result=''){
		$result = ['code'=>$status,'message'=>$message,'result'=>$result];
		Log::info($this->m_control_name,$result);
		return response()->json($result);
	}
}
