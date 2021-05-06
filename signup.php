<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;

    require_once 'config.php';

    $Users = new Users();



    include_once( INC . '/header.php');

    echo '<form action="signup.php" method="POST">

        <input type="text" name="first_name" id="" placeholder="first_name">
        <input type="text" name="last_name" id="" placeholder="last_name">
        <input type="email" name="email" id="" placeholder="email">
        <input type="password" name="password" id="" placeholder="password">
        <input type="submit" value="submit">

    </form>';

    include_once( INC . '/footer.php');        



    if (!empty($_POST) && isset($_POST)) {
    $t = $Users->SignUp($_POST);


    // $a = $Users->getEmail();
    // $b = $Users->getPassword();
    echo flashMessage('signup');

    printr($t);
    }


?>