<?php

class weather extends CI_Model {
//Get the weather information from the api 

	public function __construct() {
		log_message("INFO", __CLASS__ . "::" . __FUNCTION__);
	}

	public function getWeather() {
		$url = "http://api.openweathermap.org/data/2.5/weather?id=5128638&lang=en&units=metric&APPID=6451df7df0903d67fbc1650f9baee03a";


			$contents = file_get_contents($url);
			$clima=json_decode($contents);

			return $clima;
		}
}