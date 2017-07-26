<?php
namespace model\db;
use model\db\User;


class UsersDAO{
	static function getUserData($connectToDb) {
		$state=1;
		$allUsers = array();


		$queryInfo = "SELECT CU.id AS id, CU.email AS email, CS.name AS equipment, concat(CU.firstname, ' ', CU.lastname) as user, DATE(CTA.start) as date, TIME(CTA.start) AS start, TIME(CTA.end) as  end
		FROM core_timed_activity AS CTA ,core_services AS CS, core_users AS CU
		WHERE CTA.service_id = CS.id AND cta.state = ? and cta.user = cu.id
		ORDER BY id, CTA.start LIMIT 5";


		$queryInfoResults = $connectToDb->prepare($queryInfo);
		if(!$queryInfoResults){
			throw new \Exception('Querry failed');
		}

  	$queryInfoResults -> bind_param("i", $state);
  	$queryInfoResults -> execute();
  	$queryInfoResults -> bind_result($id, $email, $equipment, $user, $date, $start, $end);

		//Create an array of each user as objects
		while($queryInfoResults -> fetch()){
			//print strtotime($date);
			$newDate = DATE('D, M Y', strtotime($date));
			//print $newDate;
			$obj = new User($id, $email, $equipment, $user, $newDate, $start, $end);
			$allUsers[] = $obj;
		}
		return $allUsers;
 	}

}
//UsersDAO::getUserData();
