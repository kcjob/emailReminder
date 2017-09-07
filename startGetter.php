<?php

require_once( __DIR__ . '/vendor/autoload.php');

use \UserSettings\DBConnect;
use \UserSettings\UserSettingsDAO;
use \UserSettings\UserSettings;


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('database');
$dbStream = new StreamHandler('log/emailReminder.log', Logger::WARNING);
$log->pushHandler($dbStream);


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
    $option_name ='optout';
    $user_id = 66;
    //$email = 'dfimiarz@ccny.cuny.edu';
    $email = 'jmorales@ccny.cuny.edu';

    //$settingsJson = UserSettingsDAO::getOptionByUser_id($connectToDb, $option_name, $user_id);
    $settingsJson = UserSettingsDAO::getOptionByEmail($connectToDb, $option_name, $email);
    } catch (Exception $e) {
        $log->error($e->getMessage());
        die("Query failed!!\r\n");
}

try {
    $parseOption = UserSettingsDAO::parseJson($settingsJson, $option_name);
} catch (Exception $e) {
    //$log->error($e->getMessage());
    echo "Somethin aint working\n" . $e->getMessage();
}
if($parseOption){
    echo 'xxxx: ' . $parseOption;

}
