var btnpri = document.getElementsByClassName("btnpri");
var btnsec = document.getElementsByClassName("btnsec");

var waveWidth = 5;
var waveCount = 20;

function createbtn(btntype){

    for(var j = 0; j < btntype.length; j++){
        var wavebox = document.createElement("div");

        for (var i = 0; i < waveCount; i++) {
            var wave = document.createElement("div");
            wave.className += " wave";
            wavebox.appendChild(wave);
            wave.style.left = i * waveWidth + "px";
            wave.style.animationDelay = (i / 80) + "s";
        }
        btntype[j].appendChild(wavebox);
    }
}

createbtn(btnpri);
createbtn(btnsec);