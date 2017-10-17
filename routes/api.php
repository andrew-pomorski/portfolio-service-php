<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\Auth;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::group(['middleware'=>'auth:api'], function(){
	Route::get('/getportfolio', 'PortfolioDataController@getPortfolioData');
	Route::get('/gethistorical', 'PortfolioDataController@getHistoricalData');
	Route::get('/getaccinfo', 'PortfolioDataController@getAccountInfo');
	Route::get('/getmarketshare', 'PortfolioDataController@getMarketShare');
	Route::get('/getinvestments', 'PortfolioDataController@getInvestmentsList');
});

Route::group([],function(){
	$this->post('login', 'Auth\validateLogin@login');
    	$this->get('logout', 'Auth\AuthController@logout');
   	// Password Reset Routes...
  	//  $this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
   	 $this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    	$this->post('password/reset', 'Auth\PasswordController@reset');
});
