<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;

    require_once 'config.php';

    $Users = new Users();



    include_once( INC . '/header.php');

    
    ?>

    <div class="container" id="content" role="main">
    
        <div class="row no-gutter">

                        
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

            <!-- <div class="col-6" style="background-image: url('https://res.cloudinary.com/mhmd/image/upload/v1555917661/art-colorful-contemporary-2047905_dxtao7.jpg')"> -->
            

                <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In perferendis ab eos nesciunt modi, accusantium et dicta similique quam repellendus fugiat doloribus voluptatum suscipit quos unde tempora molestiae facere earum?</p> -->
            <!-- </div> -->
        
        </div>
    
    </div>

    

<?php



// printr($_SESSION);
if (isset($_POST) && !empty($_POST)) {
    
    $test = $Users->SignUp($_POST);


    echo flashMessage('signup');
}






    include_once( INC . '/footer.php');        
    

    

?>