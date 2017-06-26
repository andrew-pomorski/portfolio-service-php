<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Handlers\PortfolioHandler;

class PortfolioDataController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
	$this->PortfolioHandler = new PortfolioHandler();
    }

    public function getPortfolioData(Request $req){
		if ($req->has('clientId')){
			$portfolio = $this->PortfolioHandler->RequestData($req->clientId);	
			return $portfolio;
		} else {
			return "ClientID not found. Quitting.";
		}
    }

    public function getHistoricalData(Request $req){
		if ($req->has('clientId')){
			$req->has('days') ? $days = $req->days : $days = 365;
			$portfolio = $this->PortfolioHandler->RequestHistoricalData($req->clientId, $days);
			return $portfolio;
		} else {
			return "ClientID not found. Quitting.";
		}

    }


    public function getAccountInfo(Request $req) {
		if ($req->has('clientId')){
			$portfolio = $this->PortfolioHandler->RequestAccountData($req->clientId);
			return $portfolio;
		} else {
			return "ClientID not found. Quitting.";
		}
	
    }

    public function getMarketShare(Request $req) {
		if ($req->has('clientId')){
			$portfolio = $this->PortfolioHandler->getMarketShare($req->clientId);
			return $portfolio;
		} else {
			return "ClientID not found. Quitting.";
		}
    }
}
