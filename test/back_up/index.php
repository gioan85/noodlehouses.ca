<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Noodlehouses.ca</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="keywords" content="caterer catering celebration chef corporate catering corporate event corportate catering dining dining at Twin Fish entree entrees event giveaways green mango healthy healthy choices love mango salad mississauga catering mississauga corporate catering parties popular entrees prizes red snapper red snapper with basil sauce special occassion staff starter thai dish thai dishes thai food thai food catering twin fish anniversary valentines day vitamin c">

<meta name="description" content="caterer catering celebration chef corporate catering corporate event corportate catering dining dining at Twin Fish entree entrees event giveaways green mango healthy healthy choices love mango salad mississauga catering mississauga corporate catering parties popular entrees prizes red snapper red snapper with basil sauce special occassion staff starter thai dish thai dishes thai food thai food catering twin fish anniversary valentines day vitamin c">
<meta http-equiv="imagetoolbar" content="no">
<!-- base href="http://osc4.template-help.com/zencart_32132/" -->

<link rel="stylesheet" type="text/css" href="css/font.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

<script>
  (function(i,s,o,g,r,a,m)
  {i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53869868-1', 'auto');
  ga('send', 'pageview');

</script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript" src="js/jscript_jquery-1.js"></script>
<script type="text/javascript" src="js/iscroll.js"></script>
<script type="text/javascript" src="js/loadXML.js"></script>
<script type="text/javascript" src="js/main.js"></script>


</head>

<?php 
	require_once("includes/application_top.php");
?>

<body>
<div style="display:none">
	<img src="images/food_1.jpg" width="650" height="482" />
    <img src="images/food_2.jpg" width="650" height="482" />
    <img src="images/food_3.jpg" width="650" height="482" />
    <img src="images/food_4.jpg" width="650" height="482" />
    <img src="images/food_5.jpg" width="650" height="482" />
    <img src="images/store_img.png" width="334" height="166" />
</div>
	<div class="loading_page"><div class="icon_loading"></div></div>
    
	<div class="main_cover Hel_Regular">

    	<!--------top block------------>

    	<div class="top_bar">
        	<div class="top_menu">
            	<div class="content_cover">
                	<div class="top_logo"></div>
                    <div class="top_nav contact Hel_Regular"><div class="top_nav_bg show"></div><span>Contact Us</span></div>
                    <div class="top_nav menu Hel_Regular"><div class="top_nav_bg show"></div><span>Menu</span></div>
                    <div class="top_nav about Hel_Regular"><div class="top_nav_bg show"></div><span>About Us</span></div>
                    <div class="top_nav home Hel_Regular"><div class="top_nav_bg show"></div><span>Home</span></div>
                </div>
            </div>
        	<div class="top_bar_line"></div>
        </div>

        <div class="mid_content">
        	<div class="content_cover">
            	<div class="home_slider" id="mid_slider">
                	<div class="btn_pre"></div>
                    <div class="btn_next"></div>
                    <div class="slider">
                        <div class="item_img item_img_1"></div>
                        <div class="item_img item_img_2"></div>
                        <div class="item_img item_img_3"></div>
                        <div class="item_img item_img_4"></div>
                        <div class="item_img item_img_5"></div>
                    </div>
                    <div class="home_right_content">
                        <div class="hide speed_1" id="home_step_1"><h1>Wellcome to our business</h1></div>
                        <div class="text_1 Hel_Light hide speed_1" id="home_step_2">
                        	<div><img src="images/motor_delevery_icon.png" class="img menu" id="delivery_icon" /><br />Delivery</div>
                            <div><img src="images/pickup_icon.png" class="img menu" id="delivery_icon" />Pick up</div>
                        </div>
                        <div class="store_img hide speed_1" id="home_step_3"></div>
                        <div class="text_2 Hel_Regular hide speed_1" id="home_step_4">
                            941Lakeshore Rd East Mississauga, ON L5E 1E3<br /><br />
                            MONDAY-THURSDAY 10AM-9PM<br />
                            FRIDAY-SATURDAY 11AM-10PM<br />
                            SUNDAY 11AM-9PM		
                        </div>
                    </div>
                </div>
                <div class="menu_slider" id="mid_slider">
                	<ul class="menu_list">
                    	<?php 
							$count = 1;
							$menu = tep_db_query('select * from menu ORDER BY RATE');
							while ( $element = tep_db_fetch_array($menu))
							{
								
								echo '<li id="menu_li_'.$count.'" rel="' . $element["NAME"] .'"><div class="li_bg"></div><div class="li_text"><b>'.$element["NAME"].'</b></div></li>';
								$count++;
							}
						?>
                    	<!--<li id="menu_li_1" rel="APPETIZERS"><div class="li_bg"></div><div class="li_text"><b>APPETIZERS</b></div></li>
                        <li id="menu_li_2" rel="SALADS"><div class="li_bg"></div><div class="li_text"><b>SALADS</b></div></li>
                        <li id="menu_li_3" rel="SOUPS"><div class="li_bg"></div><div class="li_text"><b>SOUPS</b></div></li>
                        <li id="menu_li_4" rel="VERMICELLI"><div class="li_bg"></div><div class="li_text"><b>VERMICELLI</b></div></li>
                        <li id="menu_li_5" rel="FROM_THE_GRILL"><div class="li_bg"></div><div class="li_text"><b>FROM THE GRILL</b></div></li>
                        <li id="menu_li_6" rel="PHO"><div class="li_bg"></div><div class="li_text"><b>PHO</b></div></li>
                        <li id="menu_li_7" rel="SIZZLING_PLATES"><div class="li_bg"></div><div class="li_text"><b>SIZZLING PLATES</b></div></li>
                        <li id="menu_li_8" rel="THAI_DISHES"><div class="li_bg"></div><div class="li_text"><b>THAI DISHES</b></div></li>
                        <li id="menu_li_9" rel="DESSERTS"><div class="li_bg"></div><div class="li_text"><b>DESSERTS</b></div></li>
                        <li id="menu_li_10" rel="BEVERAGES"><div class="li_bg"></div><div class="li_text"><b>BEVERAGES</b></div></li>-->
                    </ul>
                    <div class="menu_item" id="menu_item_1">
                    	<div class="menu_left_content">
                        	<div class="food_title Hel_Thin green" style="text-transform:capitalize;"></div>
                            <div class="food_slide_show">
                            	
                            </div>
                            <div class="bill_box">
                            	<div class="bill_bar">
                                	<span class="Hel_Bold">Your Order</span>
                                	<a href="javascript:void(0)" class="btn_delivery"></a>
                                    <a href="javascript:void(0)" class="btn_bill" rel="bill_block"></a>
                                    <a href="javascript:void(0)" class="btn_user" rel="user_content"></a>
                                </div>
                                <div class="bill_content">
                                	
                                    <div class="bill_block">
                                    	<div id="scroll_cover" class="bill_scroller">
                                            <div id="scroller">
                                                <table class="bill_list" border="0" cellpadding="0" cellspacing="3" width="100%">
                                                </table>
                                            </div>                                        
                                        </div>
                                        <div class="space_1line"></div>
                                    	<!--<div class="bill_total">Your order:<span class="total"></span>
                                        </div>-->
                                        Sub total: <span class="sub_total">0$</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                        <span class="ship_block">Ship:<span class="ship_cost">3</span>$&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <div class="space_1line"></div>
                                        Hst:<span class="hst_tax">13</span>% =<span class="hst_tax_result"></span>
                                        <div class="space_1line"></div>
                                        Total:<span class="bill_cost">0</span>$
                                        <div class="space_1line"></div>
                                        <h3>Note:</h3>
                                        <div class="space_1line"></div>
                                        <textarea style="width:320px; height:50px; border:1px solid #CCC" id="bill_note"></textarea>
                                        <div class="space_1line"></div>
                                        <a href="javascript:submit_bill()" class="btn_submit">Submit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu_right_content">
                        	
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact_slider">
        	<div id="map_canvas"></div>
            <script>
            	function initialize() {
				var map_canvas = document.getElementById('map_canvas');
				var myLatlng = new google.maps.LatLng(43.4542504, -79.6589138);
				var map_options = {
				  center: myLatlng,
				  zoom: 16,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				var map = new google.maps.Map(map_canvas, map_options);
				var text;
				text= "<b style='color:#00F; display: inline-block;'>941 Lakeshore Road East, Oakville, ON, Canada<br />" + "</b>";
				var infowindow = new google.maps.InfoWindow(
				{ content: text,
					size: new google.maps.Size(5000,300),
					position: myLatlng
				});
				infowindow.open(map);    
				var marker = new google.maps.Marker({
				  position: myLatlng, 
				  map: map
				});
			  }
			  google.maps.event.addDomListener(window, 'load', initialize());
            </script>
        </div>
		
        <!----------bottom block-------->

        <div class="bot_bar">
        	<div class="bot_bar_line"></div>
            <div class="bot_content">
            	<div class="content_cover">
                	<!------home--------->
                    <div class="home_content" id="bot_content">
                    	<div class="left_block">
                        	<h1>Wellcome to our business</h1>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget felis dolor. Nullam non molestie lectus.
Morbi tempor arcu sed nunc sodales feugiat vel quis tellus.
                        </div>
                        <div class="special_discount Hel_Heavy">10%</div>
                    </div>
                    <!------about us--------->
                    <div class="about_content" id="bot_content"><br />
                    	<h1>About Us</h1><br />                        
                        <div class="about_block_1">
                        	<div class="content_block">
                            	<img src="images/chief_icon.jpg" width="89" height="89" />
                                <h2>Chief</h2><br />Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam
                            </div>
                            <div class="content_block">
                            	<img src="images/foods_icon.jpg" width="89" height="89" />
                                <h2>Foods</h2><br />Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam
                            </div>
                        </div><br />        
                        <!--<div class="about_block_1">
                        	<div class="content_block">
                            	<img src="images/truck_icon.jpg" width="89" height="89" />
                                <h2>Delivery</h2><br />Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam
                            </div>                            
                        </div>-->
                        <div class="break_line"><img src="images/space.png" width="158" height="10" /></div>
                        <!--<div class="content_block_2">
                        <h3>Pick up</h3><br />
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem<br />
                        <h3>We apply for</h3><br />
                        <img src="images/payment_icon.jpg" width="166" height="39" />
                        </div>-->
                    </div>
                    <!------contact us--------->
                    <div class="contact_content" id="bot_content">
                    	<h1>Contact Us</h1>
                        <table cellpadding="0" cellspacing="5" border="0" class="support">
                            <tbody><tr>
                                <td width="35%" class="col_left">Full name:</td>
                                <td class="col_right"><input type="text" id="full_name"><span>*</span></td>
                            </tr>
                            <tr>
                                <td class="col_left">Email address:</td>
                                <td class="col_right"><input type="text" id="email_address"><span>*</span></td>
                            </tr>
                            <tr>
                                <td class="col_left">Phone:</td>
                                <td class="col_right"><input type="text" id="phone_number"><span>*</span></td>
                            </tr>
                            <tr>
                                <td class="col_left">Message:</td>
                                <td class="col_right"><textarea class="textarea" id="message" cols="40" rows="20"></textarea><span>*</span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><div class="submit"><a href="#"><strong>submit</strong></a></div></td>
                            </tr>
                        </tbody></table>
                        <div class="contact_right_content">
                        	<div class="thank_block">
                            	<h2>Thank you!</h2><br /><br />
                                Thank you for your interested in our restaurant. We will feedback as soon as possible.<br /><br />
                            </div>
                            <div class="opening_time orange">
                            	941Lakeshore Rd East Mississauga, <br />ON L5E 1E3<br /><br />
                            	Monday-Thursday 10AM-9PM<br />
                            	Friday-Saturday 11AM-10PM<br />
                            	Sunday 11AM-9PM                            	
                            </div>
                        </div>
                    </div>
                	<div class="bot_copyright">
                    	<div class="phone_num green"><b>(905)-990-0933</b><br />941Lakeshore Rd East Mississauga, ON L5E 1E3</div>
                        <div class="copyright">© Copyright 2010 NooldeHouse.ca. All right reserved<br />Design by NoodleHouses.ca</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="PU_bg" id="alert_block">
    	<div class="PU_box" id="alert_box">
        	<div class="PU_content" id="alert_content"></div>
            <div class="PU_close"></div>
        </div>
    </div>
    
    <div class="PU_bg" id="delivery_block">
    	<div class="PU_box" id="delivery_box">
        	<div class="PU_content">
            	<div class="tab_ tab_1 actived" rel="pick_up_content">Pick up</div>
                <div class="tab_ tab_2" rel="delivery_content">Delivery</div>
                <div class="space_10line"></div>
                <div class="pick_up_content take_away_content actived">
                	<input name="pick_up_radio" onchange="update_radio()" type="radio" value="pick_up_30" id="pick_up_30" checked="checked" />
                    <label for="pick_up_30" style="display:inline-block;">Pick up after 30 minutes from now</label>
                    <div class="space_1line"></div>
                    <input name="pick_up_radio" onchange="update_radio()" type="radio" value="pick_up_time" id="pick_up_time" />
                    <label for="pick_up_time" style="display:inline-block;">Pick up today at this time</label>
                    <div class="space_1line"></div>
                    <div class="hours_mask"></div>
                    Hours
                    <select class="hours">
                    	<option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                    </select>
                    Mins<select class="minutes">
                    	<option>10</option>
                        <option>20</option>
                        <option>30</option>
                        <option>40</option>
                        <option>50</option>
                    </select>
                </div>
                <div class="delivery_content take_away_content">
                	<span style="font-size:12px;">* Free ship if total cart over 30$</span>
                    <div class="space_1line"></div>
                    Post code:
                    <select id="post_code">
                    	<option>M2N</option>
                        <option>ONT</option>
                    </select>
                    <div class="space_1line"></div><br />
                    
                </div>
                <div class="space_1line"></div>
                <div class="user_content">
                    <table border="0" cellpadding="0" cellspacing="3">
                        <tr>
                            <td>User name:</td>
                            <td><input type="text" id="user_name"/><span class="red">*</span></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td><input type="text" id="user_phone"/><span class="red">*</span></td>
                        </tr>
                        <tr>
                        	<div class="user_address_mask"></div>
                            <td>Address:</td>
                            <td><input type="text" id="user_address"/><span class="red">*</span></td>
                        </tr>
                    </table>
                </div>
                <div class="space_1line"></div>
                <h3>Note:</h3>
                <div class="space_1line"></div>
                <textarea style="width:300px; height:100px; border:1px solid #CCC" id="user_note"></textarea>                
                <div class="space_1line"></div>
                <a href="javascript:void(0)" class="btn_submit" onclick="delivery_validate()"><strong>Ok</strong></a>
            </div>
            <div class="PU_close"></div>
        </div>
    </div>
</body>

<script type="text/javascript">

	var total, description, sub_total, delivery, delivery_flag, hts_tax, bill_cost;
	var user_name = $('#user_name');
	var	user_phone = $('#user_phone');
	var	user_address = $('#user_address');
	var hst_tax = parseFloat($('.hst_tax').html());
	inital();
	function inital(){
		total = 0, description = '', sub_total = 0, delivery = '', delivery_flag = 0, bill_cost = 0;
		hst_tax = parseFloat($('.hst_tax').html());
		$('.tab_').removeClass('actived');
		$('.tab_1').addClass('actived');
		$('.take_away_content').hide();
		$('.pick_up_content').show().addClass('actived');
		user_name.val("");
		user_phone.val("");
		user_address.val("");
		$(".sub_total").val("");
		$('.bill_list').children().remove();
		$('#user_note, #bill_note').val('');
		$('.sub_total').html(sub_total +'$');
		hst_tax_result = ( 0/100*hst_tax ).toFixed(2);
		$('.hst_tax_result').html(hst_tax_result);
		$('.ship_cost').html('3');
		$('.bill_cost').html(bill_cost);
	};
	
	$('.btn_bill').bind('click',function(){
		if($('.bill_content').css('display') == "none")
		{
			$('.bill_box').addClass('speed_1').addClass('show');
			$('.bill_content').delay(500).fadeIn(300);
		}
	});
	
	$('.btn_user').bind('click',function(){
		if($('.bill_content').css('display') == "block")
		{
			$('.bill_content').fadeOut(300,function(){
				$('.bill_box').removeClass('show');
			});
		}
	});
	
	$('.btn_delivery').bind('click',function(){		
		$('#delivery_block').show();
		if( $('.pick_up_content').css('display') == 'block')
			delivery = 'pick_up';
		else
			delivery = 'delivery';
	});
	
	
	
	function add_to_bill(id,name,price){
		if($('.bill_content').css('display') == "none")
		{
			$('.bill_box').addClass('speed_1').addClass('show');
			$('.bill_content').delay(500).fadeIn();
		}
		var string = '<tr>';
		string +='<td>'+name+'</td>';
		string +='<td>'+price+'</td>';
		string +='<td class="remove_field" id ="food_'+id+'"><a href="javascript:remove_from_bill('+"'food_"+id+"','"+price+"'"+')" class="btn_remove"></a></td>';
		string +='<td class="remove_field">'+id+'</td>';
		string +='</tr>';
		var bill_list = $('.bill_list').html();
		bill_list += string;
		$('.bill_list').html(bill_list);
		sub_total += parseFloat(price);
		//$('.total').html(' ' +total+ '$');
		bill_total();
		new IScroll('.bill_scroller',{
			scrollbars: true,
			mouseWheel: true,
			interactiveScrollbars: true,
			checkDOMChanges: true
		});
		
	};
	
	function remove_from_bill(food_id, price){
		//alert(food_id);
		$('#'+food_id).parent('tr').remove();
		sub_total -= parseFloat(price);
		//$('.total').html(' ' +total+ '$');
		bill_total();
		new IScroll('.bill_scroller',{
			scrollbars: true,
			mouseWheel: true,
			interactiveScrollbars: true,
			checkDOMChanges: true
		});
	};
	
	
	
	
	
	function submit_bill(){
				
		$('.remove_field').remove();
		var foods = $('.bill_list').html();
		bill_total();
		if(delivery_flag == 0)
		{
			$('.btn_delivery').trigger('click');
			return;
		}
		var string = '';
		description += '<br>Note 2:' + $('#bill_note').val();
		string += '&CUSTOMER=' + user_name.val();
		string += '&PHONE=' + user_phone.val();
		string += '&ADDRESS=' + user_address.val();
		string += '&FOODS=' + foods;
		string += '&PRICE=' + bill_cost;
		string += '&STATUS=0';
		string += '&DESCRIPTION='+description;
		//console.log(string);
		$.ajax({
			url: 'load_food.php?action=add_bill',
			type: "GET",
			data: string,
			success: function(data){				
				show_message(data);
				inital();
				new IScroll('.bill_scroller',{
					scrollbars: true,
					mouseWheel: true,
					interactiveScrollbars: true,
					checkDOMChanges: true
				});
			},
			error:function(){
				
			}
		});
	};
	
	
	function show_message(message){
		//message = toString(message);
		$('#alert_content').html(message + ' ');
		$('#alert_block').fadeIn(300);
	};
	
	$('.PU_close').bind('click',function(){
		$(this).parent('div').parent('div').fadeOut(300);
		$('#alert_content').val(' ');
	});
	
	function take_away_validate(){
		var error = '';
		/*if( total <= 0)
		{
			error += 'There is no food in your cart!<br>';
		}*/
		if( user_name.val() == '' || user_name.val().length < 3)
		{
			error += 'Name is wrong<br>';
		}
		if( !$.isNumeric(user_phone.val()) || user_phone.val().length < 10)
		{
			error += 'Phone number is wrong<br>';
		}
		if(delivery == 'delivery')
		{
			if( user_address.val() == '' || user_address.val().length < 10)
			{
				error += 'Address is wrong<br>';
			}
		}
		return error;
	};
	
	$('.tab_').bind('click',function(){
		if( $(this).hasClass('actived'))
			return;
		$('.tab_').removeClass('actived');
		$(this).addClass('actived');
		$('.take_away_content').hide().removeClass('actived');
		var content = $(this).attr('rel');
		$('.'+content).fadeIn().addClass('actived');
		
		if(content == 'pick_up_content')
		{
			$('.user_address_mask').show();
			delivery = 'pick_up';			
		}
		else
		{
			$('.user_address_mask').hide();
			delivery = 'delivery';
		}
	});
	
	function update_radio(){
		if(document.getElementById('pick_up_30').checked == true)
			$('.hours_mask').show();
		else
			$('.hours_mask').hide();
	};
	
	function delivery_validate(){
		var error = take_away_validate();
		if( error != '')
		{
			show_message(error);
			return;
		}
		if( $('.pick_up_content ').css('display') == 'block')
		{
			if(document.getElementById('pick_up_30').checked == true)
				description ='pick up after 30 minutes';
			else
				description = 'pick up at ' + $('.hours').val() + ':' + $('.minutes').val();
		}
		else
		{
			
			description = 'delivery ' + $('#post_code').val();
		}
		description += '<br>Note: ' +$('#user_note').val();
		console.log(description);
		$('#delivery_block').fadeOut(300);
		delivery_flag = 1;
		bill_total();
	};
	
	function bill_total(){
		$('.sub_total').html(sub_total + '$');
		hst_tax_result = ( sub_total/100*hst_tax ).toFixed(2);
		$('.hst_tax_result').html(hst_tax_result);
		
		if( delivery == '' || delivery == 'pick_up')
			$('.ship_block').css('opacity','0');
		else
			$('.ship_block').css('opacity','1');
		
		if( delivery == 'pick_up')
		{		
			bill_cost = (parseFloat(sub_total) + parseFloat(hst_tax_result)).toFixed(2);
		}
		else
		{
			if( sub_total >= 30)
				$('.ship_cost').html('0');
			else
				$('.ship_cost').html('3');
			bill_cost = (parseFloat(sub_total) + parseFloat(hst_tax_result) + parseFloat($('.ship_cost').html())).toFixed(2);
		};
		
		$('.bill_cost').html(bill_cost);
	};
	
</script>



</html>

