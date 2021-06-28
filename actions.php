<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;
    use Philomena\Appointments;
    use Philomena\Redirect;
    use Philomena\Session;
    use Philomena\Cookie;

    
    require_once 'config.php';

    $Users = new Users();
    $Appointments = new Appointments();

    if ( !empty(Session::checkSession('uid')) ) 
    {
        $Users->setUser(Session::getSession('uid'));
    } 
    else if ( !empty(Cookie::checkCookie('uid')) ) 
    {
        $Users->setUser(Cookie::getCookie('uid'));
    }
    

    if ( isset($_POST['action']) && !empty($_POST['action']) ) {

        $date = date("YmdHis");
        $action = $_POST['action'];

        switch($action) {
            case 'update_password':
                ($Users->updateCredentials($_POST['credential'], $_POST['password'], true)) ? Session::flash('settings', 'Successfully updated your Password.') : Session::flash('settings', 'Something went wrong... Could not update your Password.', 'alert alert-failure');
            break;
            case 'update_information':
                ($Users->updateCredentials($_POST['user'])) ? Session::flash('settings', 'Successfully updated your Information.') : Session::flash('settings', 'Something went wrong... Could not update your Information.', 'alert alert-failure');
            break;
            case 'update_email':
                ($Users->updateCredentials($_POST['credential'], $_POST['password'], true)) ? Session::flash('settings', 'Successfully updated your Email.') : Session::flash('settings', 'Something went wrong... Could not update your Email.', 'alert alert-failure');
            break;
            case 'make_appointment':
                ($Appointments->makeAppointment($Users->getUser(), (isset($_POST['staff'])) ? $_POST['staff'] : null, $_POST['treatment'], $_POST['date'], $_POST['time'], $_POST['notes'])) ? Session::flash('appointments', 'Successfully made an appointment.', 'alert alert-success') : Session::flash('appointments', 'Something went wrong... Could not make an appointment.', 'alert alert-failure');
            break;
        }

        Redirect::To($_POST['uri']);
    }    
?>