var container = document.querySelector('#masonry');
var msnry = new Masonry( container, {
  
  itemSelector: '.item'
});




/**
 * The script is encapsulated in an self-executing anonymous function,
 * to avoid conflicts with other libraries
 */
(function($) {
	
	// grab the initial top offset of the navigation 
	var sticky_navigation_offset_top = $('#sticky_navigation').offset().top;	
	// our function that decides weather the navigation bar should have "fixed" css position or not.
	var sticky_navigation = function(){
		var scroll_top = $(window).scrollTop(); // our current vertical position from the top
		
		// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
		if (scroll_top > sticky_navigation_offset_top) { 
			$('#sticky_navigation').css({ 'position': 'fixed', 'top':0 });
		} else {
			$('#sticky_navigation').css({ 'position': 'relative' }); 
		}   
	};	
	// run our function on load
	sticky_navigation();	
	// and run it again every time you scroll
	$(window).scroll(function() {
		 sticky_navigation();
	});
	// NOT required:
	// for this demo disable all links that point to "#"
	$('a[href="#"]').click(function(event){ 
		event.preventDefault(); 
	});	


	/*************************  $One Page Scroll  **************************/
	$('.navbar-nav').onePageNav({
		currentClass: 'active',
		filter: ':not(.exclude)',
	});



	/***************************  $Select Amount  **************************/
	$('.amount .radio').click(function (e) {
		var val = $('[name=amount]:checked').val();

		$('.amount .radio').removeClass('active');
		$(this).addClass('active');
		
		if (val == 'other') {
			$('#amount-other').show()
		} else {
			$('#amount-other').hide()

		}
	});



	/**************************  $Send Forms  ******************************/
	var $form = $('form');

	$form.on( 'submit' , function(e){ 
		if ( $(this).data('ajax') == 1 ) {
			e.preventDefault();
			sendForm( $(this) );
		} 
	})

	function sendForm($form){
		var fieldsData = getFieldsData($form),
			url = $form.attr('action'),
			method = $form.attr('method');

		sendData(url, method, fieldsData, $form, showResults)
	}

	
	function getFieldsData($form) {
		var $fields = $form.find('input, button, textarea, select'),
			fieldsData = {};

		$fields.each( function(){
			var name = $(this).attr('name'),
				val  = $(this).val(),
				type = $(this).attr('type');

			if ( typeof name !== 'undefined' ){
				
				if 	( type == 'checkbox' || type == 'radio' ){

					if ( $(this).is(':checked') ){
						fieldsData[name] = val;
					}
				} else {
					fieldsData[name] = val;
				}
					
			}
		});

		return fieldsData
	}

	function sendData(url, method, data, $form, callback){
		var $btn = $form.find('[type=submit]'),
			$response = $form.find('.form-response');

		$.ajax({
			beforeSend: function(objeto){ 
				$response.html('');
			},
			complete: function(objeto, exito){ },
			data: data,
			success: function(dat){  callback(dat, $response); },
			type: method,
			url: url,
		});
	}

	function showResults(data, $response){
		 $response.html(data);
		 $response.find('.alert').slideDown('slow');
	}



	/***************************  $Slider Range  ***************************/
	if ($('#slider-price').length) { 
			initSliderRange(
				$('#slider-price .slider'),
				'$ ',
				'',
				1000,
				100000,
				1000,
				[25000,75000],
				'hide'
			) 
		}

	function initSliderRange(element, pre, app, min, max, step, val, tooltip) {
		element.slider({
				range: true,
				min: min,
				max: max,
				value : val,
				step: step,
				tooltip: tooltip,
			})
			.on('slide', function(ev){
				$(this).parent().parent().find('.input_range.min').val(ev.value[0])
				$(this).parent().parent().find('.span_range.min').html(pre + ev.value[0] + app)

				$(this).parent().parent().find('.input_range.max').val(ev.value[1])
				$(this).parent().parent().find('.span_range.max').html(pre + ev.value[1] + app)
			});
	}



	/***********************  $Slider Revolution  **************************/
	function startRevolution(){
		var $banner = $('#slider-revolution'),
			args = {};
		
		args = {
			startheight:880,
			startwidth:1500,
			
			fullWidth:"on",
			fullScreen:"off",

			shadow:0,

			onHoverStop: "on",

			hideThumbs:1,
			navigationType: "bullet",
			navigationHAlign: "center",
			navigationVAlign: "bottom"
		}

		if(jQuery().revolution) {
			$banner.revolution(args);
		}
	}

	$(document).ready(function() { startRevolution(); });



	/*******************************  $Tabs  *******************************/
	$('.nav-tabs a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	})



	/*****************************  $Tootips  ******************************/
	function changeTooltipColorTo(color) {
		//solution from: http://stackoverflow.com/questions/12639708/modifying-twitter-bootstraps-tooltip-colors-based-on-position
		$('.tooltip-inner').css('background-color', color)
		$('.tooltip.top .tooltip-arrow').css('border-top-color', color);
		$('.tooltip.right .tooltip-arrow').css('border-right-color', color);
		$('.tooltip.left .tooltip-arrow').css('border-left-color', color);
		$('.tooltip.bottom .tooltip-arrow').css('border-bottom-color', color);
	}

	$('.donation-item .progress-bar').tooltip({placement: 'top'})
	$('.donation-item .progress-bar').hover(function() {changeTooltipColorTo('#d91d2b')});


})(jQuery);