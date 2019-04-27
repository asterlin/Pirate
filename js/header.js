function $id(id){
    return document.getElementById(id);
}
window.addEventListener('load',function(){
    //取得header角色資訊
    // var headerMe= document.getElementById("headerMe");
    var burgerCtrl = document.getElementById('burgerCtrl');
    var headerMenu = document.querySelector('#headerMenu');
    var header = document.getElementsByTagName('header')[0];
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
    }



})