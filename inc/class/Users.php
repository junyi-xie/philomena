<?php
    /* Copyright (c) - 2021 by Junyi Xie */	
    
    namespace Philomena;

    /**
     * Philomena Users Class.
     *     
     * @author Junyi Xie
     * @version 1.0.0
     */
    class Users
    {

        /**
         * The user id.
         *
         * @var int
         */
        private $uid;


        /**
         * The user e-mail address.
         *
         * @var string
         */
        private $email;


        /**
         * The user password hashed.
         *
         * @var string
         */
        private $password;



        /**
         * Set the user email address.
         *
         * @param string $email The email address that the user has given.
         * 
         * @return void
         */
        public function setEmail(string $email)
        {
            if ( !$this->isEmailValid($email) ) {
                // email not valid
            }

            $this->email = $email;
        }


        /**
         * Check if the user input email is a valid email.
         *
         * @param string $email The email address that needs to check if it's valid for use. e.g. $email must contain @ and .com of some sort.
         * 
         * @return bool
         */
        public function isEmailValid(string $email)
        {
            return filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+./', $email);
        }


        /**
         * Return the email address from the user.
         * 
         * @return string
         */
        public function getEmail()
        {
            return $this->email;
        }


        /**
         * Set the user password. This function is used to set the password. In case of registering an account, the hash is set on true and on login it's set on false.
         *
         * @param string $password Input password from the user when they are trying to register a new account or login.
         * @param int $length The minimun length the password has to be. On default it's set on 6.
         * @param string $algorithm The password algorithm used to hash the given password.
         * @param bool $hash Using hash to set the password, true or false. 
         * @param array $options Additional options to use for hashing password method. 
         * 
         * @return void
         */
        public function setPassword(string $password, int $length = 6, string $algorithm = PASSWORD_BCRYPT, bool $hash = false, array $options = [])
        {
            if ( strlen($password) < $length ) {
                //  return password length too short.
            }

            $this->password = !$hash ? $password : password_hash($password, $algorithm, $options);
        }


        /**
         * If the user tries to login, check if the password hash from the database matches the password the user has given.
         * 
         * @param string $password The password that the user has entered when trying to login.
         * @param string $hashed The password hashed with bcrypt by default (or other algorithm), which is stored inside the database.
         * 
         * @return bool
         */
        public function checkPassword(string $password, string $hashed)
        {
            return password_verify($password, $hashed);
        }
        

        /**
         * Return the email address from the user.
         * 
         * @return string
         */
        public function getPassword()
        {
            return $this->password;
        }


        public function checkLogin()
        {
            return;
        }


        public function registerUser()
        {
            return;
        }


        public function accountExists()
        {
            return;
        }


        public function isLoggedIn()
        {
            return;
        }
    }
?>