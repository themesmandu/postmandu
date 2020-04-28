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

    // Menu show and hide in focus attributes
    if ($(document).width() > 991) {
        $('.main-navigation ul li a').focus(function(){
            $(this).parent().addClass('focus');
        });

        $('.main-navigation ul li a').focusout(function(){
            if(!$(this).parent().hasClass('menu-item-has-children')) {
                $(this).parent().removeClass('focus');
            }
        });

        $('.main-navigation ul .sub-menu .menu-item:last-child').focusout(function() {
            if(!$(this).hasClass('focus')) {
                $(this).parent().parent().removeClass('focus');
            }
        });

        $(window).click(function(){
            $('.main-navigation ul li').removeClass('focus');
            $('#navbarmenus').removeClass('show');
        });
    }


    // Add class in navigation bar
    $(window).scroll(function () {
        var height = $(window).scrollTop();
        if (height > 10) {
            $('.main-navigation').addClass('fixed');
        } else {
            $('.main-navigation').removeClass('fixed');
        }
    });

    // Added class on dropdown menu span
    if ($(document).width() < 1200) {
        $('.main-navigation .menu-item-has-children').append('<span class="caret"></span>');

        $('.caret').click(function () {
            $(this).parent().toggleClass('menu-open').siblings().removeClass('menu-open');
        });
    }

    // Selection oflist and grid view
    $('.action span').click(function () {
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