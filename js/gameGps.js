
var map, lati, long, pos, player;
// 玩家資訊
var palyerName = '航海士';
var palyerIcon = 'image/gpsGame/position.png';
//寶箱
var treaPosArr = [];
var treas = [];
var treaName = '景成船長的大秘寶!';
var treaIcon = 'image/gpsGame/marker.gif';
//地圖
function initMap(){
    map = new google.maps.Map(document.getElementById('gpsMap'), {
        zoom: 7,
        center: {lat: 23.975650, lng: 120.97388194},
        styles: [
            {"elementType": "geometry","stylers": [{"color": "#ebe3cd"}]},
            {"elementType": "labels.text.fill", "stylers": [{"color": "#523735"}]},
            {
              "elementType": "labels.text.stroke",
              "stylers": [
                {
                  "color": "#f5f1e6"
                }
              ]
            },
            {
              "featureType": "administrative",
              "elementType": "geometry.stroke",
              "stylers": [
                {
                  "color": "#c9b2a6"
                }
              ]
            },
            {
              "featureType": "administrative.land_parcel",
              "elementType": "geometry.stroke",
              "stylers": [
                {
                  "color": "#dcd2be"
                }
              ]
            },
            {
              "featureType": "administrative.land_parcel",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#ae9e90"
                }
              ]
            },
            {
              "featureType": "landscape.man_made",
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "visibility": "on"
                }
              ]
            },
            {
              "featureType": "landscape.natural",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#dfd2ae"
                }
              ]
            },
            {
              "featureType": "poi",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#dfd2ae"
                }
              ]
            },
            {
              "featureType": "poi",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#93817c"
                }
              ]
            },
            {
              "featureType": "poi.attraction",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "featureType": "poi.business",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "featureType": "poi.park",
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "color": "#a5b076"
                }
              ]
            },
            {
              "featureType": "poi.park",
              "elementType": "labels.text",
              "stylers": [
                {
                  "visibility": "off"
                }
              ]
            },
            {
              "featureType": "poi.park",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#447530"
                }
              ]
            },
            {
              "featureType": "road",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#f5f1e6"
                }
              ]
            },
            {
              "featureType": "road.arterial",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#fdfcf8"
                }
              ]
            },
            {
              "featureType": "road.highway",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#f8c967"
                }
              ]
            },
            {
              "featureType": "road.highway",
              "elementType": "geometry.stroke",
              "stylers": [
                {
                  "color": "#e9bc62"
                }
              ]
            },
            {
              "featureType": "road.highway.controlled_access",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#e98d58"
                }
              ]
            },
            {
              "featureType": "road.highway.controlled_access",
              "elementType": "geometry.stroke",
              "stylers": [
                {
                  "color": "#db8555"
                }
              ]
            },
            {
              "featureType": "road.local",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#806b63"
                }
              ]
            },
            {
              "featureType": "transit.line",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#dfd2ae"
                }
              ]
            },
            {
              "featureType": "transit.line",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#8f7d77"
                }
              ]
            },
            {
              "featureType": "transit.line",
              "elementType": "labels.text.stroke",
              "stylers": [
                {
                  "color": "#ebe3cd"
                }
              ]
            },
            {
              "featureType": "transit.station",
              "elementType": "geometry",
              "stylers": [
                {
                  "color": "#dfd2ae"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "geometry.fill",
              "stylers": [
                {
                  "color": "#b9d3c2"
                }
              ]
            },
            {
              "featureType": "water",
              "elementType": "labels.text.fill",
              "stylers": [
                {
                  "color": "#92998d"
                }
              ]
            }
          ]
      });
    playGps();
}
function playGps() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(succCallback);
    } else {
        errorCallback();
    }
}
function succCallback(e) {
    lati = e.coords.latitude;
	  long = e.coords.longitude;
    console.log({lati, long});
    map.setZoom(17);
    map.setCenter({lat: lati, lng: long});
    player = new google.maps.Marker({
		position: {lat: lati, lng: long},
		map: map,
		icon: palyerIcon,
		title: palyerName,
    });
    map.addListener('center_changed', function() {
        window.setTimeout(function() {
            map.panTo(player.getPosition());
        }, 3000);
        circle();
      });
      circle();
      getTreaPosition()
      dropTreas();
      addEvent();
    //addEvent();
    // treas.addEventListener("click", function(){
    //     console.log(click);
    // });
}
function getTreaPosition() {
    treaPosArr.push({lat: (lati+0.0005),lng: (long+0.0005)});
    for (let i = 0; i < 4; i++) {
        treaPosArr.push({lat: lati+ 0.008*(Math.random()*2 - 1),lng: long+ 0.008*(Math.random()*2 - 1)});
    }
}
function dropTreas(){
    for (var i = 0; i < treaPosArr.length; i++) {
        treas.push(new google.maps.Marker({
            position: treaPosArr[i],
            map: map,
            icon: treaIcon,
            title: treaName,
            animation: google.maps.Animation.DROP,
          }));
    }
}
function circle() {
    var circleCoords = [];
    for (let i = 1; i < 21; i++) {
        circleCoords.push({lat: lati+0.001*(Math.cos(0.31*i)), lng: long+0.001*(Math.sin(0.31*i))});
    }
    var circle = new google.maps.Polygon({
        paths: circleCoords,
        strokeColor: '#a34f49', 
        strokeOpacity: 1,
        strokeWeight: 3,
        fillColor: '#a34f49',
        fillOpacity: 0.1,
      });
    circle.setMap(map);
}
function addEvent(){
  for (let i = 0; i < treas.length; i++) {
    treaPosArrX = treaPosArr[i].lat-lati;
    treaPosArrY = treaPosArr[i].lng-long;
    console.log(treaPosArrX);
    console.log(treaPosArrY);
    console.log(treas[i]);
    if ((Math.pow(treaPosArrX,2)+Math.pow(treaPosArrY, 2)) < Math.pow(0.005, 2)) {
      treas[i].addListener('click', showWheel());
      treas[i].setAnimation(google.maps.Animation.BOUNCE);
    }
  }
}
function showWheel(){
  console.log("click");
}
function errorCallback(e) {
    console.log(e.code);
    console.log(e.message);
}

