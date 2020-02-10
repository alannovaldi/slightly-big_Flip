<?php
    class Status {
        private $conn;
        private $table = 'statuses';

        public $id;
        public $status_name;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create(){
            $query = 'INSERT INTO statuses (id, status_name) VALUES (' . $this->id . ', "' . $this->status_name . '")';

            if ($this->conn->query($query) === TRUE) {
                echo json_encode("New record created successfully");
            } else {
                echo json_encode("Error: " . $query . "<br>" . $this->conn->error);
            }
        }
    }
?>