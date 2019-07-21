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
	<option>2014</option>
    <option>2015</option>
    <option>2016</option>
    <option selected="selected">2017</option>
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
        <td><textarea class="textarea" id="update_bill_description" rows="5" cols="16"></textarea></td>
        <td><div class="bill_price"></div></td>
        <td><div class="bill_date"></div></td>
        <td>
        	<select class="select" id="update_bill_status"  style="width:62px;">
            	<option value="0">New</option>
                <option value="1">Confirm</option>
                <option value="2">Finish</option>
            </select>
        </td>
        <td>
        	<a href="javascript:void(0)" onclick="submid_update()" >Update</a><br>
        	<a href="javascript:void(0)" onclick="cancel_update()" >Cancel</a>
        </td>
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

<div style="display:none;" id="print_reciept">
	
	<div id="print_header">
    	<table class="print_content" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td colspan="4">
                	H & P NOODLE HOUSE<br />
                    1466 PRAIRIE AVE<br />
                    PORT COQUITLAM, BC V3B 5M8
                </td>
            </tr>
            <tr>
            	<td colspan="4" style="font-size:12px;">
                	<br /><br /><span id="guest_name">GUEST</span> RECEIPT<br /><br />
                </td>
            </tr>
            <tr>
            	<td colspan="4">
                    Date: <span id="print_bill_date"></span><br />
                    Time: <span id="print_bill_time"></span>
                    <br /><br />
                </td>
            </tr>
        </table>
    </div>
    <div id="print_mid">
    	<!-- <table cellpadding="0" cellspacing="0" border="0">
    		<tr>
    			<td>ITEM(S)</td>
    			<td>PRICE</td>
    			<td>QTY</td>
    			<td>TOTAL</td>
    		</tr>
    	</table> -->
    </div>
	<div id="print_footer">
    	<table cellpadding="0" cellspacing="0" border="0">
            <tr><td colspan="4">&nbsp;</td></tr>
            <tr>
                <td colspan="3">Subtotal</td>
                <td><span id="subtotal"></span></td>
            </tr>
            <tr>
                <td colspan="3">GST</td>
                <td><span id="GST_tax"></span></td>
            </tr>
            <tr class="border">
                <td colspan="3">Total:</td>
                <td id="footer_total_cost"></td>
            </tr>
            <tr class="header">
            	<td colspan="3"><b>Net Payable</b></td>
                <td><b id="net_payable"></b></td>
            </tr>
            <tr>
            	<td colspan="4" style="text-align:center !important;">==THANK YOU VISIT AGAIN==</td>
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
		//console.log(string);
		$.ajax({
			url: "bill_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				//alert(data);
				//console.log(data);
				$('#list_bill').html(data);
				setTimeout(function(){
					$('.list_bill').find('.new_bill').each(function(){
						$(this).find('.print_bill').trigger('click');
					});
				},1000);
				myscroll.refresh();
			}
		});
		
	};
	
	load_bill();
	setInterval( function(){
		load_bill();
	} ,60000);
	
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
		
		$.ajax({
			url: "bill_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				$('.update_field').toggle('blind');
				load_bill();
				bill_id.val('')
				bill_description.val('');
			}
		});
		
	};

	function cancel_update(){
		$('.update_field').toggle('blind');
	};
	
	function repare_to_print(description,price,date,customer,foods){
		$('#footer_total_cost').html(price);
		$('#net_payable').html(price);
		$('#print_bill_date').text(date.split(/\D/)[0] + '-' +date.split(/\D/)[1] + '-' +date.split(/\D/)[2]);
		$('#print_bill_time').text(date.split(/\D/)[3] + ':' +date.split(/\D/)[4]);
		$('#guest_name').html(customer.split('<br>')[0]);
		$('#print_mid').html(foods);
		
		/// call subtotal
		var subtotal = 0;
		var GST_tax = 5;
		$('#print_mid tr').find('td:nth-last-child(1)').each(function(index, el) {
			if(!isNaN($(this).text()))
			{
				subtotal += parseFloat($(this).text()) * 1;
			}	
		});

		$('#subtotal').text(subtotal);
		$('#GST_tax').text(parseFloat(subtotal*GST_tax/100).toFixed(2))
	};
	
	function print_bill(id){
		//alert(id);
		
		var string = 'action=print_bill';
		
		string += '&bill_id=' + id;
		string += '&bill_status=confirm';
		
		// update status

		$.ajax({
			url: "bill_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				load_bill();
			}
		});

		var record_id = $('#print_record_'+id);
		var customer = record_id.find('.customer').html();
		var price = record_id.find('.price').text();
		var date = record_id.find('.date').text();
		var description = record_id.find('.description').text();
		var foods = record_id.find('.foods').html();
		record_id.find('.foods').find('tr:nth-child(1)').remove();
		repare_to_print(description,price,date,customer,foods);
		
		var style = '<style type="text/css">';
			style += 'body{ margin:0px; overflow:hidden; padding:10px; width:100%; font-family: Arial, Helvetica, sans-serif;}';
			style += 'table{ width:100%;}';
			style += 'table td{ text-align:center; font-size:14px; color:#000; line-height:18px; width:15%; text-transform: uppercase;}';
			style += 'table td:nth-child(1){ width:55%; text-align:left !important;}';
			style += 'table td:nth-last-child(1){ text-align:right; padding-right:5%; width:10%;}';
			style += 'table tr.border td{border-top:1px dashed #000; border-bottom:1px dashed #000; padding:5px 0px;}';
			style += 'table tr.header td{ font-size:14px; padding:10px 0px;}';
			style += 'table.print_content td{ text-align:center !important;}';
			style += 'table tr.border td:nth-last-child(1){ padding-right:5%;}';
			style += 'table tr.header td:nth-last-child(1){ padding-right:5%;}';
			
			style += '#print_mid tr:nth-child(1) td{font-size: 12px;}';
			style += '#print_header tr:nth-last-child(1) td{ text-align: left !important; }';
			style += '@page{ size:auto; margin:10%;}';
			style += '</style>';


		var printWindow = window.open('', '', 'width=300');
		printWindow.document.write(style + $('#print_reciept').html());
		
		// for chrome if want to set silent printing 
		// edit the link to google chome shortcut like this
		//
		
		
		printWindow.print();
		setTimeout(function(){
			printWindow.close();
		},100);


		//printPage('print_bill.html');

	};
	

	function closePrint () {
	  	document.body.removeChild(this.__container__);
	}

	function setPrint () {
		setTimeout(function(){
			console.log($(document).find('#print_bill_content_').length)	
		},1000);
		$(document).find('#print_bill_content_').html($('#print_reciept').html());
	  	// this.contentWindow.__container__ = this;
	  	// this.contentWindow.onbeforeunload = closePrint;
	  	// this.contentWindow.onafterprint = closePrint;
	  	// this.contentWindow.focus(); // Required for IE
	  	// this.contentWindow.print();
	}

	function printPage (sURL) {
	  	var oHiddFrame = document.createElement("iframe");
	  	oHiddFrame.onload = setPrint;
	  	oHiddFrame.style.visibility = "hidden";
	  	oHiddFrame.style.position = "fixed";
	  	oHiddFrame.style.right = "0";
	  	oHiddFrame.style.bottom = "0";
	  	oHiddFrame.src = sURL;
	  	document.body.appendChild(oHiddFrame);
	  	

	}
	
</script>

<?php
// ****************************************
// Content place above this line
// ****************************************
require_once("includes/application_bottom.php");
?>
