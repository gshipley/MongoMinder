<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handle_get_date extends CI_Controller {

	
	public function index()
	{      
        
        $remindDate = $_REQUEST['Digits'];
        $this->session->set_userdata('remindDate', $remindDate);
        $data['redirectto'] = $this->config->item('appdns')."getTime";
        $this->load->view('redirect_view', $data);
	}
}