function updateScore(){
	var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){
            
	    }else{
	        alert( xhr.status );
	    }
    }
    console.log(playTimeCount);
    console.log(playedTimes);
    var url = "php/playTime_update.php?memId="+memId+"&highscoreL="+playTimeCount+"&playedTimes="+playedTimes+"&memMoney="+1000;
    xhr.open("Get", url, true);
    xhr.send( null );
}