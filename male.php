<?php 
require("function.php");
$student =check_login(false);//if need to force login pass in true not for false
check_temp_leave();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/Content/AssetsBS3/img/favicon.ico">
    <link rel=stylesheet type="text/css" href="css/css.css">

    <title>台科自修室管理系統</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

   
    <link href="css/jumbotron-narrow.css" rel="stylesheet">

    
    <script src="/Scripts/AssetsBS3/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>
      body{
        font-family:微軟正黑體;
        background-color: #ABD0CE;
      }
    </style>
  
 
  </head>

  <body>

    <div class="container">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <nav>
          <ul class="nav nav-pills pull-right">
            <?php if(isset($_SESSION['studentId'])){ ?>
              <form action="action.php" method="post" id="logout_form">
               <input type="hidden" name="action" value="logout">
              </form>
              <li><a href="status.php"><?php echo $student['studentId'] ?></a></li>
              <li><a href="javascript:$('#logout_form').submit();">登出</a></li>
            <?php }else{?>
              <li><a href="login.php">登入</a></li>
              <li><a href="register.php">註冊</a></li>
            <?php }?>
          </ul>
        </nav>
        <h3 class="text-muted" style="font-weight:900;font-size:30px;color:#444444 ">台科自修室管理系統</h3>
      </div>

     
      <header class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-size: 100% auto">
        <img src="home.jpg" class="picture" >
      </header>

      <div>
      <marquee direction="right" height="22" scrollamount="10" behavior="alternate" style="background-color: black;"><span style="font-size: 18px;color: white;">現在放棄就放暑假囉！</marquee>
      </div>
  


      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 div1">
        <table style="height:30px">
          <tr>
            <td><a href="home.php" style="color: black;text-decoration:none;">首頁</a></td>
          </tr>
        </table>
        <table style="height:30px">
          <tr>
            <td><a href="regulation.php" style="color: black;text-decoration:none;">自修室使用須知</a></td>
          </tr>
        </table>
        <table style="height:30px">
          <tr>
            <td style="color: black;height: 40px;">座位圖&ndash;</td>
          </tr>
          <tr>
            <td><a href="#" style="color: black;text-decoration:none;"><img src="male.png" style="width: 20px;height:20px;">男宿</a></td>
          </tr>
          <tr>
            <td><a href="female.php" style="color: black;text-decoration:none;height: 20px"><img src="female.png" style="width: 20px;height: 20px">女宿</a></td>
          </tr>
        </table>
        <table style="height:30px">
          </tr>
          <tr>
            <td><a href="question.php" style="color: black;text-decoration:none;">常見問題</a></td>
          </tr>
        </table>
        <table style="height:30px">
          <tr>
            <td><a href="contact.php" style="color: black;text-decoration:none;"><img src="callme.png" style="width: 20px;height: 20px">聯絡我們</a></td>
          </tr>
        </table>
        <div style="position:absolute;bottom:10px;">
          &nbsp;&nbsp;&nbsp;<img src="finger_down.png" style="width:30px;height:30px">修理請點我！
          <br><br>
          <a href="http://www.general.ntust.edu.tw/files/11-1012-117.php?Lang=zh-tw" target="_blank"><img src="toolbox.png" title="修繕維護"></a>
        </div>
      </div>

      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 div2">
        <center>
          <div style="margin-top: 100px">
            <h1 style="color: blue">男宿座位圖</h1><br><br>
            <form action="seat.php" method="post">
              <input type="button" id="1" onclick="male_seat(1)" value=" 1 ">
              <input type="button" id="2" onclick="male_seat(2)" value=" 2 ">
              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
              <input type="button" id="3" onclick="male_seat(3)" value=" 3 ">
              <input type="button" id="4" onclick="male_seat(4)" value=" 4 ">
              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
              <input type="button" id="5" onclick="male_seat(5)" value=" 5 ">
              <input type="button" id="6" onclick="male_seat(6)" value=" 6 ">
              <br><br>
              <input type="button" id="7" onclick="male_seat(7)" value=" 7 ">
              <input type="button" id="8" onclick="male_seat(8)" value=" 8 ">
              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
              <input type="button" id="9" onclick="male_seat(9)" value=" 9 ">
              <input type="button" id="10" onclick="male_seat(10)" value="10">
              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
              <input type="button" id="11" onclick="male_seat(11)" value="11">
              <input type="button" id="12" onclick="male_seat(12)" value="12">
              <br><br>
              <input type="button" id="13" onclick="male_seat(13)" value="13">
              <input type="button" id="14" onclick="male_seat(14)" value="14">
              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
              <input type="button" id="15" onclick="male_seat(15)" value="15">
              <input type="button" id="16" onclick="male_seat(16)" value="16">
              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
              <input type="button" id="17" onclick="male_seat(17)" value="17">
              <input type="button" id="18" onclick="male_seat(18)" value="18">
              <br><br>
              <input type="button" id="19" onclick="male_seat(19)" value="19">
              <input type="button" id="20" onclick="male_seat(20)" value="20">
              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
              <input type="button" id="21" onclick="male_seat(21)" value="21">
              <input type="button" id="22" onclick="male_seat(22)" value="22">
              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
              <input type="button" id="23" onclick="male_seat(23)" value="23">
              <input type="button" id="24" onclick="male_seat(24)" value="24">
              <br><br>
              <input type="button" id="25" onclick="male_seat(25)" value="25">
              <input type="button" id="26" onclick="male_seat(26)" value="26">
              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
              <input type="button" id="27" onclick="male_seat(27)" value="27">
              <input type="button" id="28" onclick="male_seat(28)" value="28">
              &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
              <input type="button" id="29" onclick="male_seat(29)" value="29">
              <input type="button" id="30" onclick="male_seat(30)" value="30">
              <br><br><br>
              <input type="submit" id="choose" onclick="choose()" value="選取座位">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="submit" id="leave" onclick="leave()" value="暫時離開">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="submit" id="cancel" onclick="cancel()" value="取消座位">

            </form>
          </div>
        
      </div>

     
     

      
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div3">
        <p style="color: white;">&copy; created by 系統小組team8 </p>
      </div>

    </div> 


 
    <script src="/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>