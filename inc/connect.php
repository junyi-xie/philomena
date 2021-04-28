<?php
    /* Copyright (c) - 2021 by Junyi Xie */	

    use Philomena\Database; 


    if (session_status() == PHP_SESSION_NONE )
    {
        session_start();
    }


    $pathInfo = pathinfo($_SERVER['PHP_SELF']); 

    /* Base URL */
    define('BASEURL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$pathInfo['dirname'].'/');

    /* Current URL */
    define('CURRENTURL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


    if (!file_exists(__DIR__.DIRECTORY_SEPARATOR.'autoloader.php')) {
        exit('<h1>Could not include autoloader.php... The file is missing...</h1><p>Click <a href="https://github.com/junyi-xie/philomena/blob/main/inc/autoloader.php" target="_blank">here</a> to get the file...</p>');
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