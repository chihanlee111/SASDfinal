<?php 
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
			$student = register($_POST['studentId'], $_POST['email'], $_POST['password'], "un_know","un_know", $_POST['re_password']);
			break;
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
			$_SESSION['seatId']=$seat['seatId'];
			break;
		case 'studentLeaveSeat':
			unset($_SESSION['seatId']);
			break;
		case 'studentTempLeave':
			break;
		case 'tempLeaveBack':
			break;
		case 'logout':
			 unset($_SESSION['studentId']);
			 unset($_SESSION['seatId']);
			 header('location: home.php');
			break;
		default:
			header('Location: error.php');
			break;
	}
}
 ?>

