    <div class="appointment" id="appointment">

        <div class="container">

            <div class="row">

                <div class="col-12 col-lg-8 mx-auto">

                    <div class="appointment__wrapper">

                        <div class="appointment__header">
            
                            <h2>Make an Appointment</h2>
                        
                        </div>
    
                        <div class="appointment__inner">

                            <form action="actions.php" accept-charset="UTF-8" method="post">

                            <input type="hidden" name="action" value="make_appointment">

                            <input type="hidden" name="uri" value="dashboard.php?page=reservation">

                            <div class="row">

                                <legend class="legend">Personal Information</legend>

                                <div class="col-6 col-lg-3">

                                    <label class="label">First Name</label>
                                    
                                    <input class="form__text_field disabled" type="text" name="first_name" value="<?= $User->first_name; ?>" placeholder="First name" id="appointment__first_name" disabled="disabled">

                                </div>

                                <div class="col-6 col-lg-3">
                                
                                    <label class="label">Last Name</label>
                                    
                                    <input class="form__text_field disabled" type="text" name="last_name" value="<?= $User->last_name; ?>" placeholder="Last name" id="appointment__last_name" disabled="disabled">

                                </div>

                                <div class="col-12 col-lg-6">

                                    <label class="label">Email</label>
                                    
                                    <input class="form__text_field disabled" type="text" name="email" value="<?= $User->email; ?>" placeholder="Email address" id="appointment__email_address" disabled="disabled">

                                </div>

                                <div class="col-12 col-lg-4">

                                    <label class="label">Phone Number</label>
                                    
                                    <input class="form__text_field disabled" type="text" name="phone" value="<?= $User->phone; ?>" placeholder="Phone number" id="appointment__phone_number" disabled="disabled">

                                </div>

                            </div>

                            <div class="row">

                                <legend class="legend">Billing Address</legend>

                                <div class="col-12 col-lg-4">

                                    <label class="label">Address</label>
                                    
                                    <input class="form__text_field disabled" type="text" name="address" value="<?= $User->address; ?>" placeholder="Address" id="appointment__address" disabled="disabled">

                                </div>

                                <div class="col-12 col-lg-4">

                                    <label class="label">Postal Code</label>
                                    
                                    <input class="form__text_field disabled" type="text" name="zipcode" value="<?= $User->zipcode; ?>" placeholder="Postal Code" id="appointment__zipcode" disabled="disabled">

                                </div>

                                <div class="col-12 col-lg-4 col-md-6">

                                    <label class="label">City</label>
                                    
                                    <input class="form__text_field disabled" type="text" name="city" value="<?= $User->city; ?>" placeholder="City" id="appointment__city" disabled="disabled">

                                </div>

                                <div class="col-12 col-lg-6 col-md-6">

                                    <label class="label">Province</label>
                                    
                                    <input class="form__text_field disabled" type="text" name="province" value="<?= $User->province; ?>" placeholder="Province" id="appointment__province" disabled="disabled">

                                </div>

                                <div class="col-12 col-lg-6">

                                    <label class="label">Country</label>
                                    
                                    <input class="form__text_field disabled" type="text" name="country" value="<?= $User->country; ?>" placeholder="Country" id="appointment__country" disabled="disabled">

                                </div>

                            </div>

                            <div class="row">

                                <legend class="legend">Booking Information</legend>

                                <div class="col-12 col-lg-4">

                                    <label class="label">Treatment</label>

                                    <select class="form__select_menu" name="treatment" id="appointment__treatment" required="required">

                                    <option value selected hidden disabled>Select...</option>

                                    <?php foreach ($Treatment as $k => $v): ?>

                                    <option value="<?= $v->id; ?>"><?= $v->name . ' - &euro;' . number_format((float)$v->price, 2, '.', ','); ?> EUR</option>
                                        
                                    <?php endforeach; ?>

                                    </select>
                                
                                </div>

                                <div class="col-12 col-lg-4">

                                    <label class="label">Preferred Staff (optional)</label>

                                    <select class="form__select_menu" name="staff" id="appointment__staff">

                                    <option hidden>Select...</option>

                                    <?php foreach ($Staff as $k => $v): ?>

                                    <option value="<?= $v->id; ?>"><?= rtrim($v->first_name . ' ' . $v->last_name); ?></option>
                                        
                                    <?php endforeach; ?>

                                    </select>
                                
                                </div>

                                <div class="col-6 col-lg-2">

                                    <label class="label">Date</label>

                                    <input class="form__text_field js-datepicker" type="text" name="date" placeholder="Choose Date" id="appointment__date" required="required">

                                </div>

                                <div class="col-6 col-lg-2">

                                    <label class="label">Time</label>

                                    <select class="form__select_menu" name="time" id="appointment__time" required="required">

                                    <option selected hidden>Select Time...</option>

                                    <?php foreach ($Times as $k => $v): ?>

                                    <option value="<?= $v; ?>"><?= $v; ?></option>

                                    <?php endforeach; ?>

                                    </select>

                                </div>

                                <div class="col-12">

                                    <label class="label">Notes (optional)</label>

                                    <textarea class="form__text_field noresize" name="notes" placeholder="Lorem ipsum..." cols="30" rows="10" id="appointment__notes"></textarea>

                                </div>

                            </div>

                            <input class="button button__appointment_submit" type="submit" value="Confirm Booking">

                            </form>

                        </div>

                    </div>

                </div>
            
            </div>
    
        </div>

    </div>