<?php
    class Config {
        protected $host = 'localhost';
        protected $user= 'root';
        protected $pass = '';
        protected $db = '20191007_bimfs_db';
        protected $connection = NULL;
        
        public function __construct() {
//            $this->connect();

        }
        
        public function connect() {
            $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db);
//            if (!$this->connection) {
//                throw new Exception("Connection to the database server failed!");
//            }
//            if (!$this->connection->select_db($this->db)) {
//                throw new Exception("No contacts database found on database server.");
//            }
            
            return $this->connection;
        }
        
        public function close() {
            $this->connection->close();
        }
        
    }

    class Session {
        public static function start() {
            session_start();
        } 
        
        public static function stop() {
            session_destroy();
        }
    }
?>
