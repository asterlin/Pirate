var storage = sessionStorage;
var count = 19;
var level = 0;
var qsNextTimer;
var showTimer;
var timesRun = 0;
var grade = 0;
var str = 0;//力量
var int = 0;//智力
var lcu = 0;//幸運
var agi = 0;//敏捷
var tans = 0;
var iqtest;
var h = $('.ques').height();//為了rwd用

// 
$('li').click(function(){
var code = 'CD106';
var number = $(this).text();
$('span.results').show();
$('#wrong').hide();
$('#entered').append(number);
var enteredLength = $('#entered').text().length;
var entered = $('#entered').text();
if (enteredLength == 5 && entered === code) {
    $('#entered').empty();
    $('.keypad').delay( 400 ).fadeOut(0);
    $('.front').addClass('open').animate({  borderSpacing: -180 }, {
    step: function(now,fx) {
    $(this).css('transform','rotateY('+ now +'deg)');
	},duration:1000},'linear');
	$('span.results').hide();
	$('#right').show();
	$('#hint,#anotherhint').hide();
	$('.treasure').fadeIn(2000);
	grade += 10;
	str += 10;
	int += 10;
	lcu += 15;
	agi += 15;
	setInterval(change,3000);
}
if (enteredLength == 5 && entered !== code){
	$('#wrong').show();
	$('span.results').hide();
	$('#entered').empty();
	setInterval(change,3000);
}      
});

// reset時間條
function goNext(){
	timesRun = 0;
	count = 19;
	qsNextTimer = setInterval(countdown,800);
}

// 時間條
function countdown(){
	if(count <= 0){
		$('#timeRow').css('display','none');
		h==140? $('#mytimeHeight').css('height','40px') : $('#mytimeHeight').css('height','80px');
		count%2 == 0? $('#changeT').innerHTML = '時間到!' : $('#changeT').innerHTML = '';
	}else{
		document.getElementById("changeT").innerHTML = '時間 '+count;
	}
	count--;
	timesRun++;
	if( timesRun == 25 ){
		clearInterval(qsNextTimer);
		timesRun = 0;
		showIqtest();
	}
}

function change(){
	tans+=1;
	grade += parseInt(iqtest[level].point);
	switch(level){//第幾題
		case 1:
			str += 10;
			int += 5;
			lcu += 10;
			agi += 5;
			break;
		case 2:
			str += 10;
			int += 15;
			lcu += 10;
			agi += 10;
			break;
		case 3:
			str += 5;
			int += 10;
			lcu += 5;
			agi += 10;
			break;
		case 4:
			str += 15;
			int += 10;
			lcu += 10;
			agi += 10;
			break;
		case 5:
			str += 10;
			int += 5;
			lcu += 10;
			agi += 5;
			break;
		case 6:
			str += 5;
			int += 5;
			lcu += 10;
			agi += 5;
			break;
	}
	
	if(level==6){
		storage['grade'] = grade;
		storage['str'] = str;
		storage['int'] = int;
		storage['lcu'] = lcu;
		storage['agi'] = agi;
		storage['tans'] = tans;
		window.location="iqtest-result.php";
	}
}

function showAns(e){
	e.target.children[2].style.display = 'block';
	$('#timeRow').css('display','none');
	if(e.target.children[2].src.indexOf('correct') != -1)change();//+分
	if( level==5 )$('#teemo').attr("src","image/iqtest/teemoAns.png");//公布提摩img
	h==140?$('#mytimeHeight').css('height','40px'):$('#mytimeHeight').css('height','80px');//rwd用
	clearInterval(qsNextTimer);
	showTimer = setInterval(showIqtest,3000);
}

function showIqtest(){
	level+=1;
	$('.ans').css('display','none');//gif檔消失
	$('.ans').attr('src','image/iqtest/false.gif');//預設false.gif
	$('.ans').eq(parseInt(`${iqtest[level].answer}`-1)).attr('src','image/iqtest/correct.gif');//correct
	$('#question').text(`${iqtest[level].testText}`);
	$('.o1 .describe').text(`${iqtest[level].option1}`);
	$('.o2 .describe').text(`${iqtest[level].option2}`);
	$('.o3 .describe').text(`${iqtest[level].option3}`);
	$('.o4 .describe').text(`${iqtest[level].option4}`);
	if( level==5 ) $('#bonus1').css('display','block');//提摩題
	if(level==5 && h==140)$('#question').css('text-align','right');//rwd用
	if( level==6 ){
		$('#question').css('text-align','center');//rwd用
		$('#bonus1').css('display','none');
		$('#option').css('display','none');
		$('#bonus2').css('display','block');
	}

	$('#mytimeHeight').css('height','');
	$('#timeRow').css('display','block');
	$('#timeRow').width(1400);
	clearInterval(showTimer);
	goNext();
}

function getIqJSON(jsonStr){
	iqtest = JSON.parse(jsonStr);
	$('#question').text(`${iqtest[level].testText}`);
	$('.o1 .describe').text(`${iqtest[level].option1}`);
	$('.o2 .describe').text(`${iqtest[level].option2}`);
	$('.o3 .describe').text(`${iqtest[level].option3}`);
	$('.o4 .describe').text(`${iqtest[level].option4}`);
	$('.ans').attr('src','image/iqtest/false.gif');//預設false
	$('.ans').eq(parseInt(`${iqtest[level].answer}`-1)).attr('src','image/iqtest/correct.gif');//correct
}

function getIq(){
	var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){
	        getIqJSON( xhr.responseText );
	    }else{
	        alert( xhr.status );
	    }
    }
    var url = "php/iqtest_JSON.php";
    xhr.open("Get", url, true);
    xhr.send( null );
}

window.addEventListener('load',function(){
// 第一題
getIq();
qsNextTimer = setInterval(countdown,800);
for(i = 0; i<=3; i++){
	document.getElementsByClassName("opop")[i].onclick = showAns;
}
},false);