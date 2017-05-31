<script type="text/javascript">
<!--
selectedSeats = [[0,17],[0,18],[0,17],[0,14],[0,13],[0,9],[0,11],[0,10],[0,9],[0,8],[0,10],[0,9],[0,8],[0,7],[0,9],[0,4],[0,3],[0,0],[1,19],[1,20],[1,19],[1,16],[1,15],[1,4],[1,3],[1,0],[2,19],[2,20],[2,19],[2,16],[2,15],[2,4],[2,3],[2,0],[3,19],[3,20],[3,19],[3,16],[3,15],[3,4],[3,3],[3,0],[4,19],[4,20],[4,19],[4,16],[4,15],[4,4],[4,3],[4,0],[5,19],[5,20],[5,19],[5,16],[5,15],[5,4],[5,3],[5,0],[6,19],[6,20],[6,19],[6,16],[6,15],[6,4],[6,3],[6,0],[7,19],[7,20],[7,19],[7,16],[7,15],[7,4],[7,3],[7,2],[7,4],[7,1],[7,3],[7,0],[7,2],[7,-1],[7,1],[7,0],[8,21],[8,22],[8,21],[8,16],[8,15],[8,10],[8,12],[8,9],[8,11],[8,8],[8,10],[8,7],[8,9],[8,6],[8,8],[8,4],[8,3],[8,0],[9,21],[9,22],[9,21],[9,16],[9,15],[9,4],[9,3],[9,0],[10,21],[10,22],[10,21],[10,16],[10,15],[10,4],[10,3],[10,0],[11,21],[11,22],[11,21],[11,16],[11,15],[11,4],[11,3],[11,0]];
var seatQty = 1;
var ticketQty = 1;
var seatIdxList = document.iBookingForm.seatIdxList.value;
var selectedPaymentChannelId = "";
var isBankActivity = "";
var $ = jQuery.noConflict();

$("#appEventPageTd").click(function(){ $('#showAPPAd').show(); });
//$("#float_ad").click(function(){ $('#showAPPAd').show(); });
$("#hideAPPAd").click(function(){ $('#showAPPAd').hide(); });
function toDownLoadApp(os) {
	//var url = 'http://travel.ezding.com.tw/event/one_dollar/web.php?utm_source=webbuy-movie&utm_medium=webbuy-movie&utm_campaign=webbuy-movie';
	//if(os == 'I') url = 'http://travel.ezding.com.tw/event/one_dollar/web.php?utm_source=webbuy-movie&utm_medium=webbuy-movie&utm_campaign=webbuy-movie';
	//window.open(url);
	$('#showAPPAd').hide();
}

function doSelectSeat(theImg, rowIdx, seatIdx, initSelected){
	
    if(theImg.isSelected == undefined){
        theImg.isSelected = initSelected;
    }

    if (theImg.isSelected == 0){
	   if(seatQty < ticketQty){
	       theImg.src="/images/selected.gif";
	       theImg.isSelected = 1;
	       seatQty++;
	       seatIdxList += rowIdx + "-" + seatIdx + ",";
	   }
	   else{
	       alert('如欲重新選位, 請先將系統爲您選擇的紅色座位，點選成灰色後, 再依據訂票數量, 點選其他灰色座位，使座位變成紅色');
	   }
	}
	else{
        theImg.src="/images/available.gif";
        theImg.isSelected = 0;
        seatQty--;       
        seatIdxList = seatIdxList.replace(rowIdx + "-" + seatIdx + ",", "");       
	}
	document.iBookingForm.seatIdxList.value = seatIdxList;
}

