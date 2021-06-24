    <h1 class="dashboard_page__heading">
                    
        <span class="dashboard_section__title">Kouhie&apos;s Profile</span>

        <a class="dashboard_section__edit" href="dashboard.php?page=settings">Edit Profile</a>

    </h1>

    <div class="dashboard_page__account">

        <section class="profile__account_view">

            <div class="dashboard_section__content border-top-left-right">

                <div class="profile__user_container">
                
                    <div class="profile__user_avatar">
                
                        <?php echo (!empty($aAccounts['link']) && !is_null($aAccounts['link']) ? '<img class="profile__user_thumbnail" src="'.$aAccounts['link'].'"></img>' : '<div class="profile__user_thumbnail"><div class="profile__user_no_photo"><i class="fas fa-camera"></i><span>No Picture</span></div></div>'); ?>

                    </div>

                    <div class="profile__user_general">
                    
                        <div class="profile__user_fullname">
                        
                            <label>Full Name</label>
                            
                            <span><?= (!empty($aAccounts['fullname']) ? $aAccounts['fullname'] : 'The Fool'); ?> | <?= (isset($aAccounts['admin']) && $aAccounts['admin'] === 1 ? '(Admin)' : '(Guest)'); ?></span>
                        
                        </div>

                        <div class="profile__user_email">

                            <label>Email Address</label>
                        
                            <span><?= (!empty($aAccounts['email']) ? $aAccounts['email'] : '-'); ?></span>

                        </div>

                        <div class="profile__user_phone">

                            <label>Phone Number</label>

                            <span><?= (!empty($aAccounts['phone']) ? $aAccounts['phone'] : '-'); ?></span>

                        </div>

                        <div class="profile__user_joined">

                            <label>Date Joined</label>

                            <span><?= (isset($aAccounts['account_created']) ? date("M j, Y", strtotime($aAccounts['account_created'])) : '-'); ?></span>

                        </div>

                    </div>

                </div>
            
            </div>

        </section>

    </div>