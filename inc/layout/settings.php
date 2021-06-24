    <h1 class="dashboard_page__heading">Settings</h1>

    <div class="dashboard__notifications"><?php Philomena\Session::flash('settings'); ?></div>

    <div class="dashboard_page__account">

        <section class="account__general_settings">

            <div class="dashboard_section__header">
                
                <h1 class="dashboard_section__heading">Change Your Information</h1>
            
            </div>

            <div class="dashboard_section__content">

                <form class="account_info_form" action="actions.php" accept-charset="UTF-8" method="post">

                <input type="hidden" name="action" value="update_user_info">

                <input type="hidden" name="uri" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">

                <div class="account__user_info">

                    <div class="row">
                        
                        <div class="col-12 col-md-6">

                            <label class="label">First Name</label>

                            <input class="form__text_field" type="text" name="user[first_name]" value="" placeholder="John">
                        
                        </div>

                        <div class="col-12 col-md-6">

                            <label class="label">Last Name</label>

                            <input class="form__text_field" type="text" name="user[last_name]" value="" placeholder="Doe">
                        
                        </div>

                        <div class="col-12">
                        
                            <label class="label">Phone Number</label>
                    
                            <input class="form__text_field" type="phone" name="user[phone]" value="" placeholder="Your Phone">

                        </div>

                        <div class="col-12">
                        
                            <label class="label">Address</label>
                    
                            <input class="form__text_field" type="text" name="user[address]" value="" placeholder="Your Address">

                        </div>

                        <div class="col-12">

                            <label class="label">City</label>

                            <input class="form__text_field" type="text" name="user[city]" value="" placeholder="Your City">
                        
                        </div>

                        <div class="col-12">

                            <label class="label">Province</label>

                            <input class="form__text_field" type="text" name="user[province]" value="" placeholder="Your Province">
                        
                        </div>

                        <div class="col-12 col-md-6">

                            <label class="label">Postal Code</label>

                            <input class="form__text_field" type="text" name="user[zipcode]" value="" placeholder="Your Postal code">
                        
                        </div>

                        <div class="col-12 col-md-6">

                            <label class="label">Country</label>

                            <select class="form__select_menu" name="user[country]">

                                <option value="The Netherlands">The Netherlands</option>
                            
                            </select>
                        
                        </div>

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

                <form class="update_email_form" action="actions.php" accept-charset="UTF-8" method="post">

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

                <form class="update_password_form" action="actions.php" accept-charset="UTF-8" method="post">

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