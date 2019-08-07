var food_scroller;

var contact_name,
	contact_phone,
	contact_email,
	contact_message;
var auto = true;
var loop_slide_show;
var timeout;
var food_scroll;
var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");


$(document).ready(function(){
	
	$('.loading_page').fadeOut(300);

	$(window).on('scroll',top_logo_ani);
	
	$(window).on('load',function(){
		$('#top_home').trigger('tapone');
	});
	
	setTimeout(function(){
		$('.top_bar, .social_icon, .top_logo, .address_bar, .Del_Pick_bar, .navi, .left_block, .right_block, .shopping_cart, .top_line, .bot_line, .left_line, .right_line').addClass('ani_speed');
	},200);

	/*------------top menu------------*/

	$('.top_menu').bind('tapone click mouseup touchend',function(){
		$('.top_bar').find('li').removeClass('active');
		$('.top_menu').removeClass('active');
		$(this).addClass('active');
		$(this).parent('li').addClass('active');
		scrollTo_($(this).attr('rel'), $(this).attr('po'),1000);
	});
	
	//----------mobile action------------
	$('.top_bar ul').bind('tapone click mouseup touchend',function(){
		if(!$('.top_bar ul').stop().find('span').css('display') == 'inline-block')
			return;	
		$('.top_bar ul').toggleClass('active');
	});
	
	/*-----------menu_item-------------*/
	$('.menu_item').bind('tapone click mouseup touchend', function(){
		$('#menu_list').fadeOut(300);
		if(mobile_browser == true)
			clearInterval(loop_menu_);
		show_food_content($(this).attr('rel'));
		$('#menu_item_list').fadeIn(300, function(){
			$('#menu_item_list .navi').addClass('ani');
			$('#menu_item_list .left_block').addClass('ani');
			$('#menu_item_list .right_block').addClass('ani');
			$('#menu_item_list .left_block').bind('webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd',function(){
				food_slide_show();
			});
		});
	});

	/*-----------bar click-------------*/
	$('.order_btn').bind('tapone click mouseup touchend',function(){
		$('#top_menu').trigger('tapone');
	});

	$('#shopping_cart_check_out').bind('tapone click mouseup touchend',function(){
		scrollTo_('.order_screen','top',1000);
	});
	/*----------food menu----------*/
	//-------mobile action-----------
	
	$('#menu_item_list ul').bind('tapone click mouseup touchend',function(){
		if($(this).css('position') != 'absolute')
			return;
		//stop_food_slide_show();
		$('#menu_item_list').hide();
		$('#menu_item_list .navi').removeClass('ani');
		$('#menu_item_list .left_block').removeClass('ani');
		$('#menu_item_list .right_block').removeClass('ani');
		
		$('#menu_list').fadeIn(300,loop_menu_item);
	});
	//-------end mobile action-----------
	$('#menu_item_list li').bind('tapone click mouseup touchend',function(){
		if($(this).hasClass('active'))
			return;
		//stop_food_slide_show();
		$('#menu_item_list li').removeClass('active');
		$(this).addClass('active');
		$('.menu_list_content').hide();
		$('#menu_item_list .left_block').removeClass('ani');
		$('#menu_item_list .right_block').removeClass('ani');
		show_food_content($(this).attr('rel'));
		setTimeout(function(){
			$('.menu_list_content').fadeIn(200,function(){
				$('#menu_item_list .left_block').addClass('ani');
				$('#menu_item_list .right_block').addClass('ani');
				food_scroll = new IScroll('.menu_list_scroll',{
					scrollbars: true,
					mouseWheel: true,
					interactiveScrollbars: true,
					checkDOMChanges: true
				});
				$('#menu_item_list .left_block').bind('webkitTransitionEnd transitionend oTransitionEnd MSTransitionEnd',function(){
					food_slide_show();
				});
			});
		},300);
	});

	$('#contact_submit').bind('tapone click mouseup touchend',function(){
		contact_us();
	});

	contact_name = $('#contact_name');
	contact_phone = $('#contact_phone');
	contact_email = $('#contact_email');
	contact_message = $('#contact_note');

	//click icon choose food on slide show
	
});

