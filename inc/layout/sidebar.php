<div class="dashboard__container">

    <div class="dashboard__sidebar">

        <div class="dashboard__sidebar_inner">

            <div class="dashboard__sidebar_heading">

                <span class="dashboard__sidebar_logo">Philomena</span>

            </div>

            <nav class="dashboard__sidebar_nav">

                <ul class="dashboard__sidebar_menu">

                    <li class="dashboard__sidebar_menu__item<?php if (!isset($_GET['page'])): ?> active<?php endif; ?>">

                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>

                    </li>

                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'branches'): ?> active<?php endif; ?>">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=branches"><i class="fas fa-map-marked-alt"></i><span>Branches</span></a>
                    
                    </li>

                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'coupons'): ?> active<?php endif; ?>">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=coupons"><i class="fas fa-ticket-alt"></i><span>Coupons</span></a>
                    
                    </li>

                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'stores'): ?> active<?php endif; ?>">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=stores"><i class="fas fa-store"></i><span>Stores</span></a>
                    
                    </li>

                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'customers'): ?> active<?php endif; ?>">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=customers"><i class="fas fa-users"></i><span>Customers</span></a>
                    
                    </li>

                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'payouts'): ?> active<?php endif; ?>">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=payouts"><i class="fas fa-money-check"></i><span>Payouts</span></a>
                    
                    </li>   
                    
                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'profile'): ?> active<?php endif; ?>">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=profile"><i class="fas fa-user-alt"></i><span>Profile</span></a>
                    
                    </li>  

                    <li class="dashboard__sidebar_menu__item">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?signout=true"><i class="fas fa-sign-out-alt"></i><span>Sign Out</span></a>
                    
                    </li>

                </ul>

                <ul class="dashboard__sidebar_submenu">

                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'settings'): ?> active<?php endif; ?>">
                        
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=settings"><i class="fas fa-cog"></i><span>Settings</span></a>
                    
                    </li>

                </ul>

            </nav>

        </div>

    </div>