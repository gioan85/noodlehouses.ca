// menu_list loop and control
var loop_menu_item_timer = 3000;


function show_menu_list_icon(){
	var menu_item_total = $('.menu_item').length;
	var menu_item_show = $('.menu_item.show').length;
	var total_sheet =  (menu_item_total / menu_item_show).toFixed(0);
	//$('.menu_list_icon_bar').html(total_sheet);
	for( var i = 0; i < total_sheet; i++)
	{
		if( i == 0)
			$('.menu_list_icon_bar').append('<div class="menu_list_icon_ active"></div>')
		else
			$('.menu_list_icon_bar').append('<div class="menu_list_icon_"></div>')
	}
};

show_menu_list_icon();

function set_next_menu_item(){

	var menu_list_icon = $('.menu_list_icon_');
	var current_icon = menu_list_icon.filter('.active');
	var index = menu_list_icon.index(current_icon);

	if( index == $('.menu_list_icon_').length - 1)
		var next = 0;
	else
		var next = index + 1;
	console.log( next + ' ' + $('.menu_list_icon_').length);
	$('.menu_list_icon_').removeClass('active').removeClass('hide');
	$('.menu_list_icon_').eq([next]).addClass('active');

	$('.menu_item').hide().removeClass('show');
	$('.menu_item').eq([next*2]).fadeIn(500,function(){
		$('.menu_item').eq([next*2]).addClass('show');
	});
	$('.menu_item').eq([next*2 +1]).fadeIn(500,function(){
		$('.menu_item').eq([next*2 +1]).addClass('show')
	});
	return;
};

function set_prev_menu_item(){

	var menu_list_icon = $('.menu_list_icon_');
	var current_icon = menu_list_icon.filter('.active');
	var index = menu_list_icon.index(current_icon);

	if( index == 0)
		var prev = $('.menu_list_icon_').length - 1;
	else
		var prev = index - 1;
	console.log( prev + ' ' + $('.menu_list_icon_').length);
	$('.menu_list_icon_').removeClass('active').removeClass('hide');
	$('.menu_list_icon_').eq([prev]).addClass('active');

	$('.menu_item').hide().removeClass('show');
	$('.menu_item').eq([prev*2]).fadeIn(500,function(){
		$('.menu_item').eq([prev*2]).addClass('show');
	});
	$('.menu_item').eq([prev*2 +1]).fadeIn(500,function(){
		$('.menu_item').eq([prev*2 +1]).addClass('show')
	});
	return;
};

var loop_menu_ = '';

function loop_menu_item(){
	clearInterval(loop_menu_);
	setTimeout(function(){
		loop_menu_ = setInterval(set_next_menu_item,loop_menu_item_timer);	
	},300);
};

setTimeout(function(){
	loop_menu_item();
},1000);

$('.menu_list .control_btn.next').bind('click',function(){
	clearInterval(loop_menu_);
	set_next_menu_item();
	setTimeout(loop_menu_item, 2000);
});
$('.menu_list .control_btn.back').bind('click',function(){
	clearInterval(loop_menu_);
	set_prev_menu_item();
	setTimeout(loop_menu_item, 2000);
});