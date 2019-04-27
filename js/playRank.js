var rankNow = 0;
getScoreL();
$('#beforeArrow').css('display','none');
$('#gobefore').css('display','none');
$('#gonext').click(function(){
	rankNow+=1;
	if(rankNow==1){
		$('#beforeArrow').css('display','block');
		$('#gobefore').css('display','block');
		$('#gobefore').text(`中階`)
		$('#gonext').text(`高階`)
		getScoreM();
	}else if(rankNow==2){
		$('#gobefore').text(`中階`)
		$('#gonext').css('display','none');
		$('#afterArrow').css('display','none');
		getScoreH();
	}
});
$('#gobefore').click(function(){
	rankNow-=1;
	if(rankNow==0){
		$('#beforeArrow').css('display','none');
		$('#gobefore').css('display','none');
		$('#gonext').text(`中階`)
		getScoreL();
	}else if(rankNow==1){
		$('#gobefore').text(`初階`);
		$('#gonext').text(`中階`);
		$('#gonext').css('display','block');
		$('#afterArrow').css('display','block');
		getScoreM();
	}
});
function getScoreL(){
	var xhr = new XMLHttpRequest();
    xhr.onload=function(){
        if( xhr.status == 200 ){
	        getScoreLJSON( xhr.responseText );
	    }else{
	        alert( xhr.status );
	    }
    }
    var url = "php/playRankscoreL_JSON.php";
    xhr.open("Get", url, true);
    xhr.send( null );
}
function getScoreM(){
	var xhr = new XMLHttpRequest();
    xhr.onload=function(){
        if( xhr.status == 200 ){
	        getScoreMJSON( xhr.responseText );
	    }else{
	        alert( xhr.status );
	    }
    }
    var url = "php/playRankscoreM_JSON.php";
    xhr.open("Get", url, true);
    xhr.send( null );
}
function getScoreH(){
	var xhr = new XMLHttpRequest();
    xhr.onload=function(){
        if( xhr.status == 200 ){
	        getScoreHJSON( xhr.responseText );
	    }else{
	        alert( xhr.status );
	    }
    }
    var url = "php/playRankscoreH_JSON.php";
    xhr.open("Get", url, true);
    xhr.send( null );
}

function getScoreLJSON(jsonStr){
	member = JSON.parse(jsonStr);
	for(i=0; i<=9; i++){
		$('.myName').eq(i).text(`${member[i].memNic}`);
		$('.rankName').eq(i).text(`${member[i].memNic}`);
		$('.rankSec').eq(i).text(`${member[i].highscoreL}`);
		$('.myGrade').eq(i).text(`初階試煉${member[i].highscoreL}秒`);
	}
}
function getScoreMJSON(jsonStr){
	member = JSON.parse(jsonStr);
	console.log(member);
	for(i=0; i<=9; i++){
		$('.myName').eq(i).text(`${member[i].memNic}`);
		$('.rankName').eq(i).text(`${member[i].memNic}`);
		$('.rankSec').eq(i).text(`${member[i].highscoreM}`);
		$('.myGrade').eq(i).text(`中階試煉${member[i].highscoreM}秒`);
	}
}
function getScoreHJSON(jsonStr){
	member = JSON.parse(jsonStr);
	console.log(member);
	for(i=0; i<=9; i++){
		$('.myName').eq(i).text(`${member[i].memNic}`);
		$('.rankName').eq(i).text(`${member[i].memNic}`);
		$('.rankSec').eq(i).text(`${member[i].highscoreH}`);
		$('.myGrade').eq(i).text(`高階試煉${member[i].highscoreH}秒`);
	}
}
$('.playerList').click(function(e){
	$('.playerList').removeClass('spark');
	$(this).addClass('spark');
	// rankArea
	index = $(this).index();
	count = 10-index;
	console.log('index: ',index,'count: ',count);
	$('.rankFrame').removeClass('rank0').removeClass('rank1').removeClass('rank2').removeClass('rank3').removeClass('rank4').removeClass('rank5').removeClass('rank6').removeClass('rank7').removeClass('rank8').removeClass('rank9');
	for(var i=0; i<=9; i++){
		if(count==10){
			count = 0;
		}
		$('.rankFrame').eq(i).addClass(`rank${count}`);//0->7 1->8 2->9 3->0
		count+=1;
	}
});
// Tweenmax
