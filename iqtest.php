<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>iqtest</title>
	<link rel="stylesheet" href="css/iqtest.css">
</head>
<body>
	<div id="mytime">
		<div class="timeline" id="timeRow"></div>
		<div id="mytimeHeight"></div>
	</div>
	<div id="bonus1">
		<img src="image/iqtest/teemo.png" alt="teemo" id="teemo">
		<div class="button_border">
			<div class="border_in">
				<div class="bg_focus cover"></div>
				<span class="icon_movie"></span>
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
	<div class="time">
		<strong id="changeT"></strong>
	</div>
	
	<div class="ques">
		<h1 class="titlePri" id="question"></h1>
	</div>
	<div id="bonus2">
		<section class="container">
	    <div id="safe">
	      <div class="front side">
	        <div class="keypad">
	          <ol class="keys">
	           <li>0</li>
	           <li>1</li>
	           <li>2</li>
	           <li>3</li>
	           <li>4</li>
	           <li>5</li>
	           <li>6</li>
	           <li>7</li>
	           <li>8</li>
	           <li>9</li>
	           <li>A</li>
	           <li>B</li>
	           <li>C</li>
	           <li>D</li>
	          </ol>
	        </div>
	      </div>
	   
	      <div class="back side"></div>
	      <div class="right side"></div>
	      <div class="left side"></div>
	      <div class="top side"></div>
	      <div class="bottom side"></div>
	    </div>
	       <div class="treasure">
	         <div class="coin">
	         </div>
	         <div class="coin">
	         </div>
	         <div class="coin">
	         </div>
	         <div class="coin">
	         </div>
	         <div class="coin">
	         </div>
	       </div>
	  </section>

	  <section class="results">
	    <span class="results">你已經輸入:</span>
	    <span id="entered"></span>
	  </section>
	  <div id="wrong">
	    <span>錯誤!</span>
	  </div>
	  <div id="right">
	    <span>正確!</span>
	  </div>
	</div>
	<div id="option">
		<div class="opop o1">
			<strong class="textHi">A</strong>
			<strong class="describe"></strong>
			<img class="ans" src="image/iqtest/false.gif" alt="false">
		</div>
		<div class="opop o2">
			<strong class="textHi">B</strong>
			<strong class="describe"></strong>
			<img class="ans" src="image/iqtest/false.gif" alt="false">
		</div>
		<div class="opop o3">
			<strong class="textHi">C</strong>
			<strong class="describe"></strong>
			<img class="ans" src="image/iqtest/false.gif" alt="false">
		</div>
		<div class="opop o4">
			<strong class="textHi">D</strong>
			<strong class="describe"></strong>
			<img class="ans" src="image/iqtest/correct.gif" alt="false">
		</div>
	</div>
	<div id="chat">
		<div class="cloud">
			<img src="image/iqtest/chatcloud.png" alt="cloud" class="cc">
			<p class="chatting">動動你的豬腦袋</p>
		</div>
		<img class="head" src="image/iqtest/qahead.png" alt="head">
	</div>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/iqtest.js"></script>
</body>
</html>