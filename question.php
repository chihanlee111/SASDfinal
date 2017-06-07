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
            <td><a href="#" style="color: black;text-decoration:none;">常見問題</a></td>
          </tr>
        </table>
        <table>
          <tr>
            <td><a href="contact.php" style="color: black;text-decoration:none;">聯絡我們</a></td>
          </tr>
        </table>
      </div>




      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 div2">
        <h1>自修室使用常見問題</h1>
        <p>Q：自修室開放時間？</p>
        <p>A：週一至週六：上午 8 時至下午 22時</p>
        <br>
        <p>Q：如何使用自修室？</p>
        <p>A：使用自修室須持本人學生證登記選位，並憑閱覽證刷證進出。</p>
        <br>
        <p>Q:可以帶筆電嗎？有提供電源插座使用嗎？</p>
        <p>A:本室允許攜帶筆電並備有電源插座，該區電源插座僅供閱覽人使用個
        人筆電，禁止以其他私人電器用品進行充電。</p>
        <br>
        <p>Q：暫時離開有時間限制嗎？座位可以保留多久？</p>
        <p>A：暫時離開自修室以 60 分鐘為限（中午 12:31 至 13:00 不列入計時），逾時未歸則視為離館，取消該座位使用權，並將座位開放給其他閱覽人登記使用。</p>
        <br>
        <p>Q：如何使用網路線上預約座位？</p>
        <p>A：凡持有本校學生證之學生，可透過本室網站「自修室預約系統」。輸入學生證號後，系統會顯示可預約之座位，請依自身之需求點選後，再選擇座位號碼即完成預約選位，請注意螢幕顯示之相關資訊，依規定時間使用。</p>
        
      </div>

     

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div3">
        <p>&copy; created by 系統小組team8 </p>
      </div>

    </div> 


 
    <script src="/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>