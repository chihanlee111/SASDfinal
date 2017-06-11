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
			echo get_unavailable_seat_list($_POST['dorm']);
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
					$_SESSION['message'] = "已登記座位";
					header("location: ".$_POST['from'].".php");
					exit();
			}
			$seat = get_seat_by_ColRow($_POST['dorm'] ,$_POST['seat']);
			if($seat['status'] =='0'){
				$_SESSION['message'] = "座位已被登記 , 請選擇其他座位";
				header("location: ".$_POST['from'].".php");
				exit();
			}
			modify_seat_status($seat['seatId'], "taken");
			insert_into_current($seat['seatId'], $_SESSION['studentId']);
			$_SESSION['message'] = "座位登記成功";
			header("location: ".$_POST['from'].".php");
			break;
		case 'studentLeaveSeat':
			if(($user = get_student_current_status($_SESSION['studentId']))==null){
				$_SESSION['message'] = "尚未登記座位";
				header("location: ".$_POST['from'].".php");
				die();
			}
			modify_seat_status($user['seatId'], "available");
			delete_from_current($_SESSION['studentId']);
			insert_into_history($user);
			$_SESSION['message'] = "已取消座位";
			header("location: ".$_POST['from'].".php");
			break;
		case 'studentTempLeave':
			if(get_student_current_status($_SESSION['studentId'])['status']==3){
				$_SESSION['message'] = "已登記暫時離開";
				header("location: ".$_POST['from'].".php");
				die();
			}
			modify_user_status($_SESSION['studentId'] , 3);
			update_temp_time($_SESSION['studentId'] , 'NOW');
			$_SESSION['message'] = "已登記暫時離開";
			header("location: ".$_POST['from'].".php");
			break;
		case 'tempLeaveBack':
			modify_user_status($_SESSION['studentId'] , 0);
			update_temp_time($_SESSION['studentId'] , 'NULL');
			$_SESSION['message'] = "已取消暫離";
			header("location: ".$_POST['from'].".php");
			break;
		case 'getSeatList':
			$seatJson = get_unavailable_seat_list($_POST['dorm']);
			echo $seatJson;
			exit();
		case 'logout':
			 unset($_SESSION['studentId']);
			 $_SESSION['message'] = "登出成功";
			 header('location: home.php');
			break;
		default:
			header('Location: error.php');
			break;
	}
}
 ?>

