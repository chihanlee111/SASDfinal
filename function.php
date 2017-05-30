<?php 
session_start();
class seat{
	public $seatId;
	public $seatCol;
	public $seatRow;
}
function make_db_connection(){
	$conn = new mysqli('localhost' , 'root' , '' , 'mysql');
	$conn->query('SET NAMES utf8;');
	if($conn->connect_error){
		die("db connect error");
	}
	return $conn;
}
function show_error($message) {
    $_SESSION['message'] = $message;
    header('location:/error.php');
    exit();
}
function check_login($force){//force is true if need to force logi
	if(!isset($_SESSION['studentId'])){
		if($force){header("location: login.html");}
		return;
	}
	return get_student_by_studentId($_SESSION['studentId']);//$student may got null when force is false
}
function get_student_by_id_password($studentId, $password){//use for login
	$conn = make_db_connection();
	$studentId = $conn->real_escape_string($studentId);
	$password = $conn->real_escape_string($password);
	$result = $conn->query("SELECT * FROM student WHERE studentId='$studentId' AND password='$password';");
	$student = $result->fetch_assoc();
	if(!$student){
		if(get_student_by_studentId($studentId) ==null){
			return ['message' => "EMAIL WRONG OR ACCOUNT NOT EXIST"];
		}
		else{
			return ['message' => "PASSWORD WRONG"];
		}
	}
	return $student;
}
function get_student_by_email($email){
	$conn =make_db_connection();
	$email = $conn->real_escape_string($email);
	$result = $conn->query("SELECT * FROM student WHERE email='$email'");
	$student= $result->fetch_assoc();
	return $student;

}
function get_student_by_studentId($studentId){
	$conn = make_db_connection();
	$studentId = $conn->real_escape_string($studentId);
	$result = $conn->query("SELECT * FROM student WHERE studentId= '$studentId';");
	$student = $result->fetch_assoc();
	return $student;
}
function register($studentId, $email, $password, $studentClass, $studentName, $re_password){
	if($password != $re_password){
		echo "pnmer";
		return ['message' => "PASSWORD NOT MATCH"];
	}
	//do pattern check
	$conn = make_db_connection();
	if(get_student_by_email($email) !=null){
		//email is taken
		return ['message' => "EMAIL ALREADY EXISTED"];
	}
	$sql = "INSERT INTO student(studentId, studentName, email, password, studentClass) VALUE('$studentId', '$studentName', '$email', '$password', '$studentClass')";
	echo "sql";
	$result = $conn->query($sql);
	if($result !=true){
		echo $sql;
		return ['message' => "REGISTER ERROR"];
	}
	$student = get_student_by_email($email);
	return $student;
}
function get_student_current_status($studentId){
	$conn = make_db_connection();
	$result = $conn->query("SELECT * FROM currentUser WHERE studentId='$studentId'");
	$currentStudent = $result->fetch_assoc();
	return $currentStudent;
}
function get_seat_by_seatId($seatId){
	$conn = make_db_connection();
	$seatId = $conn->real_escape_string($seatId);
	$result = $conn->query("SELECT * FROM seat WHERE seatId='$seatId'");
	if(($seat=$result->fetch_assoc())==null){
		return ['message' => "SEAT INDEX ERROR"];
	}
	return $seat;
}
function get_available_seat_list(){
	$conn = make_db_connection();
	$result=$conn->query("SELECT * FROM seat WHERE status = '1'");
	while($seat = $result->fetch_assoc()){

	}
}
function get_seat_by_col_row($dorm, $seatCol, $seatRow){
	$conn = make_db_connection();
	$result =$conn->query("SELECT * FROM seat WHERE dorm='$dorm' AND seatCol='$seatCol' AND seatRow='$seatRow'");
	if(($seat=$result->fetch_assoc())==null){
		return ['message' => "SEAT INDEX ERROR"];
	}
	return $seat;
}
function student_take_seat($studentId, $seatId){//seat pattern is not sure
	if(get_student_current_status($studentId) != null){
		header("location: status.php");//to_modify
	}
	modify_seat_status($seatId, "taken");
	insert_into_current($seatId, $studentId);
}
function student_leave_seat($studentId, $seatId){
	modify_seat_status($seatId, "available");

}
function student_temp_leave($studentId){

}
function modify_seat_status($seatId, $seatStatus){//seatstatus <available or taken>
	$conn = make_db_connection();
	switch ($seatStatus) {
		case 'taken':
			$status=0;
			break;
		case 'available':
			$status = 1;
			break;
	}
	$result=$conn->query("UPDATE seat SET status='$status' WHERE seatId='$seatId'");
	if($result->num_rows !=1){
		return ['message' => "ERROR"];
	}
	return true;
}
function check_temp_leave(){
	$conn = make_db_connection();
	$result = $conn->query("SELECT * FROM currentUser WHERE status = '3';");//status code is not sure
	while($user = $result->fetch_assoc()){
		if($user['status'] == 1){//currenttime - startime >= An hour
			modify_seat_status($user['seatId'], "available");
			delete_from_current($studentId);
		}
	}
}
function insert_into_current($seatId, $studentId){
	$conn = make_db_connection();
	$result = $conn->query("INSERT INTO currentUser(studentId , seatId) VALUE ('$studentId , $seatId')");
}
function delete_from_current($studentId){
	$user = get_student_current_status($studentId);
	$conn = make_db_connection();
	$result = $conn->query("DELETE FROM currentUser WHERE studentId='$studentId'");
}
function insert_into_history($current){
	$conn = make_db_connection();
	$result = $conn->query("INSERT INTO historyLog(studentId, seatId, startTime) VALUE ('{$current['studentId']}' , '{$current['seatId']}' , '{$current['starttime']}')");
}





 ?>


