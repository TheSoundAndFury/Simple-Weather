<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SimpleWeather extends CI_Controller {

	public function index()
	{
		/**
		 * Load the URL helper 
		 */
		$this->load->helper('url');
		/**
		 * Load the weather model so we can get our data. 
		 */
		$this->load->model('weather');

		$clima = $this->weather->getWeather();

		//print("<pre>".print_r($clima,true)."</pre>");

		//Build the data in the formats we want and return it to us. 
		$data = $this->buildData($clima);
		
		//Throw it to the view for display. 
		$this->load->view('weather_v',$data);		

	}
	/**
	 * Organize and extract the data we need from the API call. 
	 * 
	 * @param  [json]
	 * @return [array]
	 */
	private function buildData(array $clima) {

		$data['temp_cur'] = $clima['list'][0]['main']['temp'];
		$data['temp_max'] = $clima['list'][0]['main']['temp_max'];
		$data['temp_min'] = $clima['list'][0]['main']['temp_min'];
		$data['humidity'] = $clima['list'][0]['main']['humidity'];
 		$data['description'] = $clima['list'][0]['weather'][0]['description'];
 		$data['cloudy'] = $clima['list'][0]['clouds']['all'];
		$data['icon'] = $clima['list'][0]['weather'][0]['icon'].".png";
		$data['today'] = date("F j, Y, g:i a");
		$data['cityname'] = $clima['list'][0]['name'];

		return $data;
	}
}
