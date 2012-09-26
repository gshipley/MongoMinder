<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gettime extends CI_Controller {

	
	public function index()
	{
            $data['getTimeHandler'] = $this->config->item('appdns')."handle_get_time";
            $this->load->view('collect_time', $data);
	}
}