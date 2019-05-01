<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>play</title>
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/play.css">
	<link rel="stylesheet" href="css/compass.css">
	<link rel="stylesheet" href="css/wavebtn.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/gameGps.css">
    <link rel="stylesheet" href="css/login.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/animation.gsap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/plugins/debug.addIndicators.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js"></script>
	<script src="js/p5.js" type="text/javascript"></script>
	<script src="js/p5.play.js" type="text/javascript"></script>
	<script src="js/p5.dom.js"></script>
	<script src="js/sketch.js" type="text/javascript"></script>
	<script src="js/TweenMax.min.js"></script>
    <script src="js/ScrollMagic.min.js"></script>
    <script src="js/debug.addIndicators.min.js"></script>
    <script src="js/animation.gsap.min.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/ScrollToPlugin.js"></script>
	<script src="js/verification.js"></script>
</head>
<body>
	<label for="burgerCtrl">
        <input type="checkbox" name="" id="burgerCtrl">
        <div id="burger">
            <div class="burgerLine"></div>
            <div class="burgerLine"></div>
        </div>
    </label>
    <header class=""><!-- homeHeadHide-->
        <h1 id="headerLogo"><a href="index.php">
            <img src="image/logo.svg" alt="大海賊帝國">
        </a></h1>
        <nav id="headerMenu" >
            <ul>
                <li class="menuSwitch">
                    <a href="play.php">海賊試煉場</i></a>
                    <ul class="headerSub">
                        <li><a href="play.php#game">海賊試煉</a></li>
                        <li><a href="play.php#gpsWrap">啟航尋寶</a></li>
                    </ul>
                </li>
                <li class="menuSwitch">
                    <a href="market.php">海上市集</i></a>
                    <ul class="headerSub">
                        <li><a href="market.php">黑市</a></li>
                        <li><a href="market.php">造船廠</a></li>
                    </ul>
                </li>
                <li class="menuSwitch"><a href="bar.php">情報酒館</a></li>
                <li class="menuSwitch">
                    <a href="me.php">俺の海賊船</i></a>
                    <ul class="headerSub">
                        <li><a href="javascript:;" class="loginHere">登入</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
	<div id="choose">
		<div id="playTitle">
	        <h1 class="titlePri">海賊試煉場</h1>
	    </div>
		
		<div id="playTitleSec">
			<div class="s1">
				<img class="titFrame" src="image/play/titFrame.png" alt="frame">
				<h2 class="titleSec">海賊試煉</h2>
				<p class="textM introP">
				通過海賊試煉,獲得經驗值與金錢!<br>
				試煉分初級、中級、高級<br>
				要注意等級數必須符合才能挑戰!
				</p>
			</div>
			<div class="s2">
				<img class="titFrame" src="image/play/titFrame.png" alt="frame">
				<h2 class="titleSec">啟航尋寶</h2>
				<p class="textM introP">
				在地圖上尋找神秘的寶箱,<br>
				解鎖寶箱,得到寶箱裡面的禮物<br>
				請注意每開一次寶箱會減少一點體力值
				</p>
			</div>
		</div>

		<div id="gameOrGps">
			<div id="trigger_01"></div>
			<div id="gameArea">
				<div id="element1" class="ele">
					<div class="black"></div>
					<video autobuffer autoloop loop autoplay="autoplay" class="myVideo">
						<source src="image/play/video.mp4">
					</video>
					<div class="blueArea">
						<p>通關獎勵</p>
						<p>金幣 100枚<br>經驗值 50點<br>消耗一點體力點</p>
					</div>
				</div>
				<div id="element2" class="ele">
					<div class="black"></div>
					<video autobuffer autoloop loop autoplay="autoplay" class="myVideo">
						<source src="image/play/video.mp4">
					</video>
					<div class="blueArea">
						<p>通關獎勵</p>
						<p>金幣 200枚<br>經驗值 70點<br>消耗一點體力點</p>
					</div>
				</div>
				<div id="element3" class="ele">
					<div class="black"></div>
					<video autobuffer autoloop loop autoplay="autoplay" class="myVideo">
						<source src="image/play/video.mp4">
					</video>
					<div class="blueArea">
						<p>通關獎勵</p>
						<p>金幣 300枚<br>經驗值 100點<br>消耗一點體力點</p>
					</div>
				</div>
				<img src="image/play/chanlenge1.png" alt="change" id="eleImg1">
				<img src="image/play/chanlenge2.png" alt="change" id="eleImg2">
				<img src="image/play/chanlenge3.png" alt="change" id="eleImg3">
			</div>
			<div id="gpsArea">
				<img src="image/play/map.png" alt="map" id="myMap">
				<div id="blackMap"></div>
			</div>
		</div>
	</div>
	
	<div id="game">
		<div id="trigger_02"></div>
		<div id="gameTitle">
			<img class="titFrame" src="image/play/titFrame.png" alt="frame">
			<h2 class="titleSec">海賊試煉</h2>
		</div>
		<div id="playSpark"></div>
		<div id="playArea">
			<img src="image/play/boat.png" alt="boat" id="boat">
			<div id="blueAppear"></div>
			<span id="prev">&larr;上一關</span>
			<span id="next">下一關&rarr;</span>
			<div id="playShow">
				<div class="infoImg"></div>
				<div class="infoImgDesc">
					<p class="textS"><span>金幣: </span>利用寶箱蒐集金幣,一旦被寶箱碰到金幣會蒐集到箱子裡</p>
				</div>
				<div class="infoImg"></div>
				<div class="infoImgDesc">
					<p class="textS"><span>海軍: </span>一旦被海軍碰到將會被吃掉</p>
				</div>
				<div class="infoImg"></div>
				<div class="infoImgDesc">
					<p class="textS"><span>礁岩: </span>你的船不能夠穿越這些礁岩</p>
				</div>
				<div class="infoImg"></div>
				<div class="infoImgDesc">
					<p class="textS"><span>海賊寶箱: </span>能夠蒐集金幣,當你把所有的金幣都蒐集完了以後，就破關囉。要注意在越短時間內破關,你的排名越高!</p>
				</div>
				
				
			</div>
			<div id="playnotice">
				<p>遊戲說明: 避開海軍潛艇的追擊,蒐集完所有金幣!</p>
			</div>
			<div class="button_border">
				<div class="border_in">
					<span class="icon_movie">
					</span>
				</div>
				<div class="border_out">
					<svg viewBox="0 0 88 88">
						<path class="border" d="M39.2,86C19.7,83.8,4.2,68.3,2,48.8"></path>
						<path class="border" d="M86,48.8c-2.2,19.5-17.7,35-37.2,37.2"></path>
						<path class="border" d="M48.8,2c19.5,2.2,35,17.7,37.2,37.2"></path>
						<path class="border" d="M2,39.2C4.2,19.7,19.7,4.2,39.2,2"></path>
					</svg>
				</div>
			</div>
		</div>
	</div>
	<div id="rank">
		<div id="rankTitle">
			<img class="titFrame" src="image/play/titFrame.png" alt="frame">
			<h2 class="titleSec">懸賞排行</h2>
			<p>以最快的速度通過海賊試煉,進入懸賞排行成為大家的話題焦點吧</p>
		</div>
		<div id="rankArea">
			<div id="rankList">
				<div id="rankListBox1">
					<span id="beforeArrow">&larr;</span><span id="gobefore">中階</span>
					<span id="gonext">中階</span><span id="afterArrow">&rarr;</span>
					<p id="rankListTitle">初階試煉排行</p>
					<p id="rankListColName">
						<span>名次</span>
						<span>ID</span>
						<span>通關秒數</span>
					</p>
				</div>
				<div id="rankListBox2">
					<div id="rankList1">
						<div class="list1 playerList spark">
							<span class="rankNum">1</span>
							<span class="rankName">林以騰</span>
							<span class="rankSec">34.81秒</span>
						</div>
						<div class="list2 playerList">
							<span class="rankNum">2</span>
							<span class="rankName">貝多芬</span>
							<span class="rankSec">34.81秒</span>
						</div>
						<div class="list3 playerList">
							<span class="rankNum">3</span>
							<span class="rankName">拿破崙</span>
							<span class="rankSec">34.81秒</span>
						</div>
						<div class="list4 playerList">
							<span class="rankNum">4</span>
							<span class="rankName">織田信asd</span>
							<span class="rankSec">34.81秒</span>
						</div>
						<div class="list5 playerList">
							<span class="rankNum">5</span>
							<span class="rankName">德川家</span>
							<span class="rankSec">34.81秒</span>
						</div>
						<div class="list6 playerList">
							<span class="rankNum">6</span>
							<span class="rankName">宮本武</span>
							<span class="rankSec">34.81秒</span>
						</div>
						<div class="list7 playerList">
							<span class="rankNum">7</span>
							<span class="rankName">佐佐木</span>
							<span class="rankSec">34.81秒</span>
						</div>
						<div class="list8 playerList">
							<span class="rankNum">8</span>
							<span class="rankName">武田勝</span>
							<span class="rankSec">34.81秒</span>
						</div>
						<div class="list9 playerList">
							<span class="rankNum">9</span>
							<span class="rankName">小早川</span>
							<span class="rankSec">34.81秒</span>
						</div>
						<div class="list10 playerList">
							<span class="rankNum">10</span>
							<span class="rankName">蘭陵王</span>
							<span class="rankSec">34.81秒</span>
						</div>
					</div>
				</div>
			</div>
			<div id="rankPaper">
				<div id="paperFrame">
					<div class="rank0 rankFrame">
						<img src="image/play/rankPaper.png" alt="frame">
						<img src="image/play/myBoat.png" alt="myBoat" class="myBoat">
						<span class="myName">林以騰</span>
						<span class="myGrade">初階試煉34.81秒</span>
					</div>
					<div class="rank1 rankFrame">
						<img src="image/play/rankPaper.png" alt="frame">
						<img src="image/play/myBoat.png" alt="myBoat" class="myBoat">
						<span class="myName">貝多芬</span>
						<span class="myGrade">初階試煉34.81秒</span>
					</div>
					<div class="rank2 rankFrame">
						<img src="image/play/rankPaper.png" alt="frame">
						<img src="image/play/myBoat.png" alt="myBoat" class="myBoat">
						<span class="myName">拿破崙</span>
						<span class="myGrade">初階試煉34.81秒</span>
					</div>
					<div class="rank3 rankFrame">
						<img src="image/play/rankPaper.png" alt="frame">
						<img src="image/play/myBoat.png" alt="myBoat" class="myBoat">
						<span class="myName">織田信長</span>
						<span class="myGrade">初階試煉34.81秒</span>
					</div>
					<div class="rank4 rankFrame">
						<img src="image/play/rankPaper.png" alt="frame">
						<img src="image/play/myBoat.png" alt="myBoat" class="myBoat">
						<span class="myName">德川家康</span>
						<span class="myGrade">初階試煉34.81秒</span>
					</div>
					<div class="rank5 rankFrame">
						<img src="image/play/rankPaper.png" alt="frame">
						<img src="image/play/myBoat.png" alt="myBoat" class="myBoat">
						<span class="myName">宮本武藏</span>
						<span class="myGrade">初階試煉34.81秒</span>
					</div>
					<div class="rank6 rankFrame">
						<img src="image/play/rankPaper.png" alt="frame">
						<img src="image/play/myBoat.png" alt="myBoat" class="myBoat">
						<span class="myName">佐佐木</span>
						<span class="myGrade">初階試煉34.81秒</span>
					</div>
					<div class="rank7 rankFrame">
						<img src="image/play/rankPaper.png" alt="frame">
						<img src="image/play/myBoat.png" alt="myBoat" class="myBoat">
						<span class="myName">武田勝賴</span>
						<span class="myGrade">初階試煉34.81秒</span>
					</div>
					<div class="rank8 rankFrame">
						<img src="image/play/rankPaper.png" alt="frame">
						<img src="image/play/myBoat.png" alt="myBoat" class="myBoat">
						<span class="myName">小早川秀秋</span>
						<span class="myGrade">初階試煉34.81秒</span>
					</div>
					<div class="rank9 rankFrame">
						<img src="image/play/rankPaper.png" alt="frame">
						<img src="image/play/myBoat.png" alt="myBoat" class="myBoat">
						<span class="myName">蘭陵王</span>
						<span class="myGrade">初階試煉34.81秒</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- gps地圖開始 -->
	<div id="gpsWrap">
		<h2 class="titleSec">
            啟航尋寶
            <img src="image/h2frame.svg" alt="">
        </h2>
        <p class="textM">
            開啟GPS地圖在生活中尋寶吧！可獲得寶物或金幣！寶藏地圖每隔一小時刷新一次
            <br>提醒：每開啟一個寶箱扣除1點體力值
        </p>
		<div class="button_border">
			<div class="border_in">
				<span class="icon_movie">
				</span>
			</div>
			<div class="border_out">
				<svg viewBox="0 0 88 88">
					<path class="border" d="M39.2,86C19.7,83.8,4.2,68.3,2,48.8"></path>
					<path class="border" d="M86,48.8c-2.2,19.5-17.7,35-37.2,37.2"></path>
					<path class="border" d="M48.8,2c19.5,2.2,35,17.7,37.2,37.2"></path>
					<path class="border" d="M2,39.2C4.2,19.7,19.7,4.2,39.2,2"></path>
				</svg>
			</div>
		</div>
	    <div id="gpsMap"></div>
	    <img src="image/gpsGame/cloudLeft.png" alt="雲" id="gpsCloudLeft"> 
	    <img src="image/gpsGame/cloudRight.png" alt="雲" id="gpsCloudRight">
	    <canvas id="luckyWheel"></canvas>
	    <div class="lightbox" id="showPrize">
	        <div class="popbg"></div>
	        <div class="info">
	            <div class="axis axis1"></div>
	            <div class="axis axis2"></div>
	            <div class="leave"></div>
	            <div class="paper">
	                <!-- 範例 -->
	                <p class="textM">恭喜您獲得</p>
	                <div id="showPrizePic"></div>
	                <div class="textM" id="showPrizeMeg"></div>
	                <a class="btnsec" id="closeWheelBtn" href="javascript:">
	                    <span>繼續航行</span>
	                </a>
	                <a class="btnsec" href="me.php">
	                    <span>清點船艙</span>
	                </a>
	            </div>
	        </div>
	    </div>
	</div>
	<div id="getSession">0.
	</div>
	<!-- lightBox -->
	<!-- win -->
	<div class="playLightbox" id="winbox">
		<div class="lightbox">
		<div class="popbg"></div>
		<div class="info">
			<div class="axis axis1"></div>
			<div class="axis axis2"></div>
			<div class="leave"></div>
			<div class="paper">
				<!-- 範例 -->
				<h2 class="titlePriX" >WIN</h2>
				<p class="textIQ">恭喜你贏了初級試煉。<br>你的通關時間為<span id="lightboxTime">5</span>秒!<br>獲得了經驗值150點金錢1000G</p>
				<a class="btnpri checkToLeave"><span>確認</span></a>
			</div>
		</div>
		</div>
	</div>
	
	<!-- lose -->
	<div class="playLightbox" id="losebox">
		<div class="lightbox">
		<div class="popbg"></div>
		<div class="info">
				<div class="axis axis1"></div>
				<div class="axis axis2"></div>
				<div class="leave"></div>
				<div class="paper">
					<!-- 範例 -->
					<h2 class="titlePriX" >LOSE</h2>
					<p class="textIQ">好可惜!沒通過初級試煉,請再接再厲。</p>
					<a class="btnpri checkToLeave"><span>確認</span></a>
				</div>
			</div>
		</div>
	</div>
	<!-- playedTimes -->
	<div class="playLightbox" id="playedTimesBox">
		<div class="lightbox">
		<div class="popbg"></div>
		<div class="info">
				<div class="axis axis1"></div>
				<div class="axis axis2"></div>
				<div class="leave"></div>
				<div class="paper">
					<!-- 範例 -->
					<h2 class="titlePriX" >體力值不足!</h2>
					<p class="textIQ">體力每小時回復1點,請1小時後再來挑戰~</p>
					<a class="btnpri checkToLeave"><span>確認</span></a>
				</div>
			</div>
		</div>
	</div>
	
	<div id="loginbox">
		<div class="lightbox idot">
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
                            <div class="verification">
                                <h2>請旋轉到正確位置</h2>
                                <a id="signlbtn" href="javascript:;">左</a>
                                <img id="signnew" src="image/new.png" alt="" width="100px" height="100px">
                                <a id="signrbtn" href="javascript:;">右</a>
                                <a id="signconfirm" type="submit">提交</a>
                                <div id="signcontent"></div>
                            </div>
                            <div class="clearfix"></div>
                            <a id="btnver" class="btnpri" href="javascript:;" >
                                <span>驗證身份</span>
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
	    </div>
	</div>
	
	
	<!-- compass -->
	<div id="compass">
		<img src="image/compass_inner.png" alt="in" id="in">
		<img src="image/compass_outter.png" alt="out" id="out">
		<div id="compassBlue">
			<div id="blueImg" class="blueInfo"><img src="" alt=""></div>
			<div id="blueName" class="blueInfo"></div>
			<div id="blueLv" class="blueInfo">Lv<span></span></div>
			<div id="blueExp" class="blueInfo"><span></span>/100</div>
			<div id="blueMoney" class="blueInfo">金幣<span></span>G</div>
			<div id="blueStr" class="blueInfo">力量<span></span></div>
			<div id="blueLuck" class="blueInfo">幸運<span></span></div>
			<div id="blueAgi" class="blueInfo">敏捷<span></span></div>
			<div id="blueInt" class="blueInfo">智力<span></span></div>
			<div id="blueGameTime" class="blueInfo">體力值<span></span></div>
		</div>
	</div>
