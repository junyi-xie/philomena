<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Appointments;
    use Philomena\Users;
    use Philomena\Session;
    use Philomena\Cookie;

    
    require_once 'config.php';

    include_once INC . '/header.php';

   echo
        '
        <div class="site__content_container">

            <div class="site__main">

                <div class="site__wrapper">

                    <a href="login.php">Login here</a>    
                    <a href="signup.php">Sign up here</a>    
                
                    <br/>
                    <br/>
                    <br/>
';?>

    <?php 
        $Appointments = new Appointments();
        $Users = new Users();

    if ( !empty(Session::checkSession('uid')) ) 
    {
        $Users->setUser(Session::getSession('uid'));
    } 
    else if ( !empty(Cookie::checkCookie('uid')) ) 
    {
        $Users->setUser(Cookie::getCookie('uid'));
    }


    if ( !$Users->isLoggedIn() ) {

        echo '<h1>you are not logged in, please login first.</h1>';

    } else {

        echo 'welcome, lets make an appointment';

        echo '
        <form action="index.php" method="post">
        <select name="treatment">
        ';
        $Treatments = $Appointments->selectAllAvailableTreatments();
        foreach($Treatments as $k => $v) {
            echo '<option value="'. $v->id .'">'. $v->name.'</option>';

        }
        echo '</select>
        <input type="text" name="date" placeholder="select date" id="datepicker">
        <input type="time" name="time" placeholder="time" id="">
        <textarea name="note" id="" cols="30" rows="10" placeholder="put something here"></textarea>

        <input type="submit" value="book">
    
        </form>';
    }
        // $a = $Appointments->checkDateTimeValid('sunday');

        // var_dump($a);
        printr($_POST);

        $uid = $Users->getUser();
        $staff = null;
        $treatment = $_POST['treatment'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $note = $_POST['note'];
        /*
        test
        $Appointments->makeAppointment(
            $uid,
            $staff,
            $treatment,
            $date,
            $time,
            $note,
        );
        */
    ?>


<?php echo '
                    
                </div>
            
            </div>

        </div>
        '
    ;

    include_once INC . '/footer.php'; 
?>