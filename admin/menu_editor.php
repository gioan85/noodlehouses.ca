
<?php
//  minhtri95@yahoo.com

require_once("includes/application_top.php");
	$start = $_POST['start'];
	$pagesize = $_POST['pagesize'];
	
	
	function load_menu()
	{
		$menu = tep_db_query("select * from menu");
		mysql_query("SET character_set_results=utf8");
		if($menu != null)
		{
			while($row = tep_db_fetch_array($menu))
			{
				if($row['STATUS'] == 0)
					echo '<tr class="delete_row">';
				else
					echo '<tr>';
				echo '<td>' . $row['NAME'] . '</td>';
				echo '<td>' . $row['RATE'] . '</td>';
				echo '<td>' . $row['STATUS'] . '</td>';
				echo '<td id="'.$row['ID'].'"><a href="javascript:void(0)" onclick="delete_menu(' . $row['ID'] . ')">Delete</a> &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="update_menu('.$row['ID'].','."'".$row['NAME']."'".','."'".$row['RATE']."'".')">Update</a></td>';
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
		
	}
	
	if($_POST['action'] == 'load_menu')
	{		
		load_menu();
	}
	
		
	if($_POST['action']=='delete_menu')
	{
		$menu_id = $_POST['menu_id'];
		tep_db_query("delete from menu where ID = " . $menu_id . ";");
		load_menu();
	}
	
	if($_POST['action'] == 'add_menu')
	{
		$NAME = $_POST['menu_name'];
		$RATE = $_POST['menu_rate'];
		$STATUS = $_POST['menu_status'];
		$query = "insert into menu(NAME,RATE,STATUS) values('$NAME','$RATE','$STATUS');";
		
		$result = tep_db_query($query);
		if($result == 1)
			echo "Add new menu success!";
		else
			echo "Add new menu fail!";
	}

	
	if($_POST['action'] == 'update_menu')
	{
		$ID = $_POST['menu_id'];
		$NAME = $_POST['menu_name'];
		$RATE = $_POST['menu_rate'];
		$STATUS = $_POST['menu_status'];
		tep_db_query("update menu set NAME ='" .$NAME. "', RATE = '".$RATE."', STATUS = '".$STATUS."' where ID = '" . $ID . "' ;");
		echo 'Updated successfull!';
	}
	
	
?> 