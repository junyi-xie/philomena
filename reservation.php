<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Appointments;
    use Philomena\Users;
    use Philomena\Session;
    use Philomena\Cookie;
    use Philomena\Redirect;

    
    require_once 'config.php';

    $Appointments = new Appointments();
    $Users = new Users();


    if ( !empty(Session::checkSession('uid')) ) 
    {
        $Users->setUser(Session::getSession('uid'));
    } 
    else if ( !empty(Cookie::checkCookie('uid')) ) 
    {
        $Users->setUser(Cookie::getCookie('uid'));
    }

    echo 'hello to appointments';
?>