function changeMeShip(){
    for(i=0; i<meShip.length; i++){
        wearing = parseInt(meShip[i].wearing);
        modelId = parseInt(meShip[i].modelId);
        var xhr = new XMLHttpRequest();
        xhr.onload=function (){
            if( xhr.status == 200 ){
                console.log('i');
                console.log(xhr.responseText)
                // getMeShipJSON( xhr.responseText );
            }else{
                alert( xhr.status );
            }
        }
        
        var url = "meToDB/meShipUpdate_JSON.php?wearing="+wearing+"&modelId="+modelId;
        xhr.open("Get", url, true);
        xhr.send( null );
    }
	
}