<?php 
require("function.php");
make_db_connection()->query("DELETE FROM seat");
function insert_seat_list($dorm , $seatColRow, $seatStatus){
	$conn = make_db_connection();
	$conn->query("INSERT INTO seat (seatColRow , dorm , status) VALUE('$seatColRow' ,'$dorm' , '$seatStatus')");
}
for($i=1;$i<10;$i++){
	for($j=1;$j<10;$j++){
		insert_seat_list(2,$i.'_'.$j,1);
		insert_seat_list(3,$i.'_'.$j,1);
	}
}

echo "success";
 ?>