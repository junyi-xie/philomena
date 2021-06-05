<?php 
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Appointments;
    use Philomena\Users;
    Use Philomena\Redirect;
    use Philomena\Session;
    use Philomena\Cookie;


    require_once 'config.php';

    $Appointments = new Appointments();
    $Users  = new Users();


    if ( isset($_GET['signout']) && $_GET['signout'] == true )
    {
        $Users->Logout();
        Redirect::To('index');
    }

    
    if ( !empty(Session::checkSession('uid')) ) 
    {
        $Users->setUser(Session::getSession('uid'));
    } 
    else if ( !empty(Cookie::checkCookie('uid')) ) 
    {
        $Users->setUser(Cookie::getCookie('uid'));
    }
    else 
    {
        Redirect::To('index');
    }


    if ( isset($_POST['action']) && !empty($_POST['action']) ) {

        switch ( $_POST['action'] ) 
        {
            case 'information':
                $a = $Users->updateCredentials($_POST['credentials'], '', false);
                var_dump($a);
            break;
            case 'password':
                $Users->updateCredentials($_POST['credentials'], $_POST['password']);
            break;
            case 'email':
                $Users->updateCredentials($_POST['credentials'], $_POST['password']);
            break;            
        }
    }


    include_once INC . '/header.php';


    echo '
        <form method="post">
            <input type="hidden" name="action" value="information">
            <input type="text" name="credentials[email]" placeholder="first name">
            <input type="text" name="credentials[last_name]" placeholder="last name">
            <input type="text" name="password" placeholder="password">
            <input type="submit" value="update">
        </form>
    ';

    // content here

    include_once INC . '/footer.php';
?>