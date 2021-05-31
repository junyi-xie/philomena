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
         * The reservation time and date.
         *
         * @var int
         */
        private $date, $time;


        /**
         * The staff id.
         *
         * @var int
         */
        private $staff;


        /**
         * The treatment type.
         *
         * @var array
         */
        private $treatment;


        /**
         * Appointments Class Constructor.
         *
         * @return void
         */
        public function __construct() 
        {
            $this->pdo = Database::getInstance();

        }


        public function reservation()
        {

        }



    }
?>