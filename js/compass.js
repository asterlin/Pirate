var compass;
$('#compass').click(function(){
	$('#out').toggleClass('addAnimate');
	$('#in').toggleClass('addAnimateF');
	var left = parseInt($('#compassBlue').css('left'));
	left == -1300? $('#compassBlue').css('left',`100px`):$('#compassBlue').css('left',`-1300px`);
});
function getCompassJSON(jsonStr){
	compass = JSON.parse(jsonStr);
	$('#blueName').text(`${member[0].memNic}`);
	$('#blueLv span').text(`${member[0].memLv}`);
	$('#blueExp span').text(`${member[0].memExp}`);
	$('#blueMoney span').text(`${member[0].memMoney}`);
	$('#blueStr span').text(`${member[0].strength}`);
	$('#blueLuck span').text(`${member[0].luck}`);
	$('#blueAgi span').text(`${member[0].agile}`);
	$('#blueInt span').text(`${member[0].intelligence}`);
	$('#blueGameTime span').text(`${member[0].playedTime}`);
}
function getCompass(){
	var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){
	        getCompassJSON( xhr.responseText );
	    }else{
	        alert( xhr.status );
	    }
    }
    var url = "php/compass_JSON.php";
    xhr.open("Get", url, true);
    xhr.send( null );
}