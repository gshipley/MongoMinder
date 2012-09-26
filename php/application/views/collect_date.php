<?php
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Gather timeout="10" numDigits="6" action="<?php echo $getDateHandler?>">
        <Say>Please enter the month, day, and year that you would like to be reminded on</Say>
        <Say>
            For example, for July 14th, two thousand thirteen, I would enter 0,7,1,4,1,3
        </Say>
    </Gather>
    <Say>Sorry, I did not get that.</Say>
    <Redirect><?php echo $this->config->item('appdns').'remind'?></Redirect>
</Response>