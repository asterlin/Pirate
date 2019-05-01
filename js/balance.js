var price = 0;
function getclick(e){
    
    $('.card').css('border','');
    e.target.style.border = "2px solid red";
    document.getElementsByClassName("treasure")[0].src = e.target.src;
    $("#batreasure").css('visibility','none');
    var treaId = e.target.previousSibling.previousSibling.value;
    var storId = e.target.previousSibling.previousSibling.previousSibling.previousSibling.value;
    
	$.ajax({
        url: 'promptprice.php',
        data: {treaId:treaId,storId:storId,no:'1'},
        type: 'GET',
        success: function(data){
            $('#bapromptprice').html(data);
            $('#baprice').val(data);
            var thistreaId = treaId;
            var thisstorId = storId;
            document.getElementById("sellshelfbtn").onclick = function(){
                var price = parseInt(document.getElementById("baprice").value);
                console.log(price);
                $.ajax({
                    url: 'promptprice.php',
                    data: {price:price,no:'0',treaId:thistreaId,storId:thisstorId},
                    type: 'GET',
                    success: function(data){
                        console.log(data);
                        document.getElementsByClassName("selltreabox")[0].style.display = "none";
                    },
                    error: function(e){
                        console.log(123);
                    }
                });
            };
            
        },
    });
    // $.ajax.response;
     
    judge();
    document.getElementById("baprompt").innerHTML = "符合市場價格";
    document.getElementById("baRod").style.transform =`rotate(0deg)`;
    document.getElementById("baLcsl").style.top = "30%";
    document.getElementById("baRcsl").style.top = "30%";
    document.getElementById("batreasure").style.top = "45%";
    document.getElementById("bapromptprice").style.top = "60%";

}

function judge(){
    var price = document.getElementById("bapromptprice").innerHTML;
   
    var myprice = (document.getElementById("baprice").value - price); //$('#price').val();
    console.log(price);
    var rodrotate = -(myprice*0.05);
    var cslup = 30 - (myprice*0.035);
    var csldown = 30 + (myprice*0.035);
    var treaup = 45 - (myprice*0.035);
    var treadown = 45 + (myprice*0.035);
    var promptpriceup = 60 - (myprice*0.035);
    var promptpricedown = 60 + (myprice*0.035);

    if(myprice > price){
        document.getElementById("baprompt").innerHTML = "高於市場價格";
        document.getElementById("baRod").style.transform = "rotate("+ rodrotate +"deg)";
        document.getElementById("baLcsl").style.top = `${cslup}%`;
        document.getElementById("baRcsl").style.top = `${csldown}%`;
        document.getElementById("batreasure").style.top = `${treaup}%`;
        document.getElementById("bapromptprice").style.top = `${promptpricedown}%`;
    }
    else if(myprice < price){
        console.log(1);
        document.getElementById("baprompt").innerHTML = "低於市場價格";
        document.getElementById("baRod").style.transform = "rotate("+ rodrotate +"deg)";
        document.getElementById("baLcsl").style.top = `${csldown}%`;
        document.getElementById("baRcsl").style.top = `${cslup}%`;
        document.getElementById("batreasure").style.top = `${treadown}%`;
        document.getElementById("bapromptprice").style.top = `${promptpriceup}%`;
    }
    else{
        document.getElementById("baprompt").innerHTML = "符合市場價格";
        document.getElementById("baRod").style.transform =`rotate(0deg)`;
        document.getElementById("baLcsl").style.top = "30%";
        document.getElementById("baRcsl").style.top = "30%";
        document.getElementById("batreasure").style.top = "45%";
        document.getElementById("bapromptprice").style.top = "60%";
    }
}



// function init(){
    
//     // myBody_click, myForm_click, btn_click, forFun
    
//   }

// window.onload = init;	