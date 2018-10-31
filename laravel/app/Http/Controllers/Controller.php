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

	public $m_control_name = 'BaseController';

	public function __construct(){}

	public function returnInfo($status=200,$message='ok',$result=''){
		$result = ['code'=>$status,'message'=>$message,'result'=>$result];
		Log::info($this->m_control_name,$result);
		return response()->json($result);
	}
}
