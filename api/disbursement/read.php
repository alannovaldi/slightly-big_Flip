<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Disbursement.php';
    include_once '../../models/Response.php';

    $database = new Database();
    $db = $database->connect();

    $disbursement_id = (int)$_GET['id'];

    // echo($disbursement_id);
    
    $disbursement = new Disbursement($db);
    
    $result = $disbursement->read($disbursement_id)->fetch_assoc();

    $response = new Response();

    if ($result) {
        $data_array = array(
            'id' => $result['id'],
            'amount' => $result['amount'],
            'status' => $result['status'],
            'timestamp' => $result['timestamp'],
            'bank_code' => $result['bank_code'],
            'account_number' => $result['account_number'],
            'beneficiary_name' => $result['beneficiary_name'],
            'remark' => $result['remark'],
            'receipt' => $result['receipt'],
            'time_served' => $result['time_served'],
            'fee' => $result['fee']
        );

        $response = $response->success_response("success", $data_array);
    } else {
        $response = $response->failed_response("failed", "There is no data with id = " . $disbursement_id);
    }

    echo json_encode($response);
?>