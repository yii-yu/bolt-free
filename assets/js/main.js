(function ($) {

    "use strict";

    $(window).on('load', function () {

        /* Page Loader active
         ========================================================*/
        $('#preloader').fadeOut();

        // Sticky Nav
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 200) {
                $('.scrolling-navbar').addClass('top-nav-collapse');
            } else {
                $('.scrolling-navbar').removeClass('top-nav-collapse');
            }
        });



        /* ==========================================================================
         countdown timer
         ========================================================================== */
        jQuery('#clock').countdown('2019/03/26', function (event) {
            var $this = jQuery(this).html(event.strftime(''
                    + '<div class="time-entry days"><span>%-D</span> Days</div> '
                    + '<div class="time-entry hours"><span>%H</span> Hours</div> '
                    + '<div class="time-entry minutes"><span>%M</span> Minutes</div> '
                    + '<div class="time-entry seconds"><span>%S</span> Seconds</div> '));
        });


        // one page navigation 
        $('.onepage-nev').onePageNav({
            currentClass: 'active'
        });

        /* Back Top Link active
         ========================================================*/
        var offset = 200;
        var duration = 500;
        $(window).scroll(function () {
            if ($(this).scrollTop() > offset) {
                $('.back-to-top').fadeIn(400);
            } else {
                $('.back-to-top').fadeOut(400);
            }
        });

        $('.back-to-top').on('click', function (event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 600);
            return false;
        });

    });

}(jQuery));

(function ($) {
    $("#form_reg").submit(function () {
        var
                emailData = $("#inputEmail").val(),
                data = {email: emailData};

        $.post("action/registration.php", data)
                .done(function (result) {
                    var res = JSON.parse(result);

                    if (res.error) {
                        $('#save_error').html(res.error);
                    }

                    if (res.success) {
                        $('#form_reg').html('');
                        $('#save_success').html(res.success);
                    }
                });


        return false;
    });
}(jQuery));