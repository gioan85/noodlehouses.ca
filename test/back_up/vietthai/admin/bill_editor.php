
<?php
//  minhtri95@yahoo.com

require_once("includes/application_top.php");
	$start = $_POST['start'];
	$pagesize = $_POST['pagesize'];
	$YEAR = $_POST['year'];
	$MONTH = $_POST['month'];
	$soundfile = 'media/sound_1.mp3';
	
	function load_bills($YEAR, $MONTH)
	{
		$new_bill = 0;
		if($MONTH == 'All')
			$bill = tep_db_query("select * from bill where YEAR(DATE) = '" . $YEAR . "' ORDER BY STATUS, DATE DESC");
		else
			$bill = tep_db_query("select * from bill where YEAR(DATE) = '" . $YEAR . "' and MONTH(DATE) = '".$MONTH."' ORDER BY STATUS, DATE DESC");
		mysqli_query("SET character_set_results=utf8");
		if($bill != null)
		{
			while($row = tep_db_fetch_array($bill))
			{
				if( $row['STATUS'] == '0')
				{
					$status = 'new';
					$new_bill = 1;
					echo '<tr class="new_bill">';
				}
				if( $row['STATUS'] == '1')
				{
					$status = 'confirm';
					echo '<tr>';
				}
				if( $row['STATUS'] == '2')
				{
					$status = 'finish';
					echo '<tr>';
				}
				echo '<td>' . $row['CUSTOMER'] . '<br>' . $row['PHONE'] . '<br>' . $row['ADDRESS'] . '</td>';
				echo '<td>' . $row['FOODS'] . '</td>';
				echo '<td>' . $row['DESCRIPTION'] . '</td>';
				echo '<td>' . $row['PRICE'] . '</td>';
				echo '<td>' . $row['DATE'] . '</td>';
				echo '<td>' . $status . '</td>';
				echo '<td id="'.$row['ID'].'"><a href="javascript:void(0)" onclick="delete_bill(' . $row['ID'] . ')">Delete</a><br><a href="javascript:void(0)" onclick="update_bill('.$row['ID'].','."'".$row['CUSTOMER']."'".','."'".$row['FOODS']."'".','."'".$row['DESCRIPTION']."'".','."'".$row['PRICE']."'".','."'".$row['DATE']."',"."'".$status."'".','."'".$row['PHONE']."'".','."'".$row['ADDRESS']."'".')">Update</a></td>';
				echo '</tr>';
			}
		}
		if( $new_bill == 1)
			echo '<tr style="display=none;"><td colspan="6"><embed src ="media/sound_1.mp3" hidden="true" autostart="true"></embed></td></tr>';
			//echo '<embed src ="$soundfile" hidden="true" autostart="true"></embed>';
		
	}
	
	if($_POST['action'] == 'load_bill')
	{		
		load_bills($YEAR, $MONTH);
	}
	
		
	if($_POST['action']=='delete_bill')
	{
		$bill_id = $_POST['bill_id'];
		tep_db_query("delete from bill where ID = " . $bill_id . ";");
		load_bills($YEAR, $MONTH);
	}
	
	
	
	/*if($_POST['action'] == 'update_bill')
	{
		$ID = $_POST['bill_id'];
		$CUSTOMER = $_POST['bill_customer'];
		$PRICE = $_POST['bill_price'];
		$DATE = $_POST['bill_date'];
		$PHONE = $_POST['bill_phone'];
		$ADDRESS = $_POST['bill_address'];
		$STATUS = $_POST['bill_status'];
		if($STATUS == 'new')
			$STATUS = 0;
		else
			$STATUS = 1;
		tep_db_query("update bill set CUSTOMER ='" .$CUSTOMER. "', PRICE = '" . $PRICE . "', PHONE ='".$PHONE."', ADDRESS = '".$ADDRESS."', STATUS ='".$STATUS."', DATE = '".$DATE."' where ID = '" . $ID . "' ;");
		echo 'Updated successfull!';
	}*/
	
	
	if($_POST['action'] == 'update_bill')
	{
		$ID = $_POST['bill_id'];
		$DESCRIPTION = $_POST['bill_description'];
		$STATUS = $_POST['bill_status'];
		if( $STATUS == 'new')
			$STATUS = '0';
		if( $STATUS == 'confirm')
			$STATUS = '1';
		if( $STATUS == 'finish')
			$STATUS = '2';
		tep_db_query("update bill set STATUS ='".$STATUS."', DESCRIPTION = '".$DESCRIPTION."' where ID = '" . $ID . "' ;");
		echo 'Updated successfull!';
	}
	
	
?> 