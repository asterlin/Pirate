function getStatus(){
	var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){
            getStatusJSON( xhr.responseText );
	    }else{
	        alert( xhr.status );
	    }
    }
    var url = "php/getStatusJSON.php?memId="+memId;
    xhr.open("Get", url, true);
    xhr.send( null );
}
function getStatusJSON(jsonStr){
    var mystatus = JSON.parse(jsonStr);
    console.log(mystatus);
    $('#blueName').text(`${mystatus[0].memNic}`);
    $('#blueLv span').text(`${mystatus[0].memLv}`);
    $('#blueExp span').text(`${mystatus[0].memExp}`);
    $('#blueMoney span').text(`${mystatus[0].memMoney}`);
    $('#blueInt span').text(`${mystatus[0].intelligence}`);
    $('#blueStr span').text(`${mystatus[0].strength}`);
    $('#blueAgi span').text(`${mystatus[0].agile}`);
    $('#blueLuck span').text(`${mystatus[0].luck}`);
    $('#blueGameTime span').text(`${mystatus[0].playedTimes}`);
}