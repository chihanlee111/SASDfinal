<p>This is index.php</p>
<?php 
header("location: welcome.php");
session_start();
require("function.php");
check_login(false);//if need to force login pass in true not for false
 ?>