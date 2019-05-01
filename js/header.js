<<<<<<< HEAD
=======
function $id(id){
    return document.getElementById(id);
}
>>>>>>> 80c983e0f57006bd8b622a8848daa3992c4acd7d
window.addEventListener('load',function(){
    //取得header角色資訊
    var headerMe= document.getElementById("headerMe");
    var headerMenu = document.querySelector('#headerMenu');
    var header = document.getElementsByTagName('header')[0];
    //關閉與開啟header
    function toggleHeader(){
        if(headerMe.classList.contains('hide')){
            headerMe.classList.remove('hide');
            headerMenu.classList.remove('hide');
            header.classList.remove('hide');
        }else{
            headerMe.classList.add('hide');
            headerMenu.classList.add('hide');
            header.classList.add('hide');
        }
    }
    //取得視窗寬度，與resize寬度
    var winWidth = window.innerWidth;
    window.addEventListener('resize',function(){
        winWidth = window.innerWidth;
        //螢幕寬度小於1024啟動toggleHeader，大於就remove
        if(winWidth<1024){
            headerMe.addEventListener('click',toggleHeader);
            //確保選單都先收起
            headerMe.classList.add('hide');
            headerMenu.classList.add('hide');
            header.classList.add('hide');
        }else{
            //確保選單都先展開
            headerMe.removeEventListener('click',toggleHeader);
            headerMe.classList.remove('hide');
            headerMenu.classList.remove('hide');
            header.classList.remove('hide');
        }
    })
    //網頁剛開啟時螢幕寬度小於1200啟動toggleHeader，大於就remove
    if(winWidth<1024){
        var headerMe= document.getElementById("headerMe");
        headerMe.addEventListener('click',toggleHeader);
        toggleHeader(); //讓他在手機板時，先出現並隱藏
    }else{
        headerMe.removeEventListener('click',toggleHeader);
    }

<<<<<<< HEAD
=======

    var headerLog = document.querySelector('#headermenu .loginHere');
    console.log(headerLog);
    headerLog.addEventListener('click',function(e){
<<<<<<< HEAD
=======
        console.log(headerLog.innerText);
        if(headerLog.innerText=="登船"){
            // console.log('按了登船')
            document.getElementById('loginBox').style.display="block";
            burgerCtrl.click();

        }else{
            // console.log('按了離船')
            $.ajax({
                type: "POST",
                url: "logout.php",
                data: {memId:storage['memId']},
                success: function (response) {
                    console.log(response);
                }
            });
            storage.removeItem('memId');
            burgerCtrl.click();
            let msg =" <p>";
            msg += "您已登出";
            msg += "</p>";
            showMsglitbo(msg);
            headerLog.innerText = "登船";
        }
>>>>>>> homeBy7177
        console.log(e.target)
    })

    // for(var i=0;i<subSwitchs.length;i++){
    //     subSwitchs[i].addEventListener('click',function(e){
    //         toggleSub(e);
    //     })
    // }
>>>>>>> 80c983e0f57006bd8b622a8848daa3992c4acd7d


})