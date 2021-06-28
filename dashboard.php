<?php 
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Appointments;
    use Philomena\Users;
    use Philomena\Redirect;
    use Philomena\Session;
    use Philomena\Cookie;


    require_once 'config.php';

    $Appointments = new Appointments();
    $Users  = new Users();


    if ( isset($_GET['signout']) && $_GET['signout'] == true )
    {
        $Users->Logout();
        Redirect::To('index.php');
    }

    
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
        Redirect::To('login.php');
    }


    $Profile = $Database->Select("SELECT * FROM users WHERE 1 AND id = :uid LIMIT 1", ['uid' => $Users->getUser()], \PDO::FETCH_OBJ, false, true);
    $Location = $Database->Select("SELECT * FROM branches", [], \PDO::FETCH_OBJ, false, true);
    $Treatments = $Database->Select("SELECT * FROM treatments");
    $Employees = $Database->Select("SELECT * FROM users WHERE 1 AND role_id != 2");
    $Booking = $Database->Select("SELECT *, a.id AS appointment_id, a.status AS appointment_status FROM appointments AS a INNER JOIN users AS u ON a.user_id = u.id INNER JOIN treatments AS t ON a.treatment_id = t.id ORDER BY appointment_id ASC");
    $Customers = $Database->Select("SELECT * FROM users WHERE 1 AND role_id = 2");
    $Openinghours = $Database->Select("SELECT * FROM openinghours WHERE 1 AND branch_id = :id", [':id' => $Location->id]);
    $Reservations = $Database->Select("SELECT * FROM appointments WHERE 1 AND user_id = :uid", ['uid' => $Users->getUser()]);


    include_once INC . '/header.php';

    include_once INC . '/' . LAYOUT . '/sidebar.php';

    include_once INC . '/' . LAYOUT . '/main.php';

    if ( isset($_GET['page']) && !empty($_GET['page']) )
    {
        if ( !file_exists(PATH . INC . DIRECTORY_SEPARATOR . LAYOUT . DIRECTORY_SEPARATOR . $_GET['page'] . '.php') ) 
        {
            Redirect::To('404.html');
        } 
        else 
        {
            include_once INC . '/' . LAYOUT . '/' . $_GET['page'] . '.php';
        }
    } 
    else 
    {
        include_once INC . '/' . LAYOUT . '/admin.php';
    }

    include_once INC . '/' . LAYOUT . '/end.php';

    include_once INC . '/footer.php';
?>