<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class getReminderFor extends CI_Controller {

	
	public function index()
	{
            $data['reminderForHandler'] = $this->config->item('appdns').'handlereminderfor';
            $this->load->view('get_reminder_for', $data);
	}
}