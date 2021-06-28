    <h1 class="dashboard_page__heading">
    
        <span class="dashboard_section__title">Appointments</span>
        
        <?php if ($Profile->role_id == 2): ?>
        
        <a class="dashboard_section__edit" href="booking.php">Make Booking</a>
        
        <?php endif; ?>

    </h1>

    <?php if ($Profile->role_id != 2): ?>

    <div class="dashboard_page__account">

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__header">
                            
                <h1 class="dashboard_section__heading">All Reservations</h1>

            </div>

            <div class="list__table">

                <div class="list__container">

                    <div class="list_item list_item--heading">

                        <div class="list_item__cell">#</div>

                        <div class="list_item__cell">Customer Name</div>
                        
                        <div class="list_item__cell">Staff</div>
                        
                        <div class="list_item__cell">Date</div>
                        
                        <div class="list_item__cell">Time</div>

                        <div class="list_item__cell">Notes</div>

                        <div class="list_item__cell">Status</div>
                        
                        <div class="list_item__cell"></div>

                    </div>

                    <?php foreach ($Appointments as $k => $v): ?>

                    <div class="list_item" appointment-id="<?= $v->appointment_id; ?>">

                        <div class="list_item__cell"><?= $v->appointment_id; ?></div>

                        <div class="list_item__cell"><?= rtrim($v->first_name . ' ' . $v->last_name); ?></div>

                        <div class="list_item__cell"><?= (isset($v->staff_id)) ? $v->staff_id : 'Unknown'; ?></div>

                        <div class="list_item__cell"><?= (isset($v->reservation_date)) ? date("M j, Y", strtotime($v->reservation_date)) : '-'; ?></div>

                        <div class="list_item__cell"><?= (isset($v->reservation_time)) ? date("g:i A", strtotime($v->reservation_time)) : '-'; ?></div>
                                                
                        <div class="list_item__cell"><?= (isset($v->notes)) ? $v->notes : '-'; ?></div>

                        <div class="list_item__cell"><?= (isset($v->appointment_status)) && ($v->appointment_status == 1) ? 'Completed' : 'Pending'; ?></div>
                        
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
        
    <?php else: ?>

    <div class="dashboard_page__account">

        <section class="dashboard_section__wrapper">

            <div class="dashboard_section__header">
                            
                <h1 class="dashboard_section__heading">My Reservations</h1>

            </div>

            <div class="list__table">

                <div class="list__container">

                    <div class="list_item list_item--heading">

                        <div class="list_item__cell">#</div>

                        <div class="list_item__cell">Staff</div>
                        
                        <div class="list_item__cell">Date</div>
                        
                        <div class="list_item__cell">Time</div>

                        <div class="list_item__cell">Notes</div>

                        <div class="list_item__cell">Status</div>
                        
                        <div class="list_item__cell"></div>

                    </div>

                    <?php foreach ($Reservations as $k => $v): ?>

                    <div class="list_item">

                        <div class="list_item__cell"><?= $v->id; ?></div>

                        <div class="list_item__cell"><?= (isset($v->staff_id)) ? $v->staff_id : 'Unknown'; ?></div>

                        <div class="list_item__cell"><?= (isset($v->reservation_date)) ? date("M j, Y", strtotime($v->reservation_date)) : '-'; ?></div>

                        <div class="list_item__cell"><?= (isset($v->reservation_time)) ? date("g:i A", strtotime($v->reservation_time)) : '-'; ?></div>
                                                
                        <div class="list_item__cell"><?= (isset($v->notes)) ? $v->notes : '-'; ?></div>

                        <div class="list_item__cell"><?= (isset($v->status)) && ($v->status == 1) || strtotime($v->reservation_date . $v->reservation_time) > strtotime('now') ? 'Completed' : 'Pending'; ?></div>
                        
                        <div class="list_item__cell">

                            <!-- TODO. AJAX REQUEST -->
                            <span class="list_item__cell--delete"><i class="fas fa-trash"></i></span>
                        
                        </div>

                    </div>

                    <?php endforeach; ?>

                </div>

            </div>

        </section>

    </div>

    <?php endif; ?>