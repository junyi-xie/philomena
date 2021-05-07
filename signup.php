<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;

    require_once 'config.php';

    $Users = new Users();



    include_once( INC . '/header.php');

    ?>

    <div class="container" id="content" role="main">
    
        <div class="row">

                        
            <div class="col-6">
            
            <form action="signup.php" method="POST">

        <input type="text" name="first_name" id="" placeholder="John">
        <input type="text" name="last_name" id="" placeholder="Doe">
        <input type="email" name="email" id="" placeholder="you@example.com">
        <input type="password" name="password" id="" min="6" placeholder="Password">
        <input type="password" name="confirm" id="" min="6" placeholder="Confirm Password">
        <input type="submit" value="submit">

    </form>
            </div>
        
        </div>
    
    </div>

    

<?php
    include_once( INC . '/footer.php');        



    if (!empty($_POST) && isset($_POST)) {
    $t = $Users->SignUp($_POST);


    // $a = $Users->getEmail();
    // $b = $Users->getPassword();
    echo flashMessage('signup');

    printr($t);
    }


?>