<?php

    /* Copyright (c) - 2021 by Junyi Xie */	
            
    namespace Philomena;

    /**
     * Philomena Redirect Class.
     *     
     * @author Junyi Xie
     * @version 1.0.0
     */
    class Redirect 
    {
        /**
         * This function redirects the user to the appropirate page after inputting desired page. If the page doesn't exist, then include the 404 not found page.
         * 
         * @param mixed $location The page you wish to redirect to.
         * 
         * @return void
         */
        public static function To(mixed $location = null) 
        {
            if ( null !== $location ) {

                if ( file_exists(PATH . DIRECTORY_SEPARATOR . strtok($location, '?')) ) 
                {
                    header('Location: ' . $location);
                    exit();
                } 
                else 
                {
                    header('HTTP/1.0 404 Not Found');
                    include('404.php');
                    exit();
                }
            }
        }
    }
?>