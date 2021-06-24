    <h1 class="dashboard_page__heading">Settings</h1>

    <div class="dashboard__notifications"><?php Philomena\Session::flash('settings'); ?></div>

    <div class="dashboard_page__account">

        <section class="account__general_settings">

            <div class="dashboard_section__header">
                
                <h1 class="dashboard_section__heading">Change Your Information</h1>
            
            </div>

            <div class="dashboard_section__content">

                <form class="account_info_form" action="inc/actions.php" accept-charset="UTF-8" method="post">

                    <input type="hidden" name="action" value="update_user_info">

                    <input type="hidden" name="uri" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">

                    <div class="account__user_info">

                        <div class="account__user_name">

                            <label class="label">Full Name</label>

                            <input class="form__text_field" type="text" name="user[name]" value="<?php echo (!empty($aAccounts['fullname']) ? $aAccounts['fullname'] : ''); ?>" placeholder="Your Name">

                        </div>

                        <div class="account__user_phone">

                            <label class="label">Phone Number</label>

                            <input class="form__text_field" type="phone" name="user[phone]" value="<?php echo (!empty($aAccounts['phone']) ? $aAccounts['phone'] : ''); ?>" placeholder="Your Phone">

                        </div>

                    </div>

                    <input class="button button-settings--update" type="submit" value="Update Info">

                </form>

            </div>
            
        </section>

        <section class="account__email_settings">

            <div class="dashboard_section__header">
                
                <h1 class="dashboard_section__heading">Change Your Email</h1>
            
            </div>

            <div class="dashboard_section__content">

                <form class="update_email_form" action="inc/actions.php" accept-charset="UTF-8" method="post">

                    <input type="hidden" name="action" value="update_email_address">

                    <input type="hidden" name="uri" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">

                    <div class="account__email_info">

                        <div class="account__user_new_email">

                            <label class="label">New Email Address</label>

                            <input class="form__text_field" type="email" name="email[new]" placeholder="Enter Email">

                        </div>

                        <div class="account__user_confirm_email">

                            <label class="label">Confirm New Email Address</label>

                            <input class="form__text_field" type="email" name="email[confirm]" placeholder="Confirm Email">

                        </div>

                        <div class="account__user_current_password">

                            <label class="label">Current Password</label>

                            <input class="form__text_field" type="password" name="email[password]" placeholder="Enter Password">

                        </div>

                    </div>

                    <input class="button button-settings--update" type="submit" value="Update Email">

                </form>

            </div>

        </section>

        <section class="account__password_settings">

            <div class="dashboard_section__header">
                
                <h1 class="dashboard_section__heading">Change Your Password</h1>
            
            </div>

            <div class="dashboard_section__content">

                <form class="update_password_form" action="inc/actions.php" accept-charset="UTF-8" method="post">

                    <input type="hidden" name="action" value="update_password">

                    <input type="hidden" name="uri" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">

                    <div class="account__password_info">

                        <div class="account__user_new_email">

                            <label class="label">Current Password</label>

                            <input class="form__text_field" type="password" name="password[current]" placeholder="Enter Password">

                        </div>

                        <div class="account__user_new_confirm_email">

                            <label class="label">New Password</label>

                            <input class="form__text_field" type="password" name="password[new]" placeholder="Must be longer than 6 characters">

                        </div>

                        <div class="account__user_confirm_password">

                            <label class="label">Confirm New Password</label>

                            <input class="form__text_field" type="password" name="password[confirm]" placeholder="Confirm Password">

                        </div>

                    </div>

                    <input class="button button-settings--update" type="submit" value="Update Password">

                </form>

            </div>

        </section>

    </div>