function chkSubmit(inForm) {
	
	if(seatQty > ticketQty){
	   alert('您的選位數量已超過你的訂票數量');
	   return false;
	}
    
	if(seatQty < ticketQty){
	   alert('您的選位數量少於你的訂票數量');
	   return false;
	}
	
	// 檢查座位是否相鄰
	//if (!checkSeats())
	//{
	//	alert("請注意，訂購1張電影票請先選擇走道旁或靠牆的座位，謝謝。");
	//	return false;
	//}

    if ( (inForm.paymentPriceDetailId != null) && (inForm.paymentPriceDetailId == undefined))
    {
    	alert(inForm.paymentPriceDetailId);
		return false;
	}
	else
	{
		var adultTicketFlag = false;//頁面是否有原價票選項
		var emome636TicketFlag = false;//頁面是否有636訂票選項
		var bankActivityTicketFlag = false;//頁面是否有銀行贈票活動選項
		
		var bonusTicketType = document.getElementById("bonusTicketType");//銀行紅利訂票選項(預設會出現的選項)
		var activityTicketType = document.getElementById("activityTicketType");//銀行贈票活動選項
		var adultTicketType = document.getElementById("adultTicketType");//原價票選項
        var otherTicketType = document.getElementById("otherTicketType");//636訂票選項
         
        if(activityTicketType != null){
        	bankActivityTicketFlag = true;
        }
        
        if(adultTicketType != null){
        	adultTicketFlag = true;
        }
       	
        if(otherTicketType != null){
        	emome636TicketFlag = true;
        }
		
        var size = document.getElementsByName("selectTicketType").length;
        
        var selected = false;
        for (var i = 0; i < size; i++) {
            if (document.getElementsByName("selectTicketType").item(i).checked) {
                selected = true;
            }
        }
		if(!selected){
			alert("請選擇 優惠方式!! ");
			goStep3();
			return false;
		}
		
		if( bonusTicketType  && bonusTicketType.checked == true){
			var checkFlag = false;
			
			var size2 = document.getElementsByName("paymentPriceDetailId").length;
			
			for(var i=0; i<size2; i++){
				if(document.getElementsByName("paymentPriceDetailId")[i].checked){
					checkFlag = true;
					break;
				}
			}
			if(!checkFlag){
				alert("請選擇 優惠方式!! ");
				goStep3();
				return false;
			}
		}
		
		if(bankActivityTicketFlag == true){
			
			if(activityTicketType.checked == true){
				var checkFlag2 = false;
				
				var size3 = document.getElementsByName("paymentPriceDetailId").length;
				
				
				for(var i=0; i<size3; i++){
					if(document.getElementsByName("paymentPriceDetailId")[i].checked){
						checkFlag2 = true;
						break;
					}
				}
				if(!checkFlag2){
					alert("請選擇 優惠方式!!! ");
					goStep3();
					return false;
				}
			}
		}
	}

    if(inForm.userName.value == ""){
        alert("姓名 未填!! ");
        inForm.userName.focus();
        return false;
    }

    if(inForm.userMsisdn.value == ""){
        alert("手機門號 未填!! ");
        inForm.userMsisdn.focus();
        return false;
    }
    
    if(inForm.userMsisdn.value.length != 10 || 
       inForm.userMsisdn.value.substring(0,2) != "09" || 
       isNaN(inForm.userMsisdn.value))
    {
        alert("手機門號 錯誤!! ");
        inForm.userMsisdn.focus();
        return false;
    }
    
    if ($("#userMsisdn").val() != $("#userMsisdn2").val()) {
    	alert("手機門號確認錯誤，\n\n請再次檢查您輸入的號碼！ ");
    	return false;
    }

    if(inForm.userEmail.value == ""){
        alert("E-mail 未填!! ");
        inForm.userEmail.focus();
        return false;
    }
    
    if(!validEmail(inForm.userEmail.value)){
        alert("E-mail 錯誤!! ");
        inForm.userEmail.focus();
        return false;
    }
    
	
	if($.trim($("#userAml").val()) == "輸入「亞洲萬里通」會員號碼(非必填)" ){
		$("#userAml").val("");
	} else if( $.trim($("#userAml").val()) != "" && $("#userAml").val().length != 10 ) {
        alert("「亞洲萬里通」會員號碼 錯誤!! ");
        $("#userAml").focus();
        return;
	}
    
    
    // 原價票票數檢查
    if (selectedPaymentChannelId == 16    		
    		) {
        var qty = parseInt(0);
    	qty += parseInt($('select#EZADULT').val());qty += parseInt($('select#EZCONCESSION').val());
    	if (qty != 1) {
    		alert("您設定的原價票張數與您剛剛選定的座位數不符，請重新確認原價票張數，若您要異動訂票張數，請先重選場次/數量，系統將幫助您重新選定座位。 ");
            return;
    	}
    }
     
	return true;
}

