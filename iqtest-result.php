<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>iqtest-result</title>
	<link rel="stylesheet" href="css/iqtest-result.css">
	<link rel="stylesheet" href="css/wavebtn.css">
	<link rel="stylesheet" href="css/lightbox.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
</head>
<body>
	<div class="resultSlogan">
		<h1 class="titlePri">你的大腦測驗結果</h1>
	</div>
	<div class="row">
		<div class="col-6">
			<img src="image/iqtest/brain.png" alt="brain" class="brain">
			<p id="abc">B</p>
			<p class="grade">
				<strong class="textHiliR" id="grade">70 </strong>/ 100分
			</p>
			<p class="correctop">
				7題中<strong class="textHiliR" id="correct"> 4 </strong>題正確
			</p>
		</div>
		<div class="col-6">
			<div class="radar">
				<div id="explain">
					<img src="image/iqtest/info.png" alt="power" class="infoImg">
					<img src="image/iqtest/info.png" alt="knowledge" class="infoImg">
					<img src="image/iqtest/info.png" alt="luck" class="infoImg">
					<img src="image/iqtest/info.png" alt="quick" class="infoImg">
				</div>
				<canvas id="myChart" width='400' height='400' style="display: block;"></canvas>
			</div>
			<h2 class="titleSec">LV3 聰明的冒險家!</h2>
			<p class="textM">恭喜你成功通過海賊IQ測驗，接下來前方還有更多冒險必須去挑戰。試著在海賊試煉場中通過試煉,獲得經驗值與金錢。<br>等級提升後會獲得技能點數，你可以在我的海賊船頁面中使用點數提升技能。<br>在海上市集中可以使用金錢購買裝備。
			</p>
		</div>
		<a class="btnpri" href="play.php" id="toPlay"><span>海賊試煉場</span></a>
		<div class="lightbox">//智力燈箱
			<div class="popbg"></div>
			<div class="info">
				<div class="axis axis1"></div>
				<div class="axis axis2"></div>
				<div class="leave"></div>
				<div class="paper">
					<!-- 範例 -->
					<h2 class="titlePri titlePriX" >智力</h2>
					<p class="textIQ">在海上市集裡可以買到你想要的寶物和造型。<br>當你的智力越多的話，就能使出殺價能力，每10點智力能折扣5元。假設當你想要買價值100元的商品，而你的智力是30點，你能夠以85元價格買入商品。</p>
					<a class="btnpri checkToLeave"><span>確認</span></a>
				</div>
			</div>
		</div>
		<div class="lightbox">//力量燈箱
			<div class="popbg"></div>
			<div class="info">
				<div class="axis axis1"></div>
				<div class="axis axis2"></div>
				<div class="leave"></div>
				<div class="paper">
					<!-- 範例 -->
					<h2 class="titlePri titlePriX" >力量</h2>
					<p class="textIQ">遊戲中每1小時回復體力值1點。<br>力量越多的話，體力回復速度越快，每五個力量點數能加快1分鐘體力回復速度。</p>
					<a class="btnpri checkToLeave"><span>確認</span></a>
				</div>
			</div>
		</div>
		<div class="lightbox">//幸運燈箱
			<div class="popbg"></div>
			<div class="info">
				<div class="axis axis1"></div>
				<div class="axis axis2"></div>
				<div class="leave"></div>
				<div class="paper">
					<!-- 範例 -->
					<h2 class="titlePri titlePriX" >幸運</h2>
					<p class="textIQ">在海賊試煉場裡的尋寶GPS遊戲裡找到寶相的話可以進行抽獎遊戲。<br>如果你的幸運越多的話，抽到大獎的機率越高哦。</p>
					<a class="btnpri checkToLeave"><span>確認</span></a>
				</div>
			</div>
		</div>
		<div class="lightbox">//敏捷燈箱
			<div class="popbg"></div>
			<div class="info">
				<div class="axis axis1"></div>
				<div class="axis axis2"></div>
				<div class="leave"></div>
				<div class="paper">
					<!-- 範例 -->
					<h2 class="titlePri titlePriX" >敏捷</h2>
					<p class="textIQ">當你進行海賊試煉遊戲時，遊戲中會出現金幣。<br>敏捷越高，遊戲裡的金幣數量越多。</p>
					<a class="btnpri checkToLeave"><span>確認</span></a>
				</div>
			</div>
		</div>
	</div>
	<script src="js/wavebtn.js"></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/radar100.js"></script>
	<script>
		var storage = sessionStorage;
		var chart;
		// chart.data.datasets[0].label=["asas","B","C","D"];
		grade = storage['grade'];
		str = parseInt(storage['strength']);//力量
		int = parseInt(storage['intelligence']);//智力
		lcu = parseInt(storage['luck']);//幸運
		agi = parseInt(storage['agile']);//敏捷
		tans = parseInt(storage['tans']);//答對題數
		var graphDataNew = [str,int,lcu,agi];//從資料庫載入的Radar數值

		// 給分數
		$('#grade').text(`${grade}`);
		$('#correct').text(`${tans}`);
		if( grade>90 ) $('#abc').text(`A`);
		else if( grade>=70 ) $('#abc').text(`B`);
		else if( grade>=50 ) $('#abc').text(`C`);
		else $('#abc').text(`D`);

		// 把技能點數傳回資料庫update
		function checkId(){
		  //產生XMLHttpRequest物件
		  let xhr = new XMLHttpRequest();

		  //註冊callback function
		  xhr.onload = function(){
			      if( xhr.status == 200){ //server端可以正確的執行
			      }else{ //其它
			          alert( xhr.status );
			      }
			  }  

			  //設定好所要連結的程式
			  var url = `php/iqresult_Update.php?int=${int}&str=${str}&lcu=${lcu}&agi=${agi}`;
			  xhr.open("Get", url, true);
			  xhr.send( null );
		}//function_checkId
		
		// 燈箱事件
		function show(e){
			index = $(this).index();
			document.getElementsByClassName('lightbox')[index].style.display = 'block';
    		// e.target.style.display = 'block'; // i代入這個頁面的第幾個燈箱
		}
		function off(e){
			e.target.parentNode.parentNode.style.display = 'none';  //按叉叉
		}
		function off2(e){
			e.target.parentNode.style.display = 'none';				//按popbg
		}
		$(document).ready(function(){
			chartRadar(graphDataNew);//從資料庫載入的Radar數值,初始化用
			for(i=0; i<=3; i++){
				document.getElementsByClassName('infoImg')[i].onclick = show;
				document.getElementsByClassName("leave")[i].onclick=off;
				document.getElementsByClassName("popbg")[i].onclick=off2;
			}
			$('.checkToLeave').click(function(){
				$('.lightbox').css('display','none');
			});
			checkId();
		});
	</script>
</body>
</html>