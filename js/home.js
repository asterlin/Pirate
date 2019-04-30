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
    hotIssueText();

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
                ctxDraw.restore();
                // flagFrame();
                break;
            case 1 :
                $('#DIYSlides').css({left:'-100%'});
                DIYPrev.removeClass('invisible');
                DIYNext.removeClass('invisible');
                finishDIY.addClass('invisible');
                ctxDraw.restore();
                // flagFrame();
                break;
            case 2 :
                $('#DIYSlides').css({left:'-200%'});
                DIYPrev.removeClass('invisible');
                DIYNext.addClass('invisible');
                finishDIY.removeClass('invisible');
                prevDIY();
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
        }else if(winWidth < 1025){
            $('.homeTreaBtn').removeClass('justHide');
            $('.homeTreaBtn').eq(0).addClass('justHide');
            $('.homeTreaBtn').eq(1).addClass('justHide');
            $('.homeTreaBtn').eq(7).addClass('justHide');
            $('.homeTreaBtn').eq(8).addClass('justHide');
        }else{
            $('.homeTreaBtn').removeClass('justHide');
        }
    }
    showTreaBtn();   

    //市集更換商品
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
    prodBtns.click(function(e){//homeProdArr是從首頁php接近來的
        ProdIndex = homeProdArr.map(function(e) { return e.tradeId; }).indexOf($(this).children('img').attr('tradeId'));
        changeProdBig(ProdIndex);
    })

    function changeProdBig(i){
        
        
        //先讓內文消失
        $('#homeWrapProd').removeClass('active');
        //內文再依序出現
        setTimeout(() => {
            $('#homeProdImg').attr({'src':`image/treasure/${homeProdArr[i].treaImg}`,});
            $('#homeProdBuy').attr('tradeId',homeProdArr[i].tradeId)
            $('#homeProdName').text(homeProdArr[i].treaName);
            $('#homeProdPrice').text(homeProdArr[i].price);
            $('#homeProdSaler').text(homeProdArr[i].memNic);
            $('#homeProdStr').text(homeProdArr[i].treaStr);
            $('#homeProdInt').text(homeProdArr[i].treaInt);
            $('#homeProdLuc').text(homeProdArr[i].treaLuk);
            $('#homeProdAgi').text(homeProdArr[i].treaAgi);
            $('#homeWrapProd').addClass('active');
        }, 400);

        //更換小圖的圖片
        var srcNum = i;
        for(var btn = 0; btn< 9;btn ++){
            let index = (srcNum+5)%9;
            prodImgS.eq(btn).addClass('active');
            prodImgS.eq(btn).prev().text(homeProdArr[index].treaName)
            prodImgS.eq(btn).attr({'src':`image/treasure/${homeProdArr[index].treaImg}`,'tradeId':homeProdArr[index].tradeId})
            setTimeout(() => {
                prodImgS.removeClass('active');
            }, 200);
            srcNum++;


        }
    }

//購買黑市商品
    $('#homeProdBuy').click(function(){
        $.ajax({
            type: "POST",
            url: "backstage/php/homeBuyTrea.php",
            data:{tradeId:$(this).attr('tradeId')},
            success: function (r) {
                console.log(r);
                var obj = JSON.parse(r);
                console.log(obj.memNic);
                var paper = document.querySelector('#Msglightbox .paper');
                msg='';
                if(obj.buyerMoney){
                    msg += '<p>您已購買<strong>';
                    msg +=  obj.treaName;
                    msg += '</strong></p>';
                    msg += '<p>金額：';
                    msg += obj.price;
                    msg += '</p>';
                    msg += '<p>您的剩餘金幣：';
                    msg += obj.buyerMoney;
                    msg += '</p>';
                }else{
                    msg += '<p>';
                    msg +=  obj.msg;
                    msg += '</p>';
                }
                paper.innerHTML=msg;
                document.getElementById('Msglightbox').style.display='block';

            },
        });
    })


//情報酒館計算字數
function hotIssueText() {
    let innerWidth = window.innerWidth;
    let text, titLength;
    let title = document.getElementsByClassName('artTit');
    for (let i = 0; i < arrhotIssue.length; i++) {
        titLength = title[i].innerText.length;
        text = arrhotIssue[i];
        if (titLength > 15) {
            title[i].style.fontSize = "18px";
            if (innerWidth <= 960) {
                if(arrhotIssue[i].length > 30){
                    text = text.substr(0,30);
                    text += `...`;
                }
            }else{
                if(arrhotIssue[i].length > 10){
                    text = text.substr(0,10);
                    text += `...`;
                }
            }
        }else{
            if(arrhotIssue[i].length > 30){
                text = text.substr(0,30);
                text += `...`;
            }
        }
        document.getElementsByClassName('hotIssueBoxContText')[i].innerText = text;
    }
}

hotIssueText()


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