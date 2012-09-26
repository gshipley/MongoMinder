<?php

require_once APPPATH . '/libraries/twilio-php/Services/Twilio.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class GetR extends CI_Controller {

    public function index() {

        $r = $this->input->get('r', TRUE);
	$sid = $this->config->item('twilio_sid');
        $token = $this->config->item('twilio_token');
        $client = new Services_Twilio($sid, $token);
        
        $response = new Services_Twilio_Twiml;
        
        $response->say("Hello, this is your reminder. ");
        $response->play($r);
        print $response;
        
    }

}
