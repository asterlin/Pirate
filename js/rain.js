$(document).ready(function () {
    var div = document.createElement('div'),
        canvas = document.createElement('canvas'),
        ctx = canvas.getContext('2d'),
        w,
        h,
        msTimer = 0.0,
        lightningTimer,
        lightningAlpha,
        rainArr = [50],
        rainSpeed = 10;
        canvas.classList.add("sRBgWeather");

    // initialize
    function init() {
        document.getElementsByClassName('sYItem-bg')[0].appendChild(div);
        div.style.position = "absolute";
        div.style.zIndex = "-10";
        div.appendChild(canvas);
        UpdatePosition();
        create_rain();
        lightningTimer = 8000.0;
        lightningAlpha = 0.0;
        div.classList.add("sRRainBg");

        // 1 frame every 30ms
        if (typeof game_loop != "undefined") clearInterval(game_loop);
        game_loop = setInterval(mainLoop, 30);
    }
    init();

    function create_rain() {
        var length = 500;
        rainArr = []; //Empty array to start with
        for (var i = length - 1; i >= 0; i--) {
            rainArr.push({
                x: 1,
                y: 0,
                z: 0
            });
        }

        for (var j = 0; j < 500; j++) {
            rainArr[j].x = Math.floor((Math.random() * 820) - 9);
            rainArr[j].y = Math.floor((Math.random() * 520) - 9);
            rainArr[j].z = Math.floor((Math.random() * 2) + 1);
            rainArr[j].w = Math.floor((Math.random() * 3) + 2);
        }
    }

    function mainLoop() {
        UpdatePosition();
        msTimer += 30;

        if (lightningTimer < 0.0) {
            lightningTimer = 8000.0;
        }
        else {
            lightningTimer -= 30.0;
        }

        // lamp();
        rain();

        if (lightningTimer < 500.0) {
            weather(lightningTimer);
        }

    }


    // canvas positioning and sizing
    function UpdatePosition() {
        var bodyWidth = document.getElementsByClassName('sYItem-bg')[0].offsetWidth,
            bodyHeight = document.getElementsByClassName('sYItem-bg')[0].offsetHeight;
        w = canvas.width = bodyWidth;
        h = canvas.height = bodyHeight;
        div.style.left = div.style.right = div.style.top = div.style.bottom = "0";
    }

    // lamp visuals
    // function lamp() {

    //     // glow modified by time passed
    //     var sinGlowMod = 5 * Math.sin(msTimer / 200);
    //     var cosGlowMod = 5 * Math.cos((msTimer + 0.5 * sinGlowMod) / 200);
    //     var grdGlow = ctx.createRadialGradient(450, 200, 0, 250, 193 + sinGlowMod, 206 + cosGlowMod);
    //     grdGlow.addColorStop(0.000, 'rgba(220, 240, 160, 1)');
    //     grdGlow.addColorStop(0.2, 'rgba(180, 240, 160, 0.4)');
    //     grdGlow.addColorStop(0.4, 'rgba(140, 240, 160, 0.2)');
    //     grdGlow.addColorStop(1, 'rgba(140, 240, 160, 0)');
    //     ctx.fillStyle = grdGlow;
    //     ctx.fillRect(0, 0, 500, 500);
    // }

    // function to position and color each rain drop
    // TODO: optimize - group raindrops together
    function rain() {
        for (var i = 0; i < 500; i++) {
            if (rainArr[i].y >= 482) {
                rainArr[i].y -= 500;
            }
            if (rainArr[i].x < -10) {
                rainArr[i].x += w;
            }
            else {
                rainArr[i].y += rainArr[i].w * rainSpeed;
                rainArr[i].x -= 5 + Math.floor(rainArr[i].y / 250) - rainArr[i].w;
            }

            var grd = ctx.createRadialGradient(250, 450, 140, 250, 300, 600);
            grd.addColorStop(0.000, 'rgba(100, 170, 160, 0.2)');
            grd.addColorStop(0.1, 'rgba(100, 160, 160, 0.12)');
            grd.addColorStop(0.2, 'rgba(100, 150, 150, 0.1)');
            grd.addColorStop(1, 'rgba(100, 140, 140, .08)');
            ctx.fillStyle = grd;
            ctx.fillRect(rainArr[i].x, rainArr[i].y, rainArr[i].z, 4);
        }
    }

    // function to create a lightning effect on a timer
    function weather(_lTimer) {

        lightningAlpha = 0.0;

        if (_lTimer > 350.0) {
            lightningAlpha = (500.0 - _lTimer) * 0.004;
        }

        else if (_lTimer < 350.0 && _lTimer > 250.0) {
            lightningAlpha = (_lTimer - 250.0) * 0.006;
        }

        else if (_lTimer < 250.0 && _lTimer >= 100.0) {
            lightningAlpha = (250.0 - _lTimer) * 0.004;
        }

        else if (_lTimer < 100.0 && _lTimer >= 0.0) {
            lightningAlpha = _lTimer * 0.006;
        }

        if (lightningAlpha > 0.0) {
            ctx.fillStyle = 'rgba(250, 250, 245, ' + lightningAlpha + ')';
            ctx.fillRect(0, 0, w, h);
        }
    }
});

