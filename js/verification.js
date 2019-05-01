var number;
var mystatus;
var storage = sessionStorage;
function logBox(){
    $('#loginBox').css('display','block');
    $('#signUp').click(login);
    $('#btnver').click(verification);
    $('#signlbtn').click(left);
    $('#signrbtn').click(right);
    number = getrandom(3)*90;
    var imgrotate = document.getElementById("signnew");
    imgrotate.style.transform = "rotate(" + number + "deg)";
}

function login(){    
    var signmemId = $('#signmemId').val();
    var signmemPsw= $('#signmemPsw').val();
    if(signmemId==""||signmemPsw==""){
        $('#feedback').text("密碼和帳號不能為空白").css('color','red').css('text-align','center');
    }
    else if(number%360!=0){
        $('#feedback').text("驗證失敗").css('color','red').css('text-align','center');
    }else{    
    $.ajax({
        url: 'signup.php',
        data: {signmemId:signmemId,signmemPsw:signmemPsw},
        type: 'GET',
        success: function(data){
            if(data!=0){
                $('#loginBox').css('display','none');
                intoSession(data);
                // getStatus();
            }else if(data==0){
                $('#feedback').text("無此帳號或密碼!").css('color','red').css('text-align','center');
            }
        },
    });
    }
}

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
function left(){
    number -= 90;
    document.getElementById("signnew").style.transform = `rotate(${number}deg)`;
    var content = $('#signcontent');
}
function right(){
    number += 90;
    document.getElementById("signnew").style.transform = `rotate(${number}deg)`;
    var content = $('#signcontent');
}
 
function verification(){
    console.log('verification.....');
    var memId = $('#memId').val();
    var memPsw= $('#memPsw').val();
    var memNic = $('#memNic').val();
    var memCon = $('#memCon').val();
    // console.log(typeof memId);
    // console.log(memNic);
    // console.log(memCon);
    // var fullShipDir = storage['fullShipDir'];
    // var custList = storage['custList'];
    // var avatarDir = storage['avatarDir'];
    // else if(avatarDir=="" || fullShipDir=="" || custList==""){
    if($('#memId').val()==""||$('#memNic').val()==""||$('#memPsw').val()==""||$('#memCon').val()==""){
        $('#feedback2').text("不能有空白").css('color','red').css('text-align','center');
    }else if(memPsw != memCon){
        $('#feedback2').text("密碼必須一樣").css('color','red').css('text-align','center');
    }else{
        $.ajax({
            url: 'register.php',
            data: {memId:memId,memPsw:memPsw,memNic:memNic},
            type: 'GET',
            success: function(data){
                console.log(data);
                $('#loginBox').css('display','none');
            },
        });
    }
}

function getrandom(x){
    return Math.floor(Math.random()*x)+1;
}