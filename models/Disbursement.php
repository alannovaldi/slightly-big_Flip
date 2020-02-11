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
            $query = 'SELECT dsb.id, dsb.amount, dsb.timestamp, st.status_name as status, dsb.bank_code, dsb.account_number, dsb.beneficiary_name, dsb.remark, dsb.receipt, dsb.time_served, dsb.fee
            FROM disbursements dsb, statuses st
            WHERE dsb.id = ' . $id . ' AND dsb.status_id = st.id';
            
            $result = $this->conn->query($query);
            return $result;
        }

        public function create(){
            $query = 'INSERT INTO ' . $this->table . ' (amount, status_id, bank_code, account_number, beneficiary_name, remark, receipt, fee)
                VALUES (' . $this->amount . ', ' . $this->status_id . ', "' . $this->bank_code . '"
                        , "' . $this->account_number . '", "' . $this->beneficiary_name . '"
                        , "' . $this->remark . '", "' . $this->receipt . '", ' . $this->fee . ')';

            $result = $this->conn->query($query);
            // $last_id = (int)$this->conn->insert_id;
            $new_disbursement = $this->read((int)$this->conn->insert_id);

            $this->conn->close();
            return $new_disbursement;
        }

        public function check($id, $receipt){
            $query = 'UPDATE disbursements
            SET status_id = 2, receipt = "' . $receipt . '"
            WHERE id=' . $id;
            
            $result = $this->conn->query($query);
            // $last_id = (int)$this->conn->insert_id;
            if ($this->conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $new_disbursement = $this->read($id);

            $this->conn->close();
            return $new_disbursement;
        }
    }
?>