<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Appointments;
    use Philomena\Users;

    require_once 'config.php';

    include_once INC . '/header.php';

   echo
        '
        <div class="site__content_container">

            <div class="site__main">

                <div class="site__wrapper">

                    <a href="login.php">Login here</a>    
                    <a href="signup.php">Sign up here</a>    
                
                    <br/>
                    <br/>
                    <br/>
';?>

    <?php 
        $Appointments = new Appointments();
        $Users = new Users();

        $a = $Appointments->checkDateTimeValid('sunday');

        var_dump($a);
    
    ?>

    <form action="index.php" method="post">
        <input type="text" name="" id="datepicker">
        <input type="submit" value="">
    
    </form>

<?php echo '
                    
                </div>
            
            </div>

        </div>
        '
    ;

    include_once INC . '/footer.php'; 
?>