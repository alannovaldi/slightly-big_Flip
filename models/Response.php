<?php
    class Response {
        public $status;
        public $data;
        public $message;

        public function success_response($status, $data){
            $this->status = $status;
            $this->data = $data;
            
            return array(
                "status" => $this->status,
                "data" => $this->data
            );
        }

        public function error_response($status, $error_message){
            $this->status = $status;
            $this->message = $error_message;
        }

        public function failed_response($status, $failed_message){
            $this->status = $status;
            $this->message = $failed_message;
            return array(
                "status" => $this->status,
                "message" => $this->message
            );
        }
    }
?>