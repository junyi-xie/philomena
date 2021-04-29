<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;

    require_once 'config.php';


    $Users = new Users();


    if ( !$Users->isLoggedIn() ) {

        

    } else {


    }

    if ( !empty($_POST) ) {
        

        $Users->setPassword($_POST['password']);

        $a = $Users->getPassword();
        
        $b = $Users->checkPassword($_POST['new'], $a);

        printr($b);
    }

  
    $t = password_algos();

    printr($t);
include_once( INC . '/header.php');


echo '<form action="login.php" method="POST">

    <input type="password" name="new" id="">
    <input type="email" name="email" id="" placeholder="email">
    <input type="password" name="password" id="" placeholder="password">
    <input type="submit" value="submit">

</form>';




include_once( INC . '/footer.php');
?>