<?php 
require_once("includes/application_top.php");
if($_COOKIE['category'] == 0)
{
	echo '<li class="on"><a href="c0-tongquan.html" onclick="setCookie('."'category',"."'0'".',1);setCookie('."'top_nav'".','."'sanpham'".');">Tổng Quan</a></li>';
}
else
{
	echo '<li><a href="c0-tongquan.html" onclick="setCookie('."'category',"."'0'".',1);setCookie('."'top_nav'".','."'sanpham'".');">Tổng Quan</a></li>';
}
$category = tep_db_query('select * from menu');
while($category_row = tep_db_fetch_array($category))
{
	if($_COOKIE['category']== $category_row['ID'])
	{
		echo '<li class="on"><a href="c'.$category_row['ID'].'-'.str_replace(' ','',$category_row['NAME']).'.html" onclick="setCookie('."'category',"."'".$category_row['ID']."'".',1);setCookie('."'top_nav'".','."'sanpham'".');" >'.$category_row['NAME'].'</a>';
	}
	else
	{
		echo '<li class="off"><a href="c'.$category_row['ID'].'-'.str_replace(' ','',$category_row['NAME']).'.html" onclick="setCookie('."'category',"."'".$category_row['ID']."'".',1);setCookie('."'top_nav'".','."'sanpham'".');" >'.$category_row['NAME'].'</a>';
	}
	//echo '<li class="on"><a href="#" onclick="setCookie('."'category',"."'".$category_row['NAME']."'".',1)" >'.$category_row['NAME'].'</a>';
	$sub_prod = tep_db_query('select * from sub_product where sub_product.CATEGORY_ID=' . $category_row['ID']);
	if($sub_prod != '')
	{
		echo '<ul>';
		while($sub_prod_row = tep_db_fetch_array($sub_prod))
		{
			echo '<li><a href="s'.$sub_prod_row['ID'].'-'.$category_row['NAME'].'-'.$sub_prod_row['NAME'].'.html" onclick="setCookie('."'top_nav'".','."'sanpham'".');">'.$sub_prod_row['NAME'].'</a></li>';
		}
		echo '</ul>';
	}
	echo '</li>';
	
}
?>