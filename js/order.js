
var order_;
var	today;
var	hour;
var	pickup_time;

var order_name;
var	order_phone_number;
var	order_address;
var	order_note;
var description;
var receipt_scroller;
var bill_food_list = [];

/*
	bill food list structure
	id, name, price, quantity

*/

$(document).ready(function(){	

	order_ = order_status();
	today = new Date($('#time_now').html());
	hour = today.getHours();
	pickup_time;

	order_name = $('#order_name');
	order_phone_number = $('#order_phone_number');
	order_address = $('#order_address');
	order_note = $('#order_note');

	console.log(today);
	
	receipt_scroller = new IScroll('.receipt_scroller',{
		scrollbars: true,
		mouseWheel: true,
		interactiveScrollbars: true,
		checkDOMChanges: true
	});
	
	
	$('.pick_info').find('.radio_button').bind('tapone click mouseup touchend',function(){
		if($(this).hasClass('active'))
			return false;
		else
		{
			$('.pick_info').find('.radio_button').removeClass('active');
			if( hour >= 24)
			{
				messagebox('Our bussiness going to close.<br>You can order for tomorrow!');
				return false;
			}
			else
			{
				$(this).addClass('active');
			}	
		}
	});

	$('#order_submit').bind('click',function(){
		if(order_ == 'pickup')
		{
			pickup_time = check_pickup_time();
			console.log(pickup_time);
			if(!pickup_time)
				return;
			if(get_customer_info() != true)
			{
				messagebox(get_customer_info());
				return;
			}
			if($('#bill_cost').html() == '0')
			{
				messagebox('Your cart have no food!<br>Please order first!');
				$('.message_box a').bind('tapone click mouseup touchend',function(){
					scrollTo_('.menu_screen','bottom');
					return;
				});
			}
			else
			{
				submit_bill(pickup_time);
				return;
			}	
		}	
	});

	$(document).on('mouseup touchend','.btn_add',function(){
		if(mobile_browser == true)
			$(this).trigger('click');
	});
	$(document).on('mouseup touchend','.btn_remove',function(){
		if(mobile_browser == true)
			$(this).trigger('click');
	});
});

function order_status(){
	return $('.order_content').find('.title_bar.active').attr('status');
};

function check_pickup_time(){
	if($('.pick_info').find('.radio_button.active').length < 1)
	{
		messagebox('Please choose pick up time');
		return false;
	}

	if($('.pick_info').find('.radio_button.active').attr('id') == '30_minutes')
	{
		return 'after 30 minutes';
	}
	else
	{
		return 'pick up at: ' + $('#pick_hour').val() + ' ' + $('#pick_minute').val();
	}
};

window.clickable = 1;

function add_to_bill(id,name,price){
	
	if( window.clickable == 0)
		return;
	window.clickable = 0;
	setTimeout(function(){
		window.clickable = 1;		
	},300);
	
	for( var i = 0; i< bill_food_list.length; i++)
	{
		if( bill_food_list[i][0] == id)
		{
			bill_food_list[i][3] = parseInt(bill_food_list[i][3]) + 1;
			show_bill_value();
			receipt_scroller.refresh();
			return;
		}	
	}
	
	bill_food_list.push([id,name,price,'1']);
	
	show_bill_value();
	
	receipt_scroller.refresh();
	
};




function show_bill_value(){
	var string = '<tr>'
		string += '<td>Item(s)</td>';
		string += '<td>Price</td>';
		string += '<td>Qty</td>';
		string += '<td>Total</td>';
		string += '<td></td>';
		string += '</tr>';
	
	var count_items = 0;
	
	var bill_tax = parseFloat($('#bill_tax').html());
	//alert('show bill');
	if( bill_food_list.length > 0)
	{
		var total_bill = 0;
		var total_item = 0;
		for( var i = 0; i< bill_food_list.length; i++)
		{
			count_items += parseInt(bill_food_list[i][3]);
			total_item = (parseFloat(bill_food_list[i][3]) * parseFloat(bill_food_list[i][2])).toFixed(2);
			total_bill += parseFloat(total_item);
			string += '<tr>';
			//name
			string +='<td>'+bill_food_list[i][1]+'</td>';
			//price
			string +='<td>'+bill_food_list[i][2]+'</td>';
			//quantity
			string +='<td>'+bill_food_list[i][3]+'</td>';
			//total
			string +='<td>'+total_item+'</td>';
			
			string +='<td class="align_mid remove_feild">';
			string +='<div onclick="add_to_bill('+bill_food_list[i][0]+')" class="btn_add" onmousedown="$(this).addClass('+"'"+'actived'+"'"+')" onmouseup="$(this).removeClass('+"'"+'actived'+"'"+')"></div><br>';
			string +='<div onclick="remove_from_bill('+bill_food_list[i][0]+')" class="btn_remove" onmousedown="$(this).addClass('+"'"+'actived'+"'"+')" onmouseup="$(this).removeClass('+"'"+'actived'+"'"+')"></div>';
			string +='</td>';
			string += '</tr>';
		}
	}
	
	$('.bill_list').html(string);
	
	if(bill_food_list.length > 0)
		$('.shopping_cart').fadeIn(0,function(){
			$('.shopping_cart').addClass('ani');
		});
	if(bill_food_list.length == 0)
		$('.shopping_cart').removeClass('ani').hide();
	
	
	$('.item_count b').html(count_items);
	bill_tax = ((total_bill/100)*bill_tax).toFixed(2);
	total_bill = parseFloat(bill_tax) + parseFloat(total_bill);
	
	$('#bill_cost').text(total_bill);
	
};

