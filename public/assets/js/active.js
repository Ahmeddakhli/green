(function($){"use strict";jQuery(document).on('ready',function(){$(".homepage-slides").owlCarousel({items:1,nav:true,dots:false,rtl:true,touchDrag:false,mouseDrag:false,autoplay:true,smartSpeed:500,loop:true,navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],});$(".homepage-slides").on("translate.owl.carousel",function(){$(".single-slider-item h1, .single-slider-item p").removeClass("animated fadeInUp").css("opacity","0");$(".single-slider-item .slide-btn").removeClass("animated fadeInDown").css("opacity","0");});$(".homepage-slides").on("translated.owl.carousel",function(){$(".single-slider-item h1, .single-slider-item p").addClass("animated fadeInUp").css("opacity","1");$(".single-slider-item .slide-btn").addClass("animated fadeInDown").css("opacity","1");});$(".project-slides").owlCarousel({items:1,nav:true,dots:false,rtl:true,autoplay:false,loop:true,navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],});$(".client-slides").owlCarousel({dots:false,autoplay:true,loop:true,margin:30,rtl:true,nav:false,responsive:{0:{items:1},600:{items:3},1000:{items:6}}});$(".gallery-item").magnificPopup({type:'image',gallery:{enabled:true,}});$(".popup-youtube, .popup-vimeo, .popup-gmaps").magnificPopup({type:'iframe',mainClass:'mfp-fade',removalDelay:160,preloader:false,fixedContentPos:false});$(".shorting").mixItUp();$("ul#navigation").slicknav({prependTo:".responsive-menu-wrap",});new WOW().init();var navOffset=jQuery(".mainmenu-area").offset().top;jQuery(window).on('scroll',function(){var scrollPos=jQuery(window).scrollTop();if(scrollPos>=navOffset){jQuery(".mainmenu-area").addClass("stickyMenu");}else{jQuery(".mainmenu-area").removeClass("stickyMenu");}});if($('#back-to-top').length){var scrollTrigger=100,backToTop=function(){var scrollTop=$(window).scrollTop();if(scrollTop>scrollTrigger){$('#back-to-top').addClass('show');}else{$('#back-to-top').removeClass('show');}};backToTop();$(window).on('scroll',function(){backToTop();});$('#back-to-top').on('click',function(e){e.preventDefault();$('html,body').animate({scrollTop:0},1500);});}});jQuery(window).on('load',function(){jQuery(".construction-slide-preloader-wrap, .construction-site-preloader-wrap").fadeOut(500);});jQuery(function(){jQuery('body').on('keydown','#contact_name, #contact_email, #contact_subject, #contact_phone, #contact_message',function(e){console.log(this.value);if(e.which===32&&e.target.selectionStart===0){return false;}});});$('#contatc_form').submit(function(event){event.preventDefault();var name=$('#contact_name').val();var email=$('#contact_email').val();var sub=$('#contact_subject').val();var phone=$('#contact_phone').val();var message=$('#contact_message').val();var recaptcha=$("#g-recaptcha-response").val();if(name==""||email==""||message==""||name==" "||message==" "||recaptcha==" "||sub==" "||phone==" "){jQuery('#contact_send_status').removeClass('message_send');jQuery('#contact_send_status').addClass('message_notsend');jQuery('#contact_send_status').text('Please fill all fields with correct data.');}else{var formData=$('#contatc_form').serialize();$.ajax({type:'POST',url:$('#contatc_form').attr('action'),data:formData,success:function(data){jQuery('form[name="myform"]')[0].reset();},}).done(function(response){$('#contact_send_status').removeClass('message_notsend');$('#contact_send_status').addClass('message_send');$('#contact_send_status').html("<div class='alert alert-success' role='alert'>Your email successfully Sent ! Thank you.</div>");$("#contact_send_status").fadeOut(3000);}).fail(function(data){jQuery('#contact_send_status').removeClass('message_send');jQuery('#contact_send_status').addClass('message_notsend');jQuery('#contact_send_status').html("<div class='alert alert-danger' role='alert'>Something wrong please try again!</div>");});}});}(jQuery));