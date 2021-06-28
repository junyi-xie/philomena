    <h1 class="dashboard_page__heading">Customers</h1>

    <div class="dashboard_page__account">

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__header">
                            
                <h1 class="dashboard_section__heading">List of Customers</h1>

            </div>

            <div class="list__table">

                <div class="list__container">

                    <div class="list_item list_item--heading">

                        <div class="list_item__cell">#</div>

                        <div class="list_item__cell">Name</div>
                        
                        <div class="list_item__cell">Email</div>
                        
                        <div class="list_item__cell">Phone</div>
                        
                        <div class="list_item__cell">Address</div>

                        <div class="list_item__cell">Postal Code</div>

                        <div class="list_item__cell">City</div>

                        <div class="list_item__cell">Province</div>
                        
                        <div class="list_item__cell">Country</div>
                        
                    </div>

                    <?php foreach ($Customers as $k => $v): ?>

                    <div class="list_item">

                        <div class="list_item__cell"><?= $v->id; ?></div>

                        <div class="list_item__cell"><?= rtrim($v->first_name . ' ' . $v->last_name); ?></div>
                        
                        <div class="list_item__cell"><?= (!empty($v->email)) ? $v->email : '-'; ?></div>
                        
                        <div class="list_item__cell"><?= (!empty($v->phone)) ? $v->phone : '-'; ?></div>

                        <div class="list_item__cell"><?= (!empty($v->address)) ? $v->address : '-'; ?></div>

                        <div class="list_item__cell"><?= (!empty($v->zipcode)) ? $v->zipcode : '-'; ?></div>

                        <div class="list_item__cell"><?= (!empty($v->city)) ? $v->city : '-'; ?></div>

                        <div class="list_item__cell"><?= (!empty($v->province)) ? $v->province : '-'; ?></div>

                        <div class="list_item__cell"><?= (!empty($v->country)) ? $v->country : '-'; ?></div>

                    </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    </div>