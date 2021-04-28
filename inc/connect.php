<?php
    /* Copyright (c) - 2021 by Junyi Xie */	

    use Philomena\Database; 


    if (session_status() == PHP_SESSION_NONE )
    {
        session_start();
    }


    if ( !file_exists(PATH . INC . '/autoloader.php') ) {
        exit('<h1>Could not include autoloader.php... The file is missing...</h1><p>Click <a href="https://github.com/junyi-xie/philomena/blob/main/inc/autoloader.php" target="_blank">here</a> to get the file...</p>');
    } else {
        require_once 'autoloader.php';
    }


	$hostname = defined('HOSTNAME') ? HOSTNAME : '';
    $username = defined('USERNAME') ? USERNAME : '';
	$password = defined('PASSWORD') ? PASSWORD : '';
	$dbname = defined('DBNAME') ? DBNAME : '';


    $Database = new Database($hostname, $username, $password, $dbname);
?>