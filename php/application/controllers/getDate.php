<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Getdate extends CI_Controller {

	
	public function index()
	{
            $data['getDateHandler'] = $this->config->item('appdns').'handle_get_date';
            $this->load->view('collect_date', $data);
	}
}