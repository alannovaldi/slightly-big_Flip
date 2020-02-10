<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-Control-Allow-Header: Access-Control-Allow-Origin, Content-Type, Access-Control-Allow-Method, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Disbursement.php';
    include_once '../../models/Response.php';

    $database = new Database();
    $db = $database->connect();
    
    $data = json_decode(file_get_contents("php://input"));
    
    $disbursement = new Disbursement($db);
    $disbursement->amount = $data->amount;
    $disbursement->status_id = 1;
    $disbursement->bank_code = $data->bank_code;
    $disbursement->account_number = $data->account_number;
    $disbursement->beneficiary_name = "PT FLIP";
    $disbursement->remark = $data->remark;
    // $disbursement->receipt = $data->receipt;
    $disbursement->fee = 5000;

    $result = $disbursement->create()->fetch_assoc();
    $response = new Response();

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

    echo(json_encode($response));
    
?>