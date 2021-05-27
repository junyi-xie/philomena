    /* Copyright (c) - 2021 by Junyi Xie */	
    
    $(document).ready(function(){
    
        $(function() {
            $("#datepicker").datepicker({
                lang:'en',
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            });
        });
        
    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }