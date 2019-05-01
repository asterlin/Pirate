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
    //var url = "meToDB/meGetShip_JSON.php?memId="+memId;
    var url = "meToDB/meGetShip_JSON.php";
    xhr.open("Get", url, true);
    xhr.send( null );
}

function judgeWearing(jsonSTR){
    meShip = JSON.parse(jsonSTR);
    console.log(meShip);
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

function changeMyShip(newSrc,oldSrc){
    onstr = newSrc.substring(newSrc.length-7);
    ofstr = oldSrc.substring(oldSrc.length-7);
    console.log('on: ',onstr);
    console.log('off: ',ofstr);
    // for(i=0; i<meShip.length; i++){
    //     if(ofstr==meShip[i].modelImg){
    //         meShip[i].wearing = 0;
    //         console.log('me wear off: ',meShip[i].wearing);
    //         for(j=0; j<meShip.length; j++){
    //             if(onstr==meShip[j].modelImg){
    //                 meShip[j].wearing = 1;
    //                 console.log('me wear: ',meShip[j].wearing);
    //             }
    //         }
    //     }
    // }

    //...............
    for(i=0; i<meShip.length; i++){
        if(ofstr==meShip[i].modelImg){
            meShip[i].wearing = 0;
            console.log('me wear off: ',meShip[i].wearing);
        } 
        if(onstr==meShip[i].modelImg){
            meShip[i].wearing = 1;
            console.log('me wear: ',meShip[i].wearing);
        }           
    }//for
    //...............
}//function   

function saveMeShip(){
    let wearingArr = [];  //[1,5,10]
    console.log("=========");
    console.log(meShip);

    //...............
    for(i=0; i<meShip.length; i++){
        if(meShip[i].wearing == 1){
            wearingArr.push(meShip[i].modelId);
        } 
    }
    let wearList = wearingArr.toString();
    console.log("wearList :", wearList); 

    let xhr = new XMLHttpRequest();
    xhr.onload = function(){
        console.log("result : ", xhr.responseText);
    }
    xhr.open("get", "meToDB/updateMeShip.php?wearList=" + wearList);
    xhr.send( null );
    //...............
}//function   
    