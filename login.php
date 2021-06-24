<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;
    use Philomena\Session;
    use Philomena\Cookie;
    use Philomena\Redirect;


    require_once 'config.php';

    $Users = new Users();

    if ( isset($_POST) && !empty($_POST) ) 
    {
        $Users->SignIn($_POST['email'], $_POST['password'], !empty($_POST['cookie']) && $_POST['cookie'] === '1' ? true : false);
    }


    if ( !empty(Session::checkSession('uid')) ) 
    {
        $Users->setUser(Session::getSession('uid'));
    } 
    else if ( !empty(Cookie::checkCookie('uid')) ) 
    {
        $Users->setUser(Cookie::getCookie('uid'));
    }


    if ( !$Users->isLoggedIn() ) 
    {
        include_once INC . '/header.php';

        include_once INC . '/' . LAYOUT . '/authentication.php';
        
        include_once INC . '/footer.php';        
    } 
    else 
    {
        if ( isset($_GET['uri']) && !empty($_GET['uri']) ) 
        {
            Redirect::To($_GET['uri']);
        } 
        else 
        {
            Redirect::To('dashboard.php?from=login&method=email&auth=false');
        }
    }
?>