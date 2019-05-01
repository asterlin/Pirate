///////////////
var bgblock = false;
var bg = document.querySelector('.sYItem-bg');
var items = document.querySelectorAll('.sRitem');
var item = document.querySelector('.sRitem');

function cLog(content) {
    console.log(content)
}



if ($(window).width() > 768) {
    var centerOrNot = true;
} else {
    var centerOrNot = false;
}


var swiper = new Swiper('.sR-slider', {
    effect: 'coverflow',
    grabCursor: true,
    loop: true,
    centeredSlides: centerOrNot,
    keyboard: true,
    spaceBetween: 0,
    slidesPerView: 'auto',
    speed: 300,
    coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 0,
        modifier: 3,
        slideShadows: false
    },
    breakpoints: {
        480: {
            spaceBetween: 0,
            centeredSlides: true
        }
    },
    simulateTouch: false,
    navigation: {
        nextEl: '.sR-slider-next',
        prevEl: '.sR-slider-prev'
    },
    // pagination: {
    //     el: '.sR-sliderpagination',
    //     clickable: true
    // },
    on: {
        init: function () {
            var activeItem = document.querySelector('.swiper-slide-active');
            var defaultX = document.getElementsByClassName("swiper-slide-prev")[0].offsetWidth;
            var sliderItem = activeItem.querySelector('.sRitem');

            $('.swiper-slide-active .sRitem').addClass('active');

            var x = sliderItem.parentNode.getBoundingClientRect().left;

            if ($(window).width() > 768) {

                // if(bgblock == false){
                    var y = sliderItem.parentNode.offsetTop + 278;
                //     bgblock = true;
                // }
                    x = x - defaultX;
            } else {
                
                if(bgblock == false){
                    var y = sliderItem.parentNode.getBoundingClientRect().top;
                    bgblock = true;
                }
            }
            var width = sliderItem.parentNode.getBoundingClientRect().width;
            var height = sliderItem.parentNode.getBoundingClientRect().height;


            $('.sYItem-bg').addClass('active');

            

            bg.style.width = width + 'px';
            bg.style.height = height + 'px';
            bg.style.transform = 'translateX(' + x + 'px ) translateY(' + y + 'px)';
        }
    }
});

swiper.on('touchEnd', function () {
    $('.sRitem').removeClass('active');
    $('.swiper-slide-active .sRitem').addClass('active');
});

swiper.on('slideChange', function () {
    $('.sRitem').removeClass('active');
});

swiper.on('slideChangeTransitionEnd', function () {
    $('.sRitem').removeClass('active');
    var activeItem = document.querySelector('.swiper-slide-active');
    var defaultX = document.getElementsByClassName("swiper-slide-prev")[0].offsetWidth;
    var sliderItem = activeItem.querySelector('.sRitem');

    $('.swiper-slide-active .sRitem').addClass('active');
    setTimeout(function () {
        var x = sliderItem.parentNode.getBoundingClientRect().left;
        if ($(window).width() > 768) {
            
                // if(bgblock == false){
                    var y = sliderItem.parentNode.offsetTop + 278;
                //     bgblock = true;
                // }
        } else {

                if(bgblock == false){
                    var y = sliderItem.parentNode.getBoundingClientRect().top;
                    bgblock = true;
                }
        }

        // x = x - defaultX;

        var width = sliderItem.parentNode.getBoundingClientRect().width;
        var height = sliderItem.parentNode.getBoundingClientRect().height;


        $('.sYItem-bg').addClass('active');

        bg.style.width = width + 'px';
        bg.style.height = height + 'px';
        bg.style.transform = 'translateX(' + x + 'px ) translateY(' + y + 'px)';
    }, 600);

});


