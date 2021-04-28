<?php
    /* Copyright (c) - 2021 by Junyi Xie */

    include_once("../inc/connect.php");
    include_once('../inc/functions.php');

    if(isset($_POST['action']) && !empty($_POST['action'])) {

        $date = date("YmdHis");
        $action = $_POST['action'];

        switch($action) {
            case '':
            break;
        }
    }    

    header("Location: ". (isset($_POST['retour']) ? $_POST['retour'] : BASEURL));
    exit;
?>