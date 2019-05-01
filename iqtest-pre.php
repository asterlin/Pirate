<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>iqtest-pre</title>
	<link rel="stylesheet" href="css/iqtest-pre.css">
	<!--  -->
	<link rel="stylesheet" href="css/wavebtn.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<!--  -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<style type="text/css">
		#hi{
			position: fixed;
		    left: 200px;
		    top: 200px;
		    width: 30px;
		    height: 30px;
		    z-index: 20;
		}
	</style>
</head>
<body>
	<div class="fontbox1">
		<img class="fonts y1" src="image/iqtest/font/s001.png" alt="font">
		<img class="fonts y2" src="image/iqtest/font/s002.png" alt="font">
		<img class="fonts y3" src="image/iqtest/font/s003.png" alt="font">
		<img class="fonts y4" src="image/iqtest/font/s004.png" alt="font">
		<img class="fonts y5" src="image/iqtest/font/s005.png" alt="font">
		<img class="fonts y6" src="image/iqtest/font/s006.png" alt="font">
		<img class="fonts y7" src="image/iqtest/font/s007.png" alt="font">
		<img class="fonts y8" src="image/iqtest/font/s008.png" alt="font">
		<img class="fonts y9" src="image/iqtest/font/s009.png" alt="font">
	</div>
	<div class="fontbox2">
		<img class="fonts z1" src="image/iqtest/font/001.png" alt="font">
		<img class="fonts z2" src="image/iqtest/font/002.png" alt="font">
		<img class="fonts z3" src="image/iqtest/font/003.png" alt="font">
		<img class="fonts z4" src="image/iqtest/font/004.png" alt="font">
		<img class="fonts z5" src="image/iqtest/font/005.png" alt="font">
		<img class="fonts z6" src="image/iqtest/font/006.png" alt="font">
	</div>
	<div class="iqbtn">
		<a href="iqtest.php">
			<img src="image/iqtest/qabtn0.png" alt="btn">
		</a>
	</div>
	<div id="bubbles">
        <div class="bubble x1"></div>
        <div class="bubble x2"></div>
        <div class="bubble x3"></div>
        <div class="bubble x4"></div>
        <div class="bubble x5"></div>
        <div class="bubble x6"></div>
        <div class="bubble x7"></div>
        <div class="bubble x8"></div>
        <div class="bubble x9"></div>
        <div class="bubble x10"></div>
        <div class="bubble x11"></div>
        <div class="bubble x12"></div>
        <div class="bubble x13"></div>
        <div class="bubble x14"></div>
        <div class="bubble x15"></div>
        <div class="bubble x16"></div>
        <div class="bubble x17"></div>
        <div class="bubble x18"></div>
        <div class="bubble x19"></div>
        <div class="bubble x20"></div>
        <div class="bubble x21"></div>
        <div class="bubble x22"></div>
        <div class="bubble x23"></div>
	</div>
	<!-- test -->
	<button id="hi">hi</button>
    <div class="lightbox" id="loginBox">
        <div class="popbg"></div>
        <div class="info">
            <div class="axis axis1"></div>
            <div class="axis axis2"></div>
            <div class="leave"></div>
            <div class="paper">

                <div id="tab-demo">
                
                    <div id="tab01" class="tab-inner">
                        <h2 class="titlePri" >成為海賊</h2>
                        
                            <label>帳號:</label>
                            <input id="signmemId" type="text" name="memId"><br>
                            <label>密碼:</label>
                            <input id="signmemPsw" type="password" name="memPsw"><br>
                            <div class="verification">
                                <h2>請旋轉到正確位置</h2>
                                <a id="signlbtn" href="javascript:;">左</a>
                                <img id="signnew" src="image/new.png" alt="" width="100px" height="100px">
                                <a id="signrbtn" href="javascript:;">右</a>
                            </div>
                            <p id="feedback"></p>
                            <a id="signUp"class="btnpri" href="javascript:;">
                                <span>登入</span>
                            </a>
                    </div>

                    <div id="tab02" class="tab-inner">
                        <h2 class="titlePri" >成為海賊</h2>
                        <form action="registered.php" id="loginforma">
                            <div class="Data-Title">
                                <label for="memId">帳號:</label><br>
                                <label for="memNic">暱稱:</label><br>
                                <label for="memPsw">密碼:</label><br>
                                <label for="memCon">確認密碼:</label><br>
                            </div>
                            <div class="Data-Items">
                                <input type="text" id="memId" name="memId"><br>
                                <input type="text" id="memNic" name="memNic"><br>
                                <input type="password" id="memPsw" name="memPsw"><br>
                                <input type="password" id="memCon" name="memCon"><br>
                            </div>
                            <div class="clearfix"></div>
                            <p id="feedback2"></p>
                            <a id="btnver" class="btnpri" href="javascript:;" >
                                <span>註冊</span>
                            </a>
                            
                        </form>
                    </div>
                    <ul class="tab-title">
                        <li><a class="signIn" href="#tab01">登入頁</a></li>
                        <li>/</li>
                        <li><a class="register" href="#tab02">註冊頁</a></li>
                    </ul>
             </div>
         </div>
    </div>
	<script src="js/wavebtn.js"></script>
	<script src="js/verification.js"></script>
	<script>
		$(document).ready(function(){
        $('#hi').click(logBox);
    });
	</script>
	<!-- test -->
</body>
</html>