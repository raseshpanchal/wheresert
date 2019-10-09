function initMenu(){
	$('#menu ul').hide();
	$('#menu ul').children('.current').parent().show();
	
	$('#menu li a').click(function(){
		var checkElement = $(this).next();
		
		if((checkElement.is('ul')) && (checkElement.is(':visible')))
		{
			$('#menu ul:visible').slideUp('normal');
			return false;
		}
		
		if((checkElement.is('ul')) && (!checkElement.is(':visible')))
		{
			$('#menu ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
			return false;
		}
	});
}
$(document).ready(function() {initMenu();});