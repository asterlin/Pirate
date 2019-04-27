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
    var DIYNexts = document.querySelectorAll('#DIYPanel .DIYNext');
    var DIYSta = $('#DIYStatus li');
    var DIYStaLine = $('.DIYStatLine');
    var DIYSlide = $('.DIYSlide');

    $('#DIYStatus li').click(function(){
        
        console.log(this);
        $(this).css({backgroundColor:"yellow"})

    })
    
    DIYNexts.forEach(element => {
        element.addEventListener('click',function(e){
            e.currentTarget.parentNode.classList.add('justHide');
            e.currentTarget.parentNode.nextElementSibling.classList.remove('justHide');
        })
    });
    var DIYPrevs = document.querySelectorAll('#DIYPanel .DIYPrev');
    
    DIYPrevs.forEach(element => {
        element.addEventListener('click',function(e){
            e.currentTarget.parentNode.classList.add('justHide');
            e.currentTarget.parentNode.previousElementSibling.classList.remove('justHide');
        })
    });



    function showTreaBtn(){
        if(winWidth<768){
            $('.homeTreaBtn').addClass('justHide');
        }else{
            $('.homeTreaBtn').removeClass('justHide');
        }
    }
    showTreaBtn();    
    // 海上市集的下一個紐，總之.....還有很多bug...
    var hProdIndex =0;
    var hProdsL = document.getElementsByClassName('homeWrapProd').length;
    $('#homeProdNext').on('click',function(){
        $('.homeProdInfoCard').children().removeClass('homeProdAct');
        $('.homeProdImg').removeClass('homeProdAct');
        
        $('.homeProdInfoCard').eq(hProdIndex+1).children().addClass('homeProdAct');
        $('.homeProdImg').eq(hProdIndex+1).addClass('homeProdAct');
        hProdIndex++;
        if(hProdIndex > (hProdsL-2)) hProdIndex=-1;
    })
    $('#homeProdPrev').on('click',function(){
        $('.homeProdInfoCard').children().removeClass('homeProdAct');
        $('.homeProdImg').removeClass('homeProdAct');
        
        $('.homeProdInfoCard').eq(hProdIndex).children().addClass('homeProdAct');
        $('.homeProdImg').eq(hProdIndex).addClass('homeProdAct');
        hProdIndex--;
        if(hProdIndex < 0) hProdIndex = hProdsL - 1;
    })


    //要開始移動地圖了喔

// if (winWidth >=1024){
//     //第一屏:船放大到DIY
//     var mapToDIYTl = new TimelineMax();
//     mapToDIYTl.add(TweenMax.to('.homeMap',1,{scale:3,opacity:0,}))
//         .add(TweenMax.to('#shipArea',1,{scale:1,x:'50%',y:'-20%'}),'0')
//         .set($('.homeMap'),{css:{zIndex:-1}})

//     var ctrl = new ScrollMagic.Controller({
//         globalSceneOptions: {
//             triggerHook: '0'
//         }
//     });

//     new ScrollMagic.Scene({
//         duration:'95%',
//         // triggerElement:$('#homeDIY'),
//     })
//     .addIndicators({name:'homeDIY'})
//     .setTween(mapToDIYTl)
//     .addTo(ctrl);

//     //第二幕:船移動到試煉場
//     var mapToGameTl = new TimelineMax();
//     mapToGameTl.add(TweenMax.to('.homeMap',1,{
//             scale:1.5,
//             opacity:1,
//             x:'15%',
//             y:'-20%',
//             onStart:function(){
//                 mapToDIYTl.set('.homeMap',{className:'-=justHide'})
//             }
//         }),'0')
//         .add(TweenMax.to('#shipArea',1,{scale:0.5,x:'60%',y:'-20%'}),'0')
//         .add(TweenMax.to('#shipArea',1,{opacity:0,delay:1}),'1')
//         .add(TweenMax.to('.homeMap',1,{opacity:0,delay:1}),'1')
//         // .set('.homeMap',{className:"-=justHide"})
        

//     new ScrollMagic.Scene({
//         duration:'90%',
//         triggerElement:$('#homeDIY'),
//     })
//     .addIndicators({name:'game'})
//     .setTween(mapToGameTl)
//     .addTo(ctrl)

//     // var shipToGame = new TimelineMax();
//     // shipToGame.add(TweenMax.to('#shipArea',1,{scale:0.3,x:'90%'}),'0')
//     //     .add(TweenMax.fromTo('#homeGameBanner',1,
//     //         {x:'100%',scale:2,opacity:0},
//     //         {x:'28%',scale:1,opacity:1}
//     //         ),'0')
//     //     // .add(TweenMax.to('#shipArea',1,{x:'100%'}))

//     // new ScrollMagic.Scene({
//     //     duration:'60%',
//     //     triggerElement:$('#homeDIY'),
//     // })
//     // .setPin($('#homeGameBanner'))
//     // .addIndicators({name:'game'})
//     // .setTween(shipToGame)
//     // .addTo(ctrl)

//     //第三幕：船到海上市集
//     var mapToMarketTl = new TimelineMax();
//     mapToMarketTl.add(TweenMax.to('.homeMap',1,{opacity:1,}),'0')
//         .add(TweenMax.to('#shipArea',1,{opacity:1}),'0')
//         .add(TweenMax.to('.homeMap',1,{x:'10%',y:'-70%'}),'0')
//         .add(TweenMax.to('.homeMap',1,{x:'5%',y:'-75%'}),'1')
//         .add(TweenMax.to('.homeMap',1,{x:'-20%',y:'-25%'}),'2')
//         .add(TweenMax.to('#shipArea',1,{opacity:0,delay:1}),'3')
//         .add(TweenMax.to('.homeMap',1,{opacity:0,delay:1}),'3')

        

//     new ScrollMagic.Scene({
//         duration:'100%',
//         triggerElement:$('#homeGameGPS'),
//     })
//     .addIndicators({name:'market'})
//     .setTween(mapToMarketTl)
//     .addTo(ctrl)

//     //第四幕：船到情報酒館
//     var mapToBarTl = new TimelineMax();
//     mapToBarTl.add(TweenMax.to('.homeMap',1,{opacity:1,}),'0')
//         .add(TweenMax.to('#shipArea',1,{opacity:1}),'0')
//         .add(TweenMax.to('.homeMap',1,{x:'-35%'}),'1')
//         .add(TweenMax.to('#shipArea',1,{opacity:0,delay:1}),'2')
//         .add(TweenMax.to('.homeMap',1,{opacity:0,delay:1}),'2')

        

//     new ScrollMagic.Scene({
//         duration:'80%',
//         triggerElement:$('#homeMarketProdInfo'),
//     })
//     .addIndicators({name:'bar'})
//     .setTween(mapToBarTl)
//     .addTo(ctrl)

// }

});