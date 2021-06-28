    <h1 class="dashboard_page__heading">Treatment</h1>

    <div class="dashboard_page__account">

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__header">
                            
                <h1 class="dashboard_section__heading">List of All Services</h1>

            </div>

            <div class="list__table">

                <div class="list__container">

                    <div class="list_item list_item--heading">

                        <div class="list_item__cell">#</div>

                        <div class="list_item__cell">Name</div>
                        
                        <div class="list_item__cell">Type</div>
                        
                        <div class="list_item__cell">Duration</div>
                        
                        <div class="list_item__cell">Price</div>
                        
                        <div class="list_item__cell">Status</div>
                        
                        <div class="list_item__cell"></div>

                    </div>

                    <?php foreach ($Treatments as $k => $v): ?>

                    <div class="list_item" treatment-id="<?= $v->id; ?>">

                        <div class="list_item__cell"><?= $v->id; ?></div>

                        <div class="list_item__cell"><?= $v->name; ?></div>
                        
                        <div class="list_item__cell"><?= (isset($v->type_id)) && ($v->type_id === 1) ? 'Nails' : 'Hair'; ?></div>
                        
                        <div class="list_item__cell"><?= (isset($v->duration)) ? date("G:i", strtotime($v->duration)) : '-'; ?></div>
                        
                        <div class="list_item__cell"><?= (isset($v->price)) ? '&euro;' . number_format((float)$v->price, 2, '.', ',') : '-'; ?></div>
                        
                        <div class="list_item__cell"><?= (isset($v->status)) && ($v->status === 1) ? 'Active' : 'Inactive'; ?></div>
                        
                        <div class="list_item__cell">

                            <!-- TODO. AJAX REQUEST -->
                            <span class="list_item__cell--edit"><i class="fas fa-edit"></i></span>

                            <span class="list_item__cell--delete"><i class="fas fa-trash"></i></span>
                        
                        </div>

                    </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    </div>