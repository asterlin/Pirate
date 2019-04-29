$(function(){
    var $li = $('ul.tab-title li');
        $($li. eq(0) .addClass('active').find('a').attr('href')).siblings('.tab-inner').hide();
    
<<<<<<< HEAD
        $li.click(function(){
            $($(this).find('a'). attr ('href')).show().siblings ('.tab-inner').hide();
            $(this).addClass('active'). siblings ('.active').removeClass('active');
        });
    });
    //
=======
    $li.click(function(){
        $($(this).find('a'). attr ('href')).show().siblings ('.tab-inner').hide();
        $(this).addClass('active'). siblings ('.active').removeClass('active');
    });
});
>>>>>>> 2319e0d00a4dca0195babaedbe4d4604981d9b10
