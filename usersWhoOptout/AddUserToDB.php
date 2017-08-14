<?php

namespace Optout;

class AddUserToDB {
  //private $userData;
  private $userId;
  private $email;

  function __construct($connectToDb,$userData){
    $this->userId = $userData[0];
    $this->email = $userData[1];
  }

  function setOptoutUser($connectToDb){
    $queryInsert = "INSERT INTO Core_Users_Option
                   (userId, optOut, email) VALUES (?, 1, ?)";
    $queryResults = $connectToDb->prepare($queryInsert);
    if(!$queryResults){
		  throw new \Exception('Querry failed');
	   }
     $queryResults -> bind_param("ss", $this->userId, $this->email);
    $queryResults -> execute();
    echo ("You've been successfully removed from Core Facilty's Reminder System");
  }

}
