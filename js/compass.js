var compass;
$('#compass').click(function(){
	$('#out').toggleClass('addAnimate');
	$('#in').toggleClass('addAnimateF');
	var left = parseInt($('#compassBlue').css('left'));
	left == -1500? $('#compassBlue').css('left',`100px`):$('#compassBlue').css('left',`-1500px`);
});