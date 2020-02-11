# slightly-big_Flip

This repository provide a service that can disburse customer's money on an e-commerce platform. The service provide some API calls which can store, check and view data of a disbursement by a customer. Before we get into the APIs, these are some step need to be done in order to use the service.

1. Pull the repo
2. Set database configuration on file
```
config/Database.php
```
Change all these line based on your local database
```
private $servername = "localhost";
private $username = "root";
private $password = "";
private $dbname = "trial_db";
```
3. Run ``` php migration/migration.php ``` for database DDL

Now you can run the following APIs after following the instructions above.

1. Title:		Create Disbursement
```
Desctiption:
			Save new disbursement request from a customer as a pending disbursement
URL:		localhost/slightly-big_Flip/api/status/create.php
Method:		POST
Header:
			Content-Type:	application/json
			Authorization:	Basic HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41
URL Params:
-
Body Params:
	{
		"amount": 10000,
		"bank_code": "111",
		"account_number": "123451234",
		"remark": "sample mark"
	}

Success Response
	{
	    "status": "success",
	    "data": {
	        "id": "1",
	        "amount": "10000",
	        "status": "PENDING",
	        "timestamp": "2020-02-11 19:29:19",
	        "bank_code": "111",
	        "account_number": "123451234",
	        "beneficiary_name": "PT FLIP",
	        "remark": "sample mark",
	        "receipt": "",
	        "time_served": "2001-01-01 00:00:00",
	        "fee": "5000"
	    }
	}
 ```

 2. Title:		Check Disbursement
 ```
Desctiption:
			Finish up a disbursement process by a customer into SUCCESS and update disbursement receipt
URL:		localhost/slightly-big_Flip/api/disbursement/check.php?id={$id}
Method:		POST
Header:
			Content-Type:	application/json
			Authorization:	Basic HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41
URL Params:
$id: {disbursement_id} 
Body Params:
	{
		"receipt": "https://flip-receipt.oss-ap-southeast-5.aliyuncs.com/debit_receipt/126316_3d07f9fef9612c7275b3c36f7e1e5762.jpg"
	}

Success Response
	{
	    "status": "success",
	    "data": {
	        "id": "1",
	        "amount": "10000",
	        "status": "SUCCESS",
	        "timestamp": "2020-02-11 19:29:19",
	        "bank_code": "111",
	        "account_number": "123451234",
	        "beneficiary_name": "PT FLIP",
	        "remark": "sample mark",
	        "receipt": "https://flip-receipt.oss-ap-southeast-5.aliyuncs.com/debit_receipt/126316_3d07f9fef9612c7275b3c36f7e1e5762.jpg",
	        "time_served": "2020-02-11 20:30:34",
	        "fee": "5000"
	    }
	}
```

3. Title:		View Disbursement
```
Desctiption:
			View a disbursement detail data
URL:		localhost/slightly-big_Flip/api/disbursement/read.php?id=1
Method:		POST
Header:
			Content-Type:	application/json
			Authorization:	Basic HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41
URL Params:
$id: {disbursement_id} 
Body Params:
-

Success Response
	{
	    "status": "success",
	    "data": {
	        "id": "1",
	        "amount": "10000",
	        "status": "SUCCESS",
	        "timestamp": "2020-02-11 19:29:19",
	        "bank_code": "111",
	        "account_number": "123451234",
	        "beneficiary_name": "PT FLIP",
	        "remark": "sample mark",
	        "receipt": "https://flip-receipt.oss-ap-southeast-5.aliyuncs.com/debit_receipt/126316_3d07f9fef9612c7275b3c36f7e1e5762.jpg",
	        "time_served": "2020-02-11 20:30:34",
	        "fee": "5000"
	    }
	}
```

        