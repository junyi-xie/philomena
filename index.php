<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    require_once 'config.php';

    include_once("inc/header.php");

echo '<div class="site__content_container">

    <div class="site__main">

        <div class="site__wrapper">';
            
            
        printr($_SESSION);
        printr($_COOKIE); 
        ?>
        
        <form action method="post">
        
            <input type="text" min="<?= date("YmdHis"); ?>" name="" id="datepicker">
            <input type="submit" value="submit">
        
        </form
<?php
        echo '</div>
    
    </div>

</div>';

include_once("inc/footer.php"); 
?>