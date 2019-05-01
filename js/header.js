function $id(id){
    return document.getElementById(id);
}
var storage = sessionStorage;
function checkLog(){
    if(storage['memId']){
        return true;
    }else{
        return false;
    }
}

window.addEventListener('load',function(){

    // var headerMe= document.getElementById("headerMe");//取得header角色資訊
    var burgerCtrl = document.getElementById('burgerCtrl');
    var headerMenu = document.querySelector('#headerMenu');
    var header = document.getElementsByTagName('header')[0];
    // var subSwitchs = document.getElementsByClassName('menuSwitch');

    //關閉與開啟header
    function toggleHeader(){
        if(burgerCtrl.checked){
            // headerMe.classList.remove('hide');
            headerMenu.classList.remove('hide');
            header.classList.remove('hide');
        }else{
            // headerMe.classList.add('hide');
            headerMenu.classList.add('hide');
            header.classList.add('hide');
        }
    }

    //關閉與開啟次選單
    // function toggleSub(e){
    //     console.log(e.target);
    //     e.target.classList.toggle('hide');
    // }

    //取得視窗寬度，與resize寬度
    var winWidth = window.innerWidth;
    window.addEventListener('resize',function(){
        winWidth = window.innerWidth;
        //螢幕寬度小於1024啟動toggleHeader，大於就remove
        if(winWidth<1024){
            burgerCtrl.addEventListener('click',toggleHeader);
            //確保選單都先收起
            // headerMe.classList.add('hide');
            headerMenu.classList.add('hide');
            header.classList.add('hide');
        }else{
            //確保選單都先展開
            burgerCtrl.removeEventListener('click',toggleHeader);
            // headerMe.classList.remove('hide');
            headerMenu.classList.remove('hide');
            header.classList.remove('hide');
        }
    })

    //網頁剛開啟時螢幕寬度小於1200啟動toggleHeader，大於就remove
    if(winWidth<1024){
        burgerCtrl.addEventListener('click',toggleHeader);
        $id('burger').classList.remove('justHide');
        toggleHeader(); //讓他在手機板時，先出現並隱藏
    }else{
        burgerCtrl.removeEventListener('click',toggleHeader);
        $id('burger').classList.add('justHide');

        //捲動時收起menu

        function scrollHide(){
            header.classList.add('hide');
        }
        function scrollShow(){
            header.classList.remove('hide');
        }
        var prevScro = 0;
        
        document.addEventListener('scroll',function(){
            var curScro = document.getElementsByTagName('body')[0].scrollTop;    

            if(curScro>0 && curScro < document.body.scrollHeight - window.innerHeight){

                if(curScro > prevScro){
                    setTimeout(scrollHide,300);
                }else{
                    setTimeout(scrollShow,300);
                }
                prevScro = curScro;

            }
        })
    }

   
    
    var headerLog = document.getElementById('headerLog');
    let headerMe = document.querySelector('.menuSwitch')[3];
    
    if(storage['memId']){
        headerLog.innerText = "離船";
    }
    
    


    //如果我的海賊船備案，要判斷是否登入而登入
    // headerMe.addEventListener('click',function(){

    // })
    //登出後提供訊息
    function showMsglitbo(msg){
        document.getElementById('Msglightbox').style.display = "block";
        document.querySelector('#Msglightbox .paper').innerHTML=msg;
        
    }
    console.log(headerLog);
    //當登入或登出被按時
    headerLog.addEventListener('click',function(e){
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
        console.log(e.target)
    })

    // for(var i=0;i<subSwitchs.length;i++){
    //     subSwitchs[i].addEventListener('click',function(e){
    //         toggleSub(e);
    //     })
    // }


    
})