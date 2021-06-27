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


    // User information.
    $Profile = $Database->Select("SELECT * FROM users WHERE id = :uid LIMIT 1", ['uid' => $Users->getUser()], \PDO::FETCH_OBJ, false, true);
    $Roles = $Database->Select("SELECT * FROM roles");
    
    
    if ( empty($Profile->phone) || empty($Profile->address) || empty($Profile->zipcode) || empty($Profile->city) || empty($Profile->province) || empty($Profile->country) ) 
    {
        Session::flash('dashboard', 'Your account is missing some of your personal information. Click <a href="dashboard.php?page=settings">here</a> to head over to the settings page to fix this.', 'alert alert-failure');
    }
    

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