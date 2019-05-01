<<<<<<< HEAD
=======
// import { TweenMax } from "gsap";

// import { TweenMax, TimelineMax } from "gsap";
var storage = sessionStorage;
>>>>>>> 80c983e0f57006bd8b622a8848daa3992c4acd7d
$(document).ready(function () {

    console.log($('#homeDIY').offset().top);

    //收起header (header真的好大)
    $(window).on('scroll',function(){
        if(window.pageYOffset > 900){
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


<<<<<<< HEAD

=======
//更換海賊試煉遊戲內文
if(winWidth < 1024){
    console.log($('#homeGameMsg .button_border').eq(0));
    $('#homeGameMsg').text("請在電腦進行海賊試煉～");
    $('#homeGameMsg .button_border').eq(0).addClass('justHide');
    
}

// document.querySelector('#homeGamePlay video').play();


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
>>>>>>> 80c983e0f57006bd8b622a8848daa3992c4acd7d
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
        
<<<<<<< HEAD
        $('.homeProdInfoCard').eq(hProdIndex).children().addClass('homeProdAct');
        $('.homeProdImg').eq(hProdIndex).addClass('homeProdAct');
        hProdIndex--;
        if(hProdIndex < 0) hProdIndex = hProdsL - 1;
=======
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
function showMsglitbo(msg){}
//購買黑市商品
    $('#homeProdBuy').click(function(){
<<<<<<< HEAD
        $.ajax({
            type: "POST",
            url: "backstage/php/homeBuyTrea.php",
            data:{tradeId:$(this).attr('tradeId')},
            success: function (r) {
                console.log(r);
                var obj = JSON.parse(r);
                console.log(obj.memNic);
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
                showMsglitbo(msg);

            },
        });
=======
        console.log('按了');
        if(checkLog()){
            console.log('是登入')
            $.ajax({
                type: "POST",
                url: "backstage/php/homeBuyTrea.php",
                data:{
                    tradeId:$(this).attr('tradeId'),
                    memId:storage['memId'],
                },
                success: function (r) {
                    console.log(r);
                    var obj = JSON.parse(r);
                    console.log(obj.memNic);
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
                        msg +="前往<a href='me.php'>俺の海賊船</a>查看寶物"
                    }else{
                        msg += '<p>';
                        msg +=  obj.msg;
                        msg += '</p>';
                    }
                    showMsglitbo(msg);
    
                },
            });
        }else{
            document.getElementById('loginBox').style.display="block";
            $('#feedback').text("請先登入").css('color','red');
        }
        
>>>>>>> homeBy7177
>>>>>>> 80c983e0f57006bd8b622a8848daa3992c4acd7d
    })


});