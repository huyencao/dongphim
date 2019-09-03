$(document).ready(function() {

    $("header").load("header.html", function () {
        // menu mobile
        jQuery(document).ready(function ($) {
            var $lateral_menu_trigger = $('#cd-menu-trigger'),
                $content_wrapper = $('.cd-main-content'),
                $navigation = $('header');

            $lateral_menu_trigger.on('click', function (event) {
                event.preventDefault();

                $lateral_menu_trigger.toggleClass('is-clicked');
                $navigation.toggleClass('lateral-menu-is-open');
                $content_wrapper.toggleClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                    // firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
                    $('body').toggleClass('overflow-hidden');
                });
                $('#cd-lateral-nav').toggleClass('lateral-menu-is-open');

                //check if transitions are not supported - i.e. in IE9
                if ($('html').hasClass('no-csstransitions')) {
                    $('body').toggleClass('overflow-hidden');
                }
            });

            //close lateral menu clicking outside the menu itself
            $content_wrapper.on('click', function (event) {
                if (!$(event.target).is('#cd-menu-trigger, #cd-menu-trigger span')) {
                    $lateral_menu_trigger.removeClass('is-clicked');
                    $navigation.removeClass('lateral-menu-is-open');
                    $content_wrapper.removeClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
                        $('body').removeClass('overflow-hidden');
                    });
                    $('#cd-lateral-nav').removeClass('lateral-menu-is-open');
                    //check if transitions are not supported
                    if ($('html').hasClass('no-csstransitions')) {
                        $('body').removeClass('overflow-hidden');
                    }

                }
            });

            $('.item-has-children').children('a').on('click', function(event){
                event.preventDefault();
                $(this).toggleClass('submenu-open').next('.sub-menu').slideToggle(200).end().parent('.item-has-children').siblings('.item-has-children').children('a').removeClass('submenu-open').next('.sub-menu').slideUp(200);
            });
        });

        $('.btn-search-mb').click(function () {
            $('.mb-abs').toggleClass('show')
        })
    });
    $("footer").load("footer.html", function () {});

    $('.slider-film').slick({
        autoPlay: true,
        autoplaySpeed: 2000,
        arrow: true,
        centerPadding: 0,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
            ]
    });

    $('.slider-film-2').slick({
        autoPlay: true,
        autoplaySpeed: 2000,
        arrow: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });

    $('.slider-banner').slick({
        autoPlay: true,
        autoplaySpeed: 2000,
        arrow: false,
        centerPadding: 0,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });
})
