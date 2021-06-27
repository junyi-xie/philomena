    <h1 class="dashboard_page__heading">
                    
        <span class="dashboard_section__title"><?= rtrim($Profile->first_name . ' ' . $Profile->last_name); ?>&apos;s Profile</span>

        <a class="dashboard_section__edit" href="dashboard.php?page=settings">Edit Profile</a>

    </h1>

    <div class="dashboard_page__account">

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__content" style="border-top-left-radius: 2px; border-top-right-radius: 2px;">

                <div class="row">

                    <div class="col-12 col-lg-3">
                
                        <div class="profile__user_thumbnail">
                            
                            <div class="profile__user_no_photo">
                                
                                <i class="fas fa-camera"></i><span>No Picture</span>
                        
                            </div>
                    
                        </div>

                    </div>

                    <div class="col-12 col-lg-3">

                        <div class="profile__user_column">

                            <label class="label">Full Name</label>
                            
                            <span><?= rtrim($Profile->first_name . ' ' . $Profile->last_name); ?></span>

                        </div>

                        <div class="profile__user_column">

                            <label class="label">Email Address</label>

                            <span><?= $Profile->email; ?></span>

                        </div>

                        <div class="profile__user_column">

                            <label class="label">Phone Number</label>

                            <span><?= (!empty($Profile->phone)) ? $Profile->phone : '-'; ?></span>

                        </div>

                        <div class="profile__user_column">

                            <label class="label">Date Joined</label>

                            <span><?= date("M j, Y", strtotime($Profile->account_created)); ?></span>

                        </div>

                    </div>

                    <div class="col-12 col-lg-3">

                        <div class="profile__user_column">

                            <label class="label">Role</label>

                            <span><?= getRole($Profile->role_id, $Roles); ?></span>

                        </div>

                        <div class="profile__user_column">

                            <label class="label">Address</label>
                            
                            <span><?= (!empty($Profile->address)) ? $Profile->address : '-'; ?></span>

                        </div>

                        <div class="profile__user_column">

                            <label class="label">City</label>

                            <span><?= (!empty($Profile->city)) ? $Profile->city : '-';  ?></span>

                        </div>

                        <div class="profile__user_column">

                            <label class="label">Country</label>

                            <span><?= (!empty($Profile->country)) ?$Profile->country : '-'; ?></span>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>