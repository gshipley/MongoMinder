<?php

require_once APPPATH . '/libraries/twilio-php/Services/Twilio.php';

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Remind extends CI_Controller {

    public function index() {
        // Get the users name or set it to Somebody I don't know
        $name = 'Somebody I dont know';
        $user = $this->usermodel->getUser($_REQUEST['From']);
        if ($user) {
            $name = $user[0]['name'];
            $data['name'] = $name;
        } else {
            $data['name'] = $name;
            $data['collectNameHandler'] = $this->config->item('appdns').'handle_collect_name';
            $this->load->view('collect_name', $data);
            return;
        }


        $reminders = $this->usermodel->getRemindersForUser($_REQUEST['From']);

        if ($reminders) {
            $data['reminders'] = $reminders;
        }
        $mainMenuHandler = $this->config->item('appdns').'handle_main_menu';
        $data['mainMenuHandler'] = $mainMenuHandler;
        $this->load->view('main_menu', $data);
    }

    private function makeNumberReadable($phoneNumber) {
        $chunks = str_split($phoneNumber, 1);
        $last = end($chunks);
        if (strlen($last) === 1) {
            $chunks[] = '';
        }
        $str_with_spaces = implode(' ', $chunks);
        return substr($str_with_spaces, 1, strlen($str_with_spaces));
    }

}