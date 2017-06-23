<?php 

namespace App\Handlers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;



class PortfolioHandler {
	

	public function __construct(){
		$this->config = include('../config/communication.php');
		$this->client = new Client();
	}
	
	public function RequestData($client_id){
		
		
		$response = $this->client->request('GET', $this->config['current_url'] . $client_id, [
			'headers' => [
				'Content-Type'  => 'application/json',
			 	'Authorization' => 'Bearer '  . $this->config['bearer_token'],
				'Referer'       => 'test-server'	
			]
		]);
		
		return $response;
	}

        public function RequestHistoricalData($client_id) {
            $response = $this->client->request('GET', $this->config['historical_url'] . $client_id, [
                'headers' => [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer '  . $this->config['bearer_token'],
                    'Referer'       => 'test-server'
                ]
            ]);

            	return $response;
        }

	public function RequestAccountData($client_id) {
		$response = $this->client->request('GET', $this->config['account_info_url'] . $client_id, [
			'headers' => [
			    'Content-Type'  => 'application/json',
			    'Authorization' => 'Bearer '  . $this->config['bearer_token'],
			    'Referer'       => 'test-server'
			]
		]);

		return $response;
	}

	
}
