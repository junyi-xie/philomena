<?php
    /* Copyright (c) - 2021 by Junyi Xie */	
    
    namespace Philomena;

    /**
     * Philomena Appointments Class.
     *     
     * @author Junyi Xie
     * @version 1.0.0
     */
    class Appointments
    {
        /**
         * The user id.
         *
         * @var int
         */
        private $uid;


        /**
         * The reservation date and time.
         *
         * @var int
         */
        private $datetime;


        /**
         * The staff id.
         *
         * @var int
         */
        private $staff;


        /**
         * The treatment type.
         *
         * @var int
         */
        private $treatment;


        /**
         * The database table name.
         *
         * @var string
         */
        private $table = 'appointments';


        /**
         * Appointments Class Constructor.
         *
         * @return void
         */
        public function __construct(array $config = null) 
        {
            $this->pdo = Database::getInstance();

            if ( null === $config) {
                if ( !empty(Session::checkSession('uid')) ) 
                {
                    $this->setUser(Session::getSession('uid'));
                } 
                else if ( !empty(Cookie::checkCookie('uid')) ) 
                {
                    $this->setUser(Cookie::getCookie('uid'));
                } 
            } else if ( is_string($config) ) {
                $this->setUser($config['uid']);
            }
        }


        /**
         * Set the user id. Makes it available for use within this class to operate queries.
         *
         * @param int $id The user id, used to assign the appointment to his/her unique id. 
         * 
         * @return void
         */
        public function setUser(int $id)
        {
            $this->uid = $id;
        }


        /**
         * Set the datetime for the appointment. The datetime is formatted as an integer to save for the database.
         *
         * @param int $datetime This is the datetime for the appointment the customer has given as input.
         * 
         * @return void
         */
        public function setDate(int $datetime)
        {
            $this->datetime = $datetime;
        }


        public function isStaffVerified()
        {


            return true;

            return false;
        }
        


        /**
         * 
         * 
         * @param string $day
         * 
         * @return void
         */
        public function checkDateTimeValid(string $day)
        {
            $a = $this->pdo->Select("SELECT * FROM openinghours WHERE open AND closed > 0");


            foreach($a as $k => $v)
            {
                $new_arr[] = strtolower($v->day);
            }

            // $res_arr = implode(', ', $new_arr);
            // print_r($new_arr);

            // printr($day2);

            // return $a;


            if (empty($day)) {
                return false;
            }

            return in_array(strtolower($day), $new_arr) ? true : false;
        }


        public function isTimeTaken()
        {



        }


        public function makeAppointment(int $uid = null, int $staff = null, int $treatment, int $date, int $time, int $status = 0)
        {

            $this->pdo->Insert($this->table, );

            "
            INSERT INTO appointments
            SET
                id = UID,
                user_id = $this->getuser,
                staff_id = NULL,
                treatment_id = 1200,
                date = 1200,
                time = 1200,
                status = 0
            ";

        }


        public function getUser()
        {
            return $this->uid;
        }


        public function getDateTime()
        {
            return $this->datetime;
        }


    }
?>