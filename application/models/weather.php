<?php

class weather extends CI_Model {
//Get the weather information from the api 

	public function __construct() {
		log_message("INFO", __CLASS__ . "::" . __FUNCTION__);
	}

	/**
	 * Get the weather data from the api
	 * 
	 * @return json
	 * 
	 */
	public function getWeather() {
		$city = $this->weather->getCity();

		//print("<pre>".print_r($data,true)."</pre>");

		$url = "https://api.openweathermap.org/data/2.5/find?q=$city&lang=en&units=imperial&appid=6451df7df0903d67fbc1650f9baee03a";
		
			$contents = file_get_contents($url);
			$clima=json_decode($contents, true);

			return $clima;
		}
	/**
	 * 
	 * We need to get the city where the user is using the app from.
	 * 
	 * @return json
	 * 
	 */
	public function getCity() {
			$ip = $this->weather->get_client_ip_env();
			$geocode=file_get_contents("http://ip-api.com/json/$ip");
	        $output= json_decode($geocode);

	        //Use to debug the data we're pulling in 
	        //print("<pre>".print_r($output,true)."</pre>");

	        $data = $output->city;
	        
	        return $data;
	}


	// Function to get the client ip address
		public function get_client_ip_env() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	        $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	 
	    return $ipaddress;
	}
}