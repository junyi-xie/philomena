<div id="authentication">

    <div class="container-fluid">

        <div class="row no-gutters" style="height: 100%;">

            <div class="col-lg-6 display-desktop" id="authentication__side_banner"></div>

            <div class="col-12 col-lg-6" id="authentication__signup">

                <section class="authentication_section__signup">

                    <div class="authentication__wrapper">

                        <?php flashMessage('signup'); ?>
                        
                        <div class="authentication__heading">

                            <h2 class="authentication__title">Signup to Philomena</h2>

                        </div>

                        <form action="signup.php" accept-charset="UTF-8" method="POST" id="auth__signup">

                            <label class="label">Full Name</label>

                            <div class="row">

                                <div class="col-12 col-lg-6">

                                    <input class="form__text_field" type="text" name="first_name" placeholder="John" id="auth_first_name" required>

                                </div>

                                <div class="col-12 col-lg-6">

                                    <input class="form__text_field" type="text" name="last_name" placeholder="Doe" id="auth_last_name" required>

                                </div>

                            </div>

                            <label class="label">Email</label>

                            <input class="form__text_field" type="email" name="email" placeholder="you@example.com" id="auth_email" required>

                            <label class="label">Password (must be longer than 6 characters)</label>

                            <input class="form__text_field" type="password" name="password" placeholder="Password" id="auth_password" required>

                            <input class="form__text_field" type="password" name="confirm" placeholder="Confirm Password" id="auth_password_confirm" required>

                            <div class="authentication__privacy_message">

                                <p>By creating your account, you agree to our <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a>.</p>

                            </div>

                            <input class="button button__auth_login" type="submit" value="Sign Up" id="auth_signup">

                        </form>

                        <div class="authentication__login">

                            <p>Already have an account? <a href="login.php">Log In</a></p>

                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>

</div>