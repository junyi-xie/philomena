<?php
    /* Copyright (c) - 2021 by Junyi Xie */	

    use Philomena\Database; 


    if (session_status() == PHP_SESSION_NONE )
    {
        session_start();
    }

    /* Directory */
    define('DIR', $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI']);


    if (!file_exists(DIR.'inc/autoloader.php')) {
        exit('<h1>Could not connect to the database... Autoloader file is missing...</h1>');
    } else {
        include_once("autoloader.php");
    }


    /* Hostname */
    define('HOSTNAME', '127.0.0.1');

    /* Username */
    define('USERNAME', 'root');

    /* Password */
    define('PASSWORD', '');

    /* Database */
    define('DBNAME', 'philomena');

    $Database = new Database(HOSTNAME, USERNAME, PASSWORD, DBNAME);
?>