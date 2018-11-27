$(function(){
	
	$('[data-toggle="tooltip"]').tooltip();
	
	/**/
	
	//toggle class open on button
	$('#menuTopBlack').on('hide.bs.collapse', function () {
		$('.navbar-toggler.mTB').removeClass('open');
	})
	$('#menuTopBlack').on('show.bs.collapse', function () {
		$('.navbar-toggler.mTB').addClass('open');
	})
	
	/**/
	
	$('#navbar-content-mainmenu').on('hide.bs.collapse', function () {
		$('.navbar-toggler.mtBlue').removeClass('open');
	})
	$('#navbar-content-mainmenu').on('show.bs.collapse', function () {
		$('.navbar-toggler.mtBlue').addClass('open');
	})  
	
	/**/
	
	$('#contWydzialy').on('hide.bs.collapse', function () {
		$('.navbar-toggler.mtWydz').removeClass('open');
	})
	$('#contWydzialy').on('show.bs.collapse', function () {
		$('.navbar-toggler.mtWydz').addClass('open');
	})
	
	/**/
	
	$( ".showSidebarBtn" ).click(function() {
		$( ".showSidebarBtn .myiconmob" ).toggleClass('minus');
	    $( ".showSidebar" ).slideToggle(function() {
			// Animation complete.
		});
	});
	
	
	
	//setTimeout(function() {
	//	$('.showSidebar').css('display','none');
//}, 1000);	
	
});

//$(window).scroll(function() {
//	if ($(document).scrollTop() > 100) {
//		$('.oberMenu').addClass('shrink');
//		} else {
//		$('.oberMenu').removeClass('shrink');
//	}
//});

/**/

$(document).ready(function(){
	
	$('.galeriaSlickNaSkroty').slick({
		dots: false,
		arrows:true,
		appendArrows:$('.naSkrotyHome'),
		prevArrow:'<div class="arLeft"><i class="fa fa-angle-left"></i></div>',
		nextArrow:'<div class="arRight"><i class="fa fa-angle-right"></i></div>',  
		infinite: true,
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 10000,
		pauseOnHover: true,
		pauseOnFocus: true,
		
		cssEase: 'ease-out',
		responsive: [
			{
				breakpoint: 1199,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
				}
			},  
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					autoplay: false,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					autoplay: false,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					autoplay: false,
				}
			}
		]
	});
	
	/**/
	
	$('.sliderSidebarSlickGal').slick({
		dots: false,
		arrows:false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		pauseOnHover: true,
		pauseOnFocus: true,
		cssEase: 'ease-out',
		responsive: [
			{
				breakpoint: 600,
				settings: {
					autoplay: false,
				}
			},
			{
				breakpoint: 480,
				settings: {
					autoplay: false,
				}
			}
		]		
	});
	
	$('.sliderSidebarSlickNews').slick({
		dots: false,
		arrows:false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		pauseOnHover: true,
		pauseOnFocus: true,
		cssEase: 'ease-out',
		fade:true,
		responsive: [
			{
				breakpoint: 600,
				settings: {
					autoplay: false,
				}
			},
			{
				breakpoint: 480,
				settings: {
					autoplay: false,
				}
			}
		]		
	});
	
	$('.sliderSidebarSlickTabs').slick({
		dots: true,
		appendDots: $('.forAppendDotsTabsHome'),
		arrows:false,
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 5000,
		pauseOnHover: true,
		pauseOnFocus: true,
		cssEase: 'ease-out',
		fade:true,
		adaptiveHeight: true,
		responsive: [
			{
				breakpoint: 600,
				settings: {
					autoplay: false,
				}
			},
			{
				breakpoint: 480,
				settings: {
					autoplay: false,
				}
			}
		]		
	});
	/**/
	
	//$('#cssmenu li.has-sub').addClass('open');
	//$('#cssmenu li.has-sub ul').css({'display':'block'});
	
	$("#cssmenu .current-menu-item" ).parents('li.has-sub').addClass('open');
	$("#cssmenu .current-menu-item" ).parents('li.has-sub ul').css({'display':'block'});
	
	
	/**/
	
	});	