<?php

require_once APPPATH . '/libraries/twilio-php/Services/Twilio.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cron extends CI_Controller {

    public function index() {

        // I have a bug with my time addition.  I need to use real UTC / GMT time class
        $sid = $this->config->item('twilio_sid');
        $token = $this->config->item('twilio_token');
        $time = DateTime::createFromFormat('Hi', date('Hi'));
        echo "looking for ".$time->format('Hi');
        $client = new Services_Twilio($sid, $token);

        $result = $this->usermodel->getReminders(date('mjy'), $time->format('Hi'));
        foreach ($result as $personToCall) {
            $reminderURL = $this->config->item('appdns').'getR?r=' . $personToCall['reminder'];
            $call = $client->account->calls->create(
                    $this->config->item('twilio_number'), // From a valid Twilio number
                    $personToCall['phoneNumber'], // Call this number
                    // Read TwiML at this URL when a call connects (hold music)
                    $reminderURL
            );
            // Now we need to delete the reminder
            $this->usermodel->deleteReminder($personToCall);
        }
    }

}
