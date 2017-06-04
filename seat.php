<!DOCTYPE html>
<html>
<head>
	<title></title>
    <style type="text/css">
div.seatCharts-cell {color: #182C4E;height: 25px;width: 25px;line-height: 25px;margin: 3px;float: left;text-align: center;outline: none;font-size: 13px;} 
div.seatCharts-seat {color: #fff;cursor: pointer;-webkit-border-radius:5px;-moz-border-radius:5px;border-radius: 5px;} 
div.seatCharts-row {height: 35px;} 
div.seatCharts-seat.available {background-color: #B9DEA0;} 
div.seatCharts-seat.focused {background-color: #000000;border: none;} 
div.seatCharts-seat.selected {background-color: #E6CAC4;} 
div.seatCharts-seat.unavailable {background-color: #472B34;cursor: not-allowed;} 
div.seatCharts-container {width: 400px;padding: 20px;} 
div.seatCharts-legend {padding-left: 0px;position: absolute;bottom: 16px;} 
ul.seatCharts-legendList {padding-left: 0px;} 
.seatCharts-legendItem{float:left; width:90px;margin-top: 10px;line-height: 2;} 
.checkout-button {display: block;width:80px; height:24px; line-height:20px;margin: 10px auto;border:1px solid #999;font-size: 14px; cursor:pointer} 
#selected-seats {max-height: 150px;overflow-y: auto;overflow-x: none;width: 200px;} 
#selected-seats li{float:left; width:72px; height:26px; line-height:26px; border:1px solid #d3d3d3; background:#f7f7f7; margin:6px; font-size:14px; font-weight:bold; text-align:center} 
    </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.seat-charts.js"></script> 
<body>
    <form action="action.php" method="post">
        <input type="hidden" name="action" value="studentPickSeat">
        <input type="hidden" name="seat" id ="seatchose" value ="">
        <input type="hidden" name="dorm" value="2">
	<div class="demo"> 
       <div id="seat-map"></div> 
    </div> 
    <input type="submit" name="go">
    </form>
</body>
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
                        'ff_ff',
                        'ff_ff',
                        'ee_ee',
                        'ee_ee',
                        'ee___',
                        'ee_ee',
                        'ee_ee',
                        'ee_ee',
                        'eeeee',
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
                }
            };
        }
        

</script>
</html>