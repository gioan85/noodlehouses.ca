<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="keywords" content="caterer catering celebration chef corporate catering corporate event corportate catering dining dining at Twin Fish entree entrees event giveaways green mango healthy healthy choices love mango salad mississauga catering mississauga corporate catering parties popular entrees prizes red snapper red snapper with basil sauce special occassion staff starter thai dish thai dishes thai food thai food catering twin fish anniversary valentines day vitamin c">

<meta name="description" content="caterer catering celebration chef corporate catering corporate event corportate catering dining dining at Twin Fish entree entrees event giveaways green mango healthy healthy choices love mango salad mississauga catering mississauga corporate catering parties popular entrees prizes red snapper red snapper with basil sauce special occassion staff starter thai dish thai dishes thai food thai food catering twin fish anniversary valentines day vitamin c">
<meta http-equiv="imagetoolbar" content="no">
<!-- base href="http://osc4.template-help.com/zencart_32132/" -->

<link rel="stylesheet" type="text/css" href="templates/css/font.css">
<link rel="stylesheet" type="text/css" href="templates/css/main.css">
<script type="text/javascript">
	
	
	
	function setCookie(c_name,value,expiredays)
	{    
		var exdate=new Date()
		exdate.setDate(exdate.getDate()+expiredays)
		document.cookie=c_name+ "=" +escape(value)+
		((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
	}
	
</script>
<?php
/*
    minhtri95@yahoo.com
  
  Code distribution prohibitted
*/

	$server = DB_SERVER;
	$user = DB_SERVER_USERNAME;
	$password = DB_SERVER_PASSWORD;
	$database = DB_DATABASE;
	
	tep_db_connect($server, $user, $password, $database);


if(!isset($_COOKIE['username'])) 
{
	echo '<script type="text/javascript">';
	echo "window.location.href = 'login.php';</script>";
}

?>
<script type="text/javascript" src="templates/js/jscript_jquery-1.js"></script>
<script type="text/javascript" src="templates/js/iscroll.js"></script>
<script type="text/javascript" src="templates/js/main.js"></script>

</head>



<body>

	<div class="main_cover Hel_Regular">

    	<!--------top block------------>

    	<div class="top_bar">
        	<div class="top_menu">
            	<div class="content_cover">
                	<div class="top_logo"></div>
                    <div class="user">
                    	<img src="images/message.png" alt=""/>
                        <?php 
							echo $_COOKIE['username'];
						?><a href="login.php" onclick="setCookie('username','',0); history.go(0);">Log out</a>
                    </div>
                </div>
            </div>
        	<div class="top_bar_line"></div>
        </div>

        <div class="mid_content">
        	<div class="content_cover">
            	<ul class="left_menu">
                	<li class="title">Menu</li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="food.php">Foods</a></li>
                    <li><a href="bill.php">Bill</a></li>
                    <li><a href="account.php">Account</a></li>
                    <li><a href="home_slide_show.php">Home slide show</a></li>
                </ul>
                <div class="right_content">$body_html</div>
            </div>
        </div>

        <!----------bottom block-------->

        <div class="bot_bar">
        	<div class="bot_bar_line"></div>
            <div class="bot_content">
            	<div class="content_cover">
                	<div class="bot_copyright">
                    	<div class="phone_num green"><b>(905)-990-0933</b><br />941Lakeshore Rd East Mississauga, ON L5E 1E3</div>
                        <div class="copyright">© Copyright 2010 NooldeHouse.ca. All right reserved<br />Design by NoodleHouses.ca</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

