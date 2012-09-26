<?php

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say>
            Please say the reminder you would like to leave, followed by the pound sign.
    </Say>
    <Record maxLength="30" action="<?php echo $reminderForHandler?>" finishOnKey="#"/>
    
</Response>