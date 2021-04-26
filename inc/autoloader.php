<?php 
    /* Copyright (c) - 2021 by Junyi Xie */	

    use Philomena\Database;
    use Philomena\Users;
    use Philomena\Appointments;


    spl_autoload_register(function ($class) {
        $prefix = 'Philomena\\';
    
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) return;
    
        $className = substr($class, $len);

        $baseDir = __DIR__ . '/class/';
        $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';    
        
        if (file_exists($file)) {
            require $file;
        }
    });

    $Database = new Database('127.0.0.1', 'root', '', 'philomena');
?>