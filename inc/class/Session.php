<?php 

    /* Copyright (c) - 2021 by Junyi Xie */	
        
    namespace Philomena;

    /**
     * Philomena Session Class.
     *     
     * @author Junyi Xie
     * @version 1.0.2
     */
    class Session 
    {
        /**
         * This function checks if the session already exists with the given name. If it exists it will return true, if it does not exist returns false.
         *
         * @param string $name The session name, which you want to check if already exists or not. 
         * 
         * @return bool
         */
        public static function checkSession(string $name) 
        {
            return (isset($_SESSION[$name])) ? true : false;
        }
        

        /**
         * Function to assign your given session key a value. The value can be string, integer or an array.
         *
         * @param string $name Name of the session key. This key name holds your desired values inside thhem.
         * @param mixed $value The value you want to assign to the session with your input key name. 
         * 
         * @return mixed
         */
        public static function putSession(string $name, mixed $value) 
        {
            return $_SESSION[$name] = $value;
        }
        

        /**
         * Returns the session with your given key. This function is used to check the value of certain session keys, for example uid.
         *
         * @param string $name The name is the key of the session you wish to return.
         * 
         * @return mixed
         */
        public static function getSession(string $name) 
        {
            return $_SESSION[$name];
        }
        

        /**
         * Deletes a session with your desired session key. Makes use of the unset function to completely remove the session, it is handy to use if you wish to assign a new value to an already existing session key.
         *
         * @param string $name The user id, which is used to execute queries on the current user that is signed up. 
         * 
         * @return void
         */
        public static function unsetSession(string $name) 
        {
            if ( self::checkSession($name) ) {
                unset($_SESSION[$name]);
            }
        }


        /**
         * Function to flash a message that has been stored in a session, can provide your own message and which class it has. Only one of the same name van be displayed at once.
         * 
         * @param string $name This is what the name of the session will be, used to also call the session and display the message.
         * @param string $message Contains the message which needs to be displayed by the session.
         * @param string $class The class, this can determine wether the message is successful or failed.
         * 
         * @return void
         */
        public static function flash(string $name, string $message = '', string $class = 'alert alert-success')
        {
            if ( !empty($name) ) 
            {
                if ( !empty($message) && !self::checkSession($name) ) 
                { 
                    if ( self::checkSession($name) ) 
                    {
                        self::unsetSession(self::getSession($name));
                    }
                            
                    if ( self::checkSession($name . '_class') ) 
                    {
                        self::unsetSession(self::getSession($name . '_class'));
                    }
    
                    self::putSession($name, $message);
                    self::putSession($name . '_class', $class);
                } 
                elseif ( self::checkSession($name) && empty($message) ) 
                {
                    $class = self::checkSession($name . '_class') ? self::getSession($name . '_class') : 'alert alert-failure';
                    echo '<div class="'.$class.'">' . self::getSession($name) . '</div>';
                    self::unsetSession($name);
                    self::unsetSession($name . '_class');
                }
            }
        }
    }
?>