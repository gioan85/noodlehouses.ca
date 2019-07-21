
<?php
//  minhtri95@yahoo.com

require_once("includes/application_top.php");
	
	if($_POST['action'] == 'update_user')
	{
		$USER = $_POST['user'];
		$OLD_PASS = md5($_POST['old_pass']);
		$NEW_PASS = md5($_POST['new_pass']);
		$result = tep_db_query("select * from account where USER ='$USER' and PASSWORD ='$OLD_PASS'" );
		$account = tep_db_fetch_array($result);
		if( $account['USER'] == '')
		{
			echo 'User or password is wrong';
			return;
		}
		tep_db_query("update account set PASSWORD ='" .$NEW_PASS. "' where ID = '" . $account['ID'] . "' ;");
		echo 'Updated successfull!';
	}
	
	
	
?> 