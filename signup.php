<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;


    require_once 'config.php';

    $Users = new Users();

    if ( isset($_POST) && !empty($_POST) ) 
    {
        $Users->SignUp($_POST);    
    }


    include_once INC . '/header.php';

    include_once INC . '/layout/registration.php';

    include_once INC . '/footer.php';        
?>