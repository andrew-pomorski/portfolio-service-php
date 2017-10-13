<?php


namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;

// TODO Return views explaining why user was redirected	
class VerifyClientID {
	/**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
	public function handle($request, Closure $next){
		$auth_user = Auth::user();
		if (!$user) {
			return redirect('/');
		}
		$internal_user = DB::table('user_verify')->where('auth_user_id', $auth_user->id)->first();
		$client_id = $internal_user->userId();
		if ($client_id != $request->clientId){
			return redirect('/');
		}		
		return $next($request);		
	}
}
