<?php 
    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
?>
<Response>
    <Say>Thank you! I will play the following reminder, the next time that person dials in:</Say>
    <Play><?php echo $_REQUEST['RecordingUrl']; ?></Play>
    <Say>Goodbye.</Say>
</Response>
  