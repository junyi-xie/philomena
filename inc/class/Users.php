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
         * The user first and last name.
         *
         * @var string
         */
        private $name;


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
         * The user phone number.
         *
         * @var int
         */
        private $phone;


        /**
         * The user address.
         *
         * @var string
         */
        private $address;


        /**
         * The user zipcode.
         *
         * @var string
         */
        private $zipcode;


        /**
         * The user city.
         *
         * @var string
         */
        private $city;


        /**
         * The user province.
         *
         * @var string
         */
        private $province;


        /**
         * The user country.
         *
         * @var string
         */
        private $country;


        /**
         * Users Class Constructor.
         * 
         * @param array $config This contains the users basic information, such as name, phone, address and more. The user password and email need to be configurated manually, this is because they have addtional options depending on the process kind.
         *
         * @return void
         */
        public function __construct(id $user = null)
        {

            if ( !$user ) {


            } else {
                $this->setUser($id);
            }
        }


        /**
         * Set the user id.
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
         * Set the user full name.
         *
         * @param string $name 
         * 
         * @return void
         */
        public function setName(string $name)
        {
            $this->name = $name;
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
                // return email not valid
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
                //  return password length too short.
            }

            $this->password = !$hash ? $password : password_hash($password, $algorithm, $options);
        }


        /**
         * Set the user phone number.
         *
         * @param int $nunber 
         * 
         * @return void
         */
        public function setPhone(int $number)
        {
            $this->phone = $number;
        }


        /**
         * Set the user address.
         *
         * @param string $address 
         * 
         * @return void
         */
        public function setAddress(string $address)
        {
            $this->address = $address;
        }


        /**
         * Set the user zipcode.
         *
         * @param string $zip 
         * 
         * @return void
         */
        public function setZipcode(string $zip)
        {
            $this->zipcode = $zip;
        }


        /**
         * Set the user city.
         *
         * @param string $city 
         * 
         * @return void
         */
        public function setCity(string $city)
        {
            $this->city = $city;
        }


        /**
         * Set the user province.
         *
         * @param string $province
         * 
         * @return void
         */
        public function setProvince(string $province)
        {
            $this->province = $province;
        }


        /**
         * Set the user country.
         *
         * @param string $country
         * 
         * @return void
         */
        public function setCountry(string $country)
        {
            $this->country = $country;
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
         * Login
         * 
         * @return bool
         */
        public function login()
        {
            return false;
        }


        /**
         * Logout
         * 
         * @return void
         */
        public function logout()
        {
            return false;
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
         * Get the user id.
         *
         * @return string
         */
        public function getUser()
        {
            return $this->uid;
        }


        /**
         * Get the user full name.
         *
         * @return string
         */
        public function getName()
        {
            return $this->name;
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
         * Get the user phone number.
         *
         * @return string
         */
        public function getPhone()
        {
            return $this->phone;
        }


        /**
         * Get the user address.
         *
         * @return string
         */
        public function getAddress()
        {
            return $this->address;
        }


        /**
         * Get the user zipcode.
         *
         * @return string
         */
        public function getZipcode()
        {
            return $this->zipcode;
        }


        /**
         * Get the user city.
         *
         * @return string
         */
        public function getCity()
        {
            return $this->city;
        }


        /**
         * Get the user province.
         *
         * @return string
         */
        public function getProvince()
        {
            return $this->province;
        }


        /**
         * Get the user country.
         *
         * @return string
         */
        public function getCountry()
        {
            return $this->country;
        }
    }
?>