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



<h1>Account</h1>
<div class="space"></div>
<div id='load_user'></div>
<div class="space"></div>
<div id='edit_user' style="display:none;">
	<table>
		<tr>
			<td>USER:</p></td>
			<td><input type="text" class="input" id="USER"/><input style='display:none; visibility:hidden;' type="text" class="input" id="USER_ID"/></td>
		</tr>
		<tr>
			<td>POSTION:</td>
			<td>
				<select id="POSITION">
					<option value="admin">admin</option>
					<option value="waiter">waiter/waitress</option>
					<option value="cook">cook</option>
				</select>
			</td>
		</tr>
		<tr class="old_pass_field">
			<td>OLD PASSWORD:</td>
			<td><input type="password" class="input" id="OLD_PASS"/></td>
		</tr>
		<tr>
			<td>NEW PASSWORD:</td>
			<td><input type="password" class="input" id="NEW_PASS"/></td>
		</tr>
		<tr>
			<td>COMFIRM PASSWORD:</td>
			<td><input type="password" class="input" id="CONFIRM_PASS"/></td>
		</tr>
	</table>
	<div class="space"></div>
	<div class="btn_submit" id="add_user" onclick="add_user()" style='display:none;'>Add</div>
	<div class="btn_submit" id="update_user" onclick="update_user()" style='display:none;'>Update</div>
	<div class="btn_submit" id="Hide" onclick="Hide()" style='display:none;'>Hide</div>
</div>

<div class="space"></div>

<script type="text/javascript">

	load_user();
	var user, user_id, old_pass, new_pass, confirm_pass,	position;
	
	function get_info(){
		user = $('#USER').val(),
		user_id = $('#USER_ID').val(),
		old_pass = $('#OLD_PASS').val(),
		new_pass = $('#NEW_PASS').val(),
		confirm_pass = $('#CONFIRM_PASS').val(),
		position = $('#POSITION').val();
	};
		
	function validate(){
		get_info();
		console.log(user);
		if(user == '' || old_pass == '' || new_pass == '' || confirm_pass == '')
		{
			alert('Please fill out the form!');
			return 0;
		}
		if( new_pass != confirm_pass)
		{
			alert("New password don't match width Confirm password!");
			return 0;
		}
		if( old_pass == new_pass)
		{
			alert("New password is same with old password!");
			return 0;
		}
		return 1;
	};
	
	function init(){
		$('#USER').val('');
		$('#USER_ID').val('');
		$('#OLD_PASS').val('');
		$('#NEW_PASS').val('');
		$('#CONFIRM_PASS').val('');
	};
	
	function Hide(){
		init();
		$('#edit_user').stop().animate({height:'toggle'});
	};
	
	function update_user(){
		get_info();
		var string = 'action=update_user';
		string += '&user_id=' + user_id;
		string += '&position=' + position;
		if(position == 'admin')
		{
			var error = validate();
			if(error == 0)
				return;

			string += '&user='+ user;
			string += '&old_pass='+ old_pass;
			string += '&new_pass='+ new_pass;
		}
		
		$.ajax({
			url: "account_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				alert(data);
				load_user();
				Hide();
			}
		});
	};
	
	function load_user(){
		var string = 'action=load_user';
		$.ajax({
			url: "account_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				$('#load_user').html(data);
			}
		});
	};
	
	function add_new(){
		$('#edit_user .btn_submit, .old_pass_field').hide();
		$('#add_user, #Hide').show();
		$('#edit_user').stop().animate({height:'toggle'});
	};
	
	
	function add_user(){
		get_info();
		
		if( user == '' || new_pass == '' || confirm_pass == '')
		{
			alert('Please fill out below fields!');
			return;
		}
		if( new_pass !== confirm_pass)
		{
			alert('Password and Confirm password not match!');
			return;
		}
		
		var string = 'action=add_user';
		string += '&user=' + user;
		string += '&position=' + position;
		string += '&password=' + new_pass;
		
		$.ajax({
			url: "account_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				load_user();
				alert(data);
				init();
				$('#edit_user').stop().animate({height:'toggle'});
			}
		});
	};
	
	function delete_user(id){
		
		var string = 'action=delete_user';
		string += '&user=' + id;
		var answer = confirm("Are you sure to update this user?");
		if( answer)
		{
			$.ajax({
				url: "account_editor.php",
				type: "POST",
				data: string,
				success: function(data){
					load_user();
					init();
				}
			});
		}
		
	};
	
	function load_update_user(id,user,position){
		init();
		$('#USER_ID').val(id);
		$('#USER').val(user);
		$('#edit_user .btn_submit').hide();
		
		$('#update_user, .old_pass_field, #Hide').show();
		$('#edit_user').stop().animate({height:'toggle'});
		
		$('#POSITION').find('option').removeAttr('selected');
		
		$('#POSITION').find('option').each(function(index, element) {
			if($(this).attr('value') == position)
				$(this).attr('selected','selected');
		});
		
	};
	
</script>

<?php
// ****************************************
// Content place above this line
// ****************************************
require_once("includes/application_bottom.php");
?>