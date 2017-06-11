<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>歡迎光臨</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
        .bg {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: -999;
        }
        .img1 {
            position:absolute;
            min-height: 100%;
            min-width: 1000px;
            width: 100%;
            z-index:1;
        }
        .img2{
            position:absolute;
            width:200px;
            height:150px;
            z-index:2;
        }

    </style>
</head>
<body>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="bg">
            <img src="index.png" class="img1" title="點擊校徽進入網站">
            <a href="home.php"><img src="NTUST.png" class="img2" title="點擊進入系統"></a>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>