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

        $(window).scroll(function() {
            var header = $(document).scrollTop();
            var headerBar = $(".site__header");
            var headerHeight = headerBar.outerHeight();
            var firstSection = $(".site__wrapper section:nth-of-type(1)").outerHeight();

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
    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }