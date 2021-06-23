<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    use Philomena\Redirect;

    include_once("../config.php");

    if ( isset($_POST['action']) && !empty($_POST['action']) ) {

        $date = date("YmdHis");
        $action = $_POST['action'];

        switch($action) {
            case 'information':
                $a = $Users->updateCredentials($_POST['credentials']);
                var_dump($a);
            break;
        }
    }    

    Redirect::To($_POST['uri']);
?>