
<?php
//  minhtri95@yahoo.com

require_once("includes/application_top.php");
	
	if($_POST['action'] == 'clear_')
	{
		$table_ = $_POST['table'] ;
		tep_db_query('delete from ' . $table_);
	}

	if($_POST['action'] == 'export_')
	{
		$table_ = $_POST['table'] ;
		export_table($table_);
	}
	
	if($_POST['action'] == 'import_')
	{
		$path = $_POST['path'];
		$table_ = $_POST['table'] ;
		import_table($path, $table_);
	}



	function export_table($table_){
		$filename = $table_ . ".csv";
		$folder = 'backup/export/' . date('Y_m_d');
		
		if(!file_exists($folder))
			mkdir($folder, 0777, true);
		
		$newfile = $folder . '/' . $filename;
		
		$f = fopen($newfile, 'w');
		// Fetch Record from Database
		if($table_ == 'foods')
			$sql = tep_db_query("select * from foods order by foods.key;");
		else
			$sql = tep_db_query("select * from " . $table_ . " order by id;");
			
		$columns_total = mysqli_num_fields($sql);
		
		// Get The Field Name
		$header = array();
		for ($i = 0; $i < $columns_total; $i++) {
			$heading = mysqli_field_name($sql, $i);
			//$output .= '"'.$heading.'",';
			array_push($header, $heading);
		}
		fputcsv($f, $header);
		// Get Records from the table

		while ($row = tep_db_fetch_array($sql)) {
			$row['DESCRIPTION']	= str_replace('=','', $row['DESCRIPTION']);
			fputcsv($f, $row);
		}
		echo date('Y_m_d');
		//exit;
	};
	
	function import_table($path, $table_){
		//clear data first
		$table = str_replace('.csv', '' , $table_);
		//tep_db_query('delete from $table');

        $csvFile = fopen($path . '/' . $table_, 'r') or die ('Error when open file!');
        
        //skip header
        $line = fgetcsv($csvFile);

        while(($line = fgetcsv($csvFile)) !== FALSE){
            //check whether member already exists in database with same email
            console.log($line);
            $query = "insert into $table values (";
            for( $i =0; $i < count($line); $i++)
            {
            	
            	if($i < count($line)-1)
            		$query .= '"' . $line[$i] . '",';
            	else
            		$query .= '"' . $line[$i] . '");';
            }
			$result = tep_db_query($query);
			
        }
        fclose($csvFile);
        echo 'Import success!';
	};

	
?> 