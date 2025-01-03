<?php
require_once(dirname(__FILE__) . '/.env.php');
$DB_CONNECTION = new PDO(
    sprintf( 
        MYSQL_SERVERNAME,
        MYSQL_DBNAME
    ),
    MYSQL_USERNAME, 
    MYSQL_PASSWORD
);
// set the PDO error mode to exception
$DB_CONNECTION->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);