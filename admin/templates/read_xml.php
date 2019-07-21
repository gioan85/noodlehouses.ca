<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
ul.menu{ margin:0; padding:0; list-style:none;}
ul.menu li{ float:left: margin-left: 20px; display:block; width:100px; height:20px;}
ul.menu li ul.child{ display:none;}
ul.menu li:hover ul.child{display:block;}
ul.child li{ display:none;}
ul.child li:hover{display:block;}
</style>
</head>

<body>
<?php
$xml = simplexml_load_file("test.xml");

//echo $xml->getName() . "<br />";
echo '<ul class= "menu">';
foreach($xml->children() as $child)
  {
	echo '<li><a href="' . $child . '">' . str_replace("_" , " ", $child->getName()) . '</a> ';
	echo '<ul class ="child">';
	foreach($child->children() as $child_son)
	{
		echo '<li><a href="' . $child_son . '">' . str_replace("_" , " ", $child_son->getName()) . '</a></li> ';
		echo '<ul>';
		foreach($child_son->children() as $child_grand)
		{
			echo '<li><a href="' . $child_grand . '">' . str_replace("_" , " ", $child_grand->getName()) . '</a></li> ';
		}
		echo '</ul></li>';
	}
	echo '</ul></li>';	
  }
  echo '</ul>';
?> 
</body>
</html>


