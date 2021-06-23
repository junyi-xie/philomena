/* Copyright (c) - 2021 by Junyi Xie */	

    $(document).ready(function(){

        $("#datepicker").datepicker({
            lang:'en',
            dateFormat: 'yy-mm-dd',
            minDate: 0,
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
        });

        $("#site__header_menu_toggle").click(function(){
            $('body').toggleClass('site__menu_is__open');
        });


        $('.js-page-anchor').on('click', function (e) {
            e.preventDefault();
              
            var dest = $(this).attr("href");
              
            $("html, body").animate({
                'scrollTop': $(dest).offset().top
            }, 1000);
        });
    });

    $(window).scroll(function() {
        var header = $(document).scrollTop();
        var headerBar = $(".site__header");
        var headerHeight = headerBar.outerHeight();
        var firstSection = $(".site__content_container section:nth-of-type(1)").outerHeight();

        if ( header > headerHeight ) {
            headerBar.addClass("fixed");
        } else {
            headerBar.removeClass("fixed");
        }

        if ( header > firstSection ) {
            headerBar.addClass("in-view");
        } else {
            headerBar.removeClass("in-view");
        }
    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }