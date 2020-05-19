
<?php
//  minhtri95@yahoo.com

require_once("includes/application_top.php");
	
	if($_POST['action'] == 'update_user')
	{
		$USER = $_POST['user'];
		$USER_ID = $_POST['user_id'];
		$POSITION = $_POST['position'];
		if($USER == 'admin')
		{
			$OLD_PASS = md5($_POST['old_pass']);
			$NEW_PASS = md5($_POST['new_pass']);
		}
		
		// user cook and waiter
		if($POSITION == 'admin')
		{
			$result = tep_db_query("select * from account where USER ='$USER' and PASSWORD ='$OLD_PASS'" );
			$account = tep_db_fetch_array($result);
			if( $account['USER'] == '')
			{
				echo 'User or password is wrong';
				return;
			}
			tep_db_query("update account set PASSWORD ='" .$NEW_PASS. "' where ID = '" . $account['ID'] . "' ;");
			echo 'Updated successfull!';
			return;
		}
		else
		{
			tep_db_query("update account set account.POSITION ='" .$POSITION. "' where account.ID = '" . $USER_ID . "' ;");
			echo 'Updated position successfull!';
			return;
		}
	}
	
	function load_user(){
		$user = tep_db_query("select * from account");
		mysql_query("SET character_set_results=utf8");
		echo '<table>';
		echo '<tr><td>User</td><td>Position</td><td><div class="btn_submit" onclick="add_new();">Add new</div></td></tr>';
		if($user != null)
		{
			while($row = tep_db_fetch_array($user))
			{
				echo '<tr>';
				echo '<td>' . $row['USER'] . '</td>';
				echo '<td>' . $row['POSITION'] . '</td>';
				echo '<td><div class="btn_submit" onclick="load_update_user('."'".$row['ID']."','".$row['USER']."','".$row['POSITION']."'".');">Update</div> <div class="btn_submit" onclick="delete_user('."'".$row['ID']."'".');">Delete</div></td>';
				echo '</tr>';
			}
		}
		else
		{
			echo '<tr>';
			echo '<td>...</td>';
			echo '<td></td>';
			echo '</tr>';
		}
		echo '</table>';
	};
	
	if($_POST['action'] == 'load_user')
	{
		load_user();
	}
	
	if($_POST['action'] == 'delete_user')
	{
		$USER = $_POST['user'];
		tep_db_query("delete from account where ID = " . $USER . ";");
		load_user();
	}
	
	
	if($_POST['action'] == 'add_user')
	{
		$USER = $_POST['user'];
		$PASSWORD = md5($_POST['password']);
		$POSITION = $_POST['position'];
		$result = tep_db_query("insert into account(account.USER,account.POSITION,account.PASSWORD) values('$USER','$POSITION','$PASSWORD')" );
		
		if($result == 1)
			echo "Add new account success!";
		else
			echo "Add new account fail!";
	}
	
?> 