<?php
namespace UserSettings;

class optoutUserIds {
  /**
    * NOTE: fetch_array does not work with prepare()
    *  Returns an array of the ids who opted out
    * @param type $connectToDb
    * @return $optoutIds
    */
  static function optout_Ids($connectToDb){
    $usersAndSettings = [];
    $qry = "SELECT id,settings FROM core_users limit 2";

    $qryResult = $connectToDb->query($qry); //prepare($qry);
    if(!$qryResult){
      throw new \Exception('Querry failed');
    }
    while($row = $qryResult -> fetch_array(MYSQLI_ASSOC)){
        $settingsOptionArray = json_decode($row['settings'], TRUE);
        foreach($settingsOptionArray as $key => $value){
          if($settingsOptionArray[$key] == 1)
            $optoutIds[] = $row['id'];
        }
    }
    return $optoutIds;
  }

}
