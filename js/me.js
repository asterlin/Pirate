// 寶物造型頁籤----------------------------------------------------------------
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
//-----------------------------------------------------------------------------

//交易發文頁籤-------------------------------------------------------------------
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
//----------------------------------------------------------------

//換船-------------------------------------------------------------
window.addEventListener("load", function () {
    //set image click
    let imgs = document.querySelectorAll(".myCustomer");
    for (let i = 0; i < imgs.length; i++) {
        imgs[i].onclick = function (e) {
            let myImage = e.target;
            let partNo = myImage.className.substr(1, 1);
            let partName;
            // console.log(meShip);
            switch (partNo) {
                case "1":
                    partName = "partHead";
                    break;

                case "2":
                    partName = "partBody";
                    break;

                case "3":
                    partName = "partSail";
                    break;

            }
            console.log(partName);
            if (partNo == 3) {
                changeMyShip(e.target.src,document.getElementById(partName).data);
                document.getElementById(partName).data = e.target.src;
            } else {
                changeMyShip(e.target.src, document.getElementById(partName).src);
                document.getElementById(partName).src = e.target.src;
                document.getElementById(partName).data = e.target.data;
            }
        }
    }
    //---------------------------------------------------------------------

    //改密碼按鈕-------------------------------------------------------------
    var penBut = document.querySelectorAll(".fa-pen");
    // for( var i=0; i<penBut.length; i++){
    $('.fa-pen').click(function () {
        $(this).siblings().attr("readonly", false);
    })
})
//-----------------------------------------------------------------


// var carryOut = document.querySelector('#carryOut');

// carryOut.addEventListener('click',function(e){
//     console.log('123');
// },false)

//改密碼XML---------------------------------------------------------
function login() {
    var xhr = new XMLHttpRequest();
    xhr.onload = function () {
        if (xhr.status == 200) {
            alert("修改成功");
        } else {
            alert(xhr.status);
        }
    }
    str = graphDataNew[0];
    int = graphDataNew[1];
    lck = graphDataNew[2];
    age = graphDataNew[3];
    // var myData = new FormData(document.getElementById("meShipForm"));
    memId = $('#memId1').val();
    memPsw = $('#memPsw1').val();
    console.log(typeof str);
    
    points = parseInt($('#points').text());
    console.log(typeof points);
    var url = "meToDB/meShipFormData.php?str="+str+"&int="+int+"&lck="+lck+"&age="+age+"&memId="+memId+"&memPsw="+memPsw+"&points="+points;
    xhr.open("Get", url, true);
    xhr.send(null);
}
//------------------------------------------------------------------










