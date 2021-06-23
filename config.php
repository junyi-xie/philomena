<?php
    /* Copyright (c) - 2021 by Junyi Xie */


    /* If the session is inactive, start a new session. */
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }


    /* Display All Errors */
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    error_reporting(E_ALL);


    /* Set Default Timezone */
    date_default_timezone_set('Europe/Amsterdam');

    /* Hostname */
    define('HOSTNAME', '127.0.0.1');

    /* Username */
    define('USERNAME', 'root');

    /* Password */
    define('PASSWORD', '');

    /* Database */
    define('DBNAME', 'philomena');


    /* Include Folder */
    define('INC', 'inc');

    /* Layout Folder */
    define('LAYOUT', 'layout');

    /* Absolute Base Path */
    if ( !defined('PATH') ) {
        define('PATH', __DIR__ . DIRECTORY_SEPARATOR);
    }


    /* Load default files for the system to function normally */
    require PATH . INC . '/connect.php';
    require PATH . INC . '/functions.php';
?>