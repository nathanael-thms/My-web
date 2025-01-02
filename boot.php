<?php
require_once('../.env.php');
$DB_CONNECTION = new PDO(
    sprintf(
        "mysql:host=%s;dbname=%s", 
        MYSQL_SERVERNAME,
        MYSQL_DBNAME
    ),
    MYSQL_USERNAME, 
    MYSQL_PASSWORD
);
// set the PDO error mode to exception
$DB_CONNECTION->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);