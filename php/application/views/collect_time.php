<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Gather timeout="10" numDigits="4" action="<?php echo $getTimeHandler?>">
        <Say>Please enter the hour and minute to call you in 24 hour format.</Say>
        <Say>
            For example, to call you at nine, thirty, a, m, I would enter 0, 9, 3, 0
        </Say>
    </Gather>
    <Say>Sorry, I did not get that.</Say>
    <Redirect><?php echo $this->config->item('appdns').'getTime'?></Redirect>
</Response>