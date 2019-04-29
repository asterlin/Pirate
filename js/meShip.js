function $id(id) {
    return document.getElementById(id);
}
window.addEventListener('load', function () {

    //若user的web storage有換過造型，就先換上
    var homeStor = sessionStorage;
    if (homeStor['homePartSail']) {
        $id('partSail').data = homeStor['homePartSail'];
        $id('partSail').onload = flagFrame;//更新畫旗的框框
    }
    if (homeStor['homePartBody']) {
        $id('partBody').src = homeStor['homePartBody'];
    }
    if (homeStor['homePartHead']) {
        $id('partHead').src = homeStor['homePartHead'];
    }


    //取得工具列的船身船帆們
    var sails = document.getElementsByClassName('sail');
    var bodys = document.getElementsByClassName('body');
    var heads = document.getElementsByClassName('head');

    //換船帆船身
    function changeSail(e) {
        $id('partSail').data = e.target.src;
        homeStor.setItem('homePartSail', e.target.src) //存進web storage
        $id('partSail').onload = flagFrame;//更新畫旗的框框
    }
    function changeBody(e) {
        $id('partBody').src = e.target.src;
        homeStor.setItem('homePartBody', e.target.src) //存進web storage
    }
    function changeHead(e) {
        $id('partHead').src = e.target.src;
        homeStor.setItem('homePartHead', e.target.src) //存進web storage
    }
    for (var i = 0; i < 3; i++) {
        sails[i].addEventListener('click', changeSail);
        bodys[i].addEventListener('click', changeBody);
        heads[i].addEventListener('click', changeHead);
    }

    //插入色相環
    // var colorPicker = new iro.ColorPicker('#color-picker-container',{
    //     width:250,
    //     color:"#006ca6",
    // });
    // colorPicker.on('color:change',function(){
    //     selectedColor=colorPicker.color.hexString;
    // })


    //畫海賊旗
    //取得canvas
    // var cavDraw= document.getElementById('drawFlag');
    // var ctxDraw = cavDraw.getContext('2d');

    //取得提示筆刷寬度
    // var lineWs = document.getElementsByClassName('LW');
    //取得筆刷頭
    // var pen = $id('pen');
    //設定橡皮擦
    // var erase = false;

    //設定提示筆刷寬度
    // for(var i=0;i<4;i++){
    //     lineWs[i].addEventListener('click',function(e){
    //         var LW = e.target.getAttribute('LW');
    //         ctxDraw.lineWidth = LW;
    //         pen.style.width = LW +"px";
    //         pen.style.height = LW +"px";
    //         erase = false;
    //         console.log(`drawWidth=${ctxDraw.lineWidth}`);
    //     })
    // }

    //設定canvas寬
    cavDraw.width = 600;
    cavDraw.height = 650;


    //設定筆畫參數
    // ctxDraw.lineJoin = "bevel";
    // ctxDraw.lineCap = "round";
    // ctxDraw.lineWidth = 5;

    //當橡皮擦被按了
    // $id('eraser').addEventListener('click',function(){
    //     erase = true;
    // })

    //畫線的函數
    // function draw(e){
    //     //檢查是觸控還是滑鼠，抓不同的XY值
    //     if(e.touches){
    //         var drawX = e.touches[0].pageX-e.touches[0].target.offsetLeft;
    //         var drawY = e.touches[0].pageY-e.touches[0].target.offsetTop;
    //     }else{
    //         var drawX = e.offsetX;
    //         var drawY = e.offsetY;
    //     }
    //     //檢查是否為橡皮擦
    //     if(!erase){
    //         //正常畫線
    //         ctxDraw.globalCompositeOperation="source-over";
    //         ctxDraw.lineTo(drawX,drawY);
    //         ctxDraw.stroke();
    //     }else{
    //         //橡皮擦畫線
    //         ctxDraw.strokeStyle="rgba(0,0,0,1)";
    //         ctxDraw.globalCompositeOperation="destination-out";
    //         ctxDraw.lineTo(drawX,drawY);
    //         ctxDraw.stroke();
    //     }

    // }

    //當滑鼠按在canvas上時
    // cavDraw.addEventListener('mousedown',function(e){
    //     //取得畫筆顏色
    //     ctxDraw.strokeStyle=selectedColor;
    //     //防止圖片被反白
    //     e.preventDefault();
    //     //開始，移動到被點的位置，執行畫線
    //     ctxDraw.beginPath();
    //     ctxDraw.moveTo(e.offsetX,e.offsetY);
    //     cavDraw.addEventListener('mousemove',draw);
    // })
    // //(觸控)當手按在cav上時
    // cavDraw.addEventListener('touchstart',function(e){
    //     //取得畫筆顏色
    //     ctxDraw.strokeStyle=selectedColor;
    //     //防止圖片被反白
    //     e.preventDefault();
    //     //開始，移動到被點的位置，執行畫線
    //     ctxDraw.beginPath();
    //     cavDraw.addEventListener('touchmove',draw)

    // })

    // //滑鼠放開時，移除"畫線"的事件聆聽
    // cavDraw.addEventListener('mouseup',function(){
    //     cavDraw.removeEventListener('mousemove',draw);
    // })
    // cavDraw.addEventListener('mouseout',function(){
    //     cavDraw.removeEventListener('mousemove',draw);
    // })
    // cavDraw.addEventListener('touchend',function(){
    //     cavDraw.removeEventListener('touchmove',draw);
    // })
    
    // //滑鼠移動在畫布上時，筆刷頭跟著滑鼠移動
    // cavDraw.addEventListener('mousemove',function(e){
    //     var LW = ctxDraw.lineWidth;
    //     pen.style.top =(e.offsetY -(LW/2)) +"px";
    //     pen.style.left =(e.offsetX -(LW/2)) +"px";
    // })
    // cavDraw.addEventListener('touchmove',function(e){
    //     var LW = ctxDraw.lineWidth;
    //     pen.style.top =(e.touches[0].pageY-e.touches[0].target.offsetTop -(LW/2)) +"px";
    //     pen.style.left =(e.touches[0].pageX-e.touches[0].target.offsetLeft -(LW/2)) +"px";
    // })

    //繪製組合船體的canvas
    var cavCombine = $id('combineShip');
    var ctxCombine = cavCombine.getContext('2d');

    cavCombine.width = 600;
    cavCombine.height = 650;

    //先用來繪製畫旗的區域
    function flagFrame() {
        ctxCombine.clearRect(0, 0, cavCombine.width, cavCombine.height);

        var area = new Path2D($id('partSail').contentDocument.getElementById('flagArea').getAttribute('d'));

        ctxCombine.strokeStyle = "#ffff00";
        ctxCombine.lineWidth = 5;
        ctxCombine.setLineDash([10, 10]);
        ctxCombine.stroke(area);
    }
    flagFrame();


    $id('finishDIY').addEventListener('click', function () {
        ctxCombine.clearRect(0, 0, cavCombine.width, cavCombine.height);

        //儲存海賊旗頭像
        var avatarUrl = cavDraw.toDataURL();
        $.ajax({
            type: "post",
            url: "saveAvatar.php",
            data: { avatarImg: avatarUrl },
            success: function (response) {
                console.log("It's avatar:" + response)
                // homeStor['avaratDir'] = response;
                //路徑將存入server session，註冊完成後再將路徑寫入資料庫
            }
        });

        //取得船帆路徑，將所畫的海賊旗裁切
        var area = new Path2D($id('partSail').contentDocument.getElementById('flagArea').getAttribute('d'));
        ctxDraw.fillStyle = "#000";
        ctxDraw.globalCompositeOperation = "destination-in"; //這裡會裁切，未來使用時，回到上一步記得要設定回source-over
        ctxDraw.fill(area);

        ctxDraw.clip(area);

        //new一個圖檔，將船帆轉為圖片
        var shipSail = new Image();
        shipSail.src = $id('partSail').data;
        shipSail.addEventListener('load', function () {
            //將各部位畫到全船畫布上
            ctxCombine.drawImage($id('partBody'), 0, 0);
            ctxCombine.drawImage(shipSail, 0, 0);
            ctxCombine.drawImage(cavDraw, 0, 0);
            ctxCombine.drawImage($id('partHead'), 0, 0);

            //取得圖片檔編碼
            var shipUrl = cavCombine.toDataURL();
            // $id('finishDIY').href=shipUrl; //這是用來讓user下載的
            console.log(shipUrl);
            //傳送完整海賊船及部位資訊至php儲存圖檔
            $.ajax({
                type: "post",
                url: "saveFullShip.php",
                data: {
                    fullShipImg: shipUrl,
                    headSrc: $id('partHead').src.slice(-7),
                    bodySrc: $id('partBody').src.slice(-7),
                    sailSrc: shipSail.src.slice(-7),
                },
                success: function (response) {
                    console.log("It's fullShip:" + response)
                    // homeStor['fullShipDir'] = response;
                    //路徑將存入server session，註冊完成後再將路徑寫入資料庫
                }
            });
        })
        // console.log(cavCombine.toDataURL());
    })
})