$(window).load(function(){
   document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
   $('.loading_page').fadeOut();
   //$('.slider').blinds();
   // start loading page
   var tab_menu = 0;
   
	
	setTimeout(function(){
		$('.top_menu, .bot_content .content_cover').addClass('speed_1');
		$('.top_menu').delay(500).addClass('ani');
		$('.bot_content .content_cover').delay(500).addClass('ani_home');
		$('.top_menu').one('webkitTransitionEnd transitionend msTransitionEnd oTransitionEnd',function(){
			$('.top_logo').fadeIn(200);
			$('.top_nav, .top_nav_bg, .top_nav_cover').addClass('ani');
			$('.home_content, .mid_content').fadeIn(300,function(){
				$('.bot_copyright').fadeIn(300);
				$('.home_right_content > div').addClass('ani');
				$('#home_step_4').bind('webkitTransitionEnd transitionend msTransitionEnd oTransitionEnd',function(){
					tab_menu = 1;					
				});
			})
		});
	},300);
	
	//animation for top navigation
	setTimeout(function(){
		$('.top_nav_bg').removeClass('ani').removeClass('show');
		setTimeout(function(){
			$('.home').addClass('actived');
			$('.home .top_nav_bg').addClass('show');
			$('.top_nav_bg').addClass('speed');
			$('.top_nav').hover(
				function(){
					if($(this).hasClass('actived'))
						return;
					$(this).children('div').addClass('show');
				},
				function(){
					if($(this).hasClass('actived'))
						return;
					$(this).children('div').removeClass('show');
				}
			);
			
		},500);
	},2000);
	
	
	
	///home slider
	var count = $('.slider').children().length;
	//console.log(count);
	var block_click = 0;
	var current = 1;
	var auto = 1;
	var loop = null;
	var block_click = 0;
	var reload_slider;
	var food_menu_click = 0;
	var myScroll;
	
	
	function show_item_next(){
		block_click = 1;		
		var pre = current - 1;
		if ( pre < 1 )
			pre = count;
		
		$('.item_img_'+pre).fadeOut(1000);
		$('.item_img_'+current).fadeIn(1000,function(){
			auto = 1;
			block_click = 0;
		});
	};
	
	function show_item_prev(){
		block_click = 1;		
		var prev = current-1;
		if ( prev < 1 )
			prev = count;
			
		$('.item_img').fadeOut(1000);
		$('.item_img_'+prev).fadeIn(1000,function(){
			auto = 1;
			current = current - 1;
			block_click = 0;
		});
	};
	
	function home_slider(){
		//console.log(current);
		if(count == '1')
		{
			$('.item_img').show();
			return;
		}
		show_item_next();
		loop = setInterval(function(){
			if( auto == 0)
				return;
			current++;
			if( current > count)
				current = 1;
			//console.log(current);
			show_item_next();
		},4000);
	};
	
	home_slider();
	
	$('.btn_next').bind('click',function(){
		if( block_click == 1)
			return;
		auto = 0;
		
		clearTimeout(reload_slider);
		current++;
		clearInterval(loop);
		loop = null;
		if( current > count)
			current = 1;
		show_item_next();
		reload_slider = setTimeout(function(){
			current++;
			home_slider();
		},4000);
	});
	
	$('.btn_pre').bind('click',function(){
		if( block_click == 1)
			return;
		auto = 0;
		//current = current-1;
		clearTimeout(reload_slider);
		clearInterval(loop);
		loop = null;
		if( current < 1)
			current = count;
		show_item_prev();
		reload_slider = setTimeout(function(){
			//console.log('continue');
			current++;
			home_slider();
		},4000);
	});
	
	///////////main_menu///////////////
	
	$('.top_nav, #delivery_icon').bind('click',function(){
		var content = $(this).attr('class').split(' ')[1];
		//console.log(content);
		if($(this).hasClass('actived'))
			return;
				
		if( tab_menu == 0)
			return;
		tab_menu = 0;		
		
		
		$('.top_nav').removeClass('actived');
		$('.top_nav_bg').removeClass('show');
		if($(this).hasClass('menu'))
		{
			show_food_content('APPETIZERS');
			$('#menu_li_1').children('div').addClass('ani');
		}
		if( $(this).hasClass('img'))
		{
			$('.menu').addClass('actived');
			$('.menu').children('div').addClass('show');			
		}
		else
		{
			$(this).addClass('actived');
			$(this).children('div').addClass('show');
		}
		$('.contact_slider').removeClass('actived');
		$('#bot_content, #mid_slider').fadeOut(300,function(){
			$('.bot_content .content_cover').removeClass('ani_home').removeClass('ani_about').removeClass('ani_menu').removeClass('ani_contact');
			$('.bot_content .content_cover').addClass('ani_'+content);
			init_food_list();
			setTimeout(function(){		
				$('.'+content+'_slider, .'+content+'_content').fadeIn(300,function(){
					if(content == 'menu')
					{
						show_food_list();
					}
					else
						tab_menu = 1;
					$('.img').removeClass('actived');
					if(content == 'contact')
						$('.contact_slider').addClass('actived');
				});
			},600);
		});
	});
	
	///////////food_menu////////////
	function init_food_list(){
		$('.menu_list > li').removeClass('ani');
	};
	function show_food_list(){
		
		$('.menu_list > li').addClass('speed_2');
		var menu_count = $('.menu_list').children('li').length;
		var i = 1;
		var menu_loop = setInterval(function(){
			$('#menu_li_'+i).addClass('ani');
			i++;						
		},100);
		
		setTimeout(function(){
			clearInterval(menu_loop);
			menu_loop = null;
			$('.li_bg').addClass('speed_2');
			tab_menu = 1;
			food_menu_click = 1;
			food_menu_hover();
			change_food_menu();
			food_slide_show();
			if( delivery_flag ==0)
			{
				$('#delivery_block').fadeIn();
			}
		},1400);
	};
	
	function food_menu_hover(){
		$('.menu_list  li').hover(
			function(){
				if($(this).hasClass('actived'))
					return;
				$(this).addClass('show');
				$(this).children('div').addClass('ani');
			},
			function(){
				if($(this).hasClass('actived'))
					return;
				$(this).removeClass('show');
				$(this).children('div').removeClass('ani');
			}
		);
	};
	
	
	
	function change_food_menu(){
		$('.menu_list > li').bind('click',function(){
			if( $(this).hasClass('actived'))
				return;
			$('.menu_list > li').removeClass('actived');
			$('.menu_list > li').removeClass('show');
			$('.menu_list > li').children('div').removeClass('ani');
			$(this).addClass('actived');
			$(this).addClass('show');
			$(this).children('div').addClass('ani');
			show_food_content($(this).attr('rel'));
		});
	};
	
	

	function show_food_content(menu_name){		
		$('.food_title').html(menu_name);
		$('.menu_left_content, .menu_right_content').hide();
		//$('#scroll_cover').removeClass($('#scroll_cover').attr('class')).addClass(food_link);		
		var list_content = '', name, type, value;
		//-------------ajax get food menu list-------------		
		$.ajax({
			url: 'load_food.php' ,
			type: "POST",
			data: "action=load_food&menu_name=" + menu_name,
			success: function(data){
				$('.menu_right_content').html(data);
				setTimeout(function(){
					
					new IScroll('.food_menu_scroll',{
						scrollbars: true,
						mouseWheel: true,
						interactiveScrollbars: true,
						checkDOMChanges: true
					});
				},1000);
				
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
				$('.food_slide_show').html(data);
				$('.menu_left_content, .menu_right_content').fadeIn();
				food_slide_show();
			},
			error:function(){
				
			}
	  	});
		
	};
	
	var food_loop ;
	
	function food_slide_show(){
		var food_count = $('.food_slide_show').children('img').length;
		//console.log(count);
		var i = 1;
		var food_next;
		if( food_loop != null)
		{
			clearInterval(food_loop);
			food_loop = null;
		}
		if( food_count <= 1)
			return;
		else		{
			
			food_loop = setInterval(function(){			
				if( i > food_count)
					i = 1;
				food_next = (i+1)%food_count;
				if( food_next == 0)
					food_next = food_count;
				//console.log('i = '+ i + ', next = '+food_next);
				$('#food_slide_show'+i).removeClass('actived').addClass('deactived');			
				$('#food_slide_show'+food_next).removeClass('deactived').addClass('actived');
				i++;
			},4000);
		}
		
	};
	
	//add food to take away
	
	
	///------------contact us--------------
	
	var full_name = $('#full_name'),
		email = $('#email_address'),
		phone = $('#phone_number'),
		message = $('#message');
	var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
	
	
	function validate_(){
		var email_error = '';
		if( full_name.val() == "" || full_name.val().length < 3)
		{
			full_name.addClass('error');
			email_error += 'Your full name is wrong!<br>';
		}
		else
		{			
			full_name.removeClass('error');
		}
		if( phone.val() == "" || !$.isNumeric(phone.val()) || phone.val().length < 10)
		{
			phone.addClass('error');
			email_error += 'Your phone number is wrong!<br>';
		}
		else
		{			
			phone.removeClass('error');
		}
		if( email.val() == "" || email.val().match(r) == null)
		{
			email.addClass('error');
			email_error +=  'Your email is wrong!<br>';
		}
		else
		{
			email.removeClass('error');
		}
		if( message.val() == "")
		{
			message.addClass('error');
			email_error +=  'Your message is wrong!<br>';
		}
		else
		{
			message.removeClass('error');
		}
		return email_error;
	};
	
	$('.submit').bind('click',function(){
		var email_error = validate_();
		
		if( email_error != '')
		{
			show_message(email_error);
			return;
		}
		var string = 'full_name=' + full_name.val() + '&phone_number=' + phone.val() + '&email_address=' + email.val() + '&message=' + message.val();
		
		$.ajax({
			url: "send_mail.php",
			type: "POST",
			data: string,
			success: function(data){
				$('.thank_block').show("blind");
				//alert(data);
				full_name.val("");
				phone.val("");
				email.val("");
				message.val("");
			},
			error: function (){
				show_message('There is problem when send your email. Please try again. Thank you!');
			}
		});
	});
	


	
});