//輪盤
var canvas = document.getElementById('luckyWheel');
var ctx = canvas.getContext('2d');
canvas.width = 400;
canvas.height = 400;

setInterval(drawWheel,10);
var theClock = 0;
// cxt.clearRect(0,0,canvas.width,canvas.height);

function drawWheel(){
  theClock++;
  let deg = (theClock/180);

  // ctx.fillStyle = '#362e2b';
  //   ctx.beginPath();
  //   ctx.moveTo(200,200);
  //   ctx.arc(200,200,30,0,2*(Math.PI),false);
  //   ctx.closePath();
  //   ctx.fill();
    
    ctx.fillStyle = '#362e2b';
    ctx.beginPath();
    ctx.arc(200,200,140,0, 2*(Math.PI) ,false);
    ctx.fill();


    // ctx.strokeStyle = '#362e2b';
    // ctx.beginPath();
    // ctx.moveTo(200,200);
    // ctx.lineTo(130*((0.2+deg)%2)*(Math.PI),(130*(0.4+deg)%2)*(Math.PI));
    // ctx.moveTo(200,200);
    // ctx.lineTo(((0.6+deg)%2)*(Math.PI), ((0.8+deg)%2)*(Math.PI));
    // ctx.moveTo(200,200);
    // ctx.lineTo(((1+deg)%2)*(Math.PI), ((1.2+deg)%2)*(Math.PI));
    // ctx.moveTo(200,200);
    // ctx.lineTo(((1.4+deg)%2)*(Math.PI), ((1.6+deg)%2)*(Math.PI));
    // ctx.moveTo(200,200);
    // ctx.lineTo(((1.8+deg)%2)*(Math.PI), ((0+deg)%2)*(Math.PI));
    // ctx.moveTo(200,200);
    // ctx.closePath();
    // ctx.stroke();

    for (let i = 1; i < 11; i++) {
        ctx.fillStyle = '#fffcf2';
        ctx.beginPath();
        ctx.moveTo(135*Math.cos((3/20)*i),135*Math.sin((3/20)*i));
        ctx.arc(135*Math.cos((3/20)*i),135*Math.sin((3/20)*i),5,0,2*(Math.PI) ,false);
        ctx.fill();  
    }

    // ctx.fillStyle = '#a34f49';
    // ctx.beginPath();
    // ctx.moveTo(200,200);
    // ctx.arc(200,200,120,0, 0.2*(Math.PI) ,false);
    // ctx.moveTo(200,200);
    // ctx.arc(200,200,120, 0.4*(Math.PI), 0.6*(Math.PI) ,false);
    // ctx.moveTo(200,200);
    // ctx.arc(200,200,120, 0.8*(Math.PI), (Math.PI) ,false);
    // ctx.moveTo(200,200);
    // ctx.arc(200,200,120,1.8*(Math.PI),1.6*(Math.PI),true);
    // ctx.moveTo(200,200);
    // ctx.arc(200,200,120,1.4*(Math.PI), 1.2*(Math.PI) ,true);
    // ctx.moveTo(200,200);
    // ctx.closePath();
    // ctx.fill();

    ctx.fillStyle = '#a34f49';
    ctx.beginPath();
    ctx.moveTo(200,200);
    ctx.arc(200,200,120,0, 2*(Math.PI) ,false);
    ctx.closePath();
    ctx.fill();

    // ctx.fillStyle = '#006ca6';
    // ctx.beginPath();
    // let deg = (theClock/180);
    // ctx.moveTo(200,200);
    // ctx.arc(200,200,120,(0.2+deg)*(Math.PI),(0.4+deg)*(Math.PI),false);
    // ctx.moveTo(200,200);
    // ctx.arc(200,200,120, (0.6+deg)*(Math.PI), (0.8+deg)*(Math.PI) ,false);
    // ctx.moveTo(200,200);
    // ctx.arc(200,200,120,(0+deg),(1.8+deg)*(Math.PI) ,true);
    // ctx.moveTo(200,200);
    // ctx.arc(200,200,120,(1.6+deg)*(Math.PI), (1.4+deg)*(Math.PI) ,true);
    // ctx.moveTo(200,200);
    // ctx.arc(200,200,120, (1.2+deg)*(Math.PI), (1+deg)*(Math.PI) ,true);
    // ctx.moveTo(200,200);
    // ctx.closePath();
    // ctx.fill();

    ctx.fillStyle = '#006ca6';
    ctx.beginPath();
    ctx.moveTo(200,200);
    ctx.arc(200,200,120,((0.2+deg)%2)*(Math.PI),((0.4+deg)%2)*(Math.PI),false);
    ctx.moveTo(200,200);
    ctx.arc(200,200,120,((0.6+deg)%2)*(Math.PI), ((0.8+deg)%2)*(Math.PI) ,false);
    ctx.moveTo(200,200);
    ctx.arc(200,200,120, ((1+deg)%2)*(Math.PI), ((1.2+deg)%2)*(Math.PI) ,false);
    ctx.moveTo(200,200);
    ctx.arc(200,200,120, ((1.4+deg)%2)*(Math.PI), ((1.6+deg)%2)*(Math.PI) ,false);
    ctx.moveTo(200,200);
    ctx.arc(200,200,120, ((1.8+deg)%2)*(Math.PI), ((0+deg)%2)*(Math.PI) ,false);
    ctx.moveTo(200,200);
    ctx.closePath();
    ctx.fill();

    ctx.fillStyle = '#362e2b';
    ctx.beginPath();
    ctx.moveTo(200,200);
    ctx.arc(200,200,30,0,2*(Math.PI),false);
    ctx.closePath();
    ctx.fill();

    ctx.fillStyle = '#362e2b';
    ctx.beginPath();
    ctx.moveTo(200,150);
    ctx.arc(200,50,20,0,2*(Math.PI),false);
    ctx.closePath();
    ctx.fill();
    

    ctx.fillStyle = '#362e2b';
    ctx.beginPath();
    ctx.moveTo(180,50);
    ctx.lineTo(180,50);
    ctx.lineTo(200,100);
    ctx.lineTo(220,50);
    ctx.closePath();
    ctx.fill();

    ctx.fillStyle = '#fffcf2';
    ctx.beginPath();
    ctx.moveTo(200,100);
    ctx.arc(200,50,8,0,2*(Math.PI),false);
    ctx.closePath();
    ctx.fill();

}
window.addEventListener('load',drawWheel);