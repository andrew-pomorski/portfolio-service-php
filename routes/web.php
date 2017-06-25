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

Route::get('/', function () {
	return View::make('index');
});


Route::group(['middleware' => 'web'], function () {
	Route::get('/getportfolio', 'PortfolioDataController@getPortfolioData');
	Route::get('/gethistorical', 'PortfolioDataController@getHistoricalData');
	Route::get('/getaccinfo', 'PortfolioDataController@getAccountInfo');
	Route::get('/getmarketshare', 'PortfolioDataController@getMarketShare');
});
