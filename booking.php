<?php 
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Users;
    use Philomena\Cookie;
    use Philomena\Session;
    use Philomena\Redirect;

    
    require_once 'config.php';

    $Users = new Users();

    if ( !empty(Session::checkSession('uid')) ) 
    {
        $Users->setUser(Session::getSession('uid'));
    } 
    else if ( !empty(Cookie::checkCookie('uid')) ) 
    {
        $Users->setUser(Cookie::getCookie('uid'));
    }


    if ( !$Users->isLoggedIn() ) 
    {
        Session::flash('signin', 'Please sign in to make an appointment.', 'alert alert-failure');
        Redirect::To('login.php');
    } 
    
    $User = $Database->Select("SELECT * FROM users WHERE 1 AND id = :uid LIMIT 1", ['uid' => $Users->getUser()], \PDO::FETCH_OBJ, false, true);
    $Treatment = $Database->Select("SELECT * FROM treatments WHERE 1 AND status = 1");
    $Staff = $Database->Select("SELECT * FROM users WHERE 1 AND role_id = 3 OR role_id = 4");
    $Times = ['10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM', '12:00 PM', '12:30 PM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM', '3:00 PM', '3:30 PM', '4:00 PM', '4:30 PM', '5:00 PM', '5:30 PM', '6:00 PM'];


    include_once INC . '/header.php';

    include_once INC . '/' . LAYOUT . '/appointment.php';
    
    include_once INC . '/footer.php';   
?>