function goStep3() {
	if(seatQty > ticketQty){
	   alert('您的選位數量已超過你的訂票數量');
	   return;
	}
    
	if(seatQty < ticketQty){
	   alert('您的選位數量少於你的訂票數量');
	   return;
	}
	
	// 檢查座位是否相鄰
	//if (!checkSeats())
	//{
	//	alert("請注意，訂購1張電影票請先選擇走道旁或靠牆的座位，謝謝。");
	//	return;
	//}

    if(iBookingForm.userName.value == ""){
        alert("姓名 未填!! ");
        iBookingForm.userName.focus();
        return;
    }

    if(iBookingForm.userMsisdn.value == ""){
        alert("手機門號 未填!! ");
        iBookingForm.userMsisdn.focus();
        return;
    }
    
    if(iBookingForm.userMsisdn.value.length != 10 || 
       iBookingForm.userMsisdn.value.substring(0,2) != "09" || 
       isNaN(iBookingForm.userMsisdn.value))
    {
        alert("手機門號 錯誤!! ");
        iBookingForm.userMsisdn.focus();
        return;
    }
      
    if (iBookingForm.userMsisdn.value != iBookingForm.userMsisdn2.value)
	{
    	alert("手機門號確認錯誤，\n\n請再次檢查您輸入的號碼！ ");
    	return false;
    }
    
    if(iBookingForm.userEmail.value == ""){
        alert("E-mail 未填!! ");
        iBookingForm.userEmail.focus();
        return;
    }
    
    if(!validEmail(iBookingForm.userEmail.value)){
        alert("E-mail 錯誤!! ");
        iBookingForm.userEmail.focus();
        return;
    }
    
	
        if($.trim($("#userAml").val()) != "") {
        	if($("#userAml").val().length == 10 ) {					
    			$.post(
    				'/ajaxfun', {'func':'chkAmlNo', 'amlNo':$("#userAml").val()}, 
    				function (data)
    		        {			
    					if(data.status != 'ok'){					
    						alert("「亞洲萬里通」會員號碼驗證錯誤!!!!");					
    						iBookingForm.userAml.focus();
    						$("#paymentChannelArea").hide(); 
    						return;
    					}        
    		        },'json'
    			);			
    		} else {
    			alert("「亞洲萬里通」會員號碼錯誤!");					
    			iBookingForm.userAml.focus();
    			$("#paymentChannelArea").hide(); 
    			return;
    		}        
        }
    
    
    //alert("因中國信託信用卡與EZ訂在重新擬定優惠訂票新約，故EZ訂將暫停中國信託信用卡線上付款選項，待合約簽訂後再重新開啟。");

    $("#paymentChannelArea").show();    
    $("#btnArea").show();
    if (jQuery.browser.safari) {
    	$('html body').animate({scrollTop:650}, 1000);
        return false
    } else {
    	$("html body").animate({scrollTop: $("#step3").offset().top}, 1000);
    }
}

function setPayment(pcId) {
	
	isBankActivity = "n";
	selectedPaymentChannelId = pcId;
	$("#buyingTicketsMemo").html($("#pc_" + pcId).html());
	$("#buyingTicketsDesc").show();
	
	$("#visaTicketsMemo").html($("#pc_" + pcId).html());
	$("#visaTicketsDesc").show();
	
	$("#eZBonusTicketsMemo").html($("#pc_" + pcId).html());
	$("#eZBonusTicketsDesc").show();
	
	$("#eZPackageTicketsMemo").html($("#pc_" + pcId).html());
	$("#eZPackageTicketsDesc").show();
	
	paymentNotice(pcId);
}

function setPaymentByBankActivity(pcId){
	isBankActivity = "y";
	selectedPaymentChannelId = pcId;
	$("#bankActivityTicketsMemo").html($("#pc_" + pcId).html());
	$("#bankActivityTicketsDesc").show();
	paymentNotice(pcId);
}

function setCinemaPricePayment(pcId) {
	selectedPaymentChannelId = pcId;
	$("#buyingTicketsMemo2").html($("#pc_" + pcId).html());
	$("#buyingTicketsDesc2").show();
	paymentNotice(pcId);
}

function checkSeats() {
;
	var fAry = new Array();
	var ary = $("#seatIdxList").val().split(",");
	for (i = 0; i < ary.length - 1; i++)
	{
		fAry[i] = false;
		// 座位比對
		var sAry = ary[i].split("-");
		for (j = 0; j < selectedSeats.length; j++)
		{
			// 同一排
			if (sAry[0] == selectedSeats[j][0])
			{
				if (sAry[1] == selectedSeats[j][1])
				{
					fAry[i] = true;
					break;
				}
			}
		}
		// 若選的座位相鄰也可以
		if (!fAry[i])
		{
			for (k = 0; k < ary.length - 1; k++)
			{
				if (k == i) continue;
				var ssAry = ary[k].split("-");
				// 同一排
				if (ssAry[0] == sAry[0]
					&& ((ssAry[1] == (parseInt(sAry[1]) + 1)) || (ssAry[1] == (parseInt(sAry[1]) - 1)))
					)
				{
					fAry[i] = true;
				}
			}
		}
	}
	
	var flag = true;
	for (q = 0; q < fAry.length; q++)
	{
		if (!fAry[q]) flag = false;
	}
	return flag;
}

