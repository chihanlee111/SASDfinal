<?php 
require("function.php");
$student =check_login(false);//if need to force login pass in true not for false
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
  </head>

  <body>

    <div class="container">
      <div class="col-lg-12">
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

     
      <div class="col-lg-12">
        <img src="home.jpg" class="picture">
      </div>
  


      <div class="col-lg-2 div1">
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
        <h1>國立台灣科技大學自修室使用須知</h1>
        <p>第一條&nbsp;&nbsp;&nbsp;國立台灣科技大學自修室(以下簡稱本室)為維護閱覽秩序，特訂定本規則。</p>
        <p>第二條&nbsp;&nbsp;&nbsp;本室之使用人應具備下列資格：</p>
        <p>一、本校教職員工生、退休教職員、校友及教職員工之眷屬。</p>
        <p>二、本校附屬中學之教職員工生。</p>
        <p>第三條&nbsp;&nbsp;&nbsp;本室開放時間如下：</p>
        <p>一、學期中：</p>
        <p>（一）週一至週日：上午八時三十分至下午十一時。</p>
        <p>（二）每週一上午八時至十二時為清潔時間，不開放。</p>
        <p>二、寒暑假期間開放時間另行公告。</p>
        <p>三、國定、校定及彈性放假日不開放。</p>
        <p>四、遇有特殊情況時，本室得於事先公告後，變更開放使用時間。</p>
        <p>第四條&nbsp;&nbsp;&nbsp;進入本室應衣履整齊、保持肅靜、維護環境清潔，並不得攜帶飲料食物，不得吸菸，且不得以物品佔位。</p>
        <p>第五條&nbsp;&nbsp;&nbsp;本規則未盡之事宜，悉依本室相關規定辦理。如違反相關規定，經規勸無效者，本室得請其立即離館。</p>
        <p>第六條&nbsp;&nbsp;&nbsp;本規則經本校諮詢委員會通過後，陳請  校長核定後實施。</p>
        
      </div>

     

      <div class="col-lg-12 div3">
        <p>&copy; created by 系統小組team8 </p>
      </div>

    </div> 
    

 
    <script src="/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>