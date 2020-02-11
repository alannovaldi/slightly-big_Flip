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
3. Run ''' php migration/migration.php ''' for database DDL

Now you can run the following APIs after following the instructions above.



        