function GoNext() {		
	if (chkSubmit(iBookingForm))
	{
		$("#form1").submit();				
	}	
}

function paymentNotice(paymentChannelId) {
	switch (paymentChannelId) {
case '27':
alert('請注意!使用國泰世華全卡訂票，取票時不可訂多取少。\n如有訂多取少，視同持卡人自動放棄銀行優惠，將不予退款。\n\n請交易完成前再次確認您的訂購張數，謝謝!');
break;
case '3':
alert('單持美國運通、Costco聯名卡、鈦金卡、家扶聯名卡、廣達聯名卡、澳航聯名卡、iPlan卡、商務卡、Visa金融卡、MASTER 金融卡等不提供紅利點數之信用卡，不適用EZ訂紅利點數訂票服務。 ');
break;
case '24':
alert('若要使用一銀悠遊聯名卡專屬優惠，請選擇「活動贈票」，活動資格及限制請參閱網頁說明或上一銀信用卡官網查詢。');
break;
case '8':
alert('本服務限使用 Visa、Master、JCB 卡，訂票前請記得先與本行確認您的紅利點數是否足夠，若因持卡人點數不足，則將就每張訂票收取60元之作業手續費。');
break;
case '9':
alert('本優惠僅限新光Visa、Master信用卡。新光優惠活動期間，每月兌換量限1500張，換完為止。\n\n請注意，使用新光信用卡確認訂票後，當日訂票額度即會被佔住；若有恢復訂票額度需求，需隔天才可生效，請再次確認您的訂票，謝謝！');
break;
case '29':
alert('若您有符合原子小金剛信用卡、悠遊遊聯名卡、個人商旅卡plus卡友權益資格(前月帳單新增消費達NT$2,000以上)，可選擇活動贈票享銀行補助優惠。');
break;
case '20':
alert('本優惠紅利點數不足無法訂票，訂票後只能全取全退，無法部份退款');
break;
case '33':
alert('本優惠限用VISA金融卡。');
break;
case '34':
alert('本優惠需HAPPY GO點數足夠才可訂票\nHAPPY GO兌點完成且信用卡授權成功才算完成訂票（信用卡不限銀行卡別）');
break;
case '28':
alert('本優惠不適用上海銀行悠遊Debit卡。\n\n若因持卡人點數不足或其他可歸責於持卡人之原因，致本行無法扣得點數，則本行將就每張訂票收取30元之作業手續費，並列帳於信用卡帳單向持卡人收取。');
break;
case '7':
alert('本優惠不適用上海銀行法人卡、公司商務卡及悠遊Debit卡。\n\n若因持卡人點數不足或其他可歸責於持卡人之原因，致本行無法扣得點數，則本行將就每張訂票收取160元之作業手續費，並列帳於信用卡帳單向持卡人收取。');
break;
case '25':
alert('即日起，最多可同時使用優惠序號訂購2張票，若要訂三張票(含)以上，請先將票數改為兩張，用本優惠完成訂票後，加購張數請另外改以原價訂購，謝謝');
break;
case '42':
alert('大眾指定卡單月一般消費滿1,000元可於消費當月享優惠價199元/張，每卡每月限訂購一次2張票。\n不符本優惠資格但使用或購買逾2張優惠票，大眾銀行將收取作業處理費每張60元。');
break;
case '61':
alert('大眾指定卡單月一般消費滿1,000元可於消費當月享優惠價199元/張，每卡每月限訂購一次2張票。\n不符本優惠資格但使用或購買逾2張優惠票，大眾銀行將收取作業處理費每張60元。');
break;
case '43':
alert('渣打現金回饋御璽卡持卡人當月新增消費滿1筆NT$888(含)以上，即可享次月電影票價最高75折優惠。符合活動資格卡友毎卡每月限購8張，本活動優惠每月限量1000張。\n訂購威秀或新光影城，若影城規定之時限內未辦理取消、退票或逾時未取票，將不退還該筆金額，恕不得要求退款或更改其他場次時間。');
break;

		default:
			return true;
	}	
}

