<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handlereminderfor extends CI_Controller {

	
	public function index()
	{      
        
        $this->load->library('mongo_db');
        
        
        $reminder = array('reminder' => $_REQUEST['RecordingUrl'], 'phoneNumberFrom' => $_REQUEST['From'], 
            'phoneNumberTo' => $this->session->userdata('reminderPhoneNumber'));
        
        $this->mongo_db->insert('remindersFor', $reminder);
        $this->load->view('handle_reminder_for');
	}
}