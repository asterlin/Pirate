
function buy(e){
    var memMoney = parseInt(document.getElementById("memMoney").value);
    var buyprice = e.target.parentNode.parentNode.previousSibling.previousSibling.value;
    console.log(buyprice);
    
    if( memMoney >= buyprice){
        document.getElementsByClassName("buysucbox")[0].style.display = 'block'; // i代入這個頁面的第幾個燈箱
        e.target.parentNode.parentNode.parentNode.setAttribute("tradeId","tradeId");
    }else{
        alert('金錢不足');
    }
    
}
function off(){
    document.getElementsByClassName("buysucbox")[0].style.display = 'none';  // i代入這個頁面的第幾個燈箱

    var form = document.querySelectorAll("form");
    for(var i = 0; i < form.length; i++){
        if(form[i].hasAttribute("tradeId")){
            form[i].submit();
        }
    }
}
function selltreaclose(){
    document.getElementsByClassName("selltreabox")[0].style.display = 'none';
}

function selltreaboxopen(){
    document.getElementsByClassName("lightbox")[1].style.display = "block";
    document.getElementsByClassName("selltreabox")[0].style.display = "block";
    document.getElementById("selloffbtn").addEventListener("click",selltreaclose);
}

function gosellpage(){
    if($('#gosellpage span').text() == "販賣寶物"){   
        $('#gosellpage span').text("返回黑市")
        document.getElementsByClassName("treawrap")[0].style.display = "none";
        document.getElementsByClassName("sellpage")[0].style.display = "flex";
    }else{
        $('#gosellpage span').text("販賣寶物");
        document.getElementsByClassName("sellpage")[0].style.display = "none";
        document.getElementsByClassName("treawrap")[0].style.display = "flex";
    }
    createbtn(btnsec);
 

}



