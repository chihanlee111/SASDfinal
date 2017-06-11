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
            <td><a href="male.php" style="color: black;text-decoration:none;"><img src="male.png" style="width: 20px;height:20px;">男宿</a></td>
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
            <td><a href="#" style="color: black;text-decoration:none;"><img src="callme.png" style="width: 20px;height: 20px">聯絡我們</a></td>
          </tr>
        </table>
        <div style="position:absolute;bottom:10px;">
          &nbsp;&nbsp;&nbsp;<img src="finger_down.png" style="width:30px;height:30px">修理請點我！
          <br><br>
          <a href="http://www.general.ntust.edu.tw/files/11-1012-117.php?Lang=zh-tw" target="_blank"><img src="toolbox.png" title="修繕維護"></a>
        </div>
      </div>




      <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 div2">
        <h1>聯絡我們</h1>
        <table style="width: 100%;">
          <tr valign="middle">
            <th>&nbsp;</th>
            <th style="width: 6px"></th>
            <th></th>
          </tr>
          <tr valign="middle">
            <td style="height: 26px" width="5%">
            </td>
            <td align="left" style="width: 69px; height: 26px"><span style="text-decoration: underline">聯絡對象</span></td>
            <td align="left" style="height: 26px">
                <span style="text-decoration: underline">
                連絡電話</span></td>
            <td align="left"  style="height: 26px">
                &nbsp;<span style="text-decoration: underline">Email </span>
            </td>
            <td align="left" scope="row" style="width: 6px; height: 26px">
            </td>
            <td align="left" scope="row" style="height: 26px">
                &nbsp;<span style="text-decoration: underline">備 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp; 註</span></td>
          </tr>
          <tr valign="middle">
            <td scope="row" style="height: 36px">
                &nbsp;</td>
            <td align="left" scope="row" style="height: 36px; width: 69px;">
                <span style="font-size: 9pt; color: #000000">校長室</span></td>
            <td align="left" scope="row" style="height: 36px">
                02-27376101</td>
            <td align="left" scope="row" style="height: 36px">
                <span style="font-size: 9pt">president@mail.ntust.edu.tw<br />
                    </span></td>
            <td align="left" scope="row" style="width: 6px; height: 36px">
            </td>
            <td align="left" style="height: 36px">
                <span style="font-size: 9pt">有任何疑難雜症，找校長就對了。
                    </span></td>
          </tr>
          <tr valign="middle">
            <td scope="row" width="5%" style="height: 36px">
                &nbsp;</td>
            <td align="left" style="height: 36px; width: 69px;">
                    <span style="font-size: 9pt">吳先生</span></td>
            <td align="left" scope="row" style="height: 36px">
                02-27376134</td>
            <td align="left" scope="row" style="height: 36px">
                <span style="font-size: 9pt">
                whh@mail.ntust.edu.tw<br />
                </span>
            </td>
            <td align="left" scope="row" style="width: 6px; height: 36px">
            </td>
            <td align="left" scope="row" style="height: 36px">
            </td>
          </tr>
          <tr valign="middle">
            <td scope="row" style="height: 36px">
                &nbsp;</td>
            <td align="left" scope="row" style="height: 36px; width: 69px;">
                <span><span style="font-size: 9pt; color: #000000">謝教官</span></span></td>
            <td align="left" scope="row" style="height: 36px">
                02-27376291</td>
            <td align="left" scope="row" style="height: 36px">
                <span style="font-size: 9pt">weiwei7299@mail.ntust.edu.tw<br />
                    </span></td>
            <td align="left" scope="row" style="width: 6px; height: 36px">
            </td>
            <td align="left" style="height: 36px">
                <span style="font-size: 9pt">
                    同學如要報修，請至學生三舍宿管中心登記報修。</span></td>
          </tr>
          <tr valign="middle">
            <td scope="row" style="height: 36px">
                &nbsp;</td>
            <td align="left" scope="row" style="height: 36px; width: 69px;">
                <span style="font-size: 9pt; color: #000000">營繕組</span></td>
            <td align="left" scope="row" style="height: 36px">
                02-27333141</td>
            <td align="left" scope="row" style="height: 36px">
                <span style="font-size: 9pt">&nbsp;<br>
                    </span></td>
            <td align="left" scope="row" style="width: 6px; height: 36px">
            </td>
            <td align="left" style="height: 36px">
                <span style="font-size: 9pt">
                    &nbsp;</span></td>
          </tr>
          <tr valign="middle">
            <td scope="row" style="height: 36px">
                &nbsp;</td>
            <td align="left" scope="row" style="height: 36px; width: 69px;">
                <span style="font-size: 9pt; color: #000000">學務處</span></td>
            <td align="left" scope="row" style="height: 36px">
                02-27332886</td>
            <td align="left" scope="row" style="height: 36px">
                <span style="font-size: 9pt">mailto:guidance@mail.ntust.edu.tw<br />
                    </span></td>
            <td align="left" scope="row" style="width: 6px; height: 36px">
            </td>
            <td align="left" style="height: 36px">
                <span style="font-size: 9pt">&nbsp;
                    </span></td>
          </tr>
          <tr valign="middle">
            <td scope="row" style="height: 36px">
                &nbsp;</td>
            <td align="left" scope="row" style="height: 36px; width: 69px;">
                <span style="font-size: 9pt; color: #000000">教務處</span></td>
            <td align="left" scope="row" style="height: 36px">
                02-2733-3141</td>
            <td align="left" scope="row" style="height: 36px">
                <span style="font-size: 9pt">&nbsp;<br>
                    </span></td>
            <td align="left" scope="row" style="width: 6px; height: 36px">
            </td>
            <td align="left" style="height: 36px">
                <span style="font-size: 9pt">&nbsp;
                    </span></td>
          </tr>
          


        </table>
      </div>

     

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div3">
        <p style="color: white;">&copy; created by 系統小組team8 </p>
      </div>

    </div> 


 
    <script src="/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>