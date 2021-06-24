<?php 
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Appointments;
    use Philomena\Users;
    use Philomena\Redirect;
    use Philomena\Session;
    use Philomena\Cookie;


    require_once 'config.php';

    $Appointments = new Appointments();
    $Users  = new Users();


    if ( isset($_GET['signout']) && $_GET['signout'] == true )
    {
        $Users->Logout();
        Redirect::To('index.php');
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
        Redirect::To('index.php');
    }

    
    include_once INC . '/header.php';

    include_once INC . '/' . LAYOUT . '/sidebar.php';

    include_once INC . '/' . LAYOUT . '/main.php';

    if ( isset($_GET['page']) && !empty($_GET['page']) )
    {
        if ( !file_exists(PATH . INC . DIRECTORY_SEPARATOR . LAYOUT . DIRECTORY_SEPARATOR . $_GET['page'] . '.php') ) 
        {
            Redirect::To('404.html');
        } 
        else 
        {
            include_once INC . '/' . LAYOUT . '/' . $_GET['page'] . '.php';
        }
    } 
    else 
    {
        include_once INC . '/' . LAYOUT . '/admin.php';
    }

    include_once INC . '/' . LAYOUT . '/end.php';

    include_once INC . '/footer.php';
?>