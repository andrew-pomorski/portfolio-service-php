<?php 

namespace App\Handlers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;



class PortfolioHandler {
	
	public function __construct(){
		$this->config = include('../config/communication.php');
		$this->headers = [
				'Content-Type'  => 'application/json',
			 	'Authorization' => 'Bearer '.$this->config['bearer_token'],
				'Referer'       => 'test-server'
		];
		$this->client = new Client(['base_uri' => $this->config['base_url'], 'headers' => $this->headers]);
	}
	


	public function RequestData($client_id){
		$query = ['clientid' => $client_id];
		$response = $this->client->request('GET', 'current', ['query' => $query]);
		return $response->getBody();
	}

	
        public function RequestHistoricalData($client_id, $days) {
		$query = ['clientid' => $client_id, 'days' => $days];
		$response = $this->client->request('GET', 'history', ['query' => $query]);
		return $response->getBody();
        }

	public function RequestAccountData($client_id) {
		$query = ['clientid' => $client_id];
		$response = $this->client->request('GET', 'account', ['query' => $query]);
		return $response->getBody();
	}


	public function getMarketShare($client_id) {
		$query = ['clientid' => $client_id];
		$response = $this->client->request('GET', 'marketshare', ['query' => $query]);
		return $response->getBody();	
	}

	
}
