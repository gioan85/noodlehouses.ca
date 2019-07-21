<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>noodlehouses.ca</title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/login_style.css"/>
<script type="text/javascript" src="js/jquery.js"></script>

</head>
<?php 
unset($_COOKIE['username']);
?>
<body>
    <div id="wrap">
            <div class="idea">
            <img src="images/message.png" alt=""/>
            <p>Đăng Nhập Quản Trị Website!</p>
        </div>
        
<div class="block">
            
            <div class="left"></div>
            <div class="right">
                <div class="div-row">
                	<input type="text" id="username" name="username"  onfocus="this.value='';" onblur="if (this.value=='') {this.value='Username';}" value="Username" />
                                    </div>
                <div class="div-row">
                     <input type="password" id="password" name="password" onfocus="this.value='';" onblur="if (this.value=='') {this.value='************';}" value="************" />
                </div>
                <div class="send-row" style="float:left; margin-left:200px;">
                    <button id="login" value="" onclick="login();" name="login"></button>
                </div>
            </div>
            
        </div>
    </div>
    <script type="text/javascript">
/* <![CDATA[ */
	function setCookie(c_name,value,expiredays)
	{    
		var exdate=new Date()
		exdate.setDate(exdate.getDate()+expiredays)
		document.cookie=c_name+ "=" +escape(value)+
		((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
	}
	
	
	function login()
	{
		$.ajax({
			url: "login_editor.php",
			type: "POST",
			data: "username=" + document.getElementById('username').value + "&password=" + document.getElementById('password').value,
			success: function(data){
				if(data.toString() == ' ')
				{
					alert ('Đăng nhập không thành công!');		
					$('#username, #password').val('');			
				}
				if(data.toString() != ' ')
				{
					//alert (data);
					setCookie('username',data, 1);
					window.location.href = 'index.php';
				}
			}
		});
		
	}
/* ]]> */
</script>
</body>
</html>