if ($(window).width() > 768) {

    setTimeout(function () {
        var activeItem = document.querySelector('.swiper-slide-active');
        var sliderItem = activeItem.querySelector('.sRitem');
        var defaultX = document.getElementsByClassName("swiper-slide-prev")[0].offsetWidth;
        var x = sliderItem.parentNode.getBoundingClientRect().left;
        // if(bgblock == false){
            var y = sliderItem.parentNode.offsetTop + 278;
        //     bgblock = true;
        // }
        x = x - defaultX;

        bg.style.transform = 'translateX(' + x + 'px ) translateY(' + y + 'px)';

        var sRSlideMatrix = $('.swiper-wrapper').css('transform').replace(/[^0-9\-.,]/g, '').split(',');
        var x = sRSlideMatrix[12] || sRSlideMatrix[4];
        var y = sRSlideMatrix[13] || sRSlideMatrix[5];

        bg.style.height = document.getElementsByClassName("swiper-slide-active")[0].offsetHeight + 'px';

        x = x - 300;

        $('.swiper-wrapper').css({
            transform: `translate3d(${x}px, ${y}px, 0)`
        })

        document.getElementsByClassName('swiper-slide-prev')[0].classList.remove("swiper-slide-prev");
        document.getElementsByClassName('swiper-slide-next')[0].nextElementSibling.classList.add('swiper-slide-prev');

        if ($(window).width() > 768) {
            $(document).on("mouseover", ".sRitem", function (_event, _element) {
        
                var sRItem = document.querySelectorAll('.sRitem');
                sRItem.forEach(function (element, index) {
                    element.addEventListener('mouseover', function () {
                        var x = this.parentNode.getBoundingClientRect().left;

                        // if(bgblock == false){
                            var y = sliderItem.parentNode.offsetTop + 278;
                            // bgblock = true;
                        // }
                        var width = this.parentNode.getBoundingClientRect().width;
                        var height = this.parentNode.getBoundingClientRect().height;
                        
                        $('.sYItem-bg').addClass('active');
                        // $('.sRitem').removeClass('active');
        
                        bg.style.width = width + 'px';
                        bg.style.height = height + 'px';
                        bg.style.transform = 'translateX(' + x + 'px ) translateY(' + y + 'px)';
                    });
        
                    element.addEventListener('mouseleave', function () {
                        $('.sYItem-bg').removeClass('active');
                        $('.sRitem').removeClass('active');
        
                        setTimeout(function () {
                            if (!document.getElementsByClassName("active")[0]) {
                                document.getElementsByClassName("swiper-slide-active")[0].getElementsByClassName("sRitem")[0].classList.add('active');
                            }
                        }, 100);
                    });
        
                });
        
            });
        }
    }, 60);

}

///////////////

// document.getElementsByClassName("sRmyShip")[0].onmouseover = function(){
//     document.getElementsByClassName("sR-sliderarrow")[0].style.display = "none";
//     document.getElementsByClassName("sR-sliderarrow")[1].style.display = "none";
// };

// document.getElementsByClassName("sRmyShip")[0].onmouseleave = function(){
//     document.getElementsByClassName("sR-sliderarrow")[0].style.display = "block";
//     document.getElementsByClassName("sR-sliderarrow")[1].style.display = "block";
// };

////////////////


var checkMerchFromShipBox = document.getElementsByClassName("sRShipParts");

for (var i = 0; i < checkMerchFromShipBox.length; i++) {

    document.getElementsByClassName("sRSHead")[i].onmouseover = function () {
        this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartHead")[0].style.opacity = "1";
        this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartHead")[0].style.top = "-50px";
        this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.marginLeft = "-300%";
        var getThis = this;
        setTimeout(function () {
            getThis.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.marginLeft = "300%";
            getThis.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.opacity = "0";
        }, 200);

        this.onmouseleave = function () {
            this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartHead")[0].style.opacity = "0";
            this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartHead")[0].style.top = "300px";
            var getThisAgain = this;
            setTimeout(function () {
                getThisAgain.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.marginLeft = "0";
                getThisAgain.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.opacity = "1";
            }, 200);
        }
    }

    document.getElementsByClassName("sRSBody")[i].onmouseover = function () {
        this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartBody")[0].style.opacity = "1";
        this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartBody")[0].style.top = "-30px";
        this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.marginLeft = "-300%";

        var getThis = this;
        setTimeout(function () {
            getThis.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.marginLeft = "300%";
            getThis.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.opacity = "0";
        }, 200);

        this.onmouseleave = function () {
            this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartBody")[0].style.opacity = "0";
            this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartBody")[0].style.top = "300px";
            var getThisAgain = this;
            setTimeout(function () {
                getThisAgain.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.marginLeft = "0";
                getThisAgain.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.opacity = "1";
            }, 200);
        }
    }
    document.getElementsByClassName("sRSSail")[i].onmouseover = function () {
        this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartSail")[0].style.opacity = "1";
        this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartSail")[0].style.top = "0";
        this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.marginLeft = "-300%";
        var getThis = this;
        setTimeout(function () {
            getThis.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.marginLeft = "300%";
            getThis.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.opacity = "0";
        }, 200);

        this.onmouseleave = function () {
            this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartSail")[0].style.opacity = "0";
            this.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sYPartSail")[0].style.top = "300px";
            var getThisAgain = this;
            setTimeout(function () {
                getThisAgain.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.marginLeft = "0";
                getThisAgain.parentNode.parentNode.parentNode.parentNode.getElementsByClassName("sRFullShipImg")[0].style.opacity = "1";
            }, 200);
        }
    }
}


