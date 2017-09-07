<?php
namespace UserSettings;

class UserSettings {
  static function optoutSetter($connectToDb, $userEmail){
    $qry = "SELECT settings FROM core_users WHERE email = ?";

    $qryResult = $connectToDb->prepare($qry);
    if(!$qryResults){
		  throw new \Exception('Querry failed');
	  }
    $qryResults -> bind_param("s", $userEmail);
    $qryResults -> execute();

//    if($qryResults->affected_rows > 0){
//      echo ("You've been successfully removed from Core Facilty's Reminder System");
//    }

  }

}
