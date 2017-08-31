<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class CompareCredentialsController extends BaseController
{

	public function comparePasswordWithHash(Request $req){
		$pwd_req = $req->pwd;
		$user = DB::table('users')->where('email', $req->email)->first();
		
		if (!$user == null) {
			$pwd_hash = $user->password;
		} else {
			return "USER NOT FOUND";
		}

		if (Hash::check($pwd_req, $pwd_hash)) {
			return "authentication ok";
		} else {
			return "passwords don't match";
		}
	}
}
