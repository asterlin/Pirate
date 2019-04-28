var memPsw,memLv,memExp,memMoney,intelligence,strength,agile,luck,shipImgAll,avatarImg,talentPointsRemain;
// 寶物造型頁籤
function jsTabs(evt, tabId) {
    var tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabs-panel");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tabs-menu");
    for (var i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" tabs-menu-active", "");
    }
    var tab = document.getElementById(tabId);
    tab.style.display = "block";
    evt.currentTarget.className += " tabs-menu-active";
    return false;
}

//交易發文頁籤
function jsTabs1(evt, tabId) {
    var tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabs-panel1");
    for (var i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tabs-menu1");
    for (var i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" tabs-menu-active1", "");
    }
    var tab = document.getElementById(tabId);
    tab.style.display = "block";
    evt.currentTarget.className += " tabs-menu-active1";
    return false;
}
// $('.butNews').click(function(){
//     alert("安安");
// })



// function standUp() {
//     console.log("123");
//     $('.boxNews').toggleClass("bbb");
// }


// function filewrapBox() {
//     console.log("888");
//     $('.filewrap').toggleClass("vvv");
// }

// function init() {
//     var boxNews = document.getElementById("boxNews");
//     var qq = document.getElementById("qq");

//     boxNews.addEventListener('click', standUp);
//     qq.addEventListener('click', filewrapBox);
// }
// window.addEventListener('load', init);


//--------------------
// window.onload = function () {
//     var obt = document.getElementById("edit");
//     var odiv = document.getElementById("carryOut");
//     obt.onclick = function () {
//         if (odiv.style.display == "none") {
//             odiv.style.display = "inline-block";
//             obt.value = "隐藏模块";
//         }
//         else {
//             odiv.style.display = "none";
//             obt.value = "显示模块";
//         }
//     }
// }
//抓我的所有資料
function getMyInfo() {
    var getMyInfo_xhr = new XMLHttpRequest();
    getMyInfo_xhr.onload = function(){
        if( getMyInfo_xhr.status == 200 ){
            var getMyInfo = JSON.parse(getMyInfo_xhr.responseText);
            console.log(getMyInfo);
            }else{
              alert( getMyInfo_xhr.status );
            }
      
        
        //這已經是JSON字串 應該可以用Ajax的方法處理他
        // memPsw = getMyInfo.memPsw;
        // memLv = getMyInfo.memLv;
        // memExp = getMyInfo.memExp;
        // memMoney = getMyInfo.memMoney;
        // intelligence = getMyInfo.intelligence;
        // strength = getMyInfo.strength;
        // agile = getMyInfo.agile;
        // luck = getMyInfo.luck;
        // shipImgAll = getMyInfo.shipImgAll;
        // avatarImg = getMyInfo.avatarImg;
        // talentPointsRemain = getMyInfo.talentPointsRemain;
    };
    getMyInfo_xhr.open("get","getMyInfo.php?memId=14");
    getMyInfo_xhr.send(null);
}




 



