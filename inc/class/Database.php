<?php
    /* Copyright (c) - 2021 by Junyi Xie */	
    
    namespace Philomena;

    /**
     * Philomena Database Class.
     *     
     * @author Junyi Xie
     * @version 1.0.1
     */
    class Database extends Query
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
         * Datbase Class Constructor.
         *
         * @param string $host The host name, in most cases its just localhost.
         * @param string $user The username you have choosen for your host.
         * @param string $pass The password to connect to your database environment.
         * @param string $db The database you wish to connect to.
         * 
         * @return void
         */
        public function __construct(string $host, string $user, string $pass, string $db)
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
         * Database Class Destructor.
         *
         * @return void
         */
        public function __destruct() 
        {
            $this->disconnect();
        }
    }
?>