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



<h1>Food</h1>
<h3>Menu</h3>
<select class="select" id="select" onchange="load_food()">
<?php 
	$menu = tep_db_query('select * from menu');
	while ( $element = tep_db_fetch_array($menu))
	{
		echo '<option value="' . $element['ID'] . '">' . $element['NAME'] . '</option>';
	}
?>
</select>
<div class="space"></div>
<table class="list_food" cellpadding="0" cellspacing="1" border="0">
    <tr class="header">
        <td>Name</td>
        <td>Price</td>
        <td>Description</td>
        <td><a href="javascript:void(0)" class="add_new">Add new</a></td>
    </tr>
    <tr class="add_field">
        <td><input type="text" class="input" id="food_name"/></td>
        <td><input type="text" class="input" id="food_price" /></td>
        <td><textarea class="textarea" id="description" rows="5" cols="35"></textarea></td>
        <td><a href="javascript:void(0)" onclick="add_food()">Add</a> &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="" class="hide_add">Hide</a></td>
    </tr>
    <tr class="update_field">
        <input type="text" class="input" id="update_food_id" value="" style="display:none;"/>
        <td><input type="text" class="input" id="update_food_name" value=""/></td>
        <td><input type="text" class="input" id="update_food_price" value=""/></td>
        <td><textarea class="textarea" id="update_food_description" rows="5" cols="35"></textarea></td>
        <td><a href="javascript:void(0)" onclick="submid_update()" >Update</a></td>
    </tr>
</table>
<div id="scroll_cover">
    <div id="scroller">
        
        <table class="list_food" id="list_food" cellpadding="0" cellspacing="1" border="0">
			<tr>
            	<td>Name</td>
                <td>Price</td>
                <td>Description</td>
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
	
	$('.add_new, .hide_add').bind('click',function(){
		$('.add_field').toggle('blind');
		myscroll.refresh();
	});
	
	function load_food(){
		console.log( $('.select').val());
		var string ='action=load_food&MENU='+ $('.select').val();
		$.ajax({
			url: "food_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				console.log(data)
				$('#list_food').html(data);
				myscroll.refresh();
			}
		});
	};
	
	load_food();
	
	function delete_food(food_ID){
		var answer = confirm("Are you sure to delete this foods?");
		if( answer)
		{
			var string = 'action=delete_food&food_id=' + food_ID + '&MENU=' + $('.select').val();
			$.ajax({
				url: "food_editor.php",
				type: "POST",
				data: string,
				success: function(data){
					$('#list_food').html(data);
				}
			});
		}
	};
	
	function add_food(){
		var food_name = $('#food_name');
		var food_price = $('#food_price');
		var food_description = $('#description');
		var menu_id = $('.select');
		if( food_name.val() == '' || food_price.val() == '')
		{
			alert('Please fill out Name and Price fields!');
			return;
		}
		var string = 'action=add_food';
		string += '&food_name=' + food_name.val();
		string += '&food_price=' + parseFloat(food_price.val());
		string += '&description=' + food_description.val() ;
		string += '&menu_id=' + menu_id.val();
		$.ajax({
			url: "food_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				load_food();
				alert(data);
				food_name.val('');
				food_price.val('');
				food_description.val('');
			}
		});
	};
	
	
	
	function update_food(id,name,price,description){
		//alert(name);
		$('.update_field').toggle('blind');
		$('#update_food_id').val(id);
		$('#update_food_name').val(name);
		$('#update_food_price').val(price);
		$('#update_food_description').val(description);
	};
	
	function submid_update(){
		var food_id = $('#update_food_id');
		var food_name = $('#update_food_name');
		var food_price = $('#update_food_price');
		var food_description = $('#update_food_description');
		var menu_id = $('.select');
		
		var string = 'action=update_food';
		
		string += '&food_id=' + food_id.val();
		string += '&food_name=' + food_name.val();
		string += '&food_price=' + parseFloat(food_price.val());
		string += '&description=' + food_description.val() ;
		string += '&menu_id=' + menu_id.val();
		
		var answer = confirm("Are you sure to update this foods?");
		if( answer)
		{
			$.ajax({
				url: "food_editor.php",
				type: "POST",
				data: string,
				success: function(data){
					$('.update_field').toggle('blind');
					alert(data);
					load_food();
					food_name.val('');
					food_price.val('');
					food_description.val('');
				}
			});
		}
		
		
	};
	
</script>

<?php
// ****************************************
// Content place above this line
// ****************************************
require_once("includes/application_bottom.php");
?>