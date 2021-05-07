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


    if ( !$Users->isLoggedIn() ) {

        include_once( INC . '/header.php');

        echo '<form action="login.php" method="POST">

            <input type="email" name="email" id="" placeholder="email">
            <input type="password" name="password" id="" placeholder="password">
            <input type="checkbox" name="cookie" value="1" checked="checked">
            <input type="submit" value="submit">

        </form>';

        include_once( INC . '/footer.php');        

    } else {

        echo 'loggedin';


    }



    if (isset($_POST) && !empty($_POST)) {
        $appel2 = $Users->SignIn($_POST['email'], $_POST['password'], $_POST['cookie']);


        echo flashMessage('signin');

    }
?>