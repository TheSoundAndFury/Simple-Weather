<?php

class weather extends CI_Model {
//Get the weather information from the api 

	public function __construct() {
		log_message("INFO", __CLASS__ . "::" . __FUNCTION__);
	}

	public function getWeather() {

		$data = $this->weather->getCity();

		//print("<pre>".print_r($data,true)."</pre>");

		$url = "https://api.openweathermap.org/data/2.5/find?q=$data&lang=en&units=imperial&appid=6451df7df0903d67fbc1650f9baee03a";
		
			$contents = file_get_contents($url);
			$clima=json_decode($contents, true);

			return $clima;
		}

	public function getCity() {

			$geocode=file_get_contents('http://ip-api.com/json');
	        $output= json_decode($geocode);

	        //Use to debug the data we're pulling in 
	        //print("<pre>".print_r($output,true)."</pre>");

	        $data = $output->city;
	        
	        return $data;
	}
}