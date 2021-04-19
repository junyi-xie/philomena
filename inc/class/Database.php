<?php
    /* Copyright (c) - 2021 by Junyi Xie */	
    
    namespace Philomena;

    /**
     * Philomena Database Class.
     *     
     * @author Junyi Xie
     * @version 1.0.0
     */
    class Database
    {

        /**
         * The hostname.
         *
         * @var string
         */
        protected $hostname;


        /**
         * The username.
         *
         * @var string
         */
        protected $username;


        /**
         * The password.
         *
         * @var string
         */
        protected $password;


        /**
         * The database.
         *
         * @var string
         */
        protected $dbname;


        /**
         * The charset.
         *
         * @var string
         */
        private $charset = 'utf8mb4';


        /**
         * PDO.
         *
         * @var object
         */
        public $pdo;


        /**
         * Class Constructor.
         *
         * @param string $host
         * @param string $user
         * @param string $pass
         * @param string $db
         * 
         * @return void
         */
        public function __construct($host, $user, $pass, $db)
        {
            $this->hostname = $host;
            $this->username = $user;
            $this->password = $pass;
            $this->dbname = $db;
            $this->connect();
        }
    

        /**
         * Function to make connection to the database.
         *
         * @return void
         */
        public function connect()
        {
            $dsn = "mysql:host=$this->hostname;dbname=$this->dbname;charset=$this->charset";
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            try {
                $this->pdo = new \PDO($dsn, $this->username, $this->password, $options);
            } catch (\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int) $e->getCode());
            }
        }


        /**
         * Function to disconnect from the database.
         *
         * @return void
         */
        public function disconnect()
        {
            $this->pdo = null;
        }


        /**
         * Class Destructor.
         *
         * @return void
         */
        public function __destruct() 
        {
            $this->disconnect();
        }
    }
?>