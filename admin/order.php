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



<h1>Order status</h1>
<div class="space"></div>
<div id='load_status'>
	<table>
		<tr>
			<td><p>Order Status:</p></td>
			<td>
				<select class="select" id="order_status"></select>
				<a href="#" class="btn_update" onClick='updateOrderStatus()'>Update</a>
			</td>
		</tr>
	</table>
</div>


<script type="text/javascript">

	load_status();
	
	function load_status(){
		var string = 'action=load_status';
		
		$.ajax({
			url: "order_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				//console.log('order status : ' + data);
				$('#order_status').find('option').remove();
				// alert(data)
				if(data == 0){
					$('#order_status').append('<option>Enable</option>');
					$('#order_status').append('<option selected="selected">Disable</option>');
				}else{
					$('#order_status').append('<option selected="selected">Enable</option>');
					$('#order_status').append('<option>Disable</option>');
				}
			}
		});
	};
	
	function updateOrderStatus(){
		var orderStatus = $('#order_status').val();
		orderStatus = orderStatus == 'Disable' ? 0 : 1;
		var string = 'action=update_status';
		string += '&STATUS=' + orderStatus;
		$.ajax({
			url: "order_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				if(data){
					alert(data);
				}
				else{
					alert('There is a error when update')
				}
				load_status();
			}
		});
	};
	
	
</script>

<style>
.btn_update{
	display: flex;
    height: 30px;
    width: 100px;
    margin-right: 20px;
    float: right;
    text-decoration: none;
    background: rgba(0,0,0,0.4);
    border-radius: 5px;
    justify-content: center;
    align-items: center;
    color: #fff;
    border: 1px solid rgba(255,255,255,0.6);
}

.btn_update:hover{
	background: rgba(0,0,0,0.6);
}

</style>

<?php
// ****************************************
// Content place above this line
// ****************************************
require_once("includes/application_bottom.php");
?>