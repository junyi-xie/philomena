<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;
    use Philomena\Session;
    use Philomena\Cookie;


    require_once 'config.php';

    $Users = new Users();

    if ( isset($_POST) && !empty($_POST) ) 
    {
        $cookie = !empty($_POST['cookie']) ? true : false;

        $Users->SignIn($_POST['email'], $_POST['password'], $cookie);
    }


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
        
        echo flashMessage('signin');


        echo '<div class="container">

        <h1>Login to Philomena</h1>
        
        

        <form action="login.php" method="POST">
            <input type="email" name="email" id="" placeholder="email">
            <input type="password" name="password" id="" placeholder="password">
            <input type="checkbox" name="cookie" value="1" checked="checked">
            <span>Keep me logged in?</span>
    <input type="text" class=" " name="date" id="datepicker">

            <input type="submit" value="submit">
        </form>
        
        </div>

        <a href="signup.php">create</a>
        
    <div class="privacy__terms">

            <p>By logging in you agree to our <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a></p>
        
        </div>';

        
        include_once( INC . '/footer.php');        

    } else {

        // redirect
        echo 'loggedin';


    }

    printr($_POST);

?>