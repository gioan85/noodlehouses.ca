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



<h1>Menu</h1>

</select>
<div class="space"></div>
<table class="list_menu" cellpadding="0" cellspacing="1" border="0">
    <tr class="header">
        <td>Name</td>
        <td>Rate</td>
        <td>Status</td>
        <td><a href="javascript:void(0)" class="add_new">Add new</a></td>
    </tr>
    <tr class="add_field">
        <td><input type="text" class="input" id="menu_name"/></td>
        <td><input type="text" class="input" id="menu_rate"/></td>
        <td>
        	<select class="input" id="menu_status">
            	<option selected="selected" value="1">show</option>
                <option value="0">hide</option>
            </select>
        </td>
        <td><a href="javascript:void(0)" onclick="add_menu()">Add</a> &nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="" class="hide_add">Hide</a></td>
    </tr>
    <tr class="update_field">
        <input type="text" class="input" id="update_menu_id" value="" style="display:none;"/>
        <td><input type="text" class="input" id="update_menu_name" value=""/></td>
        <td><input type="text" class="input" id="update_menu_rate" value=""/></td>
        <td>
        	<select class="input" id="update_menu_status">
            	<option selected="selected" value="1">show</option>
                <option value="0">hide</option>
            </select>
        </td>
        <td><a href="javascript:void(0)" onclick="submid_update()" >Update</a></td>
    </tr>
</table>
<div id="scroll_cover">
    <div id="scroller">
        
        <table class="list_menu" id="list_menu" cellpadding="0" cellspacing="1" border="0">
			<tr>
            	<td>Name</td>
                <td>Rate</td>
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
	
	$('.add_new, .hide_add').bind('click',function(){
		$('.add_field').toggle('blind');
		myscroll.refresh();
	});
	
	function load_menu(){
		console.log( $('.select').val());
		var string ='action=load_menu';
		$.ajax({
			url: "menu_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				console.log(data)
				$('#list_menu').html(data);
				myscroll.refresh();
			}
		});
	};
	
	load_menu();
	
	function delete_menu(menu_ID){
		var answer = confirm("Are you sure to delete this menus?");
		if( answer)
		{
			var string = 'action=delete_menu&menu_id=' + menu_ID ;
			$.ajax({
				url: "menu_editor.php",
				type: "POST",
				data: string,
				success: function(data){
					$('#list_menu').html(data);
				}
			});
		}
	};
	
	function add_menu(){
		var menu_name = $('#menu_name');
		var menu_rate = $('#menu_rate');
		var menu_status = $('#menu_status');
		if( menu_name.val() == '' || menu_rate.val() == '' || menu_status.val() == '')
		{
			alert('Please fill out Name fields!');
			return;
		}
		var string = 'action=add_menu';
		string += '&menu_name=' + menu_name.val();
		string += '&menu_rate=' + menu_rate.val();
		string += '&menu_status=' + menu_status.val();
		$.ajax({
			url: "menu_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				load_menu();
				alert(data);
				menu_name.val('');
				menu_rate.val('');
			}
		});
	};
	
	
	
	function update_menu(id,name,rate){
		//alert(name);
		$('.update_field').toggle('blind');
		$('#update_menu_id').val(id);
		$('#update_menu_name').val(name);
		$('#update_menu_rate').val(rate);
	};
	
	function submid_update(){
		var menu_id = $('#update_menu_id');
		var menu_name = $('#update_menu_name');
		var menu_rate = $('#update_menu_rate');
		var menu_status = $('#update_menu_status');
		
		var string = 'action=update_menu';
		
		string += '&menu_id=' + menu_id.val();
		string += '&menu_name=' + menu_name.val();
		string += '&menu_rate=' + menu_rate.val();
		string += '&menu_status=' + menu_status.val();
		
		$.ajax({
			url: "menu_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				$('.update_field').toggle('blind');
				alert(data);
				load_menu();
				menu_name.val('');
				menu_rate.val('');
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