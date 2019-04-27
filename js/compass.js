$('#compass').click(function(){
	var left = parseInt($('#compassBlue').css('left'));
	left == -1100? $('#compassBlue').css('left',`100px`):$('#compassBlue').css('left',`-1100px`);
});