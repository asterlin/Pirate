function changeMeShip(){
    console.log('hi');
	var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){
            console.log('change sucess');
            console.log(xhr.responseText)
	        // getMeShipJSON( xhr.responseText );
	    }else{
	        alert( xhr.status );
	    }
    }
    wearing = 1;
    var url = "meToDB/meShipUpdate_JSON.php?wearing="+wearing;
    xhr.open("Get", url, true);
    xhr.send( null );
}