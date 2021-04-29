<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    require_once 'config.php';

    include_once("inc/header.php");

echo '<div class="site__content_container">

    <div class="site__main">

        <div class="site__wrapper">';
            
            
                $select = $Database->Select(sql: "SELECT * FROM openinghours WHERE branch_id = :branch_id", data: ['branch_id' => '1',]);
                printr($select);
            

        echo '</div>
    
    </div>

</div>';

include_once("inc/footer.php"); 
?>