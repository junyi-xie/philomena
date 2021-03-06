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
         * The staff information.
         *
         * @var mixed
         */
        private $staff;


        /**
         * The treatment type.
         *
         * @var int
         */
        private $treatment;


        /**
         * The appointment details.
         *
         * @var array
         */
        private $appointment;


        /**
         * The reservation date and time.
         *
         * @var int
         */
        private $datetime;


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
        public function __construct() 
        {
            $this->pdo = Database::getInstance();
            $this->configurateStaff();
        }


        /**
         * Set the user id. Makes it available for use within this class to operate queries.
         *
         * @param int $uid The user id, used to assign the appointment to his/her unique id. 
         * 
         * @return void
         */
        public function setUser(int $uid)
        {
            $this->uid = $uid;
        }


        /**
         * Set the staff id, this will tell the system who is currently handling the procress of verifying and validation the final checkup on the reservations.
         *
         * @param mixed $info The id number of the staff who is on duty / logged in to handle the appointments.  Or an array of data of staffs / employees.
         * 
         * @return void
         */
        public function setStaff(mixed $info)
        {
            $this->staff = $info;
        }


        /**
         * This function sets the array of data as appointment detail to use for later, such as printing their invoice or sending them an email address reminder.
         *
         * @param array $data All the data which is needed for the appointment to be completed, such as uid, datetime, type and some personal information. 
         * 
         * @return void
         */
        public function setAppointment(array $data)
        {
            $this->appointment = $data;
        }


        /**
         * Just set the treatment type the customer has choosen, for now the customer can only choose one per appointment and needs to make another appointment if he / she wants to have more than one treatment.
         *
         * @param int $type The type of treatment the customer has selected, identified by their id number instead of name for system convinience.
         * 
         * @return void
         */
        public function setTreatment(int $type)
        {
            $this->treatment = $type;
        }


        /**
         * Set the datetime for the appointment. The datetime is formatted as an integer to save for the database.
         *
         * @param int $datetime This is the datetime for the appointment the customer has given as input.
         * 
         * @return void
         */
        public function setDateTime(int $datetime)
        {
            $this->datetime = $datetime;
        }


        /**
         * This function gets all the available treatments, the customer can choose from a wide variety.
         *
         * @param int $status This determines the status of which the treatment course need to be set on. On 1, its active else you get the inactive ones.
         * @param int $limit The maximun amount of records that can be returned. It's set on 1000 to prevent system overload, if that ever happens.
         * 
         * @return array
         */
        public function selectAllAvailableTreatments(int $status = 1, int $limit = 1000)
        {
            return $this->pdo->Select("SELECT * FROM treatments WHERE 1 AND status = :status LIMIT $limit", [':status' => $status]);
        }


        /**
         * Checks if the staff that is signed in, and a verified staff member, able to finalize appointments and perform them.
         *
         * @return bool
         */
        public function isStaffLoggedIn()
        {
            return (!empty($this->getStaff()) && null !== $this->getStaff()) ? true : false;
        }
        

        /**
         * @TODO
         *
         * @return void
         */
        public function checkDateTimeValid()
        {
            // @TODO
        }


        /**
         * @TODO
         *
         * @return void
         */
        public function isTimeTaken()
        {
            // @TODO
        }


        /**
         * Function to assign predefined staff members from the database to this class variable.
         *
         * @return void
         */
        public function configurateStaff()
        {            
            $data = [];

            $staff = $this->pdo->Select("SELECT * FROM users WHERE role_id = 3 OR role_id = 4");

            foreach ($staff as $k => $v) 
            {
                $data[$v->id] = rtrim($v->first_name . ' ' . $v->last_name);
            }

            $this->setStaff($data);
        }


        /**
         * This function inserts the appointment the customer has made. The staff and status of the appointment are both set on null, since a staff member needs to finalize this appointment first, after it has been done, the customer will get a reminder.
         * 
         * @param int $uid The id of the user that is trying to make an appointment for a specific treatment type.
         * @param int $staff This is the staff id, this has to be done manually since one of the available staffs on the choosen time and date needs to confirm this first.
         * @param int $treatment The treatment type id number. There can only be one id inserted, if the user wants multiple treatments he / she needs to make multiple appointments.
         * @param string $date The date the customer is going to have the choosen treatment.
         * @param string $time This is the time the customer has inputted to be available on the combined date.
         * @param string $note Any extra notes the user has left with his appointments. [optional]
         * @param int $status Current status of the appointment. On default its null, when the appointment is finished, this will be manually put on completed.
         *
         * @return void
         */
        public function makeAppointment(int $uid, int $staff = null, int $treatment, string $date, string $time, string $note = '', int $status = 0)
        {
            return $this->pdo->Insert($this->table, ['user_id' => $uid, 'staff_id' => $staff, 'treatment_id' => $treatment, 'reservation_date' => str_replace('-', '', $date), 'reservation_time' => str_replace([':', 'AM', 'PM', 'am', 'pm'], '', $time), 'notes' => $note, 'status' => $status]);
        }


        /**
         * Delete an existing appointment. This can only be performed by staff members or higher.
         * 
         * @param int $id This is the appointment id, it contains all the data about the appointment, such as, user, treatment and more.
         *
         * @return bool
         */
        public function removeAppointment(int $id)
        {
            return $this->pdo->Delete($this->table, "id = $id");
        }


        /**
         * Thi function lets you edit an appointment by your given id number. You can change all the information in the appointment, like edit the staff member in charge, the status of the appointment and more.
         * 
         * @param int $id The id number of which appointment you'd like to edit their information.
         * @param array $data Contains the new data which will overwrite the old data in the given appointment id number. 
         * 
         * @return void
         */
        public function editAppointment(int $id, array $data) {
            // @TODO
        }


        /**
         * Returns the uid of the currently signed in customer.
         *
         * @return int
         */
        public function getUser()
        {
            return $this->uid;
        }


        /**
         * Get the staff id, used to verify if the staff is eligible for making changes to the pending appointments.
         *
         * @param int $key The key number of the staff, used to get specific data of the matching key from the staff array.
         * 
         * @return int
         */
        public function getStaff($key = 0)
        {
            return (!empty($key)) ? $this->staff[$key] : $this->staff;
        }


        /**
         * An array of data will be returned, in them containing the appointment details of a specified id or it will return everything.
         *
         * @return array
         */
        public function getAppointment()
        {
            return $this->appointment;
        }


        /**
         * This just gives you the id number of the treatment type.
         *
         * @return int
         */
        public function getTreatment()
        {
            return $this->treatment;
        }


        /**
         * Returns the datetime of the given appointment details.
         *
         * @return int
         */
        public function getDateTime()
        {
            return $this->datetime;
        }
    }
?>