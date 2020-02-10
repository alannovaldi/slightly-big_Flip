<?php
    class Database {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "trial_db";
        private $conn;

        public function connect() {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            
            return $this->conn;
        }
    }
?>