<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;
    use Philomena\Session;
    use Philomena\Cookie;


    require_once 'config.php';

    $Users = new Users();

    if ( isset($_POST) && !empty($_POST) ) 
    {
        // $Users->SignIn($_POST['email'], $_POST['password'], $_POST['cookie']);
    }


    if ( !empty(Session::checkSession('uid')) ) 
    {
        $Users->setUser(Session::getSession('uid'));
    } 
    else if ( !empty(Cookie::checkCookie('uid')) ) 
    {
        $Users->setUser(Cookie::getCookie('uid'));
    }


    echo flashMessage('signin');

    if ( !$Users->isLoggedIn() ) {

        include_once( INC . '/header.php');

        echo '

        

        <div class="test">

        <div class="sidebar">
        test
        </div>

        <div class="container">

        <h1>Login to Philomena</h1>
            <div class="grid">
        
            <section>

                <form class="" action="login.php" accept-charset="UTF-8" method="post">
                
                    <input class="form__text_field" type="email" name="email" placeholder="email">

                    <input class="form__text_field" type="password" name="password" placeholder="password">

                    <input class="form__text_field" type="checkbox" name="cookie" value="1" checked="checked">


                    <input class="form__text_field" type="submit" value="submit">

                </form>

            </section>

        <section>

        <form action="login.php" method="POST">
            <input type="email" name="email" id="" placeholder="email">
            <input type="password" name="password" id="" placeholder="password">
            <input type="checkbox" name="cookie" value="1" checked="checked">
            <input type="submit" value="submit">
        </form>
        </section>
        
        </div>
        </div>
        </div>
        
        ';

        echo '<div class="privacy__terms">

            <p>By logging in you agree to our <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a></p>
        
        </div>';

        include_once( INC . '/footer.php');        

    } else {

        echo 'loggedin';

    }


    $date = '20200520110300';

    $new_date = strtotime($date);

    // echo date("M j, Y", $new_date);
    // 5 May, 2021
?>