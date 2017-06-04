<?php //表單處理
require("function.php");
if(!isset($_SESSION['studentId'])){//student 登入之前
	switch($_POST['action']){
		case 'log_in'://log_in
			if(!isset($_POST['studentId']) OR !isset($_POST['password'])){
				header("Location: login.php");
			}
			$student = get_student_by_id_password($_POST['studentId'], $_POST['password']);

			break;
		case 'register'://register
			// $student = register($_POST['studentId'], $_POST['email'], $_POST['password'], $_POST['studentClass'] ,$_POST['studentName'] , $_POST['re_password']);
			$student = register($_POST['studentId'], $_POST['email'], $_POST['password'],$_POST['re_password']);
			break;
		case 'getSeatList':
			echo get_unavailable_seat_list();
			exit();
	}
	$_SESSION['studentId']= $student['studentId'];
	echo "success";
	echo $_SESSION['studentId'];
	header('Location: home.php');
}
else{//student 登入之後
	switch ($_POST['action']) {
		case 'updateUserInfo':
			break;
		case 'studentPickSeat':
			if(get_student_current_status($_SESSION['studentId']) != null){
					echo "Already have a seat";
					header("location: status.php");//to_modify
			}
			$seat = get_seat_by_ColRow($_POST['dorm'] ,$_POST['seat']);
			if($seat['status'] =='0'){//seat is been taken
				echo "request time out";
				header("location: home.php");
			}
			modify_seat_status($seat['seatId'], "taken");
			insert_into_current($seat['seatId'], $_SESSION['studentId']);
			break;
		case 'studentLeaveSeat':
			if(($user = get_student_current_status($_SESSION['studentId']))==null){
				echo "You have not take a seat";
			}
			modify_seat_status($user['seatId'], "available");
			delete_from_current($_SESSION['studentId']);
			insert_into_history($user);
			break;
		case 'studentTempLeave':
			break;
		case 'tempLeaveBack':
			break;
		case 'getSeatList':
			$seatJson = get_unavailable_seat_list();
			echo $seatJson;
			exit();
		case 'logout':
			 unset($_SESSION['studentId']);
			 header('location: login.php');
			break;
		default:
			header('Location: error.php');
			break;
	}
}
 ?>

