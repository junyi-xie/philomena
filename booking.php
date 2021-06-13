<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Appointments;
    use Philomena\Users;
    use Philomena\Session;
    use Philomena\Cookie;
    use Philomena\Redirect;

    
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


    // NOTE: IN PROGRESS.
    // PROTO VVVVVVVVVVV. to be changed.
    if ( isset($_POST) && !empty($_POST) ) {

        $uid = $Users->getUser();
        $staff = $Appointments->getStaff();
        $treatment = $_POST['treatment'];
        $date = str_replace('-', '', $_POST['date']);
        $time = str_replace(':', '', $_POST['time']);
        $note = $_POST['note'];


        if ( $Appointments->makeAppointment($uid, $staff, $treatment, $date, $time, $note) > 0 ) {
            echo 'successflly booked! head over to the dashboard <a href="dashboard.php">here</a> to check your appointment.';
        }
    }


    // PROTO VVVVVVVVVV
    if ( !$Users->isLoggedIn() ) {

        echo '<h1>you are not logged in, click <a href="login.php?uri=booking.php">here</a> to login.</h1>';
        die();
    }

    include_once INC . '/header.php';

    include_once INC . '/layout/reservation.php';

    include_once INC . '/footer.php';
?>