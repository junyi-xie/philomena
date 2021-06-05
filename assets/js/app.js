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
        
    });

    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }