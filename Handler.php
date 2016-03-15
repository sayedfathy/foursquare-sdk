<?php

class FoursquareCurl {	
/**
 * Handler Class provides a mechanism to use curl function 
 * to fetch the response
 */

	public static function execute($url, $json=false, $response=false){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		$data = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		$data = ($httpcode>=200 && $httpcode<300) ? $data : false;

		if($response) {
			return json_decode($data)->response;
		}

		if ($json) {
			return json_decode($data);
		}

		return $data;

		
	}

}

?>