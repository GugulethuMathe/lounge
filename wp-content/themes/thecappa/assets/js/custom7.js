/* -------------------------------------------------------

[ Custom settings ]

01. ScrollIt
02. Logo & Menu scroll sticky
03. Menu Navigation
04. Sub Menu
05. Sections background image from data background 
06. Animations
07. YouTubePopUp
08. Testimonials owlCarousel
09. Rooms 1 owlCarousel
10. Rooms Page owlCarousel
11. Pricing owlCarousel
12. News owlCarousel
13. Team owlCarousel
14. Clients owlCarousel
15. Restaurant Menu owlCarousel
16. Restaurant Menu Tabs
17. Accordion Box (for Faqs)
18. MagnificPopup Gallery
19. Smooth Scrolling
20. Scroll back to top
21. Select2
22. Datapicker
23. Slider
24. Preloader
25. Contact Form

------------------------------------------------------- */


jQuery(function () {
    "use strict";
    var wind = jQuery(window);
    
    
    // ScrollIt
    $.scrollIt({
        upKey: 38, // key code to navigate to the next section
        downKey: 40, // key code to navigate to the previous section
        easing: 'swing', // the easing function for animation
        scrollTime: 600, // how long (in ms) the animation takes
        activeClass: 'active', // class given to the active nav element
        onPageChange: null, // function(pageIndex) that is called when page is changed
        topOffset: -70 // offste (in px) for fixed top navigation
    });
    
    
     // Logo & Menu scroll sticky
    jQuery(window).scroll(function () {
        var $this = jQuery(this)
            , st = $this.scrollTop()
            , navbar = jQuery('.cappa-header')
            , logo = jQuery(".cappa-header .cappa-logo> img");
        if (st > 150) {
            if (!navbar.hasClass('scrolled')) {
                navbar.addClass('scrolled');
                logo.attr('src', 'img/logo-dark.png');
            }
        }
        if (st < 150) {
            if (navbar.hasClass('scrolled')) {
                navbar.removeClass('scrolled sleep')
                logo.attr('src', 'img/logo.png');
            }
        }
        if (st > 350) {
            if (!navbar.hasClass('awake')) {
                navbar.addClass('awake');
            }
        }
        if (st < 350) {
            if (navbar.hasClass('awake')) {
                navbar.removeClass('awake');
                navbar.addClass('sleep');
            }
        }
    });
    

    // Menu Navigation    
    jQuery('.cappa-js-cappa-nav-toggle').on('click', function (e) {
        var $this = jQuery(this);
        e.preventDefault();
        if (jQuery('body').hasClass('menu-open')) {
            $this.removeClass('active');
            jQuery('.cappa-wrap .cappa-wrap-inner > ul > li').each(function (i) {
                var that = jQuery(this);
                setTimeout(function () {
                    that.removeClass('open');
                }, i * 100);
            });
            setTimeout(function () {
                jQuery('.cappa-wrap').removeClass('cappa-wrap-show');
            }, 300);
            jQuery('body').removeClass('menu-open');
        }
        else {
            jQuery('.cappa-wrap').addClass('cappa-wrap-show');
            $this.addClass('active');
            jQuery('body').addClass('menu-open');
            setTimeout(function () {
                jQuery('.cappa-wrap .cappa-wrap-inner > ul > li').each(function (i) {
                    var that = jQuery(this);
                    setTimeout(function () {
                        that.addClass('open');
                    }, i * 100);
                });
            }, 200);
        }
    });
     
    // Sub Menu 
    jQuery('.cappa-menu li.cappa-menu-sub>a').on('click', function () {
        jQuery(this).removeAttr('href');
        var element = jQuery(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        }
        else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });
    jQuery('.cappa-menu>ul>li.cappa-menu-sub>a').append('<span class="holder"></span>');
    
    

    // Sections background image from data background
    var pageSection = jQuery(".bg-img, section");
    pageSection.each(function (indx) {
        if (jQuery(this).attr("data-background")) {
            jQuery(this).css("background-image", "url(" + jQuery(this).data("background") + ")");
        }
    });

    
    // Animations
    var contentWayPoint = function () {
        var i = 0;
        jQuery('.animate-box').waypoint(function (direction) {
            if (direction === 'down' && !jQuery(this.element).hasClass('animated')) {
                i++;
                jQuery(this.element).addClass('item-animate');
                setTimeout(function () {
                    jQuery('body .animate-box.item-animate').each(function (k) {
                        var el = jQuery(this);
                        setTimeout(function () {
                            var effect = el.data('animate-effect');
                            if (effect === 'fadeIn') {
                                el.addClass('fadeIn animated');
                            } else if (effect === 'fadeInLeft') {
                                el.addClass('fadeInLeft animated');
                            } else if (effect === 'fadeInRight') {
                                el.addClass('fadeInRight animated');
                            } else {
                                el.addClass('fadeInUp animated');
                            }
                            el.removeClass('item-animate');
                        }, k * 200, 'easeInOutExpo');
                    });
                }, 100);
            }
        }, {
            offset: '85%'
        });
    };
    jQuery(function () {
        contentWayPoint();
    });
    
    
    // YouTubePopUp
    jQuery("a.vid").YouTubePopUp();
    
    
    // Testimonials owlCarousel *
    jQuery('.testimonials .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>", "<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    
    // Rooms 1 owlCarousel *
    jQuery('.rooms1 .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        autoplayHoverPause: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    
    // Rooms 2 owlCarousel *
    jQuery('.rooms2 .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        autoplayHoverPause: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    
    // Rooms 3 owlCarousel *
    jQuery('.rooms3 .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        autoplayHoverPause: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    
    // Rooms Page owlCarousel *
    jQuery('.rooms-page .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: true,
        dots: false,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    
    // Pricing owlCarousel *
    jQuery('.pricing .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: true,
        autoplayHoverPause: true,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 2
            }
        }
    });
    
    // News owlCarousel *
    jQuery('.news .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: false,
        dots: false,
        nav: true,
        navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                dots: true,
                nav: false
            },
            600: {
                items: 2,
                dots: true,
                nav: false
            },
            1000: {
                items: 3
            }
        }
    });
    
    // Team owlCarousel *
    jQuery('.team .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        dots: true,
        mouseDrag: true,
        autoplay: false,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                dots: true
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });
    
    // Clients owlCarousel *
    jQuery('.clients .owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        mouseDrag: true,
        autoplay: true,
        dots: false,
        nav: false,
        navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                margin: 10,
                items: 3
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });
    
    // Restaurant Menu owlCarousel
    jQuery('.restaurant-menu .owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        autoplay: false,
        dots: false,
        nav: true,
        navText: ["<span class='lnr ti-angle-left'></span>","<span class='lnr ti-angle-right'></span>"],
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                nav: false
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 4
            }
        }
    });
    
    // Restaurant Menu Tabs
    jQuery(".restaurant-menu .tabs-icon").on("click", ".item", function () {
        jQuery(".item").removeClass("active");
        var myID = jQuery(this).attr("id");
        jQuery(".restaurant-menu .cont").hide();
        jQuery("#" + myID + "-content").fadeIn();
    });
    jQuery(".restaurant-menu .tabs-icon").on("click", ".owl-item", function () {
        jQuery(this).addClass("actived").siblings().removeClass("actived");
    });
    
    // Accordion Box (for Faqs)
    if (jQuery(".accordion-box").length) {
        jQuery(".accordion-box").on("click", ".acc-btn", function () {
            var outerBox = jQuery(this).parents(".accordion-box");
            var target = jQuery(this).parents(".accordion");
            if (jQuery(this).next(".acc-content").is(":visible")) {
                //return false;
                jQuery(this).removeClass("active");
                jQuery(this).next(".acc-content").slideUp(300);
                jQuery(outerBox).children(".accordion").removeClass("active-block");
            } else {
                jQuery(outerBox).find(".accordion .acc-btn").removeClass("active");
                jQuery(this).addClass("active");
                jQuery(outerBox).children(".accordion").removeClass("active-block");
                jQuery(outerBox).find(".accordion").children(".acc-content").slideUp(300);
                target.addClass("active-block");
                jQuery(this).next(".acc-content").slideDown(300);
            }
        });
    }
    
    // MagnificPopup Gallery
    jQuery('.gallery').magnificPopup({
        delegate: '.popimg',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    jQuery(".img-zoom").magnificPopup({
        type: "image",
        closeOnContentClick: !0,
        mainClass: "mfp-fade",
        gallery: {
            enabled: !0,
            navigateByImgClick: !0,
            preload: [0, 1]
        }
    })
    jQuery('.magnific-youtube, .magnific-vimeo, .magnific-custom').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 300,
        preloader: false,
        fixedContentPos: false
    });
    

    // Smooth Scrolling
    jQuery('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]').not('[href="#0"]').click(function (event) {
        // On-page links
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            // Figure out element to scroll to
            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) + ']');
            // Does a scroll target exist?
            if (target.length) {
                // Only prevent default if animation is actually gonna happen
                event.preventDefault();
                jQuery('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000, function () {
                    // Callback after animation
                    // Must change focus!
                    var $target = jQuery(target);
                    $target.focus();
                    if ($target.is(":focus")) { // Checking if the target was focused
                        return false;
                    } else {
                        $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                        $target.focus(); // Set focus again
                    };
                });
            }
        }
    });
    
    //  Scroll back to top
    var progressPath = document.querySelector('.progress-wrap path');
    var pathLength = progressPath.getTotalLength();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
    progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
    progressPath.style.strokeDashoffset = pathLength;
    progressPath.getBoundingClientRect();
    progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';
    var updateProgress = function () {
        var scroll = jQuery(window).scrollTop();
        var height = jQuery(document).height() - jQuery(window).height();
        var progress = pathLength - (scroll * pathLength / height);
        progressPath.style.strokeDashoffset = progress;
    }
    updateProgress();
    jQuery(window).scroll(updateProgress);
    var offset = 150;
    var duration = 550;
    jQuery(window).on('scroll', function () {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.progress-wrap').addClass('active-progress');
        } else {
            jQuery('.progress-wrap').removeClass('active-progress');
        }
    });
    jQuery('.progress-wrap').on('click', function (event) {
        event.preventDefault();
        jQuery('html, body').animate({
            scrollTop: 0
        }, duration);
        return false;
    })
    
    
    // Select2
    jQuery('.select2').select2({
        minimumResultsForSearch: Infinity,
    });
    
    
    // Datapicker
    jQuery(".datepicker").datepicker({
        orientation: "top"
    });
     
});


