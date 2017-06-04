<?php 
require("function.php");
$conn = make_db_connection();
$user = get_student_current_status($_SESSION['studentId']);
insert_into_history($user);




 ?>