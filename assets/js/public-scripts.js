(function ($) {
    'use strict';

    // Smooth scrolling for anchor links
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();

        var target = $(this.hash);
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 800);
        }
    });

    // Responsive menu toggle
    $('.menu-toggle').on('click', function () {
        $('.nav-menu').slideToggle();
    });

})(jQuery);