/*-------------------------------------------new----------------------------------------------*/

function top_logo_ani(){
	//alert('logo become small')
	//console.log($(document).scrollTop());
	//----------------top logo ani-----------------------
	if($(document).scrollTop() > 100)
	{
		$('.top_bar, .top_logo').addClass('ani');
	}	
	else
	{
		$('.top_bar, .top_logo').removeClass('ani');
	}	

	//----------------address bar-----------------------
	if($(document).scrollTop() > 236)
		$('.address_bar').addClass('ani');
	else
		$('.address_bar').removeClass('ani');
	//----------------delivery pick up bar-----------------------
	if($(document).scrollTop() > 1262)
		$('.Del_Pick_bar').addClass('ani');
	else
		$('.Del_Pick_bar').removeClass('ani');
};

/*---------------------------top menu----------------------------*/

function scrollTo_(ele, po){
	//alert($(ele).offset().top);
	if(po == 'top')
	{
		$('body, html').animate({
			scrollTop: $(ele).offset().top
		},1000)
	}	
		//$(document).scrollTop($(ele).offset().top,1000);
		
	if(po == 'bottom')
	{
		$('body, html').animate({
			scrollTop: $(ele).offset().top + $('.top_bar').outerHeight()
		},1000)
		
	}	
};
   
/*-----------------------------------------------------------------*/
/*---------------------------message alert----------------------------*/

function messagebox(mess){
	$('.message_box').text();
	if(mess == '' || mess === undefined || mess === null)
		return;
	var content = "<div class='message_bg align_mid' style='top:"+$(document).scrollTop()+"px'>";
	content +="<div class='message_box red align_mid'><a href='javascript:void(0)' onclick='message_close();' class='message_close align_mid Hel_Thin red'>x</a>"+mess+"</div></div>";
	if($('body').find('.message_bg').length > 0)
		return;
	$('body').append(content).attr('style','overflow:hidden');
};

function message_close(){
	$('body').find('.message_bg').remove();
	$('body').attr('style','');
};
   
/*-----------------------------------------------------------------*/


/*---------------------------food menu----------------------------*/

function show_food_content(menu_name){		
	$('.menu_list_content').find('.menu_name').text(menu_name);
	
	///--------active menu item

	$('#menu_item_list').find('li').each(function(){
		if($(this).attr('rel') == menu_name)
			$(this).addClass('active');
	});

	var list_content = '', name, type, value;
	//-------------ajax get food menu list-------------		
	$.ajax({
		url: 'load_food.php' ,
		type: "POST",
		data: "action=load_food&menu_name=" + menu_name,
		success: function(data){
			for(var i= 0; i< data.length; i++)
			{
				if(data[i] == '*')
					data = data.replace('*','<p></p>');
			}
			$('.menu_list_content').find('.right_block').html(data);
			setTimeout(function(){
				new IScroll('.menu_list_scroll',{
					scrollbars: true,
					mouseWheel: true,
					interactiveScrollbars: true,
					checkDOMChanges: true
				});	
			},300);
		},
		error:function(){
			
		}
  	});
	//-------------ajax get food images for slideshow------------------
	var img_list = '', img_id = 1;
	$.ajax({
		url: 'load_food.php' ,
		type: "POST",
		data: "action=load_img&dir=images/food/" + menu_name + '/',
		success: function(data){
			$('.menu_img').html(data);
			if($('.menu_img').find('.icon_').length < 2)
				$('.menu_list_icon').hide();
			else
				$('.menu_list_icon').show();
			
			$('.menu_list_icon .icon_').bind('tapone click mouseup touchend',function(){
				
				clearInterval(loop_slide_show);
				
				var numb = $(this).attr('class').split(' ')[1].replace('icon_','');
				$('.menu_img').find('img.active').removeClass('active').addClass('deactive');
				$('#food_slide_show'+numb).removeClass('deactive').addClass('active');
				
				$('.menu_img').find('.icon_').removeClass('active');
				$('.menu_img').find('.icon_'+numb).addClass('active');
				setTimeout(food_slide_show,2000);
			});
		},
		error:function(){
			
		}
  	});
	
};


