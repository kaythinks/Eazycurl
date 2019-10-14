<?php

namespace Eazycurl;

class Eazycurl{

	/**
	 * This method returns a JSON Response for unauthenticated API's
	 * 
	 * @param  string $url 
	 * @return Array Response
	 */
	public static function getApiResponse(string $url) : Array
	{
		$ch = curl_init($url);                                                                      
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	    curl_setopt($ch, CURLOPT_POSTREDIR, 3); 
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                                                                 
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                 
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow http 3xx redirects
	    $response = curl_exec($ch); // execute

	    return json_decode($response,true); 
	}

	/**
	 * This method returns the contents of a web page.
	 * 
	 * @param  string $url 
	 * @return String Response
	 */
	public static function getWebContents(string $url) : String
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$data = curl_exec($ch);

		curl_close($ch);

		return $data;
	}

	/**
	 * This method can be used to post data to an API endpoint 
	 * 
	 * @param  array  $data 
	 * @param  string $url  
	 * @return Array Response
	 */
	public static function postApiData(array $data, string $url) : Array
	{	 
		$payload = json_encode($data);
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		 
		// Set HTTP Header for POST request 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($payload))
		);
		 
		// Submit the POST request
		$data = curl_exec($ch);
		 
		// Close cURL session handle
		curl_close($ch);

		return json_decode($data,true); 
	}

	/**
	 * This method is for accessing authenticated API endpoints by passing data and token
	 * 
	 * @param  array  $data  [
	 * @param  string $url   
	 * @param  string $token 
	 * @return Array
	 */
	public static function postAuthApiData(array $data, string $url, string $token) : Array
	{
		$payload = json_encode($data);
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		 
		// Set HTTP Header for POST request 
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($payload))
		);

		$headers = [
		  'Authorization: Bearer '.$token,
		  'Content-Type: application/json',
		];

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 
		// Submit the POST request
		$data = curl_exec($ch);
		 
		// Close cURL session handle
		curl_close($ch);

		return json_decode($data,true); 
	}

	/**
	 * This method is for accessing an authenticated GET endpoint
	 * 
	 * @param  string $url   
	 * @param  string $token 
	 * @return Array
	 */
	public static function getAuthApi(string $url, string $token) : Array
	{
		$ch = curl_init($url);                                                                      
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	    curl_setopt($ch, CURLOPT_POSTREDIR, 3); 
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                                                                 
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                 
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 

	    $headers = [
		  'Authorization: Bearer '.$token,
		  'Content-Type: application/json',
		];

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	    $response = curl_exec($ch); // execute

	    return json_decode($response,true); 
	}

	/**
	 * This method is for accessing an authenticated POST endpoint
	 * 
	 * @param  string $url   
	 * @param  string $token 
	 * @return Array
	 */
	public function postAuthApi(string $url, string $token) : Array
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		curl_setopt($ch, CURLOPT_POST, true);

		$headers = [
		  'Authorization: Bearer '.$token,
		  'Content-Type: application/json',
		];

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 
		// Submit the POST request
		$response = curl_exec($ch);
		 
		// Close cURL session handle
		curl_close($ch);

		return json_decode($response,true); 
	}
}
