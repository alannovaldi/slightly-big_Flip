<?php

$db_conf = mysqli_connect('localhost', 'root', '', 'trial_db');

$statuses = "CREATE TABLE Statuses (
        id INT PRIMARY KEY,
        status_name VARCHAR(30) NOT NULL
    )";


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
        time_served TIMESTAMP DEFAULT '2001-01-01 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
        fee INT,
        FOREIGN KEY (status_id) REFERENCES Statuses(id)
    )";

$statuses_data = 'INSERT INTO statuses (id, status_name) VALUES (1, "PENDING")';
$statuses_data_2 = 'INSERT INTO statuses (id, status_name) VALUES (2, "SUCCESS")';

mysqli_query($db_conf, $statuses) or dir("Bad Create: $statuses");
mysqli_query($db_conf, $disbursement) or dir("Bad Create: $disbursement");

mysqli_query($db_conf, $statuses_data) or dir("Bad Create: $statuses_data");
mysqli_query($db_conf, $statuses_data_2) or dir("Bad Create: $statuses_data_2");
?>