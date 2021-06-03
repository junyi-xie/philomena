<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    require_once 'config.php';

    include_once INC . '/header.php';

    print(
        '<div class="site__content_container">

            <div class="site__main">

                <div class="site__wrapper">

                    <a href="login.php">Login here</a>    
                    <a href="signup.php">Sign up here</a>    
                
                </div>
            
            </div>

        </div>'
    );

    include_once INC . '/footer.php'; 
?>