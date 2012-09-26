<?php
header("content-type: text/xml");
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

?>
<Response>
    <?php
    if($_REQUEST['FromCountry'] != "US") {
      ?>
     <Reject/>
     </Reponse>
    <?php
    }
    ?>
    <Gather timeout="10" numDigits="1" action="<?php echo $mainMenuHandler?>">
        <Say>Hello </Say>
        <Play>
            <?php echo $name ?>
        </Play>
        <?php
        if ($reminders) {
            foreach ($reminders as $reminder) {
                ?>
                <Say>You have a reminder from 
                <?php
                    $chunks = str_split($reminder['phoneNumberFrom'], 1);
                    $last = end($chunks);
                    if (strlen($last) === 1) {
                        $chunks[] = '';
                    }
                    $str_with_spaces = implode(' ', $chunks);
                    echo substr($str_with_spaces, 1, strlen($str_with_spaces));
                ?>
                </Say>
                <Say>The reminder is </Say>
                <Play>
                    <?php echo $reminder['reminder'] ?>
                </Play>
                <?php
                //Now we need to delete the reminder
                $reminderToDelete = array('reminder' => $reminder['reminder']);
                
                $this->mongo_db->where($reminderToDelete)->delete('remindersFor');
            }
        }
        ?>
        <Say>If you would like to leave a self reminder, press 1.</Say>
        <Say>
            If you would like to leave a reminder for someone else, press 2.
        </Say>
    </Gather>
    <Say>Sorry, I did not get that.</Say>
    <Redirect><?php echo $this->config->item('appdns').'remind'?></Redirect>
</Response>