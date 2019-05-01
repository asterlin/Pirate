function showLoginLiBo(){
    loginBox.style.display = 'block';
}


var loginBtns = document.getElementsByClassName('loginHere');
var loginBox = document.getElementById('loginBox');
for(i=0;i<loginBtns.length;i++){
    loginBtns[i].addEventListener('click',showLoginLiBo)
}

var liBoCloseBtns = document.querySelectorAll('.lightBox .leave');
for(var i = 0; i<liBoCloseBtns.length;i++){
    liBoCloseBtns[i].addEventListener('click',function(e){
        e.target.parentNode.parentNode.style.display="none";
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
    //