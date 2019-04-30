// function getMeShipJSON(jsonStr){
//     meShip = JSON.parse(jsonStr);
//     console.log(meShip);
// }

function getShip(){
	var xhr = new XMLHttpRequest();
    xhr.onload=function (){
        if( xhr.status == 200 ){
            judgeWearing(xhr.responseText);
	        // getMeShipJSON( xhr.responseText );
	    }else{
	        alert( xhr.status );
	    }
    }
    // memId = "test03";
    var url = "meToDB/meGetShip_JSON.php?memId="+memId;
    xhr.open("Get", url, true);
    xhr.send( null );
}

function judgeWearing(jsonSTR){
    meShip = JSON.parse(jsonSTR);
    for(var i=0; i<meShip.length; i++){
        if(meShip[i].wearing=='1'){
            if(meShip[i].modelPart=='1'){
                $('#partHead').attr('src','image/ship/'+meShip[i].modelImg);
            }else if(meShip[i].modelPart=='2'){
                $('#partBody').attr('src','image/ship/'+meShip[i].modelImg);
            }else if(meShip[i].modelPart=='3'){
                $('#partSail').attr('src','image/ship/'+meShip[i].modelImg);
            }
        }
    }
}

function changeMyShip(str,str2){
    onstr = str.substring(str.length-7);
    ofstr = str2.substring(str2.length-7);
    console.log('on: ',onstr);
    console.log('off: ',ofstr);
    for(i=0; i<meShip.length; i++){
        if(ofstr==meShip[i].modelImg){
            meShip[i].wearing = 0;
            console.log('me wear off: ',meShip[i].wearing);
            for(j=0; j<meShip.length; j++){
                if(onstr==meShip[j].modelImg){
                    meShip[j].wearing = 1;
                    console.log('me wear: ',meShip[j].wearing);
                }
            }
        }
    }
}