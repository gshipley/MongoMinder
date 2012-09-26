<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say>This must be your first time using this service.  </Say>
    <Say>
            Please say your name, followed by the pound sign.
    </Say>
    <Record maxLength="5" finishOnKey="#" action="<?php echo $collectNameHandler?>" />
    
</Response>