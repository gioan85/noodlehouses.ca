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
<script type="text/javascript">
	$('.left_menu').remove();
	$('.right_content').addClass('waiter_order');
</script>
<h1>Waiter/Waitress order</h1>

<div class='w_table'>
	<div class='w_table_list'>
		<div class='w_table_name align_mid'>Table 1</div>
		<div class='w_table_name align_mid'>Table 2</div>
		<div class='w_table_name align_mid'>Table 3</div>
		<div class='w_table_name align_mid'>Table 4</div>
		<div class='w_table_name align_mid'>Table 5</div>
	</div>
	<div class='w_table_group'>
		
	</div>
</div>
<div class='w_list_prod'>
	<?php 
		$menu = tep_db_query('select * from menu where STATUS = 1 ORDER BY ID');
		while ( $element = tep_db_fetch_array($menu))
		{
			echo "<div class='w_prod_block'>";
			echo "<div class='w_prod_title align_ver' id='".$element['ID']."'><span>".$element['NAME']."</span></div>";
			echo "<div class='w_prod_items'>";
			$items = tep_db_query('select * from foods where MENU = ' . $element['ID']);
			while ( $ele = tep_db_fetch_array($items))
			{
				echo '<a href="javascript:void(0)" class="w_items align_mid">'.$ele['KEY'].'</a>';
			}
			echo "</div>";
			echo "</div>";
		}
	?>
	<!--<div class='w_prod_block'>
		<div class='w_prod_title align_ver'><span>APPERTIZER</span></div>
        <div class="w_prod_items">
        	<a href="#" class="w_items align_mid">A1</a>
            <a href="#" class="w_items align_mid">A1</a>
            <a href="#" class="w_items align_mid">A1</a>
            <a href="#" class="w_items align_mid">A1</a>
            <a href="#" class="w_items align_mid">A1</a>
            <a href="#" class="w_items align_mid">A1</a>
            <a href="#" class="w_items align_mid">A1</a>
            <a href="#" class="w_items align_mid">A1</a>
            <a href="#" class="w_items align_mid">A1</a>
            <a href="#" class="w_items align_mid">A1</a>
        </div>
	</div>-->
    
</div>
<script type="text/javascript">
	$('.w_items').bind('tapone click',function(){
		var item_ = $(this);
		item_.addClass('shining');
		item_.bind('webkitTransitionEnd',function(){
			item_.removeClass('shining');
		});
	});
	
	$('.w_prod_title').bind('tapone click', function(){
		var prod_title = $(this).parent('.w_prod_block').find('.w_prod_items');
		$('.w_prod_items').each(function(index, element) {
			if($(this).css('display') == 'block')
				$(this).stop().animate({height:'toggle'});
        });
		prod_title.stop().animate({ height:'toggle'});
	});
</script>
<?php
// ****************************************
// Content place above this line
// ****************************************
require_once("includes/application_bottom.php");
?>