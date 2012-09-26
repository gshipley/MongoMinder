<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handle_get_time extends CI_Controller {

	
	public function index()
	{      
        
        $remindDate = $_REQUEST['Digits'];
        $this->session->set_userdata('remindTime', $remindDate);
        $data['redirectto'] = $this->config->item('appdns')."getReminder";
        $this->load->view('redirect_view', $data);
	}
}



