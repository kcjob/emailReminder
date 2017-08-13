<?php

require_once( __DIR__ . '/vendor/autoload.php');

use \Optout\DBConnect;
use \Optout\OptoutDAO;
use \Optout\AddUserToDB;
/*
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('database');
$dbStream = new StreamHandler('log/emailReminder.log', Logger::WARNING);
$log->pushHandler($dbStream);
*/
//CONNECT TO DATABASE
try {
    $connectToDb = DBConnect::getConnection();
} catch (Exception $e) {
    $log->error($e->getMessage());
    echo "Database connection failed\r\n";
    die();
}

//RETRIEVE VALID USER DATA FROM DATABASE
try {
    $optoutUserData = OptoutDAO::getUserData($connectToDb);
} catch (Exception $e) {
    $log->error($e->getMessage());
    die("Query failed!!\r\n");
}

try {
    $xxxx = new AddUserToDB($connectToDb, $optoutUserData);
    $xxxx->setOptoutUser($connectToDb); //$optoutUserData);
    //$xxxx->AddUserToDB::setOptoutUser($optoutUserData,$connectToDb);
    //print_r($connectToDb);
} catch (Exception $e) {
    $log->error($e->getMessage());
    echo "Somethin aint working\n" . $e->getMessage();
}
