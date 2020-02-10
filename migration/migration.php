<?php

$db_conf = mysqli_connect('localhost', 'root', '', 'trial_db');

$disbursement = "CREATE TABLE Disbursements (
        id INT PRIMARY KEY AUTO_INCREMENT,
        amount INT NOT NULL,
        status_id INT NOT NULL,
        timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        bank_code VARCHAR(30) NOT NULL,
        account_number VARCHAR(30) NOT NULL,
        beneficiary_name VARCHAR(30) NOT NULL,
        remark VARCHAR(30),
        receipt VARCHAR(30),
        time_served TIMESTAMP DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
        fee INT,
        FOREIGN KEY (status_id) REFERENCES Statuses(id)
    )";

$statuses = "CREATE TABLE Statuses (
        id INT PRIMARY KEY,
        status_name VARCHAR(30) NOT NULL
    )";

// $foreign_key = "ALTER TABLE Disbursements
// ADD FOREIGN KEY (status_id) REFERENCES Statuses(id)";

// mysqli_query($db_conf, $statuses) or dir("Bad Create: $sql");
mysqli_query($db_conf, $disbursement) or dir("Bad Create: $sql");
?>