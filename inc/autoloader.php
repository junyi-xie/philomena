<?php 
    /* Copyright (c) - 2021 by Junyi Xie */	

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
?>