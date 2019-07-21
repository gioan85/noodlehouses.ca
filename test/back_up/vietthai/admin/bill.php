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

<!--<embed src ="media/sound_1.mp3" hidden="true" autostart="true"></embed>
-->
<h1>Bills</h1>
<h3>Time</h3>
<select class="select" id="year" onchange="load_bill()">
	<option selected="selected">2014</option>
    <option>2015</option>
    <option>2016</option>
    <option>2017</option>
</select>
<select class="select" id="month" onchange="load_bill()">
	<option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    <option selected="selected">All</option>
</select>
<div class="space"></div>

<table class="list_bill" cellpadding="0" cellspacing="1" border="0">
    <tr class="header">
        <td>Customer</td>
        <td>Foods</td>
        <td>Description</td>
        <td>Price</td>
        <td>Date</td>
        <td>Status</td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <!--<tr class="update_field">
        <input type="text" class="input" id="update_bill_id" value="" style="display:none;"/>
        <td><input type="text" id="update_bill_customer"/><br /><input type="text" id="update_bill_phone"/><input type="text" id="update_bill_address"/></td>
        <td><textarea class="textarea" id="update_bill_foods" rows="5" cols="35"></textarea></td>
        <td><textarea class="textarea" id="update_bill_description" rows="5" cols="35"></textarea></td>
        <td><input type="text" class="input" id="update_bill_price" value="" style="width:50px;"/></td>
        <td><input type="text" class="input" id="update_bill_date" value="" style="width:50px;"/></td>
        <td>
        	<select class="select" id="update_bill_status"  style="width:62px;">
            	<option>new</option>
                <option>Confirm</option>
                <option>finish</option>
            </select>
        </td>
        <td><a href="javascript:void(0)" onclick="submid_update()" >Update</a></td>
    </tr>-->
    <tr class="update_field">
        <input type="text" class="input" id="update_bill_id" value="" style="display:none;"/>
        <td><div class="bill_customer_info"></div></td>
        <td><div class="bill_food"></div></td>
        <td><textarea class="textarea" id="update_bill_description" rows="5" cols="8"></textarea></td>
        <td><div class="bill_price"></div></td>
        <td><div class="bill_date"></div></td>
        <td>
        	<select class="select" id="update_bill_status"  style="width:62px;">
            	<option value="0">New</option>
                <option value="1">Confirm</option>
                <option value="2">Finish</option>
            </select>
        </td>
        <td><a href="javascript:void(0)" onclick="submid_update()" >Update</a></td>
    </tr>
</table>
<div id="scroll_cover">
    <div id="scroller">
        
        <table class="list_bill" id="list_bill" cellpadding="0" cellspacing="1" border="0">
			<tr>
            	<td>Name</td>
                <td>Foods</td>
                <td>Description</td>
                <td>Price</td>
                <td>Date</td>
                <td>Status</td>
                <td></td>
            </tr>
		</table>
    </div>
</div>

<script type="text/javascript">
	var myscroll = new IScroll('#scroll_cover',{
		scrollbars: true,
		mouseWheel: true,
		interactiveScrollbars: true,
		checkDOMChanges: true
	});
	
	
	
	function load_bill(){
		var string ='action=load_bill';
		string +='&year=' + $('#year').val();
		string +='&month=' + $('#month').val();
		$.ajax({
			url: "bill_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				$('#list_bill').html(data);
				myscroll.refresh();
			}
		});
		console.log('load bill');
	};
	
	load_bill();
	setInterval(load_bill,30000);
	
	function delete_bill(bill_ID){
		var answer = confirm("Are you sure to delete this bill?");
		if( answer)
		{
			var string = 'action=delete_bill&bill_id=' + bill_ID;
			string +='&year=' + $('#year').val();
			string +='&month=' + $('#month').val();
			$.ajax({
				url: "bill_editor.php",
				type: "POST",
				data: string,
				success: function(data){
					$('#list_bill').html(data);
				}
			});
		}
	};
	
	
	/*function update_bill(id,customer,foods,description,price,date,status,phone,address){		
		$('.update_field').toggle('blind');
		$('#update_bill_id').val(id);
		$('#update_bill_customer').val(customer);
		$('#update_bill_foods').val(foods);
		$('#update_bill_description').val(description);
		$('#update_bill_price').val(price);
		$('#update_bill_date').val(date);
		$('#update_bill_phone').val(phone);
		$('#update_bill_address').val(address);		
	};
	
	function submid_update(){
		var bill_id = $('#update_bill_id'),
		bill_customer = $('#update_bill_customer'),
		bill_foods = $('#update_bill_foods'),
		bill_description = $('#update_bill_description'),
		bill_price = $('#update_bill_price'),
		bill_date = $('#update_bill_date'),
		bill_phone = $('#update_bill_phone'),
		bill_address = $('#update_bill_address'),
		bill_status = $('#update_bill_status');
		
		var string = 'action=update_bill';
		
		string += '&bill_id=' + bill_id.val();
		string += '&bill_customer=' + bill_customer.val();
		string += '&bill_price=' + parseFloat(bill_price.val());
		string += '&bill_date=' + bill_date.val() ;
		string += '&bill_phone=' + bill_phone.val() ;
		string += '&bill_address=' + bill_address.val();
		string += '&bill_status=' + bill_status.val();
		
		var answer = confirm("Are you sure to update this bill?");
		if( answer)
		{
			$.ajax({
				url: "bill_editor.php",
				type: "POST",
				data: string,
				success: function(data){
					$('.update_field').toggle('blind');
					alert(data);
					load_bill();
					bill_id.val('')
					bill_customer.val('');
					bill_price.val('');
					bill_date.val('');
					bill_phone.val('');
					bill_address.val('');
				}
			});
		}
		else
		{
			$('.update_field').toggle('blind');
			bill_id.val('')
			bill_customer.val('');
			bill_price.val('');
			bill_date.val('');
			bill_phone.val('');
			bill_address.val('');
		}
		
		
	};
	
	*/
	
	function update_bill(id,customer,foods,description,price,date,status,phone,address){
		$('.update_field').toggle('blind');
		$('#update_bill_id').val(id);
		$('.bill_customer_info').html(customer + '\n' + phone + '\n' + address);
		$('.bill_food').html(foods);
		$('#update_bill_description').val(description);
		$('.bill_price').html(price);
		$('.bill_date').html(date);
	};
	
	function submid_update(){
		var bill_id = $('#update_bill_id'),
		bill_description = $('#update_bill_description'),
		bill_status = $('#update_bill_status');
		
		var string = 'action=update_bill';
		
		string += '&bill_id=' + bill_id.val();
		string += '&bill_description=' + bill_description.val();
		string += '&bill_status=' + bill_status.val();
		
		var answer = confirm("Are you sure to update this bill?");
		if( answer)
		{
			$.ajax({
				url: "bill_editor.php",
				type: "POST",
				data: string,
				success: function(data){
					$('.update_field').toggle('blind');
					alert(data);
					load_bill();
					bill_id.val('')
					bill_description.val('');
				}
			});
		}
		else
		{			
			$('.update_field').toggle('blind');
			bill_id.val('')
			bill_description.val('');
		}
		
		
	};
	
</script>

<?php
// ****************************************
// Content place above this line
// ****************************************
require_once("includes/application_bottom.php");
?>