$(document).ready(function() {
	// Stuff to do as soon as the DOM is ready;
	// expander.init();
	// clearInput('.smart-form p input.hasDefault');
	$('#test-create-db').click(function(e) {
		var post = $('form.smart-form').serialize();
		check_database(post, this.href);
		e.preventDefault();
	});
});

function check_database (form, url) {
	$.post(url, form, function(data){
		var msg = data.split(':');
		
	    if(msg[0] === 'true'){
	    	$('div.error').remove();
	    	// $('div.notice:first').fadeOut('fast');
	    	$('#more-options').fadeIn('fast');
	    	$('div.success').fadeIn('fast').find('p').prepend(msg[1]);
	    } else {
	    	$('div.success').hide();
	    	$('#more-options').hide();
	    	$('form.smart-form').before('<div id="ajax" class="error"><p>' + msg + '</p></div>');
	    }
	});
}

// Expand and contract
var expander = {
	init: function (){
		var that = this;
		$('.action-panel a').click(function(e) {
			that.render($(this));
			e.preventDefault();
		});
	},
	
	open: function (target, trigger){
		trigger.addClass('open');
		target.slideDown('slow');
	},
	
	close: function (target, trigger){
		trigger.removeClass('open');
		target.slideUp('slow');
	},
	
	render: function (el){
		var elem = el.parent().nextAll('.' + el.attr('rel'));
		if(!el.hasClass('open')) this.open(elem, el);
		else this.close(elem, el);
	}
}

// Tint Label
function clearInput (cssClass) {
	// Get the input field and assign it to a variable
	var focusField = $(cssClass);
	
	focusField.focus( function(){
		// Assign $(this) to a variable, allowing DOM to do less lookup
		var el = $(this).prev();
		
		if (!el.hasClass('partial')) {
			el.addClass('partial');
		}
	});
	
	focusField.keydown( function (){
		var el = $(this);
		if (el.val() !== '') {
			el.prev().removeClass('partial').addClass('hidden');
		}
	});
	
	// Execute when user leaves the input field
	focusField.blur( function () {
		// Assign $(this) to a variable, allowing DOM to do less lookup
		var el = $(this);
		if (el.val() === '') {
			el.prev().removeClass();
		}
	});
}

// for debugging:
var log;
if (window.console && console.log) log = console.log;
else log = function (){}