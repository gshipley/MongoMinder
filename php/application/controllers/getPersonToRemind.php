<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class getPersonToRemind extends CI_Controller {

	
	public function index()
	{
            $data['getPhoneNumberHandler'] = $this->config->item('appdns').'handle_get_phone_number';
            $this->load->view('getPhoneNumber', $data);
	}
}