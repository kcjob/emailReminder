<?php

namespace Optout;

class OptoutDAO {
  private $userEmail;

  function __construc(){
    $this ->userEmail = $_POST["emailAddy"];
    print_r($this->userEmail);
  }
  static function getUserData($connectToDb)
  {
      $query = "SELECT id, pi, username, email
                FROM core_users
                WHERE email = 'dfimiarz@ccny.cuny.edu'";

      $queryInfoResults = $connectToDb->prepare($query);
      if(!$queryInfoResults){
        throw new Exception('Querry failed');
      }
      $queryInfoResults -> execute();
  	  $queryInfoResults -> bind_result($id, $pi, $username, $email);

      $optoutData = [];
      if($queryInfoResults -> fetch()){
        $optoutData[0] = $pi;
        $optoutData[1] = $email;
        $optoutData[2] = $username;
        $optoutData[3] = $id;
      }
      return $optoutData;

    }
}
