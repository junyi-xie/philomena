<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;
    use Philomena\Session;
    use Philomena\Cookie;

    
    require_once 'config.php';

    $Users = new Users();


    if ( !empty(Session::checkSession('uid')) ) 
    {
        $Users->setUser(Session::getSession('uid'));
    } 
    else if ( !empty(Cookie::checkCookie('uid')) ) 
    {
        $Users->setUser(Cookie::getCookie('uid'));
    }

    include_once INC . '/header.php';

    include_once INC . '/layout/home.php';
    
    include_once INC . '/footer.php'; 
?>