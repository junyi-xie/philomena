    <h1 class="dashboard_page__heading">Branches</h1>

    <div class="dashboard_page__account">

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__header">
                            
                <h1 class="dashboard_section__heading">Headquarter</h1>

            </div>

            <div class="list__table">

                <div class="list__container">

                    <div class="list_item list_item--heading">

                        <div class="list_item__cell">Store Name</div>
                        
                        <div class="list_item__cell">Email</div>
                        
                        <div class="list_item__cell">Phone Number</div>
                        
                        <div class="list_item__cell">Zipcode</div>
                        
                        <div class="list_item__cell">Address</div>
                        
                        <div class="list_item__cell">City</div>
                        
                        <div class="list_item__cell">Country</div>

                        <div class="list_item__cell"></div>

                    </div>

                    <div class="list_item" branches-id="<?= $Location->id; ?>">

                        <div class="list_item__cell"><?= $Location->store_name; ?></div>
                        
                        <div class="list_item__cell"><?= $Location->email; ?></div>
                        
                        <div class="list_item__cell"><?= $Location->phone; ?></div>
                        
                        <div class="list_item__cell"><?= $Location->zipcode; ?></div>
                        
                        <div class="list_item__cell"><?= $Location->address; ?></div>
                        
                        <div class="list_item__cell"><?= $Location->city; ?></div>
                        
                        <div class="list_item__cell"><?= $Location->country; ?></div>

                        <div class="list_item__cell"><span class="list_item__cell--main"><i class="fas fa-star" title="Main Branch"></i></span></div>

                    </div>

                </div>

            </div>

        </section>

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__header">
                            
                <h1 class="dashboard_section__heading">Openinghours</h1>

            </div>

            <div class="list__table">

                <div class="list__container">

                    <div class="list_item list_item--heading">

                        <div class="list_item__cell">#</div>

                        <div class="list_item__cell">Day</div>
                        
                        <div class="list_item__cell">Open</div>
                        
                        <div class="list_item__cell">Closed</div>
                        
                        <div class="list_item__cell"></div>

                    </div>

                    <?php foreach ($Openinghours as $k => $v): ?>

                    <div class="list_item" openinghour-id="<?= $v->id; ?>">

                        <div class="list_item__cell"><?= $v->id; ?></div>

                        <div class="list_item__cell"><?= $v->day; ?></div>
                        
                        <div class="list_item__cell"><?= (isset($v->open)) && ($v->open !== 0) ? date("g:i A", strtotime($v->open)) : 'Closed'; ?></div>
                        
                        <div class="list_item__cell"><?= (isset($v->closed)) && ($v->closed !== 0) ? date("g:i A", strtotime($v->closed)) : 'Closed'; ?></div>

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