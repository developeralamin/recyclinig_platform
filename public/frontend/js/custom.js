$(document).ready(function(){

	// Mobile Menus JS
	// Mobile Menus JS
	$('#menu').click(function(){
		$('.header-menu-area').slideToggle()
	})

	$('#menu').on('click', function () {
		$(this).toggleClass('active');
	});


	// Window Modal JS
	// Window Modal JS
	$(".buy-button a").click(function(){
		$('.window-modal-1').show()
	})
	$(".header-nav .price-nav").click(function(){
		$('.window-modal-1').show()
	})
	$(".window1-cross img").click(function(){
		$('.window-modal-1').hide()
	})


	$(".window1-submit").click(function(){
		$('.window-modal-2').show()
		$('.window-modal-1').hide()
	})
	$(".window2-cross img").click(function(){
		$('.window-modal-2').hide()
	})



	// scroll js
	// scroll js
	$.scrollIt({
          upKey: 38,                // key code to navigate to the next section
          downKey: 40,              // key code to navigate to the previous section
          easing: 'swing',         // the easing function for animation
          scrollTime: 1300,          // how long (in ms) the animation takes
          activeClass: 'active',    // class given to the active nav element
          onPageChange: null,       // function(pageIndex) that is called when page is changed
          topOffset: -85            // offste (in px) for fixed top navigation
      });


  // Scroll Top function
  // Scroll Top function
  $(window).scroll(function() {
  	if ($(this).scrollTop() > 50 ) {
  		$('.scrolltop:hidden').stop(true, true).fadeIn();
  	} else {
  		$('.scrolltop').stop(true, true).fadeOut();
  	}
  });
  $(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".thetop").offset().top},"1000");return false})})
  


  // Number Plus Minus JS
  // Number Plus Minus JS
  const minus = $('.quantity__minus');
  const plus = $('.quantity__plus');
  const input = $('.quantity__input');
  minus.click(function(e) {
  	e.preventDefault();
  	var value = input.val();
  	if (value > 1) {
  		value--;
  	}
  	input.val(value);
  });
  
  plus.click(function(e) {
  	e.preventDefault();
  	var value = input.val();
  	value++;
  	input.val(value);
  })





});

$(document).ready(function() {

});



