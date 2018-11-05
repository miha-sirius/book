$( document ).ready(function() {	
	$('.sortable').click(function() {
		$('.overlay').show();
		var order = 'DESC';
		if($(this).find('.order').hasClass('desc')) {
			order = 'ASC';
		}		
		var sort = $(this).attr("id");
		var page = $('.current').attr("id");
		$.ajax({  
			type: 'POST',  
			url: 'index.php?action=__updateTable', 
			data: { sort: $(this).attr("id"), order: order, page: page },
			success: function(response) {
				resetHeaders();
				$('#'+sort).addClass('activ');
				$('#'+sort).find('.order').addClass(order.toLowerCase());
				$('#datatable').html(response);
				$('.overlay').hide();
			}
		});		
	});	
	
	function resetHeaders() {
		$('.sortable').removeClass('activ');
		$('.order').removeClass('desc');
		$('.order').removeClass('asc');
	}
	function updatePager(page) {
		$.ajax({  
			type: 'POST',  
			url: 'index.php?action=__updatePager',
			data: { page: page},
			success: function(response) {
				$('.pagerhtml').html(response);
			}
		});
	}
	
	$(document).on('click', '.pager', function() {		
		$('.overlay').show();
		var change = $(this).attr("id");
		var sort = $('.activ').attr("id");
		var order = 'DESC';
		if($('.activ').find('order').hasClass('asc')) {
			order = 'ASC';
		}
		console.log(change,sort, order);
		$.ajax({  
			type: 'POST',  
			url: 'index.php?action=__updateTable', 
			data: { sort: sort, order: order, page: change },
			success: function(response) {				
				resetHeaders();
				$('#'+sort).addClass('activ');
				$('#'+sort).find('.order').addClass(order.toLowerCase());
				$('#datatable').html(response);				
			}
		});
		updatePager(change);
		$('.overlay').hide();
	});	
	
	$('#preview').click(function() {
		
		if(!check()) {
			return false;
		}
		$.ajax({  
			type: 'POST',  
			url: 'index.php?action=__preview', 
			data: { name: $('#name').val(), mail: $('#mail').val(), www: $('#www').val(), message:$("#message").val() },
			success: function(response) {				
				$('.preview_holder').html(response).show('slow');	
			}
		});
		
	});
	$(document).on('click', '#close', function() {
		$('.preview_holder').hide('slow');
	});
	$('.add_tag').click(function() {		
		var add = '';
		switch ($(this).attr("id")) {
		  case 'italic':
			add = '<i></i>';
			break;
		  case 'link':
			add = '<a></a>';
			break;
		  case 'strong':
			add = '<strong></strong>';
			break;
		  case 'strike':
			add = '<strike></strike>';
			break;
		}
		$('#message').val($('#message').val() + ' ' + add);
	});
});

function check() {	
	if($('#name').val()=='' || !validateName($('#name').val())) {
		alert('Please insert correct name');
		return false;
	}
	
	if($('#mail').val()=='' || !validateEmail($('#mail').val())) {
		alert('Please insert correct email');
		return false;
	}
	
	if($('#www').val()!='' && !validateWww($('#www').val())) {
		alert('Please insert correct web page adress');
		return false;
	}
	if (!$("#message").val()) {
		alert('Please insert message');
		return false;
	}
	return true;
}

function validateName(name) { 
	return /^[A-Za-z0-9]+$/.test(name); 
}
function validateEmail(email) {
	var r = new RegExp("[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?");
	return (email.match(r) == null) ? false : true;
}
function validateWww(www) {
	return /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(www);
}
function sleep(milliseconds) {
	var start = new Date().getTime();
	for (var i = 0; i < 1e7; i++) {
		if ((new Date().getTime() - start) > milliseconds){
			break;
		}
	}
}

	
