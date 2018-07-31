<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		//units=For temperature in Celsius use units=metric
		//5128638 is new york ID
		$this->load->model('weather');

		$clima = $this->weather->getWeather();

		//$latLong = $this->weather->getLatLong();

		//print("<pre>".print_r($clima,true)."</pre>");

		$data['temp_cur'] = $clima['list'][0]['main']['temp'];
		$data['temp_max'] = $clima['list'][0]['main']['temp_max'];
		$data['temp_min'] = $clima['list'][0]['main']['temp_min'];
		$data['humidity'] = $clima['list'][0]['main']['humidity'];
 		$data['description'] = $clima['list'][0]['weather'][0]['description'];
 		$data['cloudy'] = $clima['list'][0]['clouds']['all'];
		$data['icon'] = $clima['list'][0]['weather'][0]['icon'].".png";
		$data['today'] = date("F j, Y, g:i a");
		$data['cityname'] = $clima['list'][0]['name'];
		
		$this->load->view('weather_v',$data);		

	}
}
