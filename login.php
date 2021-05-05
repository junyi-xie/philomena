<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;

    require_once 'config.php';

    $Users = new Users();


    if ( !$Users->isLoggedIn() ) {

        include_once( INC . '/header.php');

        echo '<form action="login.php" method="POST">

            <input type="email" name="email" id="" placeholder="email">
            <input type="password" name="password" id="" placeholder="password">
            <input type="submit" value="submit">

        </form>';

        include_once( INC . '/footer.php');        

    } else {



    }


    if (isset($_POST) && !empty($_POST)) {
        $appel2 = $Users->SignIn($_POST['email'], $_POST['password']);


        echo flashMessage('signin');
        printr($appel2);
    }
?>