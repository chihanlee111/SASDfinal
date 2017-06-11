<?php 
require("function.php");
$student =check_login(false);//if need to force login pass in true not for false
check_temp_leave();
if(! isset($_SESSION['studentId'])){
  header("location: login.php");
}
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
    <script type="text/javascript" src="js/jquery.seat-charts.js"></script> 

    <style>
      body{
        font-family:微軟正黑體;
        background-color: #ABD0CE;
      }
    </style>
    <style type="text/css">
div.seatCharts-cell {color: #182C4E;height: 25px;width: 25px;line-height: 25px;margin: 3px;float: left;text-align: center;outline: none;font-size: 13px;} 
div.seatCharts-seat {color: #fff;cursor: pointer;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius: 5px;} 
div.seatCharts-row {height: 35px;} 
div.seatCharts-seat.available {background-color: #B9DEA0;} 
div.seatCharts-seat.focused {background-color: #000000;border: none;} 
div.seatCharts-seat.selected {background-color: #E6CAC4;} 
div.seatCharts-seat.unavailable {background-color: #472B34;cursor: not-allowed;} 
div.seatCharts-container {width: 400px;padding: 20px; margin-left: 20px;} 
div.seatCharts-legend {padding-left: 0px;position: absolute;bottom: 16px;} 
ul.seatCharts-legendList {padding-left: 0px;} 
.seatCharts-legendItem{float:left; width:90px;margin-top: 10px;line-height: 2;} 
.checkout-button {display: block;width:80px; height:24px; line-height:20px;margin: 10px auto;border:1px solid #999;font-size: 14px; cursor:pointer} 
#selected-seats {max-height: 150px;overflow-y: auto;overflow-x: none;width: 200px;} 
#selected-seats li{float:left; width:72px; height:26px; line-height:26px; border:1px solid #d3d3d3; background:#f7f7f7; margin:6px; font-size:14px; font-weight:bold; text-align:center} 
    </style>
  
 
  </head>

  <body>
  <?php 
  $status = get_student_current_status($_SESSION['studentId']);
  if($status==null){
    echo "<input type='hidden' name='status' value='noseat' id='status'>";
  }
  else if($status['status'] ==3){
    echo "<input type='hidden' name='status' value='templeave' id='status'>";
  }else{echo "<input type='hidden' name='status' value='haveseat' id='status'>";}
   ?>
    <div class="container">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <nav>
          <ul class="nav nav-pills pull-right">
            <?php if(isset($_SESSION['studentId'])){ ?>
              <form action="action.php" method="post" id="logout_form">
               <input type="hidden" name="action" value="logout">
              </form>
              <li><a href="#"><?php echo $student['studentId'] ?></a></li>
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
            <form action="action.php" method="post" id = "tosendform">
        <input type="hidden" name="action" id="action" value="studentPickSeat">
        <input type="hidden" name="from" value="male">
        <input type="hidden" name="seat" id ="seatchose" value ="">
        <input type="hidden" name="dorm" value="2">
  <div class="demo"> 
       <div id="seat-map"></div> 
    </div> 
              <input type="button" id="choose" onclick="choseAction(this)" value="選取座位">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="button" id="leave" onclick="choseAction(this)" value="暫時離開">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input type="button" id="choose" onclick="choseAction(this)" value="取消暫離">
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="button" id="cancel" onclick="choseAction(this)" value="取消座位">
    </form>
</body>
          </div>
        
      </div>

     
     

      
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 div3">
        <p style="color: white;">&copy; created by 系統小組team8 </p>
      </div>

    </div> 


 <script type="text/javascript"><?php if(isset($_SESSION['message'])){ ?>
    <?php echo "alert('{$_SESSION['message']}')"; unset($_SESSION['message']); ?>
<?php } ?>
 </script>
    <script src="/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
            var firstSeatLabel  = 1;
            var dorm = 2;
            $(document).ready(function() {
                var $cart = $('#selected-seats'),
                    $counter = $('#counter'),
                    $total = $('#total'),
                    $seatChose = $('#seatchose'),
                    sc = $('#seat-map').seatCharts({
                    map: [
                        'ffff_ffff',
                        'ffff_ffff',
                        '',
                        'ffff_ffff',
                        'ffff_ffff',
                    ],
                    naming : {
                        top : false,
                        getLabel : function (character, row, column) {
                            return firstSeatLabel++;
                        },
                    },
                    legend : {
                        node : $('#legend'),
                        items : [
                            [ 'f', 'available',   'First Class' ],
                            [ 'e', 'available',   'Economy Class'],
                            [ 'f', 'unavailable', 'Already Booked']
                        ]                   
                    },
                    click: function () {
                        if (this.status() == 'available') {
                            if($seatChose.val() != ""){
                                sc.status($seatChose.val(),'available');
                            }
                            $seatChose.val(this.node().attr('id'));
                            return 'selected';
                        } else if (this.status() == 'selected') {
                            $seatChose.val("");
                            return 'available';
                        } else if (this.status() == 'unavailable') {
                            //seat has been already booked
                            return 'unavailable';
                        } else {
                            return this.style();
                        }
                    }
                });

                //this will handle "[cancel]" link clicks
                $('#selected-seats').on('click', '.cancel-cart-item', function () {
                    //let's just trigger Click event on the appropriate seat, so we don't have to repeat the logic here
                    sc.get($(this).parents('li:first').data('seatId')).click();
                });
                updateSeatList(sc);
                //let's pretend some seats have already been booked
        
        });

        function recalculateTotal(sc) {
            var total = 0;
        
            //basically find every selected seat and sum its price
            sc.find('selected').each(function () {
                total += this.data().price;
            });
            
            return total;
        }
        function updateSeatList(sc){
            var xhttp = new XMLHttpRequest();
            var parm = "action=getSeatList&dorm=2";
            xhttp.open("POST", "action.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(parm);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var seatList = JSON.parse(this.responseText);
                    console.log(this.responseText);
                    sc.get(seatList).status('unavailable');
                    console.log(seatList.length);//unavailable seat count
                }
            };
        }
        function choseAction(input){
          var action = document.getElementById('action');
          var form = document.getElementById('tosendform');
          if(input.value == '選取座位'){
            action.value = 'studentPickSeat';
          }else if (input.value == '暫時離開'){
            action.value = 'studentTempLeave';

          }else if(input.value == '取消暫離'){
            action.value = 'tempLeaveBack';
          }
          else if(input.value == '取消座位'){
            action.value = 'studentLeaveSeat';

          }
          checkForm();
        }
        function checkForm(){
          var action = document.getElementById('action');
          var choseSeat = document.getElementById('seatchose');
          var status = document.getElementById('status');
          if(action.value == 'studentPickSeat'){
             
               if(status.value == 'haveseat'){
                alert("已有預訂的座位 , 請取消後再選位");
                exit();
              } else if(choseSeat.value ==''){
                alert("請先選座位");
                exit();
              }
              if(choseSeat.value != ''){document.getElementById('tosendform').submit();}
          }else if (action.value =='studentTempLeave'){
              if(status.value =='noseat'){
                 alert("請先選座位");
              }else if(status.value=='templeave'){
                alert("已登記暫時離開");
              }
              else{document.getElementById('tosendform').submit();}
          }
          else if (action.value == 'studentLeaveSeat'){
              if(status.value =='noseat'){
                 alert("請先選座位");
              }else{document.getElementById('tosendform').submit();}
          }else if (action.value == 'tempLeaveBack'){
              if(status.value == 'noseat'){
                alert("請先選座位");
              }else if(status.value =='templeave'){
                document.getElementById('tosendform').submit();
              }else{ alert("已取消暫離");}
          }
        }
        

</script>
  </body>
</html>