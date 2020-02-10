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
            $query = 'SELECT dsb.id, dsb.amount, st.status_name as status, dsb.bank_code, dsb.account_number, dsb.beneficiary_name, dsb.remark, dsb.receipt, dsb.time_served, dsb.fee
            FROM disbursements dsb, statuses st
            WHERE dsb.id = ' . $id . ' AND dsb.status_id = st.id';
            
            $result = $this->conn->query($query);
            return $result;
        }
    }
?>