<?php

class RBTExternalSystemAPI {
    
  
	
	public function __construct(){
		 
        
    }
	
	
	// Function to send a request to OpenAI API
	function sendOpenAIRequest($systemPrompt = '', $userPrompt = '', $model = '', $OpenAI_ApiUrl = '',$OpenAI_ApiKey = '') {
		

		$conversation = array(
			array('role' => 'system', 'content' => $systemPrompt),
			array('role' => 'user', 'content' => $userPrompt)
		);

		$data = array(
			'messages' => $conversation,
			'model' => $model,
			'max_tokens' => 2400,
		);
		
		

		$headers = array(
			'Content-Type: application/json',
			'Authorization: Bearer ' . $OpenAI_ApiKey
		);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $OpenAI_ApiUrl);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		$response = curl_exec($curl);
		curl_close($curl);
		// echo "<Pre>"; print_r($response); die;
		return json_decode($response, true);
	}


	
	function CallApiPost($target_url = '',$post_data = []){
		

		$output = [];
		
		try{
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL,$target_url);
			
			curl_setopt($ch, CURLOPT_POSTFIELDS, ($post_data));
			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			$response = curl_exec ($ch);
			
			curl_close ($ch);
			
			//echo $response;die;
			
			if (curl_error($ch)){
				
				$output['error'] =  curl_error($ch);

			}else{
				
				$array = json_decode($response,true);
				$output['data_array'] = $array;
				$output['response'] = $response;
			}
			
			//$output['api_url'] = $target_url;  
			
		}catch(Exception $e) {
			$output['error']  = $e->getMessage();
		}
		
		return $output;
	}
	
	function CallApiRename($url_action = '',$filter_data = []){
		
		$output = [];
		
		try{
			$key = $this->api_key;
			$query_filter_url = '';
			if(count($filter_data)){
				$query_filter_url = '&'.http_build_query($filter_data);
			}

			$url = $this->api_url.''.$url_action.'?key='.$key.$query_filter_url;
			
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL,$url);
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch,CURLOPT_HTTPHEADER,["Content-Type: text/xml"]); 
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			$response = curl_exec($ch);
			
			if (curl_error($ch)){
				
				$output['error'] =  curl_error($ch);

			}else{
				
				$xml = simplexml_load_string($response);
				$json = json_encode($xml);
				$array = json_decode($json,true);
				$output['data_array'] = $array;
				$output['response'] = $response;
			}
			
			$output['api_url'] = $url;  
		}catch(Exception $e) {
			$output['error']  = $e->getMessage();
		}
			
		
		return $output;
	}
    
}
