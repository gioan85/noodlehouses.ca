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
			$('.top_nav, .top_nav_bg').addClass('ani');
			$('.home_content, .mid_content').fadeIn(300,function(){
				$('.bot_copyright').fadeIn(300);
				$('.home_right_content > div').addClass('ani');
				$('#home_step_4').bind('webkitTransitionEnd transitionend msTransitionEnd oTransitionEnd',function(){
					tab_menu = 1;
					show_food_content('APPETIZERS');
					$('#menu_li_1').children('div').addClass('ani');
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
	console.log(count);
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
			console.log('continue');
			current++;
			home_slider();
		},4000);
	});
	
	///////////main_menu///////////////
	
	
	$('.top_nav').bind('click',function(){
		var content = $(this).attr('class').split(' ')[1];
		console.log(content);
		if(content == 'contact')
			return;
			
		if( tab_menu == 0)
			return;
		tab_menu = 0;
		if($(this).hasClass('actived'))
			return;
		
		$('.top_nav').removeClass('actived');
		$('.top_nav_bg').removeClass('show');
		$(this).addClass('actived');
		$(this).children('div').addClass('show');
		$('#bot_content, #mid_slider').fadeOut(300,function(){
			$('.bot_content .content_cover').removeClass('ani_home').removeClass('ani_about').removeClass('ani_menu');
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
		},1000);
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
	
	function show_food_content(food_link){
		//$('.food_title').html(food_link.replace('_',' '));
		$('.menu_left_content, .menu_right_content').hide();
		$('#scroll_cover').removeClass($('#scroll_cover').attr('class')).addClass(food_link);
		myScroll = new IScroll('.'+food_link,{
					scrollbars: true,
					mouseWheel: true,
					interactiveScrollbars: true,
					checkDOMChanges: true
				});
		var list_content = '', name, type, value;
		//-------------ajax get food menu list-------------
		$.ajax({
            url: 'xml/' + food_link + '.xml',
            type: 'GET', 
            dataType: 'xml',
            success: function(xml){				
				$(xml).find('food').each(function(){
                    name = $(this).find("name").text();
					type = $(this).find("type").text();
					value = $(this).find("value").text();
					if(type == 'title')
						list_content = list_content + '<tr><td class = "header">'+name+'</td><td></td><td></td></tr>';
					else
					{
						if(value == '')
							list_content = list_content + '<tr><td>'+name+'</td><td></td><td></td></tr>';
						else
							list_content = list_content + '<tr><td>'+name+'</td><td>'+value+'</td><td>+</td></tr>';
					}
                });
				$('.right_list').html(list_content);
            }
        });
		//-------------ajax get food images for slideshow------------------
		var img_list = '', img_id = 1;
		$.ajax({
			url: "images/food/" + food_link,
			success: function(data){
				$(data).find("a:contains(.png)").each(function(){
				// will loop through 
					var images = $(this).attr("href");
					if( img_id == 1)
						img_list = img_list + '<img src="images/food/'+food_link+'/'+images+'" id="food_slide_show'+img_id+'" class="actived" />';
					else
						img_list = img_list + '<img src="images/food/'+food_link+'/'+images+'" id="food_slide_show'+img_id+'" class="deactived" />';
					img_id++;
					
				});
				$('.food_slide_show').html(img_list);
				$('.menu_left_content, .menu_right_content').fadeIn();
				food_slide_show();
			}
	  	});
		
	};
	
	var food_loop ;
	
	function food_slide_show(){
		var food_count = $('.food_slide_show').children('img').length;
		console.log(count);
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
					food_next = 6;
				console.log('i = '+ i + ', next = '+food_next);
				$('#food_slide_show'+i).removeClass('actived').addClass('deactived');			
				$('#food_slide_show'+food_next).removeClass('deactived').addClass('actived');
				i++;
			},4000);
		}
		
	};
	
	
});

