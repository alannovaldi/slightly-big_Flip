<?php
    class Disbursement {
        private $conn;
        private $table = 'disbursements';

        public $id;
        public $amount;
        public $status_id;
        public $bank_code;
        public $account_number;
        public $beneficiary_name;
        public $remark;
        public $receipt;
        public $time_served;
        public $fee;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read($id){
            $query = 'SELECT * FROM '. $this->table . ' WHERE id = ' . $id;
            
            $result = $this->conn->query($query) or die($this->conn->error);
            return $result;
        }
    }
?>