$(function(){
	$("input:radio[name='selectTicketType']").click(function(){showTicketTypeArea(this.value);});
	$("input:radio[name='chtChk']").click(function(){webCounter(this.value);});
	
	$('select#EZADULT').change(function(){changeAdultTicketQuantity(this.id, this.value);});
$('select#EZADULT').val(1);
$('select#EZCONCESSION').change(function(){changeAdultTicketQuantity(this.id, this.value);});
$('select#EZCONCESSION').val(0);
$('select#EZADULT').change();














});

showTicketTypeArea = function(ticketType) {
	
	var size = document.getElementsByName("paymentPriceDetailId").length;
    
    for (var i = 0; i < size; i++) {
        if (document.getElementsByName("paymentPriceDetailId").item(i).checked) {
        	document.getElementsByName("paymentPriceDetailId").item(i).checked = false;
        	break;
        }
    }

	$("td#goNextPageTd").show();
	$("td#appEventPageTd").hide();
	if (ticketType == "0") {//紅利訂票
		selectedPaymentChannelId = "";
		$("div#adultTicketsArea").hide();		
		$("div#activityTicketsArea").hide();
		$("div#payeasyArea").hide();
		$("div#eZBonusArea").hide();
		$("div#visaArea").hide();
		$("div#eZPackageArea").hide();
		$("div#ezwcArea").hide();
		$("div#bonusTicketsArea").show();
		
		document.getElementById("action").value = "customer.selected.seats";
	} else if (ticketType == "1") {//銀行活動贈票
		selectedPaymentChannelId = "";
		$("div#bonusTicketsArea").hide();
		$("div#adultTicketsArea").hide();
		$("div#payeasyArea").hide();
		$("div#eZBonusArea").hide();
		$("div#visaArea").hide();
		$("div#eZPackageArea").hide();
		$("div#ezwcArea").hide();
		$("div#activityTicketsArea").show();
		
		document.getElementById("action").value = "customer.bankActivity.verify.page";
	} else if (ticketType == "3") {//PayEasy
		selectedPaymentChannelId = "";
		$("div#bonusTicketsArea").hide();
		$("div#adultTicketsArea").hide();
		$("div#activityTicketsArea").hide();
		$("div#eZBonusArea").hide();
		$("div#visaArea").hide();
		$("div#eZPackageArea").hide();
		$("div#ezwcArea").hide();
		$("div#payeasyArea").show();
		
		document.getElementById("action").value = "customer.bankActivity.verify.page"
	} else if (ticketType == "6") {//ezding紅利點數
		selectedPaymentChannelId = "";	
		$("div#bonusTicketsArea").hide();
		$("div#adultTicketsArea").hide();
		$("div#activityTicketsArea").hide();
		$("div#payeasyArea").hide();
		$("div#visaArea").hide();
		$("div#eZPackageArea").hide();
		$("div#ezwcArea").hide();
		$("div#eZBonusArea").show();

		document.getElementById("action").value = "customer.selected.seats";	
	} else if (ticketType == "7") {//VISA序號
		selectedPaymentChannelId = "";
		$("div#bonusTicketsArea").hide();
		$("div#adultTicketsArea").hide();
		$("div#activityTicketsArea").hide();
		$("div#eZBonusArea").hide();
		$("div#payeasyArea").hide();
		$("div#eZPackageArea").hide();
		$("div#ezwcArea").hide();
		$("div#visaArea").show();
		
		document.getElementById("action").value = "customer.bankActivity.verify.page"
	} else if (ticketType == "8") {// ez訂會員套票
		selectedPaymentChannelId = "";
		$("div#bonusTicketsArea").hide();
		$("div#adultTicketsArea").hide();
		$("div#activityTicketsArea").hide();
		$("div#eZBonusArea").hide();
		$("div#payeasyArea").hide();
		$("div#visaArea").hide();
		$("div#ezwcArea").hide();
		$("div#eZPackageArea").show();
		
		document.getElementById("action").value = "customer.selected.seats"
	} else if (ticketType == "14") {//優惠代碼
		selectedPaymentChannelId = "";
		$("div#bonusTicketsArea").hide();
		$("div#adultTicketsArea").hide();
		$("div#activityTicketsArea").hide();
		$("div#eZBonusArea").hide();
		$("div#visaArea").hide();
		$("div#eZPackageArea").hide();
		$("div#payeasyArea").hide();
		$("div#ezwcArea").show();
		
		document.getElementById("action").value = "customer.bankActivity.verify.page"
	} else {//原價票
		selectedPaymentChannelId = "16";
		$("#buyingTicketsMemo2").html($("#pc_" + selectedPaymentChannelId).html());
	
		$("div#bonusTicketsArea").hide();
		$("div#activityTicketsArea").hide();
		$("div#payeasyArea").hide();
		$("div#eZBonusArea").hide();
		$("div#visaArea").hide();
		$("div#eZPackageArea").hide();
		$("div#ezwcArea").hide();
		$("div#adultTicketsArea").show();
		
		paymentNotice(selectedPaymentChannelId);
		document.getElementById("action").value = "customer.selected.seats";
	}
	
	if (jQuery.browser.safari) {
    	$('html body').animate({scrollTop:650}, 1000);
        return false
    } else {
    	$("html body").animate({scrollTop: $("#step3").offset().top}, 1000);
    }
}

