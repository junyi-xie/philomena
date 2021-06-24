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

                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'booking'): ?> active<?php endif; ?>">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=booking"><i class="fas fa-calendar-plus"></i><span>Appointments</span></a>
                    
                    </li>

                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'customers'): ?> active<?php endif; ?>">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=customers"><i class="far fa-address-card"></i><span>Customers</span></a>
                    
                    </li>

                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'employees'): ?> active<?php endif; ?>">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=employees"><i class="fas fa-users-cog"></i><span>Employees</span></a>
                    
                    </li>

                    <li class="dashboard__sidebar_menu__item<?php if (isset($_GET['page']) && $_GET['page'] == 'treatments'): ?> active<?php endif; ?>">
                    
                        <a class="dashboard__sidebar_menu__item_link" href="dashboard.php?page=treatment"><i class="fas fa-briefcase-medical"></i><span>Treatments</span></a>
                    
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