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
         * Available roles to assign to a user.
         *
         * @var array
         */
        private $role = ['1' => 'Admin', '2' => 'Guest', '3' => 'Barber', '4' => 'Nail Stylist'];


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
         * The user information, such as name, address, phone number and more.
         *
         * @var array
         */
        private $data;


        /**
         * Users Class Constructor.
         * 
         * @param array $config This contains the users basic information, such as name, phone, address and more. The user password and email need to be configurated manually, this is because they have addtional options depending on the process kind.
         *
         * @return void
         */
        public function __construct(array $config = null)
        {
            $this->pdo = Database::getInstance();

            if ( !empty($config) && is_array($config) && null !== $config ) {
                $this->setData($config);
            }
        }


        /**
         * Set the user id. This makes it so you can access the uid from within this class, if the uid is set then you can use the isLoggedIn function so you don't have to sign in again.
         *
         * @param int $id The user id, which is used to execute queries on the current user that is signed up. 
         * 
         * @return void
         */
        public function setUser(int $id)
        {
            $this->uid = $id;
        }


        /**
         * Set the user email address. It firsts checks if the email is valid before assigning the email with the users value.
         *
         * @param string $email The email address that the user has given.
         * 
         * @return void
         */
        public function setEmail(string $email)
        {
            if ( !$this->isEmailValid($email) ) {
                return false;
            }

            $this->email = $email;
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
                return false;
            }

            $this->password = !$hash ? $password : password_hash($password, $algorithm, $options);
        }


        /**
         * Set the user data.
         *
         * @param array $config
         * 
         * @return void
         */
        public function setData(array $data)
        {
            $this->data = $data;
        }


        /**
         * Check if the user input email is a valid email. This is to prevent users from using not available emails to create an account, which can prevent a mail to be send.
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
         * Check if the account the user tried to sign up with already exists, if it does not exist it with return 0, which means the input email address does not exist and the user needs to create a new account.
         * 
         * @param string $email The email address the user tried to sign in with.
         * @param bool $count Set on true if you wish to return just the row count, on false it will return an array of data.
         * @param bool $single Set the fetch method to all or just a single array.
         * 
         * @return mixed
         */
        public function verifyAccountExists(string $email, bool $count = false, bool $single = true)
        {
            return $this->pdo->Select(sql: "SELECT * FROM users WHERE email = :email", data: [':email' => $email], row: $count, fetch: $single);
        }

        
        /**
         * Function to log in to the dashboard. Checks if the required parameters are filled and if you wish to remember your log in so you don't have to sign in again.
         * 
         * @param string $email The email address the user tried to sign in with, checks if the account exists in the login process.
         * @param string $password The password the user used to login, validate the password if it matches with the user.
         * @param bool $remember If you wish to save your login with a cookie on top of a session to prevent signin in again.
         * 
         * @return mixed
         */
        public function SignIn(string $email = null, string $password = null, bool $remember = false)
        {
            if ( null !== $email && $password ) {

                // Checks if the email address exists in the users table.
                if ( !$User = $this->verifyAccountExists($email) ) {
                    return flashMessage('signin', 'Account doesn\'t exist...!', 'alert-failure');
                } else {
                    // This function validates the password. It uses the password_verify function to make sure that the passwords match.
                    if ( $this->checkPassword($password, $User->password) ) {

                        // Set last login time to current timestamp.    
                        if ( $this->pdo->Update("users", ['last_login' => date("YmdHis")], "id = $User->id") ) {

                            // Not necessary. ('-O-')
                            if ( Session::checkSession('uid') ) {
                                Session::unsetSession('uid');
                            }
                            
                            Session::putSession('uid', $User->id);

                            // If the remember me checkbox is ticked.
                            if ( $remember ) {
                                // Save login information as Cookie item.
                                Cookie::putCookie('uid', $User->id, 604800);
                            }

                            return true;
                        }
                    } else {
                        return flashMessage('signin', 'Incorrect Password...!', 'alert-failure');
                    }
                }
            }
            
            return false;
        }


        /**
         * Function to create a new account.
         * 
         * @return mixed
         */
        public function SignUp()
        {
            // TO DO.
        }


        /**
         * Function to log out. This just deletes both the session and cookie with the necessary user information to prevent access to the dashboard.
         * 
         * @return void
         */
        public function Logout()
        {
            Session::unsetSession('uid');
		    Cookie::unsetCookie('uid');
        }


        /**
         * Checks if the user is already logged in or not. The user id can be saved inside a session or cookie hashed. This is used so the user doesn't have to sign in again, and will be instantly redirected to the appropriate dashboard.
         * 
         * @return bool
         */
        public function isLoggedIn()
        {
            if ( !empty($this->uid) && null !== $this->uid ) {
                return true;
            }

            return false;
        }


        /**
         * Get the user id. This uid is unique to the user and it is used to verify wether you have an account or not.
         *
         * @return int
         */
        public function getUser()
        {
            return $this->uid;
        }


        /**
         * Return the email address from the user. The email address can be used to change the current email address to another or for a query to set the email for a new registered user.
         * 
         * @return string
         */
        public function getEmail()
        {
            return $this->email;
        }


        /**
         * Return the user password. This can be the hashed password or just the normal string for verification / inserting use.
         * 
         * @return string
         */
        public function getPassword()
        {
            return $this->password;
        }


        /**
         * Function to return the user data, the result will be in an array and will contain information about the user, such as name, phone number and more.
         *
         * @return array
         */
        public function getData()
        {
            return $this->data;
        }
    }
?>