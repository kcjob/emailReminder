<?php
namespace UserSettings;

class DBConnect {

  static function getConnection()
  {

  //Get database conenction info from an .ini file
    $db_params = parse_ini_file("config/dbinfo.generic.ini");
    $dbconnect = \mysqli_connect($db_params['hostname'], $db_params['dbusr'], $db_params['dbpwrd'], $db_params['dbname']);
    if (!$dbconnect) {
      throw new \Exception('Could not connect: ' . mysqli_connect_error());
    }
    /* return name of current default database */
    /*if ($result = $dbconnect->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
    }*/

    return $dbconnect;
  } //getConnect function
}
