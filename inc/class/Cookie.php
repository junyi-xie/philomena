<?php 

    /* Copyright (c) - 2021 by Junyi Xie */	
        
    namespace Philomena;

    /**
     * Philomena Cookie Class.
     *     
     * @author Junyi Xie
     * @version 1.0.1
     */
    Class Cookie 
    {
        /**
         * Function to check if your assigned cookie name exists or not. If the cookie exists it will return true. If the cookie does not exist, returns false.
         * 
         * @param string $name The cookie name you wish to get check whether it exists or not.
         * 
         * @return bool
         */
        public static function checkCookie(string $name) 
        {
            return (isset($_COOKIE[$name])) ? true : false;
        }
    
    
        /**
         * Function to return the cookie with the given name, this can only be a string value that gets returned.
         * 
         * @param string $name The key name of the cookie that you wish to get.
         * 
         * @return string
         */
        public static function getCookie(string $name) 
        {
            return $_COOKIE[$name];
        }
    
    
        /**
         * Creates a cookie with the given name and puts the value inside it. Additionally there is an expiration date set on it, in seconds.
         * 
         * @param string $name The name of the cookie, it can be used to return the cookie or delete the cookie with the assigned name.
         * @param string $value The values that are bound to your cookie, this can only be a string.
         * @param int $expiry The time in seconds which you want the cookie to expire in.
         * 
         * @return bool
         */
        public static function putCookie(string $name, string $value, int $expiry) 
        {
            if ( setcookie($name, $value, time() + $expiry, '/') ) {
                return true;
            }
    
            return false;
        }

    
        /**
         * This function just removes the cookie by putthing the current time -1, this make it so the cookie is removed.
         * 
         * @param string $name The cookie name, which has values inside of it.
         * 
         * @return void
         */
        public static function unsetCookie(string $name) 
        {
            self::putCookie($name, '', time() -1);
        }
    }
?>