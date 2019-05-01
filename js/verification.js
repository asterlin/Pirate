var number;
var mystatus;
var storage = sessionStorage;
function logBox(){
    $('#loginBox').css('display','block');
    
}

$('#signUp').click(login);
$('#btnver').click(verification);
$('#signlbtn').click(left);
$('#signrbtn').click(right);
number = getrandom(3)*90;
var imgrotate = document.getElementById("signnew");
imgrotate.style.transform = "rotate(" + number + "deg)";

//按下登入後，檢查資料
function login(){    
    var signmemId = $('#signmemId').val();
    var signmemPsw= $('#signmemPsw').val();
    if(signmemId==""){
        $('#feedback').text("請乖乖輸入").css('color','red');
        $('#signmemId').focus();
    }else if(signmemPsw==""){
        $('#feedback').text("請乖乖輸入").css('color','red');
        $('#signmemPsw').focus();
    }
    else if(number%360!=0){
        $('#feedback').text("請旋轉上圖至正確方向").css('color','red');
    }else{
        $.ajax({
            url: 'signup.php',
            data: {signmemId:signmemId,signmemPsw:signmemPsw},
            type: 'GET',
            success: function(data){
                console.log(data);
                if(data!=0){
                    $('#loginBox').css('display','none');
                    intoSession(data);
                    // getStatus();
                }else if(data==0){
                    $('#feedback').text("帳號或密碼錯誤").css('color','red');
                }
            },
        });
    }
}

// 將各資寫入web session
function intoSession(jsonStr){
    mystatus = JSON.parse(jsonStr);
    // 存入session
    storage['memId'] = mystatus[0].memId;
    storage['memPsw'] = mystatus[0].memPsw;
    storage['memNic'] = mystatus[0].memNic;
    storage['memLv'] = mystatus[0].memLv;
    storage['memExp'] = mystatus[0].memExp;
    storage['memMoney'] = mystatus[0].memMoney;
    storage['intelligence'] = mystatus[0].intelligence;
    storage['strength'] = mystatus[0].strength;
    storage['agile'] = mystatus[0].agile;
    storage['luck'] = mystatus[0].luck;
    storage['shipTotalVote'] = mystatus[0].shipTotalVote;
    storage['shipImgAll'] = mystatus[0].shipImgAll;
    storage['playedTimes'] = mystatus[0].playedTimes;
    storage['talentPointsRemain'] = mystatus[0].talentPointsRemain;
}

//旋轉圖片
function left(){
    number -= 90;
    number %=360;
    document.getElementById("signnew").style.transform = `rotate(${number}deg)`;
    var content = $('#signcontent');
}
function right(){
    number += 90;
    number %=360;
    document.getElementById("signnew").style.transform = `rotate(${number}deg)`;
    var content = $('#signcontent');
}
 
function verification(){
    // console.log('verification.....');
    var memId = $('#memId').val();
    var memPsw= $('#memPsw').val();
    var memNic = $('#memNic').val();
    var memCon = $('#memCon').val();
    // console.log(typeof memId);
    // console.log(memNic);
    // console.log(memCon);
    var fullShipDir = storage['fullShipDir'];
    var custList = storage['custList'];
    var avatarDir = storage['avatarDir'];
    if($('#memId').val()==""){
        $('#memId').focus();
        $('#feedback2').text("請乖乖輸入").css('color','red');
    }else if($('#memNic').val()==""){
        $('#memNic').focus();
        $('#feedback2').text("請乖乖輸入").css('color','red');
    }else if($('#memPsw').val()==""){
        $('#memPsw').focus();
        $('#feedback2').text("請乖乖輸入").css('color','red');
    }else if($('#memCon').val()==""){
        $('#memCon').focus();
        $('#feedback2').text("請乖乖輸入").css('color','red');

    }else if(memPsw != memCon){
        $('#feedback2').text("密碼確認有誤").css('color','red');
        $('#memCon').focus();
    }else if( !avatarDir || !fullShipDir || !custList){
        $('#feedback2').text("您尚未製作海賊船，將引導您前往...").css('color','green');
        setTimeout(() => {
            window.location = 'pirateHome.php#homeDIY'; 
            $('.lightbox').css('display','none');
            $('#feedback2').text("");
        }, 1500);
    }else{
        console.log(avatarDir,fullShipDir);
        $.ajax({
            url: 'register.php',
            data: {
                memId:memId,
                memPsw:memPsw,
                memNic:memNic,
                fullShipDir:fullShipDir,
                custList:custList,
                avatarDir:avatarDir,
            },
            type: 'POST',
            success: function(data){
                console.log(data);
                if(data=="error"){
                    $('#memId').focus();
                    $('#feedback2').text("此帳號已被申請過").css('color','red');
                }else{
                    console.log(data);
                    $('#feedback2').text("註冊成功，即將開始海賊IQ測驗...").css('color','green');
                    intoSession(data);
                    storage.removeItem('homePartBody');
                    storage.removeItem('homePartHead');
                    storage.removeItem('homePartSail');
                    setTimeout(() => {
                        window.location = 'iqtest-pre.php'; 
                    }, 1000);
                }
            },
        });
    }
}

function getrandom(x){
    return Math.floor(Math.random()*x)+1;
}

//以下是原login.js的內容

function showLoginLiBo(){
    loginBox.style.display = 'block';

}


var loginBtns = document.getElementsByClassName('loginHere');
var loginBox = document.getElementById('loginBox');
for(i=0;i<loginBtns.length;i++){
    loginBtns[i].addEventListener('click',showLoginLiBo)
}

//關閉燈箱
var liBoCloseBtns = document.querySelectorAll('.leaveLightbox');
for(var i = 0; i<liBoCloseBtns.length;i++){
    liBoCloseBtns[i].addEventListener('click',function(e){
        $('.lightbox').css('display','none');
    })
}

var liBoBGs = document.querySelectorAll('.lightbox .popbg');
for(var i=0;i<liBoBGs.length;i++){
    liBoBGs[i].addEventListener('click',function(e){
        e.target.parentNode.style.display="none";
    })
}

$(function(){
    var $li = $('ul.tab-title li');
        $($li. eq(0) .addClass('active').find('a').attr('href')).siblings('.tab-inner').hide();
    
        $li.click(function(){
            $($(this).find('a'). attr ('href')).show().siblings ('.tab-inner').hide();
            $(this).addClass('active'). siblings ('.active').removeClass('active');
        });
    });

