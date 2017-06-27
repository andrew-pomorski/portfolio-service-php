<?php 

namespace App\Handlers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;



class PortfolioHandler {
	

	public function __construct(){
		$this->config = include('../config/communication.php');
		$this->client = new Client();
		$this->headers = array(
				'Content-Type'  => 'application/json',
			 	'Authorization' => 'Bearer '  . $this->config['bearer_token'],
				'Referer'       => 'test-server'	
		);
	}
	


	public function RequestData($client_id){
		$response = $this->client->request('GET', $this->config['current_url'] . $client_id, [
			'headers' => $this->headers 
		]) ;
		
		return $response->getBody();
	}

	
	// TODO: it should be possible to change it to put the parameters into an array, without creating such long ]
	// query string.
        public function RequestHistoricalData($client_id, $days) {
            $response = $this->client->request('GET', $this->config['historical_url'] . $client_id . "&days=" . $days, [
                'headers' => $this->headers 
      		]);
            	
		return $response->getBody();
        }

	public function RequestAccountData($client_id) {
		$response = $this->client->request('GET', $this->config['account_info_url'] . $client_id, [
			'headers' => $this->headers 
		]);

		return $response->getBody();
	}


	public function getMarketShare($client_id) {
		$response = $this->client->request('GET', $this->config['market_share_url'] . $client_id, [
			'headers' => $this->headers
		]);

		return $response->getBody();	
	}

	
}
