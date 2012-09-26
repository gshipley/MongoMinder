<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handle_main_menu extends CI_Controller {

	
	public function index()
	{      
        
        $menuChoice = $_REQUEST['Digits'];
        if($menuChoice == 1) {
            $data['redirectto'] = $this->config->item('appdns').'getDate';
            $this->load->view('redirect_view', $data);
        } else if ($menuChoice == 2){
            $data['redirectto'] = $this->config->item('appdns').'getPersonToRemind';
            $this->load->view('redirect_view', $data);
        } else {
            $data['redirectto'] = $this->config->item('appdns').'remind';
            $this->load->view('redirect_view', $data);
        }
	}
}