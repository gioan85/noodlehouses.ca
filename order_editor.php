
<?php
//  minhtri95@yahoo.com

require_once("includes/application_top.php");
	
	if($_POST['action'] == 'load_status')
	{
		load_status();
	}

	if($_POST['action'] == 'update_status'){
		$STATUS = $_POST['STATUS'];
		update_status($STATUS);
	}
	
	function load_status(){
		$status = tep_db_query("select * from orderstatus");
		if($status != null){
			$value = tep_db_fetch_array($status);
			echo $value['STATUS'];
		}
		else
			echo 'error';
	};
	
	function update_status($STATUS){
		tep_db_query("update orderstatus set STATUS ='".$STATUS."' where ID = '1' ;");
		echo 'Updated successfull!';
	}
	
	
?> 