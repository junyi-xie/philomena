<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Redirect;
    use Philomena\Session;

    include_once("../config.php");

    if ( isset($_POST['action']) && !empty($_POST['action']) ) {

        $date = date("YmdHis");
        $action = $_POST['action'];

        switch($action) {
            case 'update_user_info':
                ($Users->updateCredentials($_POST['user'])) ? Session::flash('settings', 'Successfully updated your account information.') : Session::flash('settings', 'Could not update your account information.', 'alert alert-failure');
            break;
            case 'update_email_address':
                ($Users->updateCredentials($_POST['password'])) ? Session::flash('settings', 'Successfully updated your Email.') : Session::flash('settings', 'Something went wrong...', 'alert alert-failure');
            break;
            case 'update_password':
                ($Users->updateCredentials($_POST['email'])) ? Session::flash('settings', 'Successfully updated your Password.') : Session::flash('settings', 'Something went wrong...', 'alert alert-failure');
            break;
        }
    }    

    Redirect::To($_POST['uri']);
?>