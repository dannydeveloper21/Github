jQuery(document).ready(function ($) {

    //Open Search form on search icon click
    if ($('.search-icon-box').length > 0) {
        $('.search-icon-box .fa-search').on('click', function () {
            $('.top-bar-search').addClass('open');
            $('.top-bar-search form input[type="search"]').focus();
        });
    }

    // Close popup search form
    $('.top-bar-search, .top-bar-search button.close').on('click keyup', function (event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });

    //Open Close Off Canvas Menu
    $('.top-menu-icon, .overlay, .offcanvas-menu .close').on('click', function () {
        $('.offcanvas-menu ').toggleClass('menu-show');
        $('.top-menu-icon').toggleClass('clicked');
        $('.overlay').toggleClass('show');
        $('nav').toggleClass('show');
        $('body').toggleClass('overflow');
    });

    //Carousel
    if ($('.ct-carousel').length > 0) {
        $(".ct-carousel").slick({
            dots: false,
            infinite: true,
            slidesToShow: 2,
            centerMode: true,
            autoplay: true,
            centerPadding: '250px',
            lazyLoad: 'ondemand',
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        centerPadding: '150px'
                    }
                },
                {
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 2,
                        centerPadding: '0px'
                    }
                },
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerPadding: '0px'
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    }

    // Initialize gototop button
    if ( $('#toTop').length > 0 ) {
        // Hide the toTop button when the page loads.
        $("#toTop").css("display", "none");

        // This function runs every time the user scrolls the page.
        $(window).scroll(function () {

            // Check weather the user has scrolled down (if "scrollTop()"" is more than 0)
            if ($(window).scrollTop() > 0) {

                // If it's more than or equal to 0, show the toTop button.
                $("#toTop").fadeIn("slow");
            } else {
                // If it's less than 0 (at the top), hide the toTop button.
                $("#toTop").fadeOut("slow");

            }
        });

        // When the user clicks the toTop button, we want the page to scroll to the top.
        jQuery("#toTop").click(function (event) {

            // Disable the default behaviour when a user clicks an empty anchor link.
            // (The page jumps to the top instead of // animating)
            event.preventDefault();

            // Animate the scrolling motion.
            jQuery("html, body").animate({
                scrollTop: 0
            }, "slow");

        });
    }


    //sticky sidebar
    var at_body = $("body");
    var at_window = $(window);

    if ($('.ct-sticky-sidebar').length > 0) {

        if (at_body.hasClass('ct-sticky-sidebar')) {
            if (at_body.hasClass('right-sidebar')) {
                $('#secondary, #primary').theiaStickySidebar();
            } else {
                $('#secondary, #primary').theiaStickySidebar();
            }
        }
    }
});