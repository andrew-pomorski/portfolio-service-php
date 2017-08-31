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
	} else {
		$this->user_email = "testtt";
	}
    }

    public function getPortfolioData(Request $req){
		if (Auth::check()){
			$user = Auth::user();
			$email  =  $user->email;
			$portfolio = $this->PortfolioHandler->RequestData($email);	
			return $portfolio;
		}
    }

    public function getHistoricalData(Request $req){
		if (Auth::check()){
			$user = Auth::user();
			$email  =  $user->email;
			$portfolio = $this->PortfolioHandler->RequestHistoricalData($email, 365);
			return $portfolio;
		}
    }


    public function getAccountInfo(Request $req) {
		if (Auth::check()){
			$user = Auth::user();
			$email  =  $user->email;
			$portfolio = $this->PortfolioHandler->RequestAccountData($email);
			return $portfolio;
		}
    }

    public function getMarketShare(Request $req) {
		if (Auth::check()){
			$user = Auth::user();
			$email  = $user->email;
			$portfolio = $this->PortfolioHandler->getMarketShare($email);
			return $portfolio;
		}
    }
   
    public function getInvestmentsList(Request $req) {
		if (Auth::check()){
			$user = Auth::user();
			$email  =  $user->email;
			$portfolio = $this->PortfolioHandler->RequestInvestmentsList($email);
			return $portfolio;
		}
   }
}
