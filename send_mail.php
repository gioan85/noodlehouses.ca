<?php 

	$NAME = $_POST['full_name'];
	$PHONE = $_POST['phone_number'];
	$EMAIL = $_POST['email_address'];
	$MESSAGE = $_POST['message'];
	
	$to = 'vietthai@noodlehouses.ca';
	$subject = 'contact us';
	$content = 'Name: ' . $NAME . "\r\n" . ' Phone: ' . $PHONE . "\r\n" . ' Email: ' . $EMAIL . "\r\n" . ' Messages: ' . $MESSAGE ;
	$headers = 'From:' . $EMAIL ;
	mail($to, $subject, $content, 'From: ' . $EMAIL . phpversion());
?>