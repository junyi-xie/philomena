<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;
    use Philomena\Session;
    use Philomena\Cookie;


    require_once 'config.php';

    $Users = new Users();

    if ( isset($_POST) && !empty($_POST) ) 
    {
        $cookie = !empty($_POST['cookie']) && $_POST['cookie'] === 1 ? true : false;

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

        echo '<div  id="authentication__container">';
        
        flashMessage('signin');
         
        echo '<div class="container">

                <div class="authentication__heading">
                
                    <h2 class="authentication__title">Login to Philomena</h2>

                </div>

                <div class="row" id="authentication__wrapper">
                
                    <div class="col-12 col-lg-6" id="authentication__verification">

                        <section class="authentication_section__content">

                            <div class="authentication__wrapper">
                            
                                <form action="login.php" accept-charset="UTF-8" method="POST" id="auth__form">

                                    <label class="label">Email</label>

                                    <input class="form__text_field" type="email" name="email" placeholder="Email" id="auth__email">

                                    <label class="label">Password</label>

                                    <input class="form__text_field" type="password" name="password" placeholder="Password" id="auth__password">

                                    <div class="authentication__option">

                                        <input type="checkbox" name="cookie" value="1" checked="checked" id="auth__cookie">

                                        <span>Always stay logged in?</span>

                                    </div>

                                    <input class="button button__auth_login" type="submit" value="Log In" id="auth__login">

                                </form>

                            </div>

                        </section>

                    </div>

                    <div class="col-12 col-lg-6" id="authentication__options">

                        <section class="authentication_section__content">

                            <div class="authentication__wrapper">

                                <div class="display-mobile">
                                
                                    <div class="authentication__line"><p>or</p></div>

                                </div>

                                <a class="button button__auth_connect" href="signup.php">
                                            
                                    <div class="auth__icon"><i class="fas fa-user-plus"></i></div>

                                    <div class="auth__message">Create an Account</div>
                                
                                </a>
                                
                                <a class="button button__auth_connect" href="signup.php?go=google">
                                    
                                    <div class="auth__icon"><svg viewBox="0 0 256 262"><path d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027" fill="#4285F4"/><path d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1" fill="#34A853"/><path d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782" fill="#FBBC05"/><path d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251" fill="#EB4335"/></svg></div>

                                    <div class="auth__message">Continue with Google</div>
                                
                                </a>

                            </div>

                        </section>

                    </div>

                </div>

                <div class="privacy__terms">

                    <p>By logging in you agree to our <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a></p>
            
                </div>

            </div>
            
        </div>';
        
        include_once( INC . '/footer.php');        

    } else {

        header("Location: dashboard.php?from=login&method=email&auth=false");    
        die('You are being redirected...');    
    }
?>