<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Handlers\PortfolioHandler;

class PortfolioAPIController extends BaseController
{

	public function __construct(){
		$this->PortfolioHandler = new PortfolioHandler();	
	}

	public function getCurrent(Request $req){
		Log::info($req->clientId);
		$current_data = $this->PortfolioHandler->RequestData($req->clientId);
		return $current_data;
	}

	public function getHistoric(Request $req){
		Log::info($req->clientId);
		!property_exists($req, 'days') ? $days = 180 : $days = $req->days;
		$historic_data = $this->PortfolioHandler->RequestHistoricalData($req->clientId, $days);
		return $historic_data;
	}

	public function getAccInfo(Request $req){
		Log::info($req->clientId);
		$account_info = $this->PortfolioHandler->RequestAccountData($req->clientId);
		return $account_info;
	}

	public function getMarketShare(Request $req){
		Log::info($req->clientId);
		$market_share = $this->PortfolioHandler->getMarketShare($req->clientId);
		return $market_share;
	}
}
