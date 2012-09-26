<?php

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say>Great, I will call you on <?php echo $reminderDate ?> at <?php echo $reminderTime?>.</Say>
    <Say>
            Please say the reminder you would like to set, followed by the pound sign.
    </Say>
    <Record maxLength="30" action="<?php echo $reminderHandler?>" finishOnKey="#"/>
    
</Response>