function remove_from_bill(id){
	if( window.clickable == 0)
		return;
	window.clickable = 0;
	setTimeout(function(){
		window.clickable = 1;		
	},300);
	for( var i = 0; i< bill_food_list.length; i++)
	{
		if( bill_food_list[i][0] == id)
		{
			bill_food_list[i][3] = parseInt(bill_food_list[i][3]) - 1;
			if( bill_food_list[i][3] == 0)
				bill_food_list.splice(i,1);
			show_bill_value();
			receipt_scroller.refresh();
			return;
		}	
	}
	
};


/*function bill_calc(){
	var bill_cost = 0;
	var bill_tax = parseFloat($('#bill_tax').html());

	if($('.bill_list').find('span.food_price').length > 0)
		$('.shopping_cart').fadeIn(0,function(){
			$('.shopping_cart').addClass('ani');
		});
	if($('.bill_list').find('span.food_price').length == 0)
		$('.shopping_cart').removeClass('ani').hide();
	$('.item_count b').html($('.bill_list').find('span.food_price').length);


	$('.bill_list').find('span.food_price').each(function(index,element){
		bill_cost += parseFloat($(this).text());
	});
	
	bill_tax = ((bill_cost/100)*bill_tax).toFixed(2);

	bill_cost = parseFloat(bill_tax) + parseFloat(bill_cost);

	
	$('#bill_cost').html(bill_cost);

};*/

function get_customer_info(status){
	var error = '';

	if( order_name.val() == 'Name...' || order_name.val().length <= 3)
		error += 'Your full name is wrong!<br>';

	if( !$.isNumeric(order_phone_number.val()) || order_phone_number.val().length < 10)
		error += 'Your phone number is wrong!<br>';

	if( order_address.val().length <= 10 && !order_address.hasClass('deactive'))
		error += 'Your address is wrong!<br>';

	if( error != '')
	{
		return error;
	}
	else
	{
		return true;
	}
}

function submit_bill(pickup_time){
	//alert($('#current_time').html());		
	$('.bill_list').find('div').remove();
	$('.bill_list').find('td:nth-last-child(1)').remove();
	$('.bill_list').find('.food_price').remove();
	$('.bill_list').find('p').remove();
	
	var foods = $('.bill_list').html();
	var price = $('#bill_cost').html();

	var string = '';
	var description = pickup_time;
	description += '<br>Note:' + order_note.val();
	
	string += '&CUSTOMER=' + order_name.val();
	string += '&PHONE=' + order_phone_number.val();
	string += '&ADDRESS=' + order_address.val();
	string += '&FOODS=' + foods;
	string += '&PRICE=' + price;
	string += '&STATUS=0';
	string += '&DESCRIPTION='+description;

	//console.log(string);
	$.ajax({
		url: 'load_food.php?action=add_bill',
		type: "GET",
		data: string,
		success: function(data){				
			messagebox(data,function(){
				receipt_scroller.refresh();	
			});
			inital();
			bill_calc();
			// if(mobile_browser == false)
			// {
			// 	new IScroll('.receipt_scroller',{
			// 		scrollbars: true,
			// 		mouseWheel: true,
			// 		interactiveScrollbars: true,
			// 		checkDOMChanges: true
			// 	});
			// }
			
		},
		error:function(){
			
		}
	});
};

//inital();
function inital(){
	description = '';
	pickup_time = '';
	bill_food_list = [];
	//ship_cost = 3;
	$('.pick_info').find('.radio_button').removeClass('active');
	$('.bill_list').find('tbody').remove();
	$('#bill_cost').html('0');
	$('.shopping_cart').removeClass('ani').hide();
	order_name.val('Name...');
	order_phone_number.val('Phone...');
	order_address.val('Address...');
	order_note.val('Note...');
};