// msisdn, salesChannel, 查詢間期(月), 停權(月), 未取票次數
function dwrCountOverTimeNotCollectedOrdersByUserIdAndSalesChannel() {
	
	if( document.getElementById("userMsisdn").value == ""){
        alert("手機門號 未填!! ");
        document.getElementById("userMsisdn").focus();
        return false;
    }
    
	
    if(document.getElementById("userMsisdn").value.length != 10 
    		|| document.getElementById("userMsisdn").value.substring(0,2) != "09" 
    		|| isNaN(document.getElementById("userMsisdn").value) ) {
        alert("手機門號 錯誤!! ");
        document.getElementById("userMsisdn").focus();
        return false;
    }

    
    if(document.getElementById("userMsisdn").value != document.getElementById("userMsisdn2").value){
    	alert("手機門號確認錯誤，\n\n請再次檢查您輸入的號碼！ ");
    	document.getElementById("userMsisdn").focus();
    	return false;
    }
	    
	
	EzDingWebAjax.countOverTimeNotCollectedOrdersByUserIdAndSalesChannel(
			document.getElementById("userMsisdn").value, 
            "ezdingWEB_ezding_adult", 
            6,
            1,
            4,
            {callback: function(dataFromServer){cbShow(dataFromServer);}}
    );
}
function cbShow(data) {	
    if (data.count >= 4) {
    	alert("您輸入的手機門號半年內已逾時未取票超過3次，門號將被停權至 " + data.suspendTime + "！");
    	location.href = "/welcome.do";
    	return;
    }
    
    //if (data.count == 2) alert("請注意，同一手機門號半年內，若逾時未取票超過3次，門號將會被停權訂票1個月！您目前已經有2次逾時未取票記錄！如有無法取票的情況，請務必先上網至顧客中心自行取消訂票。");
    //if (data.count == 3) alert("請注意，同一手機門號半年內，若逾時未取票超過3次，門號將會被停權訂票1個月！您目前已經有3次逾時未取票記錄！如有無法取票的情況，請務必先上網至顧客中心自行取消訂票。");
    goStep3();
}

function webCounter(countName){
	
	$.post(
		'/ajaxfun', {'func':'web.counter', 'countName':countName}, 
		function (data)
        {				
        },'json'
	);
}


function pausecomp(ms) {
	ms += new Date().getTime();
	while (new Date() < ms){}
}




	changeAdultTicketQuantity = function(id, value) {
	var ticketcount = 0;
	var moneyCount = 0;
if (id == 'EZADULT') $('select#EZADULT').val(value);
if (id != 'EZADULT') $('select#EZADULT').val(1 - value);
ticketcount += parseInt($('select#EZADULT').val());
moneyCount += parseInt($('select#EZADULT').val()) * 290;
$('span#EZADULT_price').text(parseInt($('select#EZADULT').val()) * 290);
if (id == 'EZCONCESSION') $('select#EZCONCESSION').val(value);
if (id != 'EZCONCESSION') $('select#EZCONCESSION').val(1 - value);
ticketcount += parseInt($('select#EZCONCESSION').val());
moneyCount += parseInt($('select#EZCONCESSION').val()) * 250;
$('span#EZCONCESSION_price').text(parseInt($('select#EZCONCESSION').val()) * 250);

	$('span#totalCount').text(ticketcount);
	$('span#totalMoney').text(moneyCount);
}









	$("#cateringCount").change(function() {			
		var total = $('#cateringCount').val() * $('#cateringPrice').text();	
		$('#cateringTotalAmount').text(total);	
	});


//-->      
</script>