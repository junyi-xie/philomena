    <h1 class="dashboard_page__heading">Employees</h1>

    <div class="dashboard_page__account">

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__header">
                            
                <h1 class="dashboard_section__heading">List of Staff Members</h1>

            </div>

            <div class="list__table">

                <div class="list__container">

                    <div class="list_item list_item--heading">

                        <div class="list_item__cell">#</div>

                        <div class="list_item__cell">Name</div>

                        <div class="list_item__cell">Role</div>
                        
                        <div class="list_item__cell">Email</div>
                        
                        <div class="list_item__cell">Phone</div>
                        
                        <div class="list_item__cell">Joined</div>
                        
                        <div class="list_item__cell">Last Seen</div>
                        
                    </div>

                    <?php foreach ($Employees as $k => $v): ?>

                    <div class="list_item">

                        <div class="list_item__cell"><?= $v->id; ?></div>

                        <div class="list_item__cell"><?= rtrim($v->first_name . ' ' . $v->last_name); ?></div>

                        <div class="list_item__cell"><?= $Users->getRole($v->role_id); ?></div>
                        
                        <div class="list_item__cell"><?= (!empty($v->email)) ? $v->email : '-'; ?></div>
                        
                        <div class="list_item__cell"><?= (!empty($v->phone)) ? $v->phone : '-'; ?></div>
                        
                        <div class="list_item__cell"><?= (!empty($v->account_created)) ? date("M j, Y", strtotime($v->account_created)) : '-'; ?></div>

                        <div class="list_item__cell"><?= (!empty($v->last_login)) ? date("M j, Y", strtotime($v->last_login)) : '-'; ?></div>

                    </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    </div>