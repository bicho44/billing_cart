$(document).ready(function() {
	// Stuff to do as soon as the DOM is ready;
	$('#test-create-db').click(function(e) {
		var form = $('form.smart-form').serialize();
		check_database(form, this.href);
		e.preventDefault();
	});
});

function check_database (form, url) {
	$.post(url, form, function(data){
		var msg = data.split(':');
		
	    if(msg[0] === 'true'){
	    	$('div.error').remove();
	    	$('#more-options').fadeIn('fast');
	    	$('div.success').fadeIn('fast').find('p').empty().prepend(msg[1]);
	    } else {
	    	$('div.success').hide().find('p').empty();
	    	$('#more-options').hide();
	    	$('#ajax').remove();
	    	$('form.smart-form').before('<div id="ajax" class="error"><p>' + msg + '</p></div>');
	    }
	});
}

// for debugging:
var log;
if (window.console && console.log) log = console.log;
else log = function (){}