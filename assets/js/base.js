$(document).ready(function() {
	// Stuff to do as soon as the DOM is ready;
	// expander.init();
	$('.smart-form #username').focus();
	clearInput('.smart-form p input.hasDefault');
});

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
	
	// If the fields have value leave as is and do not change.
	if ($('#username').val() !== '') {
		$('#username').prev().removeClass('partial').addClass('hidden');
	}
	
	if ($('#password').val() !== '') {
		$('#password').prev().removeClass('partial').addClass('hidden');
	}
	
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