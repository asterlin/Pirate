var star, rock, rock2, rock3, rock4, treaBox, marine;
var endTimer;
var a;
var count;
function setup(){
	createCanvas(windowWidth, windowHeight);
	a=0;
	count=0;

	star = createSprite(random(0, width), random(0, height));
	star.addImage(loadImage('image/play/game/asterisk_circle0006.png'));

	rock = createSprite(200,400);
	rock.addImage(loadImage('image/play/game/rock1.png'));

	rock2 = createSprite(400,300);
	rock2.addImage(loadImage('image/play/game/rock2.png'));

	rock3 = createSprite(800,350);
	rock3.addImage(loadImage('image/play/game/rock2.png'));

	rock4 = createSprite(640,200);
	rock4.addImage(loadImage('image/play/game/rock2.png'));

	treaBox = createSprite(200,600);
	treaBox.addImage(loadImage('image/play/game/treaBox.png'));

	marine= createSprite(300,300);
	marine.addImage(loadImage('image/play/game/marine.png'));

	collectibles = new Group();
	for(var i=0; i<10; i++){
		var dot = createSprite(random(200,width-200),random(100,height-100));
		dot.addImage(loadImage('image/play/game/coin.png'));
    	collectibles.add(dot);
	}
}
function draw(){
	background(51,166,184);
	star.position.x = mouseX;
  	star.position.y = mouseY;

  	marine.attractionPoint(0.2,mouseX,mouseY);
  	marine.maxSpeed = 7;

  	star.collide(rock);
  	star.collide(rock2);
  	star.collide(rock3);
  	star.collide(rock4);
  	star.displace(treaBox);
	drawSprites();

	treaBox.overlap(collectibles, collect);
	marine.overlap(star, collect2);
}

function collect(collector, collected)
{
  collected.remove();
  console.log(count);
  count+=1;
  if(count==10)
  	wingame();
}

function collect2(collector, collected)
{
  collected.remove();
  c = color('rgba(255, 0, 0, 1)');
  fill(c);
  textSize(24);
  textAlign(CENTER, CENTER);
  text("Game Over!!",
    width/2, height*0.67);
  a+=1;
  console.log(a);
  if(a==200)
  endGame();
}
function endGame(){
	$('#defaultCanvas0').css('display','none');
	$('.button_border').css('display','block');
	$('#playSpark').css('clipPath','circle(5px)');
}
function wingame(){
	$('#defaultCanvas0').css('display','none');
<<<<<<< HEAD
	$('.button_border').css('display','block');
	$('#playSpark').css('clipPath','circle(5px)');	
=======
	$('#playArea .button_border').css('display','block');
	$('#lightboxTime').text(playTimeCount);
	$('#winbox .lightbox').css('display','block');
	$('#playSpark').css('clipPath','circle(5px)');
}
function reset(){
	a=0;
	count=0;

	star = createSprite(random(0, width), random(0, height));
	star.addImage(loadImage('image/play/boat.png'));

	rock = createSprite(200,400);
	rock.addImage(loadImage('image/play/game/rock1.png'));

	rock2 = createSprite(400,900);
	rock2.addImage(loadImage('image/play/game/rock2.png'));

	rock3 = createSprite(800,750);
	rock3.addImage(loadImage('image/play/game/rock2.png'));

	rock4 = createSprite(640,200);
	rock4.addImage(loadImage('image/play/game/rock2.png'));

	rock5 = createSprite(1240,300);
	rock5.addImage(loadImage('image/play/game/rock2.png'));

	rock6 = createSprite(1050,840);
	rock6.addImage(loadImage('image/play/game/rock2.png'));

	rock7 = createSprite(540,300);
	rock7.addImage(loadImage('image/play/game/rock2.png'));

	treaBox = createSprite(200,600);
	treaBox.addImage(loadImage('image/play/game/treaBox.png'));

	marine= createSprite(300,300);
	marine.addImage(loadImage('image/play/game/marine.png'));

	collectibles = new Group();
	for(var i=0; i<10; i++){
		var dot = createSprite(random(200,width-200),random(100,height-100));
		dot.addImage(loadImage('image/play/game/coin.png'));
    	collectibles.add(dot);
	}
>>>>>>> 80c983e0f57006bd8b622a8848daa3992c4acd7d
}