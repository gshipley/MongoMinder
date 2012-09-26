<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Handlereminder extends CI_Controller {

	
	public function index()
	{      
        
        $this->load->library('mongo_db');
        
        // We need to convert the reminder time to the callers timezone
        // The first thing we need to do is get the users zipcode from where they placed the call
        $zipcode = $_REQUEST['FromZip'];
        
        //Now that we have the callers zip code, lets look up the timezone
        $this->load->library('curl');
        $this->curl->create("http://www.worldweatheronline.com/feed/tz.ashx?key=e93a70408c170954121409&q=".$zipcode."&format=json");
        $result = json_decode($this->curl->execute());
        $offset = $result->data->time_zone[0]->utcOffset;
        if($offset[0] == '+') {
            $offset[0] = '-';
        } else {
            $offset[0] = '+';
        }
        
        $reminderDate = $this->session->userdata('remindDate');
        $reminderTime = $this->session->userdata('remindTime');
        
        
        // Now that we have the reminder time and date, we need to modify it
        // so that it is GMT.
        $time = DateTime::createFromFormat('mjyHi', $reminderDate.$reminderTime);
        $offset =  $offset*60*60;
        $blah = gmdate('Y-m-d H:i:s', strtotime($time->format('Y-m-d H:i:s')));
        $date = date('Y-m-d H:i:s', strtotime($blah)+$offset);
        $newDate = DateTime::createFromFormat('Y-m-d H:i:s', $date);
        
        $reminderTime = $newDate->format('Hi');
        $reminderDate = $newDate->format('mjy');
        
        
        $reminder = array('reminder' => $_REQUEST['RecordingUrl'], 'phoneNumber' => $_REQUEST['From'], 
            'reminderDate' => $reminderDate, 'reminderTime' => $reminderTime);
        
        $this->mongo_db->insert('reminders', $reminder);
        $this->load->view('handle_reminder');
	}
}