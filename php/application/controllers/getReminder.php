<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class getReminder extends CI_Controller {

	
	public function index()
	{
            $reminderDate = $this->session->userdata('remindDate');
            $reminderTime = $this->session->userdata('remindTime');
            $date = DateTime::createFromFormat('mjy', $reminderDate);
            $time = DateTime::createFromFormat('Hi', $reminderTime);
            $data['reminderDate'] = $date->format('F d, Y');
            $data['reminderTime'] = $time->format('h:i a');
            $data['reminderHandler'] = $this->config->item('appdns')."handlereminder";
            
            $this->load->view('remind_me', $data);
	}
}