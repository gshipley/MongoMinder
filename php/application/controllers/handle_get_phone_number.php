<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handle_get_phone_number extends CI_Controller {

	
	public function index()
	{      
        
        $reminderPhoneNumber = $_REQUEST['Digits'];
        $reminderPhoneNumber = '+'.$reminderPhoneNumber;
        $this->session->set_userdata('reminderPhoneNumber', $reminderPhoneNumber);
        $data['redirectto'] = $this->config->item('appdns')."getReminderFor";
        $this->load->view('redirect_view', $data);
	}
}