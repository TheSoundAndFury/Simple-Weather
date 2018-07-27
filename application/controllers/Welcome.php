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

		//units=For temperature in Celsius use units=metric
		//5128638 is new york ID
		$this->load->model('weather');

		$clima = $this->weather->getWeather();

		//print("<pre>".print_r($clima,true)."</pre>");

		$data['temp_max'] = $clima->main->temp_max;
		$data['temp_min'] = $clima->main->temp_min;
		$data['icon'] = $clima->weather[0]->icon.".png";
		$data['today'] = date("F j, Y, g:i a");
		$data['cityname'] = $clima->name;
		
		$this->load->view('weather_v',$data);		

	}
}
