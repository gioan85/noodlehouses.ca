$(window).load(function(){
   
   $('.loading_page').fadeOut();
   
   // start loading page
	setTimeout(function(){
		$('.top_menu, .bot_content .content_cover').addClass('speed_1');
		$('.top_menu, .bot_content .content_cover').delay(500).addClass('ani');
		$('.top_menu').one('webkitTransitionEnd transitionend msTransitionEnd oTransitionEnd',function(){
			$('.top_logo').fadeIn(200);
			$('.top_nav, .top_nav_bg').addClass('ani');
			$('.home_second_content, .mid_content').fadeIn(300,function(){
				$('.item_text, .item_img').addClass('speed_1');
				$('.bot_copyright').fadeIn(300);
				
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
			$('.top_nav').bind('click',function(){
				//alert('a');
				if($(this).hasClass('actived'))
					return;
				$('.top_nav').removeClass('actived');
				$('.top_nav_bg').removeClass('show');
				$(this).addClass('actived');
				$(this).children('div').addClass('show');
			});
		},500);
	},2000);
	
	///home slider
	var count = $('.slider').children().length;
	var current = 1;
	var auto = 1;
	var loop = null;
	var block_click = 0;
	var reload_slider;
	
	function show_item_next(){
		block_click = 1;
		console.log(current);
		var items = '.item'+current;
		var pre = current-1;
		if ( pre < 1 )
			pre = count;
		var pre_items = '.item'+pre;
		$(pre_items+' .item_img').addClass('ani_2');
		setTimeout(function(){
			$(pre_items + ' .item_text').addClass('ani_2');
			setTimeout(function(){
				$(pre_items).hide().removeClass('actived');
				$('.item_img, .item_text').removeClass('ani').removeClass('ani_2');
				$(items).addClass('actived').fadeIn(0,function(){
					$(items+' .item_img').addClass('ani');
					setTimeout(function(){
						$(items + ' .item_text').addClass('ani');
						setTimeout(function(){
							block_click = 0;
						},500);
						setTimeout(function(){
							auto = 1;
						},1500);
					},150);
				});
			},500);
		},150);
	};
	
	function show_item_prev(){
		block_click = 1;
		console.log(current);
		var items = '.item'+current;
		var pre = current-1;
		if ( pre < 1 )
			pre = count;
		var pre_items = '.item'+pre;
		console.log(pre_items);
		$(items+' .item_img').addClass('ani_2');
		setTimeout(function(){
			$(items + ' .item_text').addClass('ani_2');
			setTimeout(function(){
				$(items).hide().removeClass('actived');
				$('.item_img, .item_text').removeClass('ani').removeClass('ani_2');
				$(pre_items).addClass('actived').fadeIn(0,function(){
					$(pre_items+' .item_img').addClass('ani');
					setTimeout(function(){
						$(pre_items + ' .item_text').addClass('ani');
						setTimeout(function(){
							block_click = 0;
							current = current - 1 ;
						},500);
						setTimeout(function(){
							auto = 1;
						},3000);
					},150);
				});
			},500);
		},150);
	};
	
	function slider(){
		setTimeout(function(){
			show_item_next();
			loop = setInterval(function(){
				if( auto == 0)
					return;
				current++;
				if( current > count)
					current = 1;
				console.log(current);
				show_item_next();
			},3500);
		},1500);
	};
	
	//slider();
	
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
			slider();
		},6000);
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
			current++;
			slider();
		},6000);
	});
   
});




$(document).ready(function(){
	
	
	
	
	
});