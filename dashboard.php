<?php 
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Appointments;
    use Philomena\Users;
    Use Philomena\Redirect;


    require_once 'config.php';

    $Appointments = new Appointments();
    $Users  = new Users();

    if ( isset($_GET['signout']) && $_GET['signout'] == true )
    {
        $Users->Logout();
        Redirect::To('index');
    }

    
    include_once INC . '/header.php';

    // content here

    include_once INC . '/footer.php';
?>