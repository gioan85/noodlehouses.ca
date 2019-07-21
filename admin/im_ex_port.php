<?php
/*
   minhtri95@yahoo.com
  Code distribution prohibitted
*/

// These are required
require_once("includes/application_top.php");

$sts->read_template_file('main_template.php');
$sts->start_capture();
$sts->set_title('noodlehouses.ca');
$sts->set_description('');
$sts->set_keywords('');

// ****************************************	
// Content place below this line
// ****************************************
?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/ajaxfileupload.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>


<h1>Import / Export Database</h1>
<div class="space"></div>
<table>
    <tr>
    	<td colspan="2">
    		<h2><span>Table</span></h2>
    		<select id="select_table">
    			<option value="foods">Food</option>
    			<option value="menu">Menu</option>
    			<option value="bill">Bill</option>
    		</select>
    	</td>
    </tr>
    <tr>
    	<td colspan="2">
    		<div class="btn_submit" onclick="export_();">Export</div>
    		
    	</td>
    </tr>
    <tr>
    	<td colspan="2">Import<input type="file" name="fileToUpload" id="fileToUpload"/><div class="btn_submit" onclick="upload_csv();">Import</div><div class="btn_submit" onclick="clear_();">Clear</div></td>
    </tr>

</table>
<div class="space"></div>

<script type="text/javascript">
	
	function clear_(){
		var answer = confirm("Are you sure to clear data of "+$('#select_table').val()+"?");
		if( answer)
		{
			var string = 'action=clear_';
				string += '&table='+ $('#select_table').val();
			$.ajax({
				url: "im_ex_port_editor.php",
				type: "POST",
				data: string,
				success: function(data){}
			});
		}
	};
	
	function export_(){
		var string = 'action=export_';
			string += '&table='+ $('#select_table').val();
		$.ajax({
			url: "im_ex_port_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				if(data)
				{
					console.log(data);
					var link = 'backup/export/' + data.replace(' ','') + '/' + $('#select_table').val() + '.csv';
					window.location.href = link;
				}	
			}
		});
		
	};

	
	function upload_csv()
	{

		if(!document.getElementById("fileToUpload").value != '')
		{
			alert('Bạn chưa chọn file!');
			return;
		}
		
		$.ajaxFileUpload
		(
			{
				type: "GET",
				url:'upload_file.php?typeof=csv' ,
				secureuri:false,
				fileElementId:'fileToUpload',
				folder: 'folder',
				dataType: 'json',
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.path !='')
						{
							//alert(data.path);
							import_(data.path,data.filename);
						}
						else
						{
							alert(data.error);
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		return false;
	}

	function import_($path, $filename){
		//alert($table_);
		console.log($path + ' ' + $filename);
		var string = 'action=import_';
			string += '&path=' + $path;
			string += '&table='+ $filename;
		$.ajax({
			url: "im_ex_port_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				if(data)
				{
					alert(data);
					//$('#download').append(' <a href="' + data + '">Download</a>');					
				}	
			}
		});
	};

</script>

<?php
// ****************************************
// Content place above this line
// ****************************************
require_once("includes/application_bottom.php");
?>