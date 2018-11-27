$(function(){
	if ($.cookie('highcontrast') == "yes") {
		$('head').append('<link rel="stylesheet" type="text/css" href="/wp-content/themes/theme/css/a11y-contrast.css">');
	}
});

function negativar() {
	if ($.cookie('highcontrast') != "yes") {
		$.cookie("highcontrast", "yes", {path: '/', expires: 7 });
		location.reload();
	}
	
	else $.cookie("highcontrast", "no", {path: '/', expires: 7 });
	location.reload();
}  

var count_click=0;
function reduceSize() {
	count_click--;
	//alert(count_click);
	if(count_click >= -2) {
		jQuery(".menuTopBlack a").css('font-size','-=1');
		jQuery(".my_navbar_mainmenu a").css('font-size','-=1');
		jQuery(".contWydzialy .subContWydzialy .wrapa a").css('font-size','-=1');
		jQuery(".sliderSidebarTabs .opisTaby").css('font-size','-=1');
		jQuery(".colNewsHome .newsBlokHome .opisNews").css('font-size','-=1');
		jQuery(".TheContentExcerpt").css('font-size','-=1');
		jQuery("#cssmenu > ul > li > a").css('font-size','-=1');
		jQuery("#cssmenu ul ul li a").css('font-size','-=1');
	}
	else {count_click=-2;}
}

function increaseSize() {
	count_click++;
	//alert(count_click);
	if(count_click <= 2) {
		jQuery(".menuTopBlack a").css('font-size','+=1');
		jQuery(".my_navbar_mainmenu a").css('font-size','+=1');
		jQuery(".contWydzialy .subContWydzialy .wrapa a").css('font-size','+=1');
		jQuery(".sliderSidebarTabs .opisTaby").css('font-size','+=1');
		jQuery(".colNewsHome .newsBlokHome .opisNews").css('font-size','+=1');
		jQuery(".TheContentExcerpt").css('font-size','+=1');
		jQuery("#cssmenu > ul > li > a").css('font-size','+=1');
		jQuery("#cssmenu ul ul li a").css('font-size','+=1');
	}
	else {count_click=2;}
}

/**/

$(function(){
	var trescFromWcagBottom = $('.mywcagwrap').html();
	$('.colForAppendWcag').prepend(trescFromWcagBottom);	
});