jQuery(function($) {

	AOS.init({
		duration: 1200
	});

	// custom dropdown updates cart on change
	$('body').on('blur', 'input.qty', function(){ 
	    $("[name='update_cart']").trigger("click");
	});

	$("#js-scroll-down").click(() => {
		$('html, body').animate({
			scrollTop: $("#content").offset().top - 150
		}, 500);
	});

	if ($.fn.prettyBreak) {
		$(".js-pretty-br").prettyBreak();
	}

	$('#parallax-carousel').on('slid.bs.carousel', function () {
	  	if ($.fn.prettyBreak) {
	  		console.log("yeah");
			$(".js-pretty-br").prettyBreak();
		}
	});

	let site_height = $(".site").outerHeight();
	$(".header__strip-wrap, .header__strip").css("max-height", site_height);

	$(window).on('resize', () => {
		if ($.fn.prettyBreak) {
			$(".js-pretty-br").prettyBreak();
		}

		site_height = $(".site").outerHeight();
		$(".header__strip-wrap").css("max-height", site_height);
	});

	$(document).scroll(() => {
		if ($(document).scrollTop() > 100) {
			$(".header").addClass("shrink");
		} else {
			$(".header").removeClass("shrink");
		}
	});

	// $(".js-toggler").click((e) => {

	// });

	$('body').on('click', '.js-toggler', function() { 
		$(this).siblings(".js-toggle").slideToggle();
	});

	$('.custom-select-sortsiblings').each((i, el) => {
	    let $this = $(el), numberOfOptions = $this.children('option').length;

	    $this.wrap('<div class="select-custom"></div>');
	    $this.after('<div class="select-styled"></div>');

	    let $styledSelect = $this.next('div.select-styled');
	    $styledSelect.text($this.children('option:selected').text());

	    let $list = $('<ul />', {
	        'class': 'select-options'
	    }).insertAfter($styledSelect);

	    for (let x = 0; x < numberOfOptions; x++) {
	        $('<li />', {
	            text: $this.children('option').eq(x).text(),
	            rel: $this.children('option').eq(x).val()
	        }).appendTo($list);
	    }

	    let $listItems = $list.children('li');

	    $styledSelect.click(function(e) {
	        e.stopPropagation();
	        $('div.select-styled.active').not(this).each(() => {
	            $(this).removeClass('active').next('ul.select-options').slideUp();
	        });
	        $(this).toggleClass('active').next('ul.select-options').slideToggle();
	    });

	    $listItems.click(function(e) {
	        e.stopPropagation();
	        $styledSelect.text($(this).text()).removeClass('active');
	        $this.val($(this).attr('rel'));
	        $list.slideUp();
	        $( this ).closest( 'form' ).submit();
	    });

	    $(document).click(function() {
	        $styledSelect.removeClass('active');
	        $list.slideUp();
	    });
	});
});
