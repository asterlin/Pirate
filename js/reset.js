function reset(){
	var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){
            console.log('reset sucess');
	    }else{
	        alert( xhr.status );
	    }
    }
    var url = "php/reset.php?memId="+memId+"&playedTimes="+playedTimes+"&memMoney="+memMoney+"&memLv="+memLv+"&memExp="+memExp+"&int="+int+"&str="+str+"&lcu="+lcu+"&agi="+agi;
    xhr.open("Get", url, true);
    xhr.send( null );
}