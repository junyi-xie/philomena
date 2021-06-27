    <h1 class="dashboard_page__heading">Settings</h1>

    <div class="dashboard__notifications"><?php Philomena\Session::flash('settings'); ?></div>

    <div class="dashboard_page__wrapper">

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__header">
                
                <h1 class="dashboard_section__heading">Change Your Information</h1>
            
            </div>

            <div class="dashboard_section__content">

                <form action="actions.php" accept-charset="UTF-8" method="post">

                <input type="hidden" name="action" value="update_information">

                <input type="hidden" name="uri" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">

                <div class="profile__wrapper">

                    <div class="row">
                        
                        <div class="col-12 col-md-6">

                            <label class="label">First Name</label>

                            <input class="form__text_field" type="text" name="user[first_name]" value="<?= $Profile->first_name; ?>" placeholder="John">
                        
                        </div>

                        <div class="col-12 col-md-6">

                            <label class="label">Last Name</label>

                            <input class="form__text_field" type="text" name="user[last_name]" value="<?= $Profile->last_name; ?>" placeholder="Doe">
                        
                        </div>

                        <div class="col-12">
                        
                            <label class="label">Phone Number</label>
                    
                            <input class="form__text_field" type="phone" name="user[phone]" value="<?= $Profile->phone; ?>" placeholder="Your Phone">

                        </div>

                        <div class="col-12">
                        
                            <label class="label">Address</label>
                    
                            <input class="form__text_field" type="text" name="user[address]" value="<?= $Profile->address; ?>" placeholder="Your Address">

                        </div>

                        <div class="col-12">

                            <label class="label">City</label>

                            <input class="form__text_field" type="text" name="user[city]" value="<?= $Profile->city; ?>" placeholder="Your City">
                        
                        </div>

                        <div class="col-12">

                            <label class="label">Province</label>

                            <input class="form__text_field" type="text" name="user[province]" value="<?= $Profile->province; ?>" placeholder="Your Province">
                        
                        </div>

                        <div class="col-12 col-md-6">

                            <label class="label">Postal Code</label>

                            <input class="form__text_field" type="text" name="user[zipcode]" value="<?= $Profile->zipcode; ?>" placeholder="Your Postal code">
                        
                        </div>

                        <div class="col-12 col-md-6">

                            <label class="label">Country</label>

                            <select class="form__select_menu" name="user[country]">

                                <option selected value="The Netherlands">The Netherlands</option>
                            
                            </select>
                        
                        </div>

                    </div>
                        
                </div>

                <input class="button button__settings_update" type="submit" value="Update Info">

                </form>

            </div>
            
        </section>

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__header">
                
                <h1 class="dashboard_section__heading">Change Your Email</h1>
            
            </div>

            <div class="dashboard_section__content">

                <form action="actions.php" accept-charset="UTF-8" method="post">

                <input type="hidden" name="action" value="update_email">

                <input type="hidden" name="uri" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">

                <div class="profile__wrapper">

                    <div class="row">

                        <div class="col-12">

                            <label class="label">New Email Address</label>

                            <input class="form__text_field" type="email" name="credential[email]" placeholder="Enter Email">

                        </div>

                        <div class="col-12">

                            <label class="label">Confirm Email Address</label>

                            <input class="form__text_field" type="email" name="confirm" placeholder="Confirm Email">

                        </div>

                        <div class="col-12">

                            <label class="label">Current Password</label>

                            <input class="form__text_field" type="password" name="password" placeholder="Enter Password">

                        </div>

                    </div>

                </div>

                <input class="button button__settings_update" type="submit" value="Update Email">

                </form>

            </div>

        </section>

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__header">
                
                <h1 class="dashboard_section__heading">Change Your Password</h1>
            
            </div>

            <div class="dashboard_section__content">

                <form action="actions.php" accept-charset="UTF-8" method="post">

                <input type="hidden" name="action" value="update_password">

                <input type="hidden" name="uri" value="<?php echo basename($_SERVER['REQUEST_URI']); ?>">

                <div class="profile__wrapper">

                    <div class="row">

                        <div class="col-12">

                            <label class="label">Current Password</label>

                            <input class="form__text_field" type="password" name="password" placeholder="Enter Password">
                        
                        </div>

                        <div class="col-12">

                            <label class="label">New Password</label>

                            <input class="form__text_field" type="password" name="credential[password]" placeholder="Must be longer than 6 characters">

                        </div>

                        <div class="col-12">

                            <label class="label">Confirm New Password</label>

                            <input class="form__text_field" type="password" name="confirm" placeholder="Confirm Password">
                        
                        </div>

                    </div>

                </div>

                <input class="button button__settings_update" type="submit" value="Update Password">

                </form>

            </div>

        </section>

    </div>