

var number

function signUp(){
    var signmemId= document.getElementById("signmemId").value;
    var signmemPsw= document.getElementById("signmemPsw").value;
    console.log(signmemId);
    console.log(signmemPsw);
    
    $.ajax({
        url: 'signup.php',
        data: {signmemId:signmemId,signmemPsw:signmemPsw},
        type: 'GET',
        success: function(data){
            if(data == 1){
                document.getElementsByClassName("lightbox")[0].style.display="none";
                console.log(data);
            } 
        },
    });

}




function left(){
    number -= 90;
    document.getElementById("signnew").style.transform = `rotate(${number}deg)`;
    var content = document.getElementById("signcontent");
    if(number % 360 == 0){
        content.innerHTML = "驗證成功";
        $('#btnver').slideDown();
    }
    else{
        content.innerHTML = "驗證失敗";
        $('#btnver').hide(500);
    }
}
function right(){
    number += 90;
    document.getElementById("signnew").style.transform = `rotate(${number}deg)`;
    var content = document.getElementById("signcontent");
    if(number % 360 == 0){
        content.innerHTML = "驗證成功";
        $('#btnver').slideDown();
    }
    else{
        content.innerHTML = "驗證失敗";
        $('#btnver').hide(500);
    }
}
// function confirm(){
//     var content = document.getElementById("signcontent");
//     if(number % 360 == 0){
//         content.innerHTML = "驗證成功";
//     }
//     else{
//         content.innerHTML = "驗證失敗";
//     }

// 
function verification(){
    
    if($('#btnver span').text() == "驗證身份"){
        $('#btnver span').text("註冊");
        $('#btnver').hide();
        document.getElementsByClassName("Data-Title")[0].style.display = "none";
        document.getElementsByClassName("Data-Items")[0].style.display = "none";
        document.getElementsByClassName("verification")[0].style.display = "block";

    }else{
        document.getElementById("loginforma").submit();
        document.getElementsByClassName("Data-Title")[0].style.display = "block";
        document.getElementsByClassName("Data-Items")[0].style.display = "block";
        document.getElementsByClassName("verification")[0].style.display = "none";
    }

}




function init(){
    document.getElementById("signUp").addEventListener("click",signUp );

    function getrandom(x){
        return Math.floor(Math.random()*x)+1;
    }
    number = getrandom(3)*90;
    

    var imgrotate = document.getElementById("signnew");
    imgrotate.style.transform = "rotate(" + number + "deg)";
    
    document.getElementById("btnver").addEventListener("click",verification );
    document.getElementById("signlbtn").addEventListener("click",left );
    document.getElementById("signrbtn").addEventListener("click",right );
    // document.getElementById("signconfirm").addEventListener("click",confirm );
    // myBody_click, myForm_click, btn_click, forFun
  }

window.onload = init;	