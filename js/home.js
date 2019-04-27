// import { TweenMax, TimelineMax } from "gsap";

$(document).ready(function () {

    // console.log($('#homeDIY').offset().top);

    //收起header (header真的好大)
    $(window).on('scroll',function(){
        if(window.pageYOffset > 750){
            $('header').removeClass('homeHeadHide')
        }else{
            $('header').addClass('homeHeadHide')
        }
    })
    
    // 取得目前卷軸位置至文件最上方的距離
    var curPos = $(window).scrollTop();
    var homeDIYTop = $('#homeDIY').offset().top;
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
    var DIYHead = $('.DIYHead');
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
        $('#homeWrapProd').removeClass('active');
        console.log(homeProdArr[i]);
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
            console.log('hi?')
        }, 600);
    }
    


    
});