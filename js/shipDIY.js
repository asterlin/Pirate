function $id(id){
    return document.getElementById(id); 
}
window.addEventListener('load',function(){
    

    //取得工具列的船身船帆們
    var DIYsails=document.getElementsByClassName('DIYSail');
    var DIYbodys=document.getElementsByClassName('DIYbody');
    var DIYheads=document.getElementsByClassName('head');

    //換船帆船身
    function changeSail(e){
        $id('partSail').data = e.target.src;

        $id('partSail').onload=flagFrame;//更新畫旗的框框
    }
    function changeBody(e){
        $id('partBody').src = e.target.src;
    }
    for(var i=0;i<3;i++){
        DIYsails[i].addEventListener('click',changeSail);
        DIYbodys[i].addEventListener('click',changeBody);
    }

    //插入色相環
    var colorPicker = new iro.ColorPicker('#color-picker-container',{
        width:250,
        color:"#006ca6",
    });
    colorPicker.on('color:change',function(){
        selectedColor=colorPicker.color.hexString;
        $id('penColor').style.backgroundColor=selectedColor;
    })


    //畫海賊旗
    //取得canvas
    var cavDraw= document.getElementById('drawFlag');
    var ctxDraw = cavDraw.getContext('2d');

    //取得提示筆刷寬度
    var lineWs = document.getElementsByClassName('penWidth');
    //取得筆刷頭
    var pen = $id('pen');
    //設定橡皮擦
    var erase = false;

    //設定提示筆刷寬度
    for(var i=0;i<4;i++){
        lineWs[i].addEventListener('click',function(e){
            var LW = e.target.getAttribute('LW');
            ctxDraw.lineWidth = LW;
            pen.style.width = LW +"px";
            pen.style.height = LW +"px";
            erase = false;
            $id('eraser').style.border="#362e2b 2px solid";
            $id('penColor').style.border = "#fffcf2 3px solid";
            for(var i=0;i<4;i++){
                lineWs[i].style.outline="none";
            }
            e.target.style.outline = "#fffcf2 3px solid";
        })
    }
    $id('penColor').addEventListener('click',function(){
        erase = false;
        $id('eraser').style.border="#362e2b 2px solid";
        $id('penColor').style.border = "#fffcf2 3px solid";
    })

    //設定canvas寬
    cavDraw.width=600;
    cavDraw.height = 650;
    

    //設定筆畫參數
    ctxDraw.lineJoin = "bevel";
    ctxDraw.lineCap = "round";
    ctxDraw.lineWidth = 5;

    //當橡皮擦被按了
    $id('eraser').addEventListener('click',function(){
        erase = true;
        $id('eraser').style.border="#fffcf2 2px solid";
        $id('penColor').style.border = "#362e2b 3px solid";
    })

    //清空畫布
    function cleanCav(cav){
        cav.clearRect(0,0,cavCombine.width,cavCombine.height);
    }

    //當刪除被按了
    $id('cleanDraw').addEventListener('click',function(){
        cleanCav(ctxDraw);
    })
    //畫線的函數
    function draw(e){
        //檢查是否為橡皮擦
        if(!erase){
            //正常畫線
            ctxDraw.globalCompositeOperation="source-over";
            ctxDraw.lineTo(e.offsetX,e.offsetY);
            ctxDraw.stroke();
        }else{
            //橡皮擦畫線
            ctxDraw.strokeStyle="rgba(0,0,0,1)";
            ctxDraw.globalCompositeOperation="destination-out";
            ctxDraw.lineTo(e.offsetX,e.offsetY);
            ctxDraw.stroke();
        }

    }
    
    //當滑鼠按在canvas上時
    cavDraw.addEventListener('mousedown',function(e){
        //取得畫筆顏色
        ctxDraw.strokeStyle=selectedColor;
        //防止圖片被反白
        e.preventDefault();
        //開始，移動到被點的位置，執行畫線
        ctxDraw.beginPath();
        ctxDraw.moveTo(e.offsetX,e.offsetY);
        cavDraw.addEventListener('mousemove',draw);
    })

    //滑鼠放開時，移除"畫線"的事件聆聽
    cavDraw.addEventListener('mouseup',function(){
        cavDraw.removeEventListener('mousemove',draw);
    })

    //滑鼠移動在畫布上時，筆刷頭跟著滑鼠移動
    cavDraw.addEventListener('mousemove',function(e){
        var LW = ctxDraw.lineWidth;
        pen.style.top =(e.offsetY -(LW/2)) +"px";
        pen.style.left =(e.offsetX -(LW/2)) +"px";
    })
    

    //繪製組合船體的canvas
    var cavCombine = $id('combineShip');
    var ctxCombine = cavCombine.getContext('2d');

    cavCombine.width=600;
    cavCombine.height = 650;

    //先用來繪製畫旗的區域
    function flagFrame(){
        ctxCombine.clearRect(0,0,cavCombine.width,cavCombine.height);
        console.log($id('partSail').contentDocument);
        var area = new Path2D($id('partSail').contentDocument.getElementById('flagArea').getAttribute('d'));

        ctxCombine.strokeStyle = "#a34f49";
        ctxCombine.lineWidth=5;
        ctxCombine.setLineDash([10, 10]);
        ctxCombine.stroke(area);
    }
    flagFrame();


    $id('finishDIY').addEventListener('click',function(){
        cleanCav(ctxCombine);
        
        
        var area = new Path2D($id('partSail').contentDocument.getElementById('flagArea').getAttribute('d'));
        ctxDraw.fillStyle="#000";
        ctxDraw.globalCompositeOperation="destination-in"; //這裡會裁切，未來使用時，回到上一步記得要設定回source-over
        ctxDraw.fill(area);

        ctxDraw.clip(area);
        var shipSail = new Image();
        shipSail.src = $id('partSail').data;
        shipSail.addEventListener('load',function(){
            ctxCombine.drawImage(shipSail,0,0);
            ctxCombine.drawImage($id('partBody'),0,0);
            ctxCombine.drawImage(cavDraw,0,0);

            var shipUrl = cavCombine.toDataURL(); //想不到是哪裡要onload，這個才能正確執行，總之現在要按兩次才會下載
            $id('finishDIY').href=shipUrl;
        })
        
        // console.log(cavCombine.toDataURL());

    })
})