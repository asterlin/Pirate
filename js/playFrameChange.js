// 選擇寶藏遊戲時黑幕消失
$('#gpsArea').mouseover(function(){
	$('#blackMap').css('opacity','0');
});
$('#gpsArea').mouseleave(function(){
	$('#blackMap').css('opacity','.6');
});
// mouseover時gameFrame
$('#element1').mouseover(function(){//初階
	// 初中高試煉frame變形
	$("#element1").css('clipPath','polygon(50px 0, 0 250px, 50px 500px, 400px 500px, 450px 250px, 400px 0)');
	$("#element2").css('clipPath','polygon(300px 0, 350px 250px, 300px 500px, 400px 500px, 450px 250px, 400px 0)');
	$("#element3").css('clipPath','polygon(300px 0, 350px 250px, 300px 500px, 400px 500px, 450px 250px, 400px 0)');
	// 初中高試煉slogan出現與消失
	$("#eleImg1").css('display','block');
	$("#eleImg2").css('display','none');
	$("#eleImg3").css('display','none');
	// 初中高試煉black screen出現與消失 
	$("#element1 .black").css('display','none');
	$("#element2 .black").css('display','block');
	$("#element3 .black").css('display','block');
    // 取消其他試煉frame移到第二屏的動畫
});
$('#element2').mouseover(function(){//中階
	// 初中高試煉frame變形
	$("#element1").css('clipPath','polygon(50px 0, 0 250px, 50px 500px, 150px 500px, 100px 250px, 150px 0)');
	$("#element2").css('clipPath','polygon(50px 0, 0 250px, 50px 500px, 400px 500px, 450px 250px, 400px 0)');
	$("#element3").css('clipPath','polygon(300px 0, 350px 250px, 300px 500px, 400px 500px, 450px 250px, 400px 0)');
	// 初中高試煉slogan出現與消失
	$("#eleImg1").css('display','none');
	$("#eleImg2").css('display','block');
	$("#eleImg3").css('display','none');
	// 初中高試煉black screen出現與消失 
	$("#element1 .black").css('display','block');
	$("#element2 .black").css('display','none');
	$("#element3 .black").css('display','block');
	// 初中高試煉frame移動到第二屏
    // 取消其他試煉frame移到第二屏的動畫
});
$('#element3').mouseover(function(){//高階
	// 初中高試煉frame變形
	$("#element1").css('clipPath','polygon(50px 0, 0 250px, 50px 500px, 150px 500px, 100px 250px, 150px 0)');
	$("#element2").css('clipPath','polygon(50px 0, 0 250px, 50px 500px, 150px 500px, 100px 250px, 150px 0)');
	$("#element3").css('clipPath','polygon(50px 0, 0 250px, 50px 500px, 400px 500px, 450px 250px, 400px 0)');
	// 初中高試煉slogan出現與消失
	$("#eleImg1").css('display','none');
	$("#eleImg2").css('display','none');
	$("#eleImg3").css('display','block');
	// 初中高試煉black screen出現與消失 
	$("#element1 .black").css('display','block');
	$("#element2 .black").css('display','block');
	$("#element3 .black").css('display','none');
	// 初中高試煉frame移動到第二屏
    // 取消其他試煉frame移到第二屏的動畫
});