// Slider  
jQuery(document).ready(function () {
    var owl = jQuery('.header .owl-carousel');
    
    // Slider owlCarousel - (Inner Page Slider)
    jQuery('.slider .owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 5000,
        nav: false,
        navText: ['<i class="ti-angle-left" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                dots: true
            },
            600: {
                dots: true
            },
            1000: {
                dots: true
            }
        }
    });
    
    // Slider owlCarousel (Homepage Slider)
    jQuery('.slider-fade .owl-carousel').owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        nav: false,
        navText: ['<i class="ti-angle-left" aria-hidden="true"></i>', '<i class="ti-angle-right" aria-hidden="true"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                dots: false
            },
            600: {
                dots: false
            },
            1000: {
                dots: true
            }
        }
    });
    owl.on('changed.owl.carousel', function (event) {
        var item = event.item.index - 2; // Position of the current item
        jQuery('span').removeClass('animated fadeInUp');
        jQuery('h4').removeClass('animated fadeInUp');
        jQuery('h1').removeClass('animated fadeInUp');
        jQuery('p').removeClass('animated fadeInUp');
        jQuery('.butn-light').removeClass('animated fadeInUp');
        jQuery('.butn-dark').removeClass('animated fadeInUp');
        jQuery('.owl-item').not('.cloned').eq(item).find('span').addClass('animated fadeInUp');
        jQuery('.owl-item').not('.cloned').eq(item).find('h4').addClass('animated fadeInUp');
        jQuery('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated fadeInUp');
        jQuery('.owl-item').not('.cloned').eq(item).find('p').addClass('animated fadeInUp');
        jQuery('.owl-item').not('.cloned').eq(item).find('.butn-light').addClass('animated fadeInUp');
        jQuery('.owl-item').not('.cloned').eq(item).find('.butn-dark').addClass('animated fadeInUp');
    });
});


// Preloader
jQuery("#preloader").fadeOut(700);
	jQuery(".preloader-bg").delay(700).fadeOut(700);
	var wind = jQuery(window);


// Contact Form
var form = jQuery('.contact__form'),
    message = jQuery('.contact__msg'),
    form_data;
    // success function
    function done_func(response) {
        message.fadeIn().removeClass('alert-danger').addClass('alert-success');
        message.text(response);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
        form.find('input:not([type="submit"]), textarea').val('');
    }
    // fail function
    function fail_func(data) {
        message.fadeIn().removeClass('alert-success').addClass('alert-success');
        message.text(data.responseText);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
    }
    form.submit(function (e) {
        e.preventDefault();
        form_data = jQuery(this).serialize();
        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form_data
        }).done(done_func).fail(fail_func);
    });