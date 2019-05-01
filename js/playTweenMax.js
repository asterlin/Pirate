
function playTweenMax(){
var controller = new ScrollMagic.Controller();
var animation_04;
var animation_08;
var section_04;
var flag = 0;
var rwd=$('#playTitleSec').width();
if(rwd!=375){
$('#gpsArea').click(function(){
TweenLite.to(window, 1, {scrollTo:"#gpsWrap"});
});
// 滑到第二屏時藍色布幕動畫
animation_04 = TweenMax.to(`#blueAppear`,10, {
top:0,
left:0,
opacity:1,
});
section_04 = new ScrollMagic.Scene({
triggerElement: "#trigger_02",
duration: 300,
reverse:false,
}).setTween(animation_04)
.addIndicators()
.addTo(controller);
// 滑到第二屏時小船動畫
animation_08 = TweenMax.to(`#boat`,10, {
left:120,
});
section_04 = new ScrollMagic.Scene({
triggerElement: "#trigger_02",
duration: 300,
reverse:false,
}).setTween(animation_08)
.addIndicators()
.addTo(controller);

// next
$('#next').click(function(){
if(flag==1||flag==0){
$("#eleImg2").css('display','block');
$("#eleImg1").css('display','none');
$("#element2 .black").css('display','none');
$("#element1 .black").css('display','block');
$('#prev').css('display','block');
TweenMax.to(`#element1`,1, {
y: 0,
x: 0,
webkitClipPath:'polygon(50px 0, 0 250px, 50px 500px, 150px 500px, 100px 250px, 150px 0)',
});
TweenMax.to(`#eleImg1`,1, {
y: 0,
x: 0,
});
TweenMax.to(`#element2`,1, {
y: 776,
x: -65,
webkitClipPath:'polygon(0 0, 0 250px, 0px 500px, 450px 500px, 450px 250px, 450px 0)',
});
TweenMax.to(`#eleImg2`,1, {
y: 430,
x: -77,
});
flag=2;
}else if(flag==2){
$("#eleImg3").css('display','block');
$("#eleImg2").css('display','none');
$("#element3 .black").css('display','none');
$("#element2 .black").css('display','block');
$('#next').css('display','none');
TweenMax.to(`#element2`,1, {
y: 0,
x: 0,
webkitClipPath:'polygon(50px 0, 0 250px, 50px 500px, 150px 500px, 100px 250px, 150px 0)',
});
TweenMax.to(`#eleImg2`,1, {
y: 0,
x: 0,
});
TweenMax.to(`#eleImg3`,1, {
y: 430,
x: -181,
});
TweenMax.to(`#element3`,1, {
y: 776,
x: -170,
webkitClipPath:'polygon(0 0, 0 250px, 0px 500px, 450px 500px, 450px 250px, 450px 0)',
});
flag=3;
}
});
$('#prev').click(function(){
if(flag==3){
$("#eleImg2").css('display','block');
$("#eleImg3").css('display','none');
$("#element3 .black").css('display','block');
$("#element2 .black").css('display','none');
$('#next').css('display','block');
TweenMax.to(`#element3`,1, {
y: 0,
x: 0,
webkitClipPath:'polygon(300px 0, 350px 250px, 300px 500px, 400px 500px, 450px 250px, 400px 0)',
});
TweenMax.to(`#eleImg3`,1, {
y: 0,
x: 0,
});
TweenMax.to(`#eleImg2`,1, {
y: 430,
x: -77,
});
TweenMax.to(`#element2`,1, {
y: 776,
x: -65,
webkitClipPath:'polygon(0 0, 0 250px, 0px 500px, 450px 500px, 450px 250px, 450px 0)',
});
flag=2;
}else if(flag==2){
$("#eleImg1").css('display','block');
$("#eleImg2").css('display','none');
$("#element1 .black").css('display','none');
$("#element2 .black").css('display','block');
$('#prev').css('display','none');
flag=1;
TweenMax.to(`#element2`,1, {
y: 0,
x: 0,
webkitClipPath:'polygon(300px 0, 350px 250px, 300px 500px, 400px 500px, 450px 250px, 400px 0)',
});
TweenMax.to(`#eleImg2`,1, {
y: 0,
x: 0,
});
TweenMax.to(`#eleImg1`,1, {
y: 430,
x: 28,
});
TweenMax.to(`#element1`,1, {
y: 776,
x: 39,
webkitClipPath:'polygon(0 0, 0 250px, 0px 500px, 450px 500px, 450px 250px, 450px 0)',
});
}
});
// click
$('#element1').click(function(){
flag = 1;
TweenLite.to(window, 1, {scrollTo:{y:"#game", offsetY:70, autoKill:false}});
TweenMax.to(`#element1`,1, {
y: 776,
x: 39,
webkitClipPath:'polygon(0 0, 0 250px, 0px 500px, 450px 500px, 450px 250px, 450px 0)',
});
TweenMax.to(`#eleImg1`,1, {
y: 430,
x: 28,
});
$('#prev').css('display','none');
});
$('#element2').click(function(){
flag = 2;
TweenLite.to(window, 1, {scrollTo:{y:"#game", offsetY:70, autoKill:false}});
TweenMax.to(`#element2`,1, {
y: 776,
x: -65,
webkitClipPath:'polygon(0 0, 0 250px, 0px 500px, 450px 500px, 450px 250px, 450px 0)',
});
TweenMax.to(`#eleImg2`,1, {
y: 430,
x: -77,
});
$('#prev').css('display','block');
});
$('#element3').click(function(){
flag = 3;
TweenLite.to(window, 1, {scrollTo:{y:"#game", offsetY:70, autoKill:false}});
TweenMax.to(`#element3`,1, {
y: 776,
x: -170,
webkitClipPath:'polygon(0 0, 0 250px, 0px 500px, 450px 500px, 450px 250px, 450px 0)',
});
TweenMax.to(`#eleImg3`,1, {
y: 430,
x: -181,
});
$('#prev').css('display','block');
$('#next').css('display','block');
});
}
}