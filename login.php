<?php 
require("function.php");
$student =check_login(false);//if need to force login pass in true not for false
if(isset($_SESSION['studentId'])){header("location: home.php");}
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
      <div class="col-lg-12">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li><a href="#">登入</a></li>
            <li><a href="register.php">註冊</a></li>
          </ul>
        </nav>
        <h3 class="text-muted" style="font-weight:900;color:#0044BB ">台科自修室管理系統</h3>
      </div>

     
      <div class="col-lg-12">
        <img src="home.jpg" class="picture">
      </div>
  


      <div class="col-lg-2 div1">
        <table>
          <tr>
            <td><a href="home.php" style="color: black;text-decoration:none;">首頁</a></td>
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
                <td><a href="#" style="color: black;text-decoration:none;">&nbsp;&nbsp;&nbsp;-男宿</a></td>
              </tr>
              <tr>
                <td><a href="#" style="color: black;text-decoration:none;">&nbsp;&nbsp;&nbsp;-女宿</a></td>
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




      <div class="col-lg-10 div2">
        <center>
          <div style="margin-top: 100px">
            <form action="action.php" method="post">
              <label for="studentId">studentID</label>
              <br>
              <input type="text" name="studentId" placeholder="輸入學號" pattern=".{9,9}">
              <input type="hidden" name="action" value="log_in">
              <br>
              <label for="password">password</label>
              <br>
              <input type="password" name="password" placeholder="密碼" pattern="(?=.*\d)(?=.*[a-z]).{8,}">
              <br><br>
              <button type="submit">submit</button>
            </form>
          </div>
        </center>
        
      </div>

     

      <div class="col-lg-12 div3">
        <p>&copy; created by 系統小組team8 </p>
      </div>

    </div> 


 
    <script src="/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>