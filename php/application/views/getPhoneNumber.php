<?php

    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Gather timeout="10" finishOnKey="#" action="<?php echo $getPhoneNumberHandler?>">
    <Say>Please enter the full phone number, including 1 and the area code for the person to remind, followed by the pound sign.</Say>
    </Gather>
</Response>