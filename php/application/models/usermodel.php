<?php

/**
 * @property UserModel $usermodel
 * 
 */
class UserModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getUser($phoneNumber) {
        $this->load->library('mongo_db');

        $user = $this->mongo_db->get_where('users', array('phoneNumber' => $phoneNumber));
        return $user;
    }

    function getReminders($reminderDate, $reminderTime) {
        $this->load->library('mongo_db');
        $reminders = $this->mongo_db->get_where('reminders', array('reminderDate' => $reminderDate, 'reminderTime' => $reminderTime));
        return $reminders;
    }

    function getRemindersForUser($userPhoneNumber) {
        $this->load->library('mongo_db');

        $reminders = $this->mongo_db->get_where('remindersFor', array('phoneNumberTo' => $userPhoneNumber));
        return $reminders;
    }

    function createUser($phoneNumber, $name) {
        $this->load->library('mongo_db');
        $user = array('phoneNumber' => $phoneNumber,
            'name' => $name);

        $this->mongo_db->insert('users', $user);
    }

    function deleteReminderFor($reminder) {
        $this->load->library('mongo_db');
        $reminder = array('reminder' => $reminder);
        $this->mongo_db->delete('remindersFor', $data = $reminder);
    }

    function deleteReminder($reminder) {
        $this->load->library('mongo_db');
        $reminderToDelete = array('reminder' => $reminder['reminder']);

        $this->mongo_db->where($reminderToDelete)->delete('reminders');
    }

}

?>