////////////////////////////

var checkHead = document.getElementsByClassName("sRCheckHead");
var checkBody = document.getElementsByClassName("sRCheckBody");
var checkSail = document.getElementsByClassName("sRCheckSail");

for (var i = 0; i < checkHead.length; i++) {
    checkHead[i].onclick = function () {
        var previewMerchId = this.getAttribute("rankedModelid");
        var previewMerchType = 1;
        $.ajax({
            url: 'marketphp/shipRankToMarket.php',
            data: {
                previewMerchId: previewMerchId,
                previewMerchType: previewMerchType,
            },
            type: 'GET',
            success: function () {
                console.log("寫入session");
            },
            error: function (e) {
                console.log("寫入session失敗");
            }
        });
    }
}
for (var i = 0; i < checkBody.length; i++) {
    checkBody[i].onclick = function () {
        var previewMerchId = this.getAttribute("rankedModelid");
        var previewMerchType = 2;
        $.ajax({
            url: 'marketphp/shipRankToMarket.php',
            data: {
                previewMerchId: previewMerchId,
                previewMerchType: previewMerchType,
            },
            type: 'GET',
            success: function () {
                console.log("寫入session");
            },
            error: function (e) {
                console.log("寫入session失敗");
            }
        });
    }
}
for (var i = 0; i < checkSail.length; i++) {
    checkSail[i].onclick = function () {
        var previewMerchId = this.getAttribute("rankedModelid");
        var previewMerchType = 3;
        $.ajax({
            url: 'marketphp/shipRankToMarket.php',
            data: {
                previewMerchId: previewMerchId,
                previewMerchType: previewMerchType,
            },
            type: 'GET',
            success: function () {

            },
            error: function (e) {

            }
        });
    }
}

if(memid == "tourist"){
    document.getElementsByClassName("sRGetRewardTips")[0].style.display = "none";
}else{

    document.getElementsByClassName("sRGetRewardTips")[0].onclick = function(){
        var reward = parseInt(document.getElementsByClassName("sRmyShip")[0].getElementsByClassName("sRranktxt")[0].innerHTML);
    
        $.ajax({
            url: 'marketphp/getSRReward.php',
            data: {
                memId: memId,
                reward: reward,
            },
            type: 'GET',
            success: function () {
                $(".sRGetRewardTips").remove();
            },
            error: function (e) {
    
            }
        });
    };
}


////////////////////////////
$("#switch").click(function () {
    if ($("#fullpage").hasClass("night")) {
        $("#fullpage").removeClass("night");
        $("#switch").removeClass("switched");
    }
    else {
        $("#fullpage").addClass("night");
        $("#switch").addClass("switched");

    }
});

// ///////////////////////////
document.getElementsByClassName("lightbox")[0].style.display = "none";
if(memid == "tourist"){
    document.getElementsByClassName("sRmyShip")[0].getElementsByClassName("sRtitle")[0].getElementsByTagName("a")[0].onclick = function(){
        document.getElementsByClassName("lightbox")[0].style.display = "block";
    }
    
}
// document.getElementsByClassName("leave")[0].onclick = function(){
//     document.getElementsByClassName("lightbox")[0].style.display = "none";
// }

document.getElementById("signUp").onclick = function () {

    location.reload(true);
}
document.getElementById("btnver").onclick = function () {

    location.reload(true);
}