function food_slide_show(){
	
	clearInterval(loop_slide_show);
	
	var food_count = $('.menu_img').find('img').length;
	
	if( food_count <= 1)
		return;
	
	loop_slide_show = setInterval(function(){
		var curr = $('.menu_img .active').attr('id').replace('food_slide_show','');
		var next = parseInt(curr)+1;
		if (next > food_count)
			next = 1;
		$('#food_slide_show'+curr).removeClass('active').addClass('deactive');
		$('#food_slide_show'+next).removeClass('deactive').addClass('active');
		
		$('.menu_list_icon .icon_').removeClass('active');
		$('.menu_list_icon .icon_'+next).addClass('active');
		console.log(curr + ' ' + next);
		return;
	},4000);
	
};

function food_slide_show_active(){
	var flag = 1;
	$('.menu_img img').each(function(index, element) {
		if(flag == 0)
			return;
		if($(this).hasClass('active'))
		{
			flag = 0;
			
			$(this).attr('class','deactive');
			if( index == $('.menu_img img').length - 1)
				$('.menu_img img:nth-child(1)').attr('class','active');
			else
				$(this).next().attr('class','active');
			var numb = (index + 1)%($('.menu_img img').length);
			
			$('#menu_item_list').find('.icon_').removeClass('active');
			$('#menu_item_list').find('.icon_'+(numb+1)).addClass('active');
			console.log(numb);
		}
	});
	
};

function stop_food_slide_show(){
	
	clearInterval(loop_slide_show);
	
};
   
/*-----------------------------------------------------------------*/


/*-------------------------contact us------------------*/
function contact_us(){
	//alert('a');
	var contact_error = validate_contact();
	
	if( contact_error != '')
	{
		messagebox(contact_error);
		return;
	}
	var string = 'full_name=' + contact_name.val() + '&phone_number=' + contact_phone.val() + '&email_address=' + contact_email.val() + '&message=' + contact_message.val();
	
	$.ajax({
		url: "send_mail.php",
		type: "POST",
		data: string,
		success: function(data){
			//$('.thank_block').show("blind");
			//alert(data);
			contact_name.val("");
			contact_phone.val("");
			contact_email.val("");
			contact_message.val("");
		},
		error: function (){
			show_message('There is problem when send your email. Please try again. Thank you!');
		}
	});
};
	
function validate_contact(){
	var contact_error = '';
	if( contact_name.val() == "" || contact_name.val() == "Your name..." || contact_name.val().length < 3)
	{
		contact_name.addClass('error');
		contact_error += 'Please enter your name!<br>';
	}
	else
	{			
		contact_name.removeClass('error');
	}
	if( contact_phone.val() == "" || !$.isNumeric(contact_phone.val()) || contact_phone.val().length < 10)
	{
		contact_phone.addClass('error');
		contact_error += 'Please enter your phone number!<br>';
	}
	else
	{			
		contact_phone.removeClass('error');
	}
	if( contact_email.val() == "" || contact_email.val().match(r) == null)
	{
		contact_email.addClass('error');
		contact_error +=  'Please enter your email!<br>';
	}
	else
	{
		contact_email.removeClass('error');
	}
	if( contact_message.val() == "" ||  contact_message.val() == "Your message...")
	{
		contact_message.addClass('error');
		contact_error +=  'Please enter your message!<br>';
	}
	else
	{
		contact_message.removeClass('error');
	}
	return contact_error;
};



   