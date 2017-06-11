<?php 
require("function.php");
$d1=strtotime("July 04");
$d2=ceil(($d1-time())/60/60/24);

$conn = make_db_connection();
	$result = $conn->query("SELECT * FROM `currentuser` WHERE status='3'AND startTime > now() - INTERVAL 60 MINUTE");//status code is not sure
	if($result ==false){
		echo "no match";
		die();
	}
	while($user = $result->fetch_assoc()){
		echo $user['studentId'];
			modify_seat_status($user['seatId'],"available");
			delete_from_current($user['studentId']);
	}

 ?>