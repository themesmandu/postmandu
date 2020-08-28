jQuery(document).ready(function ($) {
    // Skip to content smooth scroll JavaScript
        $('.skip-link').click(function(event) {
          if (this.hash !== '') {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({ scrollTop: $(hash).offset().top }, 500, function(){
                window.location.hash = hash;
            });
          }
        });

    $(window).scroll(function () {
        var height = $(window).scrollTop();
        if (height > 100) {
            $('.skip-link').fadeOut();
        } else {
            $('.skip-link').fadeIn();
        }
    });

    // Add class in navigation bar
    $(window).scroll(function () {
        var height = $(window).scrollTop();
        if (height > 10) {
            $('.main-navigation').addClass('fixed');
        } else {
            $('.main-navigation').removeClass('fixed');
        }
    });

    // Menu show and hide in focus attributes

    if ($(document).width() > 1200) {
        $('.menu-item-has-children').children().focusin(function(){
            $(this).parent().addClass('focus');
        });

        $('.menu-item-has-children').children().focusout(function(){
            $(this).parent().removeClass('focus');
        });
        
        $(window).click(function(){
            $('.menu-item-has-children').removeClass('focus');
        });
    }

    // Added class on dropdown menu span
    if ($(document).width() < 1200) {
        $('<button class="caret"><span class="screen-reader-text">Show sub menu</span><i class="fas fa-chevron-down"></i></button>').insertBefore( ".main-navigation .menu-item-has-children .sub-menu" );

        $('.caret').click(function () {
            $(this).parent().toggleClass('menu-open').siblings().removeClass('menu-open');
        });

        $(document).click(function (e) {
            if ($(e.target).is('.caret, screen-reader-text, .fa-chevron-down, .menu-item, .sub-menu, .nav-link') === false) {
                $('.main-navigation .menu-item').removeClass('menu-open');
            }
        });

        $(document).click(function (e) {
            if ($(e.target).is() === false) {
                $('.share_wrap').removeClass('share_show');
            }
        });
    }

    if ($(document).width() <= 991) {
        $('<button class="close-menu"><span class="screen-reader-text">Close menu</span><span>&#10005;</span></button>').insertAfter( ".main-navigation .menu-item:last-child" );
        $('.close-menu').click(function() {
            $('#navbarmenus').removeClass('show');
        })
    }

    // Selection oflist and grid view
    $('.action button').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

    $('.view-grid').click(function() {
        $('.episode-grid').addClass('show-grid');
        $('.episode-list').removeClass('show-list')
    });

    $('.view-list').click(function() {
        $('.episode-list').addClass('show-list');
        $('.episode-grid').removeClass('show-grid');
    });

    // To top Java Script
    $(window).scroll(function () {
        var height = $(window).scrollTop();
        if (height >= 200) {
            $('#up-btn').addClass('view');
        } else {
            $('#up-btn').removeClass('view');
        }
    });
    $('#up-btn').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
    });
});