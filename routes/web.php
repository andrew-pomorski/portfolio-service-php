<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// TODO: Redirect to this route
Route::group(['middleware' => 'auth'], function(){
	Route::get('/', 'DashboardController@getDashboard');
	//Route::get('/webdashboard', 'DashboardController@getDashboard');

});

//Route::get('/testauth', 'CompareCredentialsController@comparePasswordWithHash');

Route::group(['middleware' => 'web'], function () {
	Route::get('/getportfolio', 'PortfolioDataController@getPortfolioData');
	Route::get('/gethistorical', 'PortfolioDataController@getHistoricalData');
	Route::get('/getaccinfo', 'PortfolioDataController@getAccountInfo');
	Route::get('/getmarketshare', 'PortfolioDataController@getMarketShare');
	Route::get('/getinvestments', 'PortfolioDataController@getInvestmentsList');
});

// add middleware => auth to authenticate
/**
Route::group(['prefix' => 'portfolio_api'], function(){
	Route::get('/current_data', 'PortfolioAPIController@getCurrent');
	Route::get('/historic_data','PortfolioAPIController@getHistoric' );
	Route::get('/account_info', 'PortfolioAPIController@getAccInfo');
	Route::get('/market_share', 'PortfolioAPIController@getMarketShare');
		
});
**/

// Separate API authentication logic
/**
Route::group(['prefix' => 'authenticate_api'], function(){
	Route::get('/auth_web_user', 'ManuallyAuthorizeLaravelUser@authenticateLocalUSer');
});
**/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
