<?php
//  minhtri95@yahoo.com

require_once("includes/application_top.php");
	
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$result = tep_db_query("select * from account where USER ='$username' and PASSWORD ='$password'" );
	//$username = "admin";
	//$password = md5("buffalo");
	//$result = tep_db_query("update account set PASS = '$password' WHERE USER_NAME = '$username'" );
	$account = tep_db_fetch_array($result);
	if($account['USER'] != '')
		echo $account['USER'] . ';' . $account['POSITION'];
	else
		echo '';
?> 