function updateScore(){
	var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){
            
	    }else{
	        alert( xhr.status );
	    }
    }
    console.log('lv',memLv,'exp',memExp);
    var url = "php/playTime_update.php?memId="+memId+"&highscoreL="+playTimeCount+"&memMoney="+1000+"&memLv="+memLv+"&memExp="+memExp;
    xhr.open("Get", url, true);
    xhr.send( null );
}