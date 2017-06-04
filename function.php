<?php 
session_start();
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
function check_login($force){//force is true if need to force login
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
		return ['message' => "PASSWORD NOT MATCH"];
	}
	//do pattern check
	$conn = make_db_connection();
	if(get_student_by_email($email) !=null){
		//email is taken
		return ['message' => "EMAIL ALREADY EXISTED"];
	}
	$sql = "INSERT INTO student(studentId, studentName, email, password, studentClass) VALUE('$studentId', '$studentName', '$email', '$password', '$studentClass')";
	$result = $conn->query($sql);
	if($result !=true){
		echo $sql;
		return ['message' => "REGISTER ERROR"];
	}
	$student = get_student_by_email($email);
	return $student;
}


function get_unavailable_seat_list($dorm){
	$conn = make_db_connection();
	$dorm = real_escape_string($dorm);
	$result=$conn->query("SELECT * FROM seat WHERE status = '0' AND dorm='$dorm'");// return all the seat which is unavailable
	$seatList = array();
	$i=-1;
	while($seat = $result->fetch_assoc()){
		$i++;
		$seatList[$i] = $seat['seatColRow'];
	}
	return json_encode($seatList);
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
function get_seat_by_ColRow($dorm,$seatColRow){
	$conn = make_db_connection();
	$seatColRow = real_escape_string($seatColRow);
	$result =$conn->query("SELECT * FROM seat WHERE dorm='$dorm' AND seatColRow='$seatColRow'");
	if(($seat=$result->fetch_assoc())==null){
		return ['message' => "SEAT INDEX ERROR"];
	}
	return $seat;
}
function modify_seat_status($seatId, $seatStatus){//seatstatus <available or taken>
	$conn = make_db_connection();
	$dorm = real_escape_string($dorm);
	$seatId = real_escape_string($seatId);
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
function insert_into_current($seatId, $studentId){//not yet define status.
	$conn = make_db_connection();
	$result = $conn->query("INSERT INTO currentUser(studentId , seatId , status) VALUE ('$studentId , $seatId', '0')");
}
function get_student_current_status($studentId){
	$conn = make_db_connection();
	$result = $conn->query("SELECT * FROM currentUser WHERE studentId='$studentId'");
	$currentStudent = $result->fetch_assoc();
	return $currentStudent;
}
function delete_from_current($studentId){
	$user = get_student_current_status($studentId);
	$conn = make_db_connection();
	$result = $conn->query("DELETE FROM currentUser WHERE studentId='$studentId'");
}
function insert_into_history($current){
	$conn = make_db_connection();
	$result = $conn->query("INSERT INTO UseHistory(studentId, seatId, startTime) VALUE ('{$current['studentId']}' , '{$current['seatId']}' , '{$current['starttime']}')");
}
function check_temp_leave(){
	$conn = make_db_connection();
	$result = $conn->query("SELECT * FROM currentUser WHERE status = '3';");//status code is not sure
	while($user = $result->fetch_assoc()){
		if($user['status'] == 1 AND false){//currenttime - startime >= An hour
			modify_seat_status($seatId,"available");
			delete_from_current($studentId);
		}
	}
}
 ?>


