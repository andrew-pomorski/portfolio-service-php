<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Handlers\PortfolioHandler;
use Illuminate\Support\Facades\Auth;

class PortfolioDataController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
	$this->PortfolioHandler = new PortfolioHandler();
    	if (Auth::check()){
		$user = Auth::user();
		$this->user_email = $user->email;
	}
    }

    public function getPortfolioData(Request $req){
		$portfolio = $this->PortfolioHandler->RequestData($this->user_email);	
		return $portfolio;
    }

    public function getHistoricalData(Request $req){
		$portfolio = $this->PortfolioHandler->RequestHistoricalData($this->user_email, 365);
		return $portfolio;
    }


    public function getAccountInfo(Request $req) {
		$portfolio = $this->PortfolioHandler->RequestAccountData($this->user_email);
		return $portfolio;
    }

    public function getMarketShare(Request $req) {
		$portfolio = $this->PortfolioHandler->getMarketShare($this->user_email);
		return $portfolio;
    }
   
    public function getInvestmentsList(Request $req) {
		$portfolio = $this->PortfolioHandler->RequestInvestmentsList($this->user_email);
		return $portfolio;
   }
}
