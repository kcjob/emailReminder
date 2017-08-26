<?php

namespace Optout;

class UpdateUserSettings {
  static function setOptoutUserSetting($connectToDb, $userEmail){
    $post_data = json_encode(array('optout' => 1), JSON_FORCE_OBJECT);
    //echo $post_data;
    $qryUpdate = "UPDATE core_users
    SET settings = '{optout: 1}'
    WHERE email = ?"; //'dfimiarz@ccny.cuny.edu'";
    $qryResults = $connectToDb->prepare($qryUpdate);
    if(!$qryResults){
		  throw new \Exception('Querry failed');
	  }
    $qryResults -> bind_param("s", $userEmail);
    $qryResults -> execute();
    //print_r($qryResults);
    if($qryResults->affected_rows > 0){
      echo ("You've been successfully removed from Core Facilty's Reminder System");
    }
  }

}
