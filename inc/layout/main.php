    <div class="dashboard__content">

        <header class="dashboard__header">

            <div class="dashboard__actionbar">

                <div class="dashboard__actionbar_inner">

                    <div class="dashboard__actionbar_profile">
                        
                        <span class="dashboard__actionbar_name"><a class="dashboard__actionbar_icon" href="dashboard.php?page=profile"><i class="fas fa-user-alt"></i></a><?= rtrim($Profile->first_name . ' ' . $Profile->last_name); ?></span>

                    </div>

                </div>

            </div>

        </header>

        <section class="dashboard__overview">

            <div class="dashboard__overview_inner">

            <?php Philomena\Session::flash('dashboard'); ?>