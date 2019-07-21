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
<table>
	<tr>
    	<td>USER:</td>
        <td><input type="text" class="input" id="USER"/></td>
    </tr>
    <tr>
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
<div class="btn_submit" onclick="submit_user();">Submit</div>
<script type="text/javascript">
	var user = $('#USER'),
		old_pass = $('#OLD_PASS'),
		new_pass = $('#NEW_PASS'),
		confirm_pass = $('#CONFIRM_PASS');
	function validate(){
		console.log(user);
		if(user.val() == '' || old_pass.val() == '' || new_pass.val() == '' || confirm_pass.val() == '')
		{
			alert('Please fill out the form!');
			return 0;
		}
		if( new_pass.val() != confirm_pass.val())
		{
			alert("New password don't match width Confirm password!");
			return 0;
		}
		if( old_pass.val() == new_pass.val())
		{
			alert("New password is same with old password!");
			return 0;
		}
		return 1;
	};
	
	function submit_user(){
		var error = validate();
		if(error == 0)
			return;
		var string = 'action=update_user';
		string += '&user='+ user.val();
		string += '&old_pass='+ old_pass.val();
		string += '&new_pass='+ new_pass.val();
		$.ajax({
			url: "account_editor.php",
			type: "POST",
			data: string,
			success: function(data){
				alert(data);
				user.val('');
				old_pass.val('');
				new_pass.val('');
				confirm_pass.val('');				
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