<script src="js/playTime_update.js"></script>
<script src="js/header.js"></script>
<script src="js/wavebtn.js"></script>
<script src="js/login.js"></script>
<script type="js/TweenMaxPlay.js"></script>
<script src="js/compass.js"></script>
<script src="js/playRank.js"></script>
<script src="js/playFrameChange.js"></script>
<script src="js/playTweenMax.js"></script>
<!-- <script src="js/reset.js"></script> -->
<script src="js/getStatus.js"></script>
<script src="js/gameGps.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKB16XDqQ6Qnki2BdJUQXXP4hEpK0_2wo&callback=initMap&libraries=geometry"></script> 
<script>
var compass;
var playTimeCount=0;
var gameStartTimer;
var memId=$('#getSession').text();
var memLv=parseInt($('#blueLv span').text());
var memExp=parseInt($('#blueLv span').text());
var memMoney=parseInt($('#blueLv span').text());
var playedTimes=parseInt($('#blueGameTime span').text());
var int=parseInt($('#blueInt span').text());
var str=parseInt($('#blueStr span').text());
var lcu=parseInt($('#blueLuck span').text());
var agi=parseInt($('#blueAgi span').text());
var rwd=$('#playTitleSec').width();
console.log(memId);

$(document).ready(function(){
//登入lightbox使用
document.getElementById("signUp").addEventListener("click",signUp );
document.getElementById("btnver").addEventListener("click",verification );
//還沒登入compass = none
if(memId=='')	$('#compass').css('display','none');
else			$('#compass').css('display','block');

//rwd compass = none
if(rwd==375)	$('#compass').css('display','none');
else			$('#compass').css('display','block');
getStatus();//getStatus.js
//lightbox 離開
$('.checkToLeave').click(function(){$('.lightbox').css('display','none');});
$('.popbg').click(function(){$('.lightbox').css('display','none');});
$('.leave').click(function(){$('.lightbox').css('display','none');})

// 寫入遊戲測驗時間
$('#winbox .checkToLeave').click(function(){
	playedTimes-=1;
	updateScore();//playTime_update.js
	getScoreL();
	getStatus();
	playTimeCount=0;//getStatus
});
$('#losebox .checkToLeave').click(function(){
	playedTimes-=1;
	updateScore();
	getScoreL();
	getStatus();
	playTimeCount=0;
});
// 跑tweenmax
playTweenMax();
// GPS
var gpsCloudLeft,gpsCloudRight;
gpsCloudLeft = $('#gpsCloudLeft');
gpsCloudRight = $('#gpsCloudRight');
$('#gpsWrap .button_border').click(function(){
	gpsCloudLeft.css('display','none');
	gpsCloudRight.css('display','none');
	$(this).css('display','none')
	playGps();
});
// Game
$('#playArea .button_border').click(function(){
	if(playedTimes==0){
		$('#playedTimesBox .lightbox').css('display','block');
	}else{
		$('#playSpark').css('clipPath','circle(1900px)');
		gameStartTimer = setInterval(play,1000);
	}
});
function play(){
	clearInterval(gameStartTimer);
	$('.button_border').css('display','none');
	$('#defaultCanvas0').css('display','block');
	playTimer = setInterval(playTime,1000)
}
function playTime(){
	playTimeCount+=1;
	console.log('playTimeCount: ',playTimeCount);
}
});
</script>
</body>
</html>