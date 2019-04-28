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

//客製的船部位被按時，加上外框啦
    var DIYbody = $('.DIYbody');
    var DIYHead = $('.DIYhead');
    var DIYSail = $('.DIYSail');
    
    DIYbody.click(function(){
        DIYbody.not($(this)).css('border',"3px solid #fffcf2");
        $(this).css('border',"3px dashed #006ca6");
    })
    DIYHead.click(function(){
        DIYHead.not($(this)).css('border',"3px solid #fffcf2");
        $(this).css('border',"3px dashed #006ca6");
    })
    DIYSail.click(function(){
        DIYSail.not($(this)).css('border',"3px solid #fffcf2");
        $(this).css('border',"3px dashed #006ca6");
    })


//更換海賊試煉遊戲內文
if(winWidth < 1024){
    $('#homeGameMsg').text("請在電腦進行海賊試煉～");
}



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
        {'prodName':'產品1','prodPrice':100,'saler':'人物1','str':10,'int':10,'agi':10,'luc':10,'img':"trea1.svg"},
        {'prodName':'產品2','prodPrice':200,'saler':'人物2','str':12,'int':12,'agi':12,'luc':12,'img':"trea2.svg"},
        {'prodName':'產品3','prodPrice':300,'saler':'人物3','str':13,'int':13,'agi':13,'luc':13,'img':"trea3.svg"},
        {'prodName':'產品4','prodPrice':400,'saler':'人物4','str':14,'int':14,'agi':14,'luc':14,'img':"tre41.svg"},
        {'prodName':'產品5','prodPrice':100,'saler':'人物1','str':10,'int':10,'agi':10,'luc':10,'img':"trea5.svg"},
        {'prodName':'產品6','prodPrice':200,'saler':'人物2','str':12,'int':12,'agi':12,'luc':12,'img':"trea6.svg"},
        {'prodName':'產品7','prodPrice':300,'saler':'人物3','str':13,'int':13,'agi':13,'luc':13,'img':"trea3.svg"},
        {'prodName':'產品8','prodPrice':400,'saler':'人物4','str':14,'int':14,'agi':14,'luc':14,'img':"trea1.svg"},
        {'prodName':'產品9','prodPrice':200,'saler':'人物2','str':12,'int':12,'agi':12,'luc':12,'img':"trea6.svg"},
    ]

    var prodPrev = $('#homeProdPrev');
    var prodNext = $('#homeProdNext');
    var prodImgS = $('.homeTreaBtn img');

    var ProdIndex = 0;
    prodNext.click(function(){
        ProdIndex++;
        changeProdBig(ProdIndex);
    })
    prodPrev.click(function(){
        ProdIndex--;
        changeProdBig(ProdIndex);
    })
    function changeProdBig(i){

        //將按鈕隱藏或開啟
        if(i==0) prodPrev.addClass('invisible');
        else if(i==8) prodNext.addClass('invisible');
        else{
            prodPrev.removeClass('invisible');
            prodNext.removeClass('invisible');
        }
        
        //先讓內文消失
        $('#homeWrapProd').removeClass('active');
        // console.log(homeProdArr[i]);
        //內文再依序出現
        setTimeout(() => {
            $('#homeProdImg').attr('src',`image/treasure/${homeProdArr[i].img}`);
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
            prodImgS.eq(btn).addClass('active');
            prodImgS.eq(btn).attr({'src':`image/treasure/${homeProdArr[(srcNum+5)%9].img}`})
            srcNum++;
            setTimeout(() => {
                prodImgS.eq(btn).removeClass('active');
                console.log(prodImgS.eq(btn).removeClass('active'))
            }, 1000);


        }
        

    }
    
//要來做船的動畫了唷
    document.addEventListener('scroll',function(){
        var pageY = window.pageYOffset;
    })

    // Init ScrollMagic
    var ctrl = new ScrollMagic.Controller({
        globalSceneOptions: {
        }
    });
    var shipArea = document.getElementById('shipArea');
    var homeDIYTop = document.getElementById('homeDIY').offsetTop;
    var homeGameTop = document.getElementById('homeGame').offsetTop;
    var homeMarketTop = document.getElementById('homeMarket').offsetTop;
    var homeBarTop = document.getElementById('homeBar').offsetTop;
    var homeEndTop = document.getElementById('homeEnd').offsetTop;

    TweenMax.from(shipArea,1,{
        bezier:{values:[{y:-20,x:-100},{y:-80,x:-100}]},
    })

    var toDIY = TweenMax.to(shipArea,1,{
        bezier:{values:[{y:50,x:50},{y:homeDIYTop-220,x:0}]},
        scale:0.6,
    })
    new ScrollMagic.Scene({
        triggerElement:document.getElementById('homeDIY'),
        triggerHook: 'onCenter'
    })
    .setTween(toDIY)
    .addIndicators({'name':'toDIY'})
    .addTo(ctrl)

    var toGame = TweenMax.to(shipArea,1,{
        bezier:{values:[{y:homeDIYTop-500,x:-150},{y:homeGameTop-610,x:0}]},
        scale:0.3,
    })
    new ScrollMagic.Scene({
        triggerElement:document.getElementById('homeGame'),
        triggerHook: 'onEnter'
    })
    .setTween(toGame)
    .addIndicators({'name':'toGame'})
    .addTo(ctrl)

    var toMarket = TweenMax.to(shipArea,1,{
        bezier:{values:[{y:homeGameTop-610,x:-150},{y:homeMarketTop-610,x:0}]},
    })
    new ScrollMagic.Scene({
        triggerElement:document.getElementById('homeMarket'),
        triggerHook: 'onEnter'
    })
    .setTween(toMarket)
    .addIndicators({'name':'toMarket'})
    .addTo(ctrl)
    
    var toBar = TweenMax.to(shipArea,1,{
        bezier:{values:[{y:homeMarketTop-610,x:-150},{y:homeBarTop-610,x:0}]},
    })
    new ScrollMagic.Scene({
        triggerElement:document.getElementById('homeBar'),
        triggerHook: 'onEnter'
    })
    .setTween(toBar)
    .addIndicators({'name':'toBar'})
    .addTo(ctrl)
    
    var toEnd = TweenMax.to(shipArea,1,{
        bezier:{values:[{y:homeBarTop-610,x:-150},{y:homeEndTop-270,x:50}]},
    })
    new ScrollMagic.Scene({
        triggerElement:document.getElementById('homeEnd'),
        triggerHook: 'onEnter'
    })
    .setTween(toEnd)
    .addIndicators({'name':'toEnd'})
    .addTo(ctrl)
});