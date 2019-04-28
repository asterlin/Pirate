// import { TweenMax } from "gsap";

// import { TweenMax, TimelineMax } from "gsap";

$(document).ready(function () {

    // console.log($('#homeDIY').offset().top);

    //收起header (header真的好大)
    // $(window).on('scroll',function(){
    //     if(window.pageYOffset > 750){
    //         $('header').removeClass('homeHeadHide')
    //     }else{
    //         $('header').addClass('homeHeadHide')
    //     }
    // })
    
    var winWidth = window.innerWidth;
    window.addEventListener('resize',function(){
        winWidth = window.innerWidth;
        showTreaBtn();    
    })

//通頁連結的滾動
$('.scrToDIY').click(function(){
    $('html, body').animate({
        scrollTop: $("#homeDIY").offset().top
    }, 1000);
})


//客製的下一步紐
    //取得變數
    var DIYSta = $('.DIYStatusDot');
    var DIYStaLine = $('.DIYStatLine');
    var DIYPrev =  $('#DIYPrev');
    var DIYNext =  $('#DIYNext');
    var finishDIY = $('#finishDIY');

    //當上方狀態條被按時
    $('.DIYStatusDot').click(function(){
        
        $(this).addClass('current'); 
        DIYSta.not($(this)).removeClass('current'); 
        $(this).prevAll('.DIYStatusDot').addClass('active'); 
        $(this).prevAll(".DIYStatBar").children().addClass('active')

        $(this).removeClass('active');
        $(this).nextAll('.DIYStatusDot').removeClass('active');
        $(this).nextAll(".DIYStatBar").children().removeClass('active')

        //更換步驟按鈕，及面板顯示內容
        changeDIYBtn($(this).index('.DIYStatusDot'));
    })
    //當下一步被按時
    DIYNext.click(function(){
        var cur = $('.DIYStatusDot.current');

        cur.addClass('active');
        cur.prevAll('.DIYStatusDot').addClass('active');

        //取得目前索引值，並調整狀態列
        var btnI = $('.current').index('.DIYStatusDot');
        DIYSta.eq(btnI).removeClass('current');
        DIYSta.eq(btnI+1).addClass('current');
        DIYStaLine.eq(btnI).addClass('active');

        //調整步驟按鈕，及面板顯示內容
        changeDIYBtn(btnI+1);
    })
    //當上一部被案
    DIYPrev.click(function(){
        var cur = $('.DIYStatusDot.current');
        cur.removeClass('active');
        cur.nextAll('.DIYStatusDot').removeClass('active');

        //取得目前索引值，並調整狀態列
        var btnI = $('.current').index('.DIYStatusDot');
        DIYSta.eq(btnI).removeClass('current');
        DIYSta.eq(btnI-1).addClass('current');
        if(btnI==2) DIYStaLine.eq(btnI-2).addClass('active');
        DIYStaLine.eq(btnI-1).removeClass('active');
        
        //調整步驟按鈕，及面板顯示內容
        changeDIYBtn(btnI-1);
    })

    //調整步驟按鈕的可見度，及面板顯示內容
    function changeDIYBtn(i){
        switch(i){
            case 0 :
                $('#DIYSlides').css({left:0});
                DIYPrev.addClass('invisible');
                DIYNext.removeClass('invisible');
                finishDIY.addClass('invisible');
                break;
            case 1 :
                $('#DIYSlides').css({left:'-100%'});
                DIYPrev.removeClass('invisible');
                DIYNext.removeClass('invisible');
                finishDIY.addClass('invisible');
                break;
            case 2 :
                $('#DIYSlides').css({left:'-200%'});
                DIYPrev.removeClass('invisible');
                DIYNext.addClass('invisible');
                finishDIY.removeClass('invisible');
                break;
        }
    }



//更換海賊試煉遊戲內文
if(winWidth < 1024){
    $('#homeGameMsg').text("請在電腦進行海賊試煉～");
}

//動態調整懸賞排行的文字大小
    var getFontSize = (textLength) => {
        var fozi = 1.5;
        if(textLength>5){
            fozi -= ((textLength-5)*0.125);
        }
        return fozi;
    }
    var wantNames =  document.getElementsByClassName('wantName');
    for(let i =0;i<wantNames.length;i++){
        wantNames[i].style.fontSize =`${getFontSize(wantNames[i].textContent.length)}rem`;
    }
        
//市集的商品按鈕
    function showTreaBtn(){
        if(winWidth<768){
            $('.homeTreaBtn').addClass('justHide');
        }else{
            $('.homeTreaBtn').removeClass('justHide');
        }
    }
    showTreaBtn();   
    //市集更換商品

    var homeProdArr = [
        {'tradeId':1,'prodName':'產品1','prodPrice':100,'saler':'人物1','str':10,'int':10,'agi':10,'luc':10,'img':"trea1.svg"},
        {'tradeId':2,'prodName':'產品2','prodPrice':200,'saler':'人物2','str':12,'int':12,'agi':12,'luc':12,'img':"trea2.svg"},
        {'tradeId':3,'prodName':'產品3','prodPrice':300,'saler':'人物3','str':13,'int':13,'agi':13,'luc':13,'img':"trea3.svg"},
        {'tradeId':4,'prodName':'產品4','prodPrice':400,'saler':'人物4','str':14,'int':14,'agi':14,'luc':14,'img':"tre41.svg"},
        {'tradeId':5,'prodName':'產品5','prodPrice':100,'saler':'人物1','str':10,'int':10,'agi':10,'luc':10,'img':"trea5.svg"},
        {'tradeId':6,'prodName':'產品6','prodPrice':200,'saler':'人物2','str':12,'int':12,'agi':12,'luc':12,'img':"trea6.svg"},
        {'tradeId':7,'prodName':'產品7','prodPrice':300,'saler':'人物3','str':13,'int':13,'agi':13,'luc':13,'img':"trea3.svg"},
        {'tradeId':8,'prodName':'產品8','prodPrice':400,'saler':'人物4','str':14,'int':14,'agi':14,'luc':14,'img':"trea1.svg"},
        {'tradeId':9,'prodName':'產品9','prodPrice':200,'saler':'人物2','str':12,'int':12,'agi':12,'luc':12,'img':"trea6.svg"},
    ]

    var prodPrev = $('#homeProdPrev');
    var prodNext = $('#homeProdNext');
    var prodImgS = $('.homeTreaBtn img');
    var prodBtns = $('.homeTreaBtn');

    var ProdIndex = 0;
    prodNext.click(function(){
        ProdIndex++;
        if(ProdIndex == 9) ProdIndex=0; //重製索引值
        changeProdBig(ProdIndex);
    })
    prodPrev.click(function(){
        ProdIndex--;
        if(ProdIndex == -1) ProdIndex=8; //重製索引值
        changeProdBig(ProdIndex);
    })
    prodBtns.click(function(){
        ProdIndex = homeProdArr.map(function(e) { return e.tradeId; }).indexOf(parseInt($(this).children('img').attr('tradeId')));
        changeProdBig(ProdIndex);
    })

    function changeProdBig(i){

        //將按鈕隱藏或開啟
        // if(i==0) prodPrev.addClass('invisible');
        // else if(i==8) prodNext.addClass('invisible');
        // else{
        //     prodPrev.removeClass('invisible');
        //     prodNext.removeClass('invisible');
        // }
        
        //先讓內文消失
        $('#homeWrapProd').removeClass('active');
        // console.log(homeProdArr[i]);
        //內文再依序出現
        setTimeout(() => {
            $('#homeProdImg').attr({'src':`image/treasure/${homeProdArr[i].img}`,'tradeId':homeProdArr[i].tradeId});
            $('#homeProdName').text(homeProdArr[i].prodName);
            $('#homeProdPrice').text(homeProdArr[i].prodPrice);
            $('#homeProdSaler').text(homeProdArr[i].saler);
            $('#homeProdStr').text(homeProdArr[i].str);
            $('#homeProdInt').text(homeProdArr[i].int);
            $('#homeProdAgi').text(homeProdArr[i].agi);
            $('#homeProdLuc').text(homeProdArr[i].luc);
            $('#homeWrapProd').addClass('active');
        }, 400);

        //更換小圖的圖片
        var srcNum = i;
        for(var btn = 0; btn< 9;btn ++){
            let index = (srcNum+5)%9;
            prodImgS.eq(btn).addClass('active');
            prodImgS.eq(btn).prev().text(homeProdArr[index].prodName)
            prodImgS.eq(btn).attr({'src':`image/treasure/${homeProdArr[index].img}`,'tradeId':homeProdArr[index].tradeId})
            setTimeout(() => {
                prodImgS.removeClass('active');
            }, 200);
            srcNum++;


        }
    }
    
//要來做船的動畫了唷
    // document.addEventListener('scroll',function(){
    //     var pageY = window.pageYOffset;
    // })

    // // Init ScrollMagic
    // var ctrl = new ScrollMagic.Controller({
    //     globalSceneOptions: {
    //     }
    // });
    // var shipArea = document.getElementById('shipArea');
    // var homeDIYTop = document.getElementById('homeDIY').offsetTop;
    // var homeGameTop = document.getElementById('homeGame').offsetTop;
    // var homeMarketTop = document.getElementById('homeMarket').offsetTop;
    // var homeBarTop = document.getElementById('homeBar').offsetTop;
    // var homeEndTop = document.getElementById('homeEnd').offsetTop;
    // var shipPosRWD = [
    //     {'toDIY':220,'DIYScale':0.6,'toGame1':500,'toGame2':610,'toEnd':270},
    //     {'toDIY':220,'DIYScale':1,'toGame1':500,'toGame2':610,'toEnd':270},
    // ]


    // TweenMax.from(shipArea,1,{
    //     bezier:{values:[{y:-20,x:-100},{y:-80,x:-100}]},
    // })

    // //在不同螢幕寬度給予不同參數
    // if(winWidth<1024) var shipPos = 0;
    // else var shipPos = 1;
    
    // var toDIY = TweenMax.to(shipArea,1,{
    //     bezier:{values:[{y:50,x:50},{y:homeDIYTop-shipPosRWD[shipPos].toDIY,x:0}]},
    //     scale:shipPosRWD[shipPos].DIYScale,
    // })
    // new ScrollMagic.Scene({
    //     triggerElement:document.getElementById('homeDIY'),
    //     triggerHook: 'onCenter'
    // })
    // .setTween(toDIY)
    // .addIndicators({'name':'toDIY'})
    // .addTo(ctrl)

    // var toGame = TweenMax.to(shipArea,1,{
    //     bezier:{values:[{y:homeDIYTop-shipPosRWD[shipPos].toGame1,x:-150},{y:homeGameTop-shipPosRWD[shipPos].toGame2,x:0}]},
    //     scale:0.3,
    // })
    // new ScrollMagic.Scene({
    //     triggerElement:document.getElementById('homeGame'),
    //     triggerHook: 'onEnter'
    // })
    // .setTween(toGame)
    // .addIndicators({'name':'toGame'})
    // .addTo(ctrl)

    // var toMarket = TweenMax.to(shipArea,1,{
    //     bezier:{values:[{y:homeGameTop-shipPosRWD[shipPos].toGame2,x:-150},{y:homeMarketTop-shipPosRWD[shipPos].toGame2,x:0}]},
    // })
    // new ScrollMagic.Scene({
    //     triggerElement:document.getElementById('homeMarket'),
    //     triggerHook: 'onEnter'
    // })
    // .setTween(toMarket)
    // .addIndicators({'name':'toMarket'})
    // .addTo(ctrl)
    
    // var toBar = TweenMax.to(shipArea,1,{
    //     bezier:{values:[{y:homeMarketTop-shipPosRWD[shipPos].toGame2,x:-150},{y:homeBarTop-shipPosRWD[shipPos].toGame2,x:0}]},
    // })
    // new ScrollMagic.Scene({
    //     triggerElement:document.getElementById('homeBar'),
    //     triggerHook: 'onEnter'
    // })
    // .setTween(toBar)
    // .addIndicators({'name':'toBar'})
    // .addTo(ctrl)
    
    // var toEnd = TweenMax.to(shipArea,1,{
    //     bezier:{values:[{y:homeBarTop-shipPosRWD[shipPos].toGame2,x:-150},{y:homeEndTop-shipPosRWD[shipPos].toGame2,x:50}]},
    // })
    // new ScrollMagic.Scene({
    //     triggerElement:document.getElementById('homeEnd'),
    //     triggerHook: 'onEnter'
    // })
    // .setTween(toEnd)
    // .addIndicators({'name':'toEnd'})
    // .addTo(ctrl)
});