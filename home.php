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
    <link rel=stylesheet type="text/css" href="css.css">

    <title>台科自修室管理系統</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">

   
    <link href="/Content/AssetsBS3/examples/jumbotron-narrow.css" rel="stylesheet">

    
    <script src="/Scripts/AssetsBS3/ie-emulation-modes-warning.js"></script>
  
 
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
        <h3 class="text-muted" style="font-weight:900;color:#0044BB ">台科自修室管理系統</h3>
      </div>

     
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <img src="home.jpg" class="picture">
      </div>
  


      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 div1">
        <table>
          <tr>
            <td><a href="#" style="color: black;text-decoration:none;">首頁</a></td>
          </tr>
        </table>
        <table>
          <tr>
            <td><a href="regulation.php" style="color: black;text-decoration:none;">自修室使用須知</a></td>
          </tr>
        </table>
        <table>
          <tr>
            <td style="color: black">座位圖</td>
            <table>
              <tr>
                <td><a href="male.php" style="color: black;text-decoration:none;">&nbsp;&nbsp;&nbsp;-男宿</a></td>
              </tr>
              <tr>
                <td><a href="female.php" style="color: black;text-decoration:none;">&nbsp;&nbsp;&nbsp;-女宿</a></td>
              </tr>
            </table>
        </table>
        <table>
          </tr>
          <tr>
            <td><a href="question.php" style="color: black;text-decoration:none;">常見問題</a></td>
          </tr>
        </table>
        <table>
          <tr>
            <td><a href="contact.php" style="color: black;text-decoration:none;">聯絡我們</a></td>
          </tr>
        </table>
      </div>




      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 div2">
        <center>
          <div style="margin-top: 100px">
            <form action="seat.php" method="post">
              <h1>自修室剩餘座位數</h1>
              <br>
              <br>
              <label for="male_seat" style="font-size: 2em">男宿剩餘座位:30人</label>
              <br>
              <br>
              <label for="female_seat" style="font-size: 2em">女宿剩餘座位:30人</label>
            </form>
          </div>
        
      </div>

     

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div3">
        <p>&copy; created by 系統小組team8 </p>
      </div>

    </div> 


 
    <script src="/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>