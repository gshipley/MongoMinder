<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handle_collect_name extends CI_Controller {

	
	public function index()
	{      
        
        $this->load->library('mongo_db');
        $user = array('phoneNumber' => $_REQUEST['From'],
            'name' => $_REQUEST['RecordingUrl']);
        
        $this->mongo_db->insert('users', $user);
        $data['redirectto'] = $this->config->item('appdns').'remind';
        $this->load->view('redirect_view', $data);
	}
}