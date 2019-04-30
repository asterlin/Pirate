$(document).on('ready', function () {
    $(document).on('ready', defaultPreview());

    var switchType = 1;
    showType(switchType);

    function currentType(n) {
        showType(switchType = n);
    }
    function showType(n) {
        var i;
        var switchContent = document.getElementsByClassName("regular");
        var page = document.getElementsByClassName("merchType");
        if (n > switchContent.length) { switchType = 1 }
        if (n < 1) { switchType = switchContent.length }
        for (i = 0; i < switchContent.length; i++) {
            switchContent[i].style.display = "none";
        }
        for (i = 0; i < page.length; i++) {
            page[i].className = page[i].className.replace(" current_type", "");
        }
        switchContent[switchType - 1].style.display = "flex";
        switchContent[switchType - 1].style.animation = "fadeIn .6s";
        page[switchType - 1].className += " current_type";
    }



    var switchMarket = 1;
    showMarket(switchMarket);

    function currentMarket(n) {

        showMarket(switchMarket = n);

        repositionFrame(n);

    }
    var executedHot = false;

    function showMarket(n) {
        var i;
        var changeMar = document.getElementsByClassName("marMain");
        var trigger = document.getElementsByClassName("marTitInBox");
        if (n > changeMar.length) { switchMarket = 1 }
        if (n < 1) { switchMarket = changeMar.length }
        for (i = 0; i < changeMar.length; i++) {
            changeMar[i].style.display = "none";
        }
        for (i = 0; i < trigger.length; i++) {
            trigger[i].className = trigger[i].className.replace(" currentMar", "");
        }
        changeMar[switchMarket - 1].style.display = "block";
        changeMar[switchMarket - 1].style.animation = "fadeIn .6s";
        trigger[switchMarket - 1].className += " currentMar";
        if (w < 1024) {

            if (executedHot == false) {
                $(".typeHot").slick({
                    arrows: false,
                    dots: false,
                    infinite: false,
                    slidesToShow: 2.5,
                    slidesToScroll: 2
                });

                executedHot = true;
            }

            document.getElementsByClassName("merchTypeHot")[0].onmouseenter = function () {
                currentType(1);

                if (executedHota == false) {
                    $(".typeHot").slick({
                        arrows: false,
                        dots: false,
                        infinite: false,
                        slidesToShow: 2.5,
                        slidesToScroll: 2
                    });
                    executedHota = true;
                    buyMerchActivity();
                }

            }
            document.getElementsByClassName("merchTypHead")[0].onmouseenter = function () {
                currentType(2);


                if (executedHead == false) {
                    $(".typeHead").slick({
                        arrows: false,
                        dots: false,
                        infinite: false,
                        slidesToShow: 2.5,
                        slidesToScroll: 2
                    });
                    executedHead = true;
                    buyMerchActivity();
                }

            }
            document.getElementsByClassName("merchTypeBody")[0].onmouseenter = function () {
                currentType(3);

                if (executedBody == false) {
                    $(".typeBody").slick({
                        arrows: false,
                        dots: false,
                        infinite: false,
                        slidesToShow: 2.5,
                        slidesToScroll: 2
                    });
                    executedBody = true;
                    buyMerchActivity();
                }

            }
            document.getElementsByClassName("merchTypSail")[0].onmouseenter = function () {
                currentType(4);


                if (executedSail == false) {
                    $(".typeSail").slick({
                        arrows: false,
                        dots: false,
                        infinite: false,
                        slidesToShow: 2.5,
                        slidesToScroll: 2
                    });
                    executedSail = true;
                    buyMerchActivity();
                }

            }
        }


        //黑市JS測試--------------------------------------------------------------------------------------------------

    }




    var executedHota = false;
    var executedHead = false;
    var executedBody = false;
    var executedSail = false;

    document.getElementsByClassName("merchTypeHot")[0].onmouseenter = function () {
        currentType(1);

        if (w < 1024) {
            if (executedHota == false) {
                $(".typeHot").slick({
                    arrows: false,
                    dots: false,
                    infinite: false,
                    slidesToShow: 2.5,
                    slidesToScroll: 2
                });
                executedHota = true;
                buyMerchActivity();
            }
        }
    }
    document.getElementsByClassName("merchTypHead")[0].onmouseenter = function () {
        currentType(2);

        if (w < 1024) {
            if (executedHead == false) {
                $(".typeHead").slick({
                    arrows: false,
                    dots: false,
                    infinite: false,
                    slidesToShow: 2.5,
                    slidesToScroll: 2
                });
                executedHead = true;
                buyMerchActivity();
            }
        }
    }
    document.getElementsByClassName("merchTypeBody")[0].onmouseenter = function () {
        currentType(3);

        if (w < 1024) {
            if (executedBody == false) {
                $(".typeBody").slick({
                    arrows: false,
                    dots: false,
                    infinite: false,
                    slidesToShow: 2.5,
                    slidesToScroll: 2
                });
                executedBody = true;
                buyMerchActivity();
            }
        }
    }
    document.getElementsByClassName("merchTypSail")[0].onmouseenter = function () {
        currentType(4);

        if (w < 1024) {
            if (executedSail == false) {
                $(".typeSail").slick({
                    arrows: false,
                    dots: false,
                    infinite: false,
                    slidesToShow: 2.5,
                    slidesToScroll: 2
                });
                executedSail = true;
                buyMerchActivity();
            }
        }
    }


    function repositionFrame(n) {
        var frameMove = document.getElementsByClassName("titFrame");
        var BoardMove = document.getElementsByClassName("marBoard");
        var mbgiMove = document.getElementsByClassName("mlsl");


        if (n == 1) {
            frameMove[0].style.transform = "translateX(0px)";

            BoardMove[0].style.top = "200px";
            BoardMove[0].style.left = "7%";
            BoardMove[0].style.transform = "perspective(1000px) rotateY(42deg) skewY(-12deg)";

            BoardMove[1].style.top = "50px";
            BoardMove[1].style.left = "30%";
            BoardMove[1].style.transform = "perspective(1000px) rotateY(42deg) skewY(-12deg) scale(.5)";

            BoardMove[2].style.top = "-30px";
            BoardMove[2].style.left = "50%";
            BoardMove[2].style.opacity = "0";
            BoardMove[2].style.transform = "perspective(1000px) rotateY(42deg) skewY(-12deg) scale(.3)";

            mbgiMove[0].style.transform = "translate(0px, 0px) scale(1) ";
        } else {
            frameMove[0].style.transform = "translateX(100px)";

            BoardMove[0].style.top = "360px";
            BoardMove[0].style.left = "-14%";
            BoardMove[0].style.transform = "perspective(1000px) rotateY(42deg) skewY(-12deg)";

            BoardMove[1].style.top = "200px";
            BoardMove[1].style.left = "7%";
            BoardMove[1].style.transform = "perspective(1000px) rotateY(42deg) skewY(-12deg)";

            BoardMove[2].style.top = "50px";
            BoardMove[2].style.left = "30%";
            BoardMove[2].style.opacity = "1";
            BoardMove[2].style.transform = "perspective(1000px) rotateY(42deg) skewY(-12deg) scale(.5)";

            mbgiMove[0].style.transform = "translate(-13.137%, 3.25vw) scale(1.2) ";
        }
    }
    var executed = false;
    document.getElementsByClassName("marTypeTit")[0].onmouseover = function () {

        currentMarket(1);

    };
    document.getElementsByClassName("marTypeTit")[1].onmouseover = function () {
        currentMarket(2);
    }

    /////////////////////////從船匠排行預覽商品

    if (previewMerchId == -1) {

    } else {

        currentMarket(2);
        window.scrollTo(0, document.body.scrollHeight);
        // document.getElementsByClassName("shipYardBanner")[0].style.opacity = "0";

        // setTimeout(function () {
        //     //左


        //     if (executed != true) {
        //         $(".sRPBoxLeft").slick({
        //             vertical: true,
        //             slidesToShow: 3,
        //             slidesToScroll: 1,
        //             centerMode: true,
        //             asNavFor: '.sRPLBoxmain',
        //             focusOnSelect: true,
        //             arrows: false,
        //             draggable: false,
        //         });

        //         $(".sRPLBoxmain").slick({
        //             vertical: true,
        //             infinite: true,
        //             centerMode: true,
        //             slidesToShow: 1,
        //             slidesToScroll: 1,
        //             asNavFor: '.sRPBoxLeft',
        //             arrows: false,
        //             draggable: false,
        //         });

        //         var sRLeftCurrent = document.getElementsByClassName("sRPBoxLeft")[0].getElementsByClassName("slick-current")[0];
        //         sRLeftCurrent.style.transform = "scale(.7) rotate(-60deg) translate(15%,-50px)";
        //         sRLeftCurrent.getElementsByClassName("sRPDShipisplay")[0].style.animation = "sRShip 10s ease-in-out infinite";
        //         sRLeftCurrent.previousElementSibling.style.transform = "scale(.5) rotate(-60deg)";
        //         sRLeftCurrent.previousElementSibling.getElementsByClassName("sRPDShipisplay")[0].style.animation = "sRShip 10s ease-in-out -3s infinite";
        //         sRLeftCurrent.nextElementSibling.style.transform = "scale(1) rotate(-60deg) translate(0,-50px)";
        //         sRLeftCurrent.nextElementSibling.getElementsByClassName("sRPDShipisplay")[0].style.animation = "sRShip 10s ease-in-out -8s infinite";

        //         //右

        //         $(".sRPBoxRight").slick({
        //             vertical: true,
        //             slidesToShow: 3,
        //             slidesToScroll: 1,
        //             centerMode: true,
        //             asNavFor: '.sRPRBoxmain',
        //             focusOnSelect: true,
        //             arrows: false,
        //             draggable: false,
        //         });

        //         $(".sRPRBoxmain").slick({
        //             vertical: true,
        //             infinite: true,
        //             centerMode: true,
        //             slidesToShow: 1,
        //             slidesToScroll: 1,
        //             asNavFor: '.sRPBoxRight',
        //             arrows: false,
        //             draggable: false,
        //         });

        //         var sRRightCurrent = document.getElementsByClassName("sRPBoxRight")[0].getElementsByClassName("slick-current")[0];
        //         sRRightCurrent.style.transform = "scale(.7) rotateZ(60deg) translate(-15%,-50px)";
        //         sRRightCurrent.getElementsByClassName("sRPDShipisplay")[0].style.animation = "sRShip 10s ease-in-out infinite";
        //         sRRightCurrent.previousElementSibling.style.transform = "scale(.5) rotateZ(60deg)";
        //         sRRightCurrent.previousElementSibling.getElementsByClassName("sRPDShipisplay")[0].style.animation = "sRShip 10s ease-in-out -3s infinite";
        //         sRRightCurrent.nextElementSibling.style.transform = "scale(1) rotateZ(60deg) translate(0,-50px)";
        //         sRRightCurrent.nextElementSibling.getElementsByClassName("sRPDShipisplay")[0].style.animation = "sRShip 10s ease-in-out -8s infinite";
        //     }


        //     executed = true;
        // }, 10);


        setTimeout(function () {
            var getmerchlist = document.getElementsByClassName("sYMerchImg");
            for (var i = 0; i < getmerchlist.length; i++) {
                if (getmerchlist[i].getElementsByTagName("img")[0].getAttribute("merchid") == previewMerchId) {

                    getmerchlist[i].parentNode.classList.add("currentPreview");
                    getmerchlist[i].parentNode.style.order = "-1";
                    currentType(parseInt(previewMerchType) + 1);

                    if (previewMerchType == 1) {
                        document.getElementsByClassName("merchHead")[0].getElementsByClassName("previewHeadBox")[0].src = getmerchlist[i].getElementsByTagName("img")[0].src;
                        document.getElementsByClassName("merchHead")[0].classList.remove("mydefaultHead");
                        document.getElementsByClassName("merchHead")[0].getElementsByClassName("merchPartintro")[0].getElementsByTagName("h3")[0].innerHTML =
                            getmerchlist[i].parentNode.getElementsByClassName("sYMerchText")[0].getElementsByTagName("h3")[0].innerHTML;

                        document.getElementsByClassName('merchHead')[0].getElementsByClassName('merchPartPrice')[0].innerHTML =
                            getmerchlist[i].parentNode.getElementsByClassName('sYIntroPrice')[0].innerHTML;
                        document.getElementsByClassName("merchHead")[0].getElementsByClassName("SYPriceTag")[0].innerHTML = "價格 :";

                        if (w < 1024) {
                            if (executedHead == false) {
                                $(".typeHead").slick({
                                    arrows: false,
                                    dots: false,
                                    infinite: false,
                                    slidesToShow: 2.5,
                                    slidesToScroll: 2
                                });
                                executedHead = true;
                                buyMerchActivity();
                            }
                        }
                    } else if (previewMerchType == 2) {
                        document.getElementsByClassName("merchBody")[0].getElementsByClassName("previewBodyBox")[0].src = getmerchlist[i].getElementsByTagName("img")[0].src;
                        document.getElementsByClassName("merchBody")[0].classList.remove("mydefaultBody");
                        document.getElementsByClassName("merchBody")[0].getElementsByClassName("merchPartintro")[0].getElementsByTagName("h3")[0].innerHTML =
                            getmerchlist[i].parentNode.getElementsByClassName("sYMerchText")[0].getElementsByTagName("h3")[0].innerHTML;

                        document.getElementsByClassName('merchBody')[0].getElementsByClassName('merchPartPrice')[0].innerHTML =
                            getmerchlist[i].parentNode.getElementsByClassName('sYIntroPrice')[0].innerHTML;
                        document.getElementsByClassName("merchBody")[0].getElementsByClassName("SYPriceTag")[0].innerHTML = "價格 :";

                        if (w < 1024) {
                            if (executedBody == false) {
                                $(".typeBody").slick({
                                    arrows: false,
                                    dots: false,
                                    infinite: false,
                                    slidesToShow: 2.5,
                                    slidesToScroll: 2
                                });
                                executedBody = true;
                                buyMerchActivity();
                            }
                        }
                    } else if (previewMerchType == 3) {
                        document.getElementsByClassName("merchSail")[0].getElementsByClassName("previewSailBox")[0].src = getmerchlist[i].getElementsByTagName("img")[0].src;
                        document.getElementsByClassName("merchSail")[0].classList.remove("mydefaultSail");
                        document.getElementsByClassName("merchSail")[0].getElementsByClassName("merchPartintro")[0].getElementsByTagName("h3")[0].innerHTML =
                            getmerchlist[i].parentNode.getElementsByClassName("sYMerchText")[0].getElementsByTagName("h3")[0].innerHTML;

                        document.getElementsByClassName('merchSail')[0].getElementsByClassName('merchPartPrice')[0].innerHTML =
                            getmerchlist[i].parentNode.getElementsByClassName('sYIntroPrice')[0].innerHTML;
                        document.getElementsByClassName("merchSail")[0].getElementsByClassName("SYPriceTag")[0].innerHTML = "價格 :";

                        if (w < 1024) {

                            if (executedSail == false) {
                                $(".typeSail").slick({
                                    arrows: false,
                                    dots: false,
                                    infinite: false,
                                    slidesToShow: 2.5,
                                    slidesToScroll: 2
                                });
                                executedSail = true;
                                buyMerchActivity();
                            }
                        }
                    }
                }

            } if (w < 1024) {
                document.getElementsByClassName("merchTypeHot")[0].onmouseenter = function () {

                    currentType(1);
                    // if (w < 1024) {
                    //     if (executedHota == false) {
                    //         $(".typeHot").slick({
                    //             arrows: false,
                    //             dots: false,
                    //             infinite: false,
                    //             slidesToShow: 2.5,
                    //             slidesToScroll: 2
                    //         });
                    //         executedHota = true;
                    //         buyMerchActivity();
                    //     }
                    // }
                }
            };

        }, 10);
    }
    if (goToShipYard == 1) {
        currentMarket(previewMerchType + 1);
        window.scrollTo(0, document.body.scrollHeight);
        // document.getElementsByClassName("shipYardBanner")[0].style.opacity = "0";


        if (w < 1024) {
            currentType(1);
            if (executedHota == false) {
                $(".typeHot").slick({
                    arrows: false,
                    dots: false,
                    infinite: false,
                    slidesToShow: 2.5,
                    slidesToScroll: 2
                });
                executedHota = true;
                buyMerchActivity();
            }
        }

        setTimeout(function () {
            switch (previewMerchType) {
                case 1:
                    if (w < 1024) {
                        if (executedHead == false) {
                            $(".typeHead").slick({
                                arrows: false,
                                dots: false,
                                infinite: false,
                                slidesToShow: 2.5,
                                slidesToScroll: 2
                            });
                            executedHead = true;
                            buyMerchActivity();
                        }
                    }
                    break;
                case 2:
                    if (w < 1024) {
                        if (executedBody == false) {
                            $(".typeBody").slick({
                                arrows: false,
                                dots: false,
                                infinite: false,
                                slidesToShow: 2.5,
                                slidesToScroll: 2
                            });
                            executedBody = true;
                            buyMerchActivity();
                        }
                    }
                    break;
                case 3:
                    if (w < 1024) {
                        if (executedSail == false) {
                            $(".typeSail").slick({
                                arrows: false,
                                dots: false,
                                infinite: false,
                                slidesToShow: 2.5,
                                slidesToScroll: 2
                            });
                            executedSail = true;
                            buyMerchActivity();
                        }
                    }
                    break;
            }
        }, 10);
    }

    document.getElementsByClassName("marTitInBox")[0].onmouseenter = function () {
        currentMarket(1);
    }
    document.getElementsByClassName("marTitInBox")[1].onmouseenter = function () {
        currentMarket(2);

    }
    document.getElementsByClassName("merchTypeHot")[0].onmouseenter = function () {
        currentType(1);
        if (w < 1024) {
            if (executedHota == false) {
                $(".typeHot").slick({
                    arrows: false,
                    dots: false,
                    infinite: false,
                    slidesToShow: 2.5,
                    slidesToScroll: 2
                });
                executedHota = true;
                buyMerchActivity();
            }
        }
    }
    document.getElementsByClassName("merchTypHead")[0].onmouseenter = function () {
        currentType(2);
        if (w < 1024) {
            if (executedHead == false) {
                $(".typeHead").slick({
                    arrows: false,
                    dots: false,
                    infinite: false,
                    slidesToShow: 2.5,
                    slidesToScroll: 2
                });
                executedHead = true;
                buyMerchActivity();
            }
        }
    }
    document.getElementsByClassName("merchTypeBody")[0].onmouseenter = function () {
        currentType(3);
        if (w < 1024) {
            {
                if (executedBody == false) {
                    $(".typeBody").slick({
                        arrows: false,
                        dots: false,
                        infinite: false,
                        slidesToShow: 2.5,
                        slidesToScroll: 2
                    });
                    executedBody = true;
                    buyMerchActivity();
                }
            }
        }
    }
    document.getElementsByClassName("merchTypSail")[0].onmouseenter = function () {
        currentType(4);
        if (w < 1024) {
            if (executedSail == false) {
                $(".typeSail").slick({
                    arrows: false,
                    dots: false,
                    infinite: false,
                    slidesToShow: 2.5,
                    slidesToScroll: 2
                });
                executedSail = true;
                buyMerchActivity();
            }
        }
    }
});



//更換造型動畫
//////////////////////////////////////////////////

var transitionEvent = whichTransitionEvent();
var previewHeadMove = document.getElementsByClassName('sYMerchHeadImg');
var delHeadMove = document.getElementsByClassName('merchHead')[0];
for (var i = 0; i < previewHeadMove.length; i++) {
    previewHeadMove[i].parentNode.parentNode.addEventListener('click', function () {
        document.getElementById('sYHead').classList.toggle('doHeadAnimation');
        document.getElementById('sYHead').addEventListener(transitionEvent, transitionEndCallbackHead);
    });
}

delHeadMove.addEventListener('click', function () {
    document.getElementById('sYHead').classList.toggle('doHeadAnimation');
    document.getElementById('sYHead').addEventListener(transitionEvent, transitionEndCallbackHead);
});


function transitionEndCallbackHead(event) {
    document.getElementById('sYHead').removeEventListener(transitionEvent, transitionEndCallbackHead);
    document.getElementById('sYHead').classList.remove('doHeadAnimation');
}

var previewBodyMove = document.getElementsByClassName('sYMerchBodyImg');
var delBodydMove = document.getElementsByClassName('merchBody')[0];

for (var i = 0; i < previewBodyMove.length; i++) {
    previewBodyMove[i].parentNode.parentNode.addEventListener('click', function () {
        document.getElementById('sYBody').classList.toggle('doBodyAnimation');
        document.getElementById('sYBody').addEventListener(transitionEvent, transitionEndCallbackBody);
        document.getElementById('sYSail').classList.toggle('doBodyAnimation');
        document.getElementById('sYSail').addEventListener(transitionEvent, transitionEndCallbackBody);
    });
}

delBodydMove.addEventListener('click', function () {
    document.getElementById('sYBody').classList.toggle('doBodyAnimation');
    document.getElementById('sYBody').addEventListener(transitionEvent, transitionEndCallbackBody);
    document.getElementById('sYSail').classList.toggle('doBodyAnimation');
    document.getElementById('sYSail').addEventListener(transitionEvent, transitionEndCallbackBody);
});

function transitionEndCallbackBody(event) {
    document.getElementById('sYBody').removeEventListener(transitionEvent, transitionEndCallbackBody);
    document.getElementById('sYBody').classList.remove('doBodyAnimation');
    document.getElementById('sYSail').removeEventListener(transitionEvent, transitionEndCallbackBody);
    document.getElementById('sYSail').classList.remove('doBodyAnimation');
}

var previewSailMove = document.getElementsByClassName('sYMerchSailImg');
var delSailMove = document.getElementsByClassName('merchSail')[0];

for (var i = 0; i < previewSailMove.length; i++) {
    previewSailMove[i].parentNode.parentNode.addEventListener('click', function () {
        document.getElementById('sYSail').classList.toggle('doSailAnimation');
        document.getElementById('sYSail').addEventListener(transitionEvent, transitionEndCallbackSail);
    });
}

delSailMove.addEventListener('click', function () {
    document.getElementById('sYSail').classList.toggle('doSailAnimation');
    document.getElementById('sYSail').addEventListener(transitionEvent, transitionEndCallbackSail);
});

function transitionEndCallbackSail(event) {
    document.getElementById('sYSail').removeEventListener(transitionEvent, transitionEndCallbackSail);
    document.getElementById('sYSail').classList.remove('doSailAnimation');

}

function whichTransitionEvent() {
    var moveParts,
        fakeEl = document.createElement("fakeelement");

    var transitions = {
        "transition": "transitionend",
        "OTransition": "oTransitionEnd",
        "MozTransition": "transitionend",
        "WebkitTransition": "webkitTransitionEnd"
    }

    for (moveParts in transitions) {
        if (fakeEl.style[moveParts] !== undefined) {
            return transitions[moveParts];
        }
    }
}

//////////////////////////////////////////////////

function defaultPreview() {
    defaultHead = document.getElementsByClassName("previewHeadBox")[0].src;

    defaultBody = document.getElementsByClassName("previewBodyBox")[0].src;

    defaultSail = document.getElementsByClassName("previewSailBox")[0].src;

    defaultHeadPrev();
    defaultBodyPrev();
    defaultSailPrev();

    document.getElementById("sYHead").setAttribute("defaultId", defaultHeadId);
    document.getElementById("sYBody").setAttribute("defaultId", defaultBodyId);
    document.getElementById("sYSail").setAttribute("defaultId", defaultSailId);
    // console.log(defaultHeadId);
    // console.log(defaultBodyId);
    // console.log(defaultSailId);

    // alert(myCustoms[0]);
    // alert(myCustoms[1]);
    // alert(myCustoms[2]);

    var sYMerch = document.getElementsByClassName("sYMerch");
    for (var i = 0; i < myCustoms.length; i++) {
        for (var j = 0; j < sYMerch.length; j++) {
            if (sYMerch[j].getElementsByClassName("sYMerchImg")[0].getElementsByTagName("img")[0].getAttribute("merchid") == myCustoms[i]) {
                sYMerch[j].getElementsByClassName("sYMerchImg")[0].parentNode.classList.add("ownedMerch");
                sYMerch[j].getElementsByClassName("sYMerchImg")[0].parentNode.getElementsByClassName("btnpri")[0].getElementsByTagName("span")[0].innerHTML = "擁有造型";
                sYMerch[j].getElementsByClassName("sYMerchImg")[0].parentNode.getElementsByClassName("btnpri")[0].classList.remove("sYBuyBtn");
            }
        }
    }

}

function defaultHeadPrev() {
    document.getElementById("sYHead").src = defaultHead;
    document.getElementsByClassName("merchHead")[0].getElementsByClassName('SYremoveMerch')[0].parentNode.parentNode.getElementsByClassName("previewHeadBox")[0].src = defaultHead;

    for (var i = 0; i < document.getElementsByClassName("currentPreview").length; i++) {
        if (document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYMerchHeadImg")[0]) {
            document.getElementsByClassName("currentPreview")[i].getElementsByClassName("unvisibleBtn")[0].style.display = "none";
        }
    }

    if (document.getElementsByClassName("merchHead")[0].classList.contains("mydefaultHead")) {

    } else {
        document.getElementsByClassName("merchHead")[0].classList.add("mydefaultHead");
    }
    var currentPreviewList = document.getElementsByClassName("currentPreview");
    for (var i = 0; i < currentPreviewList.length; i++) {
        if (currentPreviewList[i].getElementsByClassName("sYMerchHeadImg")[0]) {
            currentPreviewList[i].classList.remove("currentPreview");
        }
    }
    document.getElementsByClassName("merchHead")[0].getElementsByClassName("SYPriceTag")[0].innerHTML = "狀態 :";
    document.getElementsByClassName("merchHead")[0].getElementsByClassName("merchPartPrice")[0].innerHTML = "裝備中";

    if (myDefaultHeadName == undefined) {
        myDefaultHeadName = "北境船首";
    } else {
        document.getElementsByClassName("mydefaultHead")[0].getElementsByTagName("h3")[0].innerHTML = myDefaultHeadName;
    }

}

function defaultBodyPrev() {
    document.getElementById("sYBody").src = defaultBody;
    document.getElementsByClassName("merchBody")[0].getElementsByClassName('SYremoveMerch')[0].parentNode.parentNode.getElementsByClassName("previewBodyBox")[0].src = defaultBody;

    for (var i = 0; i < document.getElementsByClassName("currentPreview").length; i++) {
        if (document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYMerchBodyImg")[0]) {
            document.getElementsByClassName("currentPreview")[i].getElementsByClassName("unvisibleBtn")[0].style.display = "none";
        }
    }

    if (document.getElementsByClassName("merchBody")[0].classList.contains("mydefaultBody")) {

    } else {
        document.getElementsByClassName("merchBody")[0].classList.add("mydefaultBody");
    }
    var currentPreviewList = document.getElementsByClassName("currentPreview");
    for (var i = 0; i < currentPreviewList.length; i++) {
        if (currentPreviewList[i].getElementsByClassName("sYMerchBodyImg")[0]) {
            currentPreviewList[i].classList.remove("currentPreview");
        }
    }
    document.getElementsByClassName("merchBody")[0].getElementsByClassName("SYPriceTag")[0].innerHTML = "狀態 :";
    document.getElementsByClassName("merchBody")[0].getElementsByClassName("merchPartPrice")[0].innerHTML = "裝備中";

    document.getElementsByClassName("mydefaultBody")[0].getElementsByTagName("h3")[0].innerHTML = myDefaultBodyName;
}

function defaultSailPrev() {
    document.getElementById("sYSail").src = defaultSail;
    document.getElementsByClassName("merchSail")[0].getElementsByClassName('SYremoveMerch')[0].parentNode.parentNode.getElementsByClassName("previewSailBox")[0].src = defaultSail;

    for (var i = 0; i < document.getElementsByClassName("currentPreview").length; i++) {
        if (document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYMerchSailImg")[0]) {
            document.getElementsByClassName("currentPreview")[i].getElementsByClassName("unvisibleBtn")[0].style.display = "none";
        }
    }

    if (document.getElementsByClassName("merchSail")[0].classList.contains("mydefaultSail")) {

    } else {
        document.getElementsByClassName("merchSail")[0].classList.add("mydefaultSail");
    }
    var currentPreviewList = document.getElementsByClassName("currentPreview");
    for (var i = 0; i < currentPreviewList.length; i++) {
        if (currentPreviewList[i].getElementsByClassName("sYMerchSailImg")[0]) {
            currentPreviewList[i].classList.remove("currentPreview");
        }
    }
    document.getElementsByClassName("merchSail")[0].getElementsByClassName("SYPriceTag")[0].innerHTML = "狀態 :";
    document.getElementsByClassName("merchSail")[0].getElementsByClassName("merchPartPrice")[0].innerHTML = "裝備中";

    document.getElementsByClassName("mydefaultSail")[0].getElementsByTagName("h3")[0].innerHTML = myDefaultSailName;
}

var shelf = document.getElementsByClassName('sYMerchPreviewBox')[0];
var partsPreviewBtn = document.getElementsByClassName('sYPreviewBtn')[0];

partsPreviewBtn.onclick = function () {
    if (partsPreviewBtn.getElementsByTagName('span')[0].innerHTML == "查看目前選擇部位") {
        shelf.style.left = "0vw";
        partsPreviewBtn.getElementsByTagName('span')[0].innerHTML = "回到預覽";
    } else {
        shelf.style.left = "100vw";
        partsPreviewBtn.getElementsByTagName('span')[0].innerHTML = "查看目前選擇部位";
    }

};
document.getElementsByClassName('sYClosePreviewBtn')[0].onclick = function () {
    shelf.style.left = "100vw";
    partsPreviewBtn.getElementsByTagName('span')[0].innerHTML = "查看目前選擇部位";
};

var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);






////////////////////有商品時改變一鍵購買
function changesYbuymerchesBtn() {
    previewCount = document.getElementsByClassName("currentPreview").length;

    for (var i = 0; i < previewCount; i++) {
        if (document.getElementsByClassName("currentPreview")[i].classList.contains("ownedMerch")) {
            previewCount--;
        }
    }
    if (previewCount > 0) {
        var buyAllWaves = document.getElementsByClassName("sYbuymerchesBtn")[0].getElementsByClassName("wave");
        for (var i = 0; i < buyAllWaves.length; i++) {
            buyAllWaves[i].style.backgroundColor = '#914444';
        }
        document.getElementsByClassName("buyAllIntro")[0].innerHTML = "一鍵購買";
    } else {
        var buyAllWaves = document.getElementsByClassName("sYbuymerchesBtn")[0].getElementsByClassName("wave");
        for (var i = 0; i < buyAllWaves.length; i++) {
            buyAllWaves[i].style.backgroundColor = 'rgba(175, 96, 82,0.4)';
        }
        document.getElementsByClassName("buyAllIntro")[0].innerHTML = "尚無預覽";
    }

    document.getElementsByClassName("buyAllIntro")[0].innerHTML += "<span style='font-size: .5rem; padding: 0;'>(" + previewCount + ")</span>";
    if (previewCount == 0) {
        var removeCountText = document.getElementsByClassName("buyAllIntro")[0].getElementsByTagName("span")[0];
        removeCountText.remove();
    }
}


///////////////

///////////////////


//預覽按鈕
function previewMerchFunc() {
    var merchItem = document.getElementsByClassName('sYMerch');

    var merchImg = document.getElementsByClassName('sYMerchImg');
    for (var i = 0; i < merchImg.length; i++) {
        merchImg[i].onmouseover = function () {
            //把預覽圖換成hover的


            //hover結束還要換回來
        };
        merchItem[i].onmouseenter = function () {

            if (this.classList.contains("currentPreview")) {
                this.getElementsByClassName('visibleBtn')[0].style.display = "none";
            } else {
                this.getElementsByClassName('visibleBtn')[0].style.display = "block";
            }
        };
        merchItem[i].onmouseleave = function () {
            this.getElementsByClassName('visibleBtn')[0].style.display = "none";
        };

        var previewCount = 0;

        merchImg[i].parentNode.onclick = function () {

            if (this.classList.contains("currentPreview")) {
                this.getElementsByClassName('visibleBtn')[0].style.display = "block";
                this.getElementsByClassName('unvisibleBtn')[0].style.display = "none";
                this.classList.remove("currentPreview");
                if (this.getElementsByClassName("sYMerchHeadImg")[0]) {
                    defaultHeadPrev();
                } else if (this.getElementsByClassName("sYMerchBodyImg")[0]) {
                    defaultBodyPrev();
                } else if (this.getElementsByClassName("sYMerchSailImg")[0]) {
                    defaultSailPrev();
                }

                //把預覽圖換回來



            } else {
                var thisType = this.getElementsByTagName('img')[0].className;
                var sameType = document.getElementsByClassName(thisType);



                for (var i = 0; i < sameType.length; i++) {
                    sameType[i].parentNode.getElementsByClassName('unvisibleBtn')[0].style.display = "none";
                    sameType[i].parentNode.parentNode.classList.remove("currentPreview");
                }

                this.getElementsByClassName('visibleBtn')[0].style.display = "none";
                this.getElementsByClassName('unvisibleBtn')[0].style.display = "block";
                this.classList.add("currentPreview");

                //把預覽圖換成click的
                var selectedImg = this.getElementsByTagName('img')[0].src;
                if (this.getElementsByClassName('sYMerchHeadImg')[0]) {
                    // document.getElementById('sYHead').classList.remove("previewAnimation");
                    // document.getElementById('sYHead').classList.add("previewAnimation");

                    document.getElementsByClassName("merchHead")[0].classList.remove("mydefaultHead");
                    document.getElementById('sYHead').src = selectedImg;
                    document.getElementsByClassName('previewHeadBox')[0].src = selectedImg;
                    document.getElementsByClassName('merchHead')[0].getElementsByTagName('h3')[0].innerHTML = this.getElementsByTagName('h3')[0].innerHTML;
                    document.getElementsByClassName('merchHead')[0].getElementsByClassName('merchPartPrice')[0].innerHTML = this.getElementsByClassName('sYIntroPrice')[0].innerHTML;
                    document.getElementsByClassName("merchHead")[0].getElementsByClassName("SYPriceTag")[0].innerHTML = "價格 :";
                } else if (this.getElementsByClassName('sYMerchBodyImg')[0]) {
                    // document.getElementById('sYBody').classList.add("previewAnimation");

                    document.getElementsByClassName("merchBody")[0].classList.remove("mydefaultBody");
                    document.getElementById('sYBody').src = selectedImg;
                    document.getElementsByClassName('previewBodyBox')[0].src = selectedImg;
                    document.getElementsByClassName('merchBody')[0].getElementsByTagName('h3')[0].innerHTML = this.getElementsByTagName('h3')[0].innerHTML;
                    document.getElementsByClassName('merchBody')[0].getElementsByClassName('merchPartPrice')[0].innerHTML = this.getElementsByClassName('sYIntroPrice')[0].innerHTML;
                    document.getElementsByClassName("merchBody")[0].getElementsByClassName("SYPriceTag")[0].innerHTML = "價格 :";
                } else if (this.getElementsByClassName('sYMerchSailImg')[0]) {
                    // document.getElementById('sYSail').classList.add("previewAnimation");

                    document.getElementsByClassName("merchSail")[0].classList.remove("mydefaultSail");
                    document.getElementById('sYSail').src = selectedImg;
                    document.getElementsByClassName('previewSailBox')[0].src = selectedImg;
                    document.getElementsByClassName('merchSail')[0].getElementsByTagName('h3')[0].innerHTML = this.getElementsByTagName('h3')[0].innerHTML;
                    document.getElementsByClassName('merchSail')[0].getElementsByClassName('merchPartPrice')[0].innerHTML = this.getElementsByClassName('sYIntroPrice')[0].innerHTML;
                    document.getElementsByClassName("merchSail")[0].getElementsByClassName("SYPriceTag")[0].innerHTML = "價格 :";
                }

            }

            changesYbuymerchesBtn();
        };

    };

    $(document).on('ready', function () {
        document.getElementsByClassName("merchHead")[0].onclick = function () {
            defaultHeadPrev();
            changesYbuymerchesBtn();
        };
        document.getElementsByClassName("merchBody")[0].onclick = function () {
            defaultBodyPrev();
            changesYbuymerchesBtn();
        };
        document.getElementsByClassName("merchSail")[0].onclick = function () {
            defaultSailPrev();
            changesYbuymerchesBtn();
        };
    });

    document.getElementsByClassName("sYReverseBtn")[0].onclick = function () {
        defaultHeadPrev();
        defaultBodyPrev();
        defaultSailPrev();
        for (var i = 0; i < document.getElementsByClassName("currentPreview").length; i++) {
            document.getElementsByClassName("currentPreview")[i].classList.remove("currentPreview");
        }
        changesYbuymerchesBtn();

    };

};
previewMerchFunc();


// canvas drawline 4 merchCircle

function drawLine() {
    var canvas = document.getElementById('drawLineCanvas');
    var context = canvas.getContext('2d');

    context.strokeStyle = "#635950";

    context.lineWidth = 4;
    context.lineCap = "round";

    context.moveTo(170, 109);
    context.lineTo(450, 109);
    context.lineTo(590, 134);
    context.stroke();

    context.moveTo(170, 240.5);
    context.lineTo(400, 240.5);
    context.lineTo(480, 180);
    context.stroke();

    context.moveTo(170, 374);
    context.lineTo(380, 374);
    context.lineTo(430, 320);
    context.stroke();
}
window.addEventListener('load', drawLine);

function changeBuyButtonFunc() {
    var selectCount;

    document.getElementsByClassName("sYbuymerchesBtn")[0].onmouseover = function () {

        selectCount = document.getElementsByClassName("currentPreview").length;
        // console.log('選了 : ',selectCount);

        var amount = 0;
        var sumPrice = 0;

        for (var i = 0; i < selectCount; i++) {
            if (document.getElementsByClassName("currentPreview")[i].classList.contains("ownedMerch")) {
                amount++;
            } else {
                sumPrice += parseInt(document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYIntroPrice")[0].innerHTML);
            }
        }
        selectCount = selectCount - amount;

        // console.log('剩下 : ',selectCount);


        document.getElementsByClassName("buyAllinfo")[0].innerHTML = `購買總花費 : <strong style="color: rgb(206, 73, 50); font-size: 1rem;">${sumPrice}G</strong>`;

    }

    document.getElementsByClassName("sYbuymerchesBtn")[0].onmouseout = function () {
        document.getElementsByClassName("buyAllinfo")[0].innerHTML = ` # 購買預覽中造型`;
    }
};
changeBuyButtonFunc();



function buyMerchActivity() {

    var buyMerch = document.getElementsByClassName("sYBuyBtn");

    for (var i = 0; i < buyMerch.length; i++) {
        buyMerch[i].onclick = function () {

            var ModelId = this.parentNode.parentNode.parentNode.getElementsByClassName("sYMerchImg")[0].getElementsByTagName("img")[0].getAttribute("merchId");
            var wearing = 1;
            var tradeTime;
            tradeTime = new Date();
            tradeTime = tradeTime.getFullYear() + '-' +
                ('00' + (tradeTime.getMonth() + 1)).slice(-2) + '-' +
                ('00' + tradeTime.getDate()).slice(-2) + ' ' +
                ('00' + tradeTime.getHours()).slice(-2) + ':' +
                ('00' + tradeTime.getMinutes()).slice(-2) + ':' +
                ('00' + tradeTime.getSeconds()).slice(-2);
            var tradePrice = parseInt(this.parentNode.parentNode.getElementsByClassName("sYIntroPrice")[0].innerHTML);
            var wearHead = document.getElementById("sYHead").getAttribute("defaultId");
            var wearBody = document.getElementById("sYBody").getAttribute("defaultId");
            var wearSail = document.getElementById("sYSail").getAttribute("defaultId");

            var buyPart = this.parentNode.parentNode.parentNode.getElementsByClassName("sYMerchImg")[0].getElementsByTagName("img")[0];
            if (buyPart.className == 'sYMerchHeadImg') {
                wearHead = buyPart.getAttribute("merchId");
            } else if (buyPart.className == 'sYMerchBodyImg') {
                wearBody = buyPart.getAttribute("merchId");
            } else if (buyPart.className == 'sYMerchSailImg') {
                wearSail = buyPart.getAttribute("merchId");
            }
            // console.log(wearHead);
            // console.log(wearBody);
            // console.log(wearSail);
            // console.log(memId);
            // console.log(ModelId);
            // console.log(tradeTime);
            // console.log(wearing);
            // console.log(tradePrice);
            var buyCount = 0;

            var myMoney;

            if (memid !== "tourist") {

                $.ajax({
                    url: 'marketphp/getMoney.php',
                    data: {
                        memId: memid,
                    },
                    type: 'GET',
                    success: function (data) {
                        myMoney = data;
                    },
                    complete: function () {

                        if (tradePrice < myMoney) {
                            document.getElementsByClassName("sYBuyMerchLightBox")[0].style.display = "block";
                            createbtn(btnpri);
                            if (w > 768) {
                                createbtn(btnpri);
                            }
                            document.getElementsByClassName("leavebuy")[0].onclick = function () {
                                document.getElementsByClassName("sYBuyMerchLightBox")[0].style.display = "none";
                            }
                            document.getElementsByClassName("sYLWearBtn")[0].onclick = function () {
                                $.ajax({
                                    url: 'marketphp/buyMerch.php',
                                    data: {
                                        buyCount: buyCount,
                                        memId: memid,
                                        ModelId: ModelId,
                                        tradeTime: tradeTime,
                                        tradePrice: tradePrice,
                                        wearing: wearing,
                                        wearHead: wearHead,
                                        wearBody: wearBody,
                                        wearSail: wearSail,
                                    },
                                    type: 'GET',
                                    success: function () {
                                        $.ajax({
                                            url: 'marketphp/goToShipYard.php',
                                            data: {
                                                goToShipYard: 1,
                                            },
                                            type: 'GET',
                                            success: function () {
                                                console.log("寫入session");
                                            },
                                            error: function (e) {
                                                console.log("寫入session失敗");
                                            }
                                        });
                                    },
                                    error: function (e) {
                                        console.log('出錯囉???');
                                    },
                                    complete: function () {
                                        location.reload(true);
                                    }
                                });
                            }
                            document.getElementsByClassName("sYLStorBtn")[0].onclick = function () {
                                $.ajax({
                                    url: 'marketphp/buyMerch.php',
                                    data: {
                                        buyCount: buyCount,
                                        memId: memid,
                                        ModelId: ModelId,
                                        tradeTime: tradeTime,
                                        tradePrice: tradePrice,
                                        wearing: 0,
                                        wearHead: wearHead,
                                        wearBody: wearBody,
                                        wearSail: wearSail,
                                    },
                                    type: 'GET',
                                    success: function () {
                                        $.ajax({
                                            url: 'marketphp/goToShipYard.php',
                                            data: {
                                                goToShipYard: 1,
                                            },
                                            type: 'GET',
                                            success: function () {
                                                console.log("寫入session");
                                            },
                                            error: function (e) {
                                                console.log("寫入session失敗");
                                            }
                                        });
                                    },
                                    error: function (e) {
                                        console.log('出錯囉???');
                                    },
                                    complete: function () {
                                        location.reload(true);
                                    }
                                });
                            }
                            document.getElementsByClassName("leavebuy")[0].onclick = function () {
                                $.ajax({
                                    url: 'marketphp/buyMerch.php',
                                    data: {
                                        buyCount: buyCount,
                                        memId: memid,
                                        ModelId: ModelId,
                                        tradeTime: tradeTime,
                                        tradePrice: tradePrice,
                                        wearing: 0,
                                        wearHead: wearHead,
                                        wearBody: wearBody,
                                        wearSail: wearSail,
                                    },
                                    type: 'GET',
                                    success: function () {
                                        $.ajax({
                                            url: 'marketphp/goToShipYard.php',
                                            data: {
                                                goToShipYard: 1,
                                            },
                                            type: 'GET',
                                            success: function () {
                                                console.log("寫入session");
                                            },
                                            error: function (e) {
                                                console.log("寫入session失敗");
                                            }
                                        });
                                    },
                                    error: function (e) {
                                        console.log('出錯囉???');
                                    },
                                    complete: function () {
                                        location.reload(true);
                                    }
                                });
                            }

                            defaultPreview();
                        } else {
                            alert("拿錢來臭乞丐!!");
                        }

                    }
                });

            } else {
                alert("您尚未登入!!!");
                document.getElementsByClassName("lightbox")[0].style.display = "block";
                createbtn(btnpri);
            }
        }
    }

    document.getElementsByClassName("sYbuymerchesBtn")[0].onclick = function () {


        var selectCount;

        selectCount = document.getElementsByClassName("currentPreview").length;

        var amount = 0;

        for (var i = 0; i < selectCount; i++) {
            if (document.getElementsByClassName("currentPreview")[i].classList.contains("ownedMerch")) {
                amount++;
            }
        }
        selectCount = selectCount - amount;



        var buyCount = document.getElementsByClassName("currentPreview").length;
        var amount = 0;
        for (var i = 0; i < buyCount; i++) {
            if (document.getElementsByClassName("currentPreview")[i].classList.contains("ownedMerch")) {
                amount++;
            }
        }
        buyCount = selectCount - amount;

        if (buyCount == 0) {

            //沒有選擇商品就一鍵購買

        } else {

            var ModelIdFirst = 0;
            var tradePriceFirst = 0;
            var ModelIdSec = 0;
            var tradePriceSec = 0;
            var ModelIdThird = 0;
            var tradePriceThird = 0;

            for (var i = 0; i < document.getElementsByClassName("currentPreview").length; i++) {
                if (document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYMerchHeadImg")[0]) {
                    if (document.getElementsByClassName("currentPreview")[i].classList.contains("ownedMerch")) {
                    } else {
                        ModelIdFirst = document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYMerchHeadImg")[0].getAttribute("merchid");
                        tradePriceFirst = parseInt(document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYIntroPrice")[0].innerHTML);
                    }
                } else if (document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYMerchBodyImg")[0]) {
                    if (document.getElementsByClassName("currentPreview")[i].classList.contains("ownedMerch")) {
                    } else {
                        ModelIdSec = document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYMerchBodyImg")[0].getAttribute("merchid");
                        tradePriceSec = parseInt(document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYIntroPrice")[0].innerHTML);
                    }

                } else if (document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYMerchSailImg")[0]) {
                    if (document.getElementsByClassName("currentPreview")[i].classList.contains("ownedMerch")) {
                    } else {
                        ModelIdThird = document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYMerchSailImg")[0].getAttribute("merchid");
                        tradePriceThird = parseInt(document.getElementsByClassName("currentPreview")[i].getElementsByClassName("sYIntroPrice")[0].innerHTML);
                    }
                }
            }


            var tradeTime;
            tradeTime = new Date();
            tradeTime = tradeTime.getFullYear() + '-' +
                ('00' + (tradeTime.getMonth() + 1)).slice(-2) + '-' +
                ('00' + tradeTime.getDate()).slice(-2) + ' ' +
                ('00' + tradeTime.getHours()).slice(-2) + ':' +
                ('00' + tradeTime.getMinutes()).slice(-2) + ':' +
                ('00' + tradeTime.getSeconds()).slice(-2);

            var wearing = "1";

            if (ModelIdFirst == 0) {
                var wearHead = document.getElementById("sYHead").getAttribute("defaultId");
            } else {
                var wearHead = ModelIdFirst;
            }

            if (ModelIdSec == 0) {
                var wearBody = document.getElementById("sYBody").getAttribute("defaultId");
            } else {
                var wearBody = ModelIdSec;
            }

            if (ModelIdThird == 0) {
                var wearSail = document.getElementById("sYSail").getAttribute("defaultId");
            } else {
                var wearSail = ModelIdThird;
            }

            // console.log(
            //     "購買數 : ", buyCount, "\n",
            //     "使用者ID : ", memid, "\n",
            //     "造型ID : ", ModelIdFirst, "\n",
            //     "造型價格 : ", tradePriceFirst, "\n",
            //     "造型ID : ", ModelIdSec, "\n",
            //     "造型價格 : ", tradePriceSec, "\n",
            //     "造型ID : ", ModelIdThird, "\n",
            //     "造型價格 : ", tradePriceThird, "\n",

            //     "交易時間 : ", tradeTime, "\n",
            //     "是否直接著裝 : ", wearing, "\n",
            //     "更換預覽的頭Id : ", wearHead, "\n",
            //     "更換預覽的身Id : ", wearBody, "\n",
            //     "更換預覽的帆Id : ", wearSail,
            // );

            var myMoney;
            if (memid !== "tourist") {
                $.ajax({
                    url: 'marketphp/getMoney.php',
                    data: {
                        memId: memid,
                    },
                    type: 'GET',
                    success: function (data) {
                        myMoney = data;
                    },
                    complete: function () {

                        if ((tradePriceFirst + tradePriceSec + tradePriceThird) < myMoney) {
                            var myCustom;

                            document.getElementsByClassName("sYBuyMerchLightBox")[0].style.display = "block";
                            createbtn(btnpri);
                            if (w > 768) {
                                createbtn(btnpri);
                            }
                            document.getElementsByClassName("leavebuy")[0].onclick = function () {
                                document.getElementsByClassName("sYBuyMerchLightBox")[0].style.display = "none";
                            }
                            document.getElementsByClassName("sYLWearBtn")[0].onclick = function () {
                                $.ajax({
                                    url: 'marketphp/buyMerch.php',
                                    data: {
                                        buyCount: buyCount,
                                        memId: memid,
                                        ModelIdFirst: ModelIdFirst,
                                        tradePriceFirst: tradePriceFirst,
                                        ModelIdSec: ModelIdSec,
                                        tradePriceSec: tradePriceSec,
                                        ModelIdThird: ModelIdThird,
                                        tradePriceThird: tradePriceThird,

                                        tradeTime: tradeTime,
                                        wearing: wearing,
                                        wearHead: wearHead,
                                        wearBody: wearBody,
                                        wearSail: wearSail,
                                    },
                                    type: 'GET',
                                    success: function () {
                                        $.ajax({
                                            url: 'marketphp/goToShipYard.php',
                                            data: {
                                                goToShipYard: 1,
                                            },
                                            type: 'GET',
                                            success: function () {
                                                console.log("寫入session");
                                            },
                                            error: function (e) {
                                                console.log("寫入session失敗");
                                            }
                                        });
                                    },
                                    error: function (e) {
                                        console.log('出錯囉???');
                                    },
                                    complete: function () {
                                        location.reload(true);
                                    }
                                });
                            }
                            document.getElementsByClassName("sYLStorBtn")[0].onclick = function () {
                                $.ajax({
                                    url: 'marketphp/buyMerch.php',
                                    data: {
                                        buyCount: buyCount,
                                        memId: memid,
                                        ModelIdFirst: ModelIdFirst,
                                        tradePriceFirst: tradePriceFirst,
                                        ModelIdSec: ModelIdSec,
                                        tradePriceSec: tradePriceSec,
                                        ModelIdThird: ModelIdThird,
                                        tradePriceThird: tradePriceThird,

                                        tradeTime: tradeTime,
                                        wearing: 0,
                                        wearHead: wearHead,
                                        wearBody: wearBody,
                                        wearSail: wearSail,
                                    },
                                    type: 'GET',
                                    success: function () {
                                        $.ajax({
                                            url: 'marketphp/goToShipYard.php',
                                            data: {
                                                goToShipYard: 1,
                                            },
                                            type: 'GET',
                                            success: function () {

                                            },
                                            error: function (e) {

                                            }
                                        });
                                    },
                                    error: function (e) {

                                    },
                                    complete: function () {
                                        location.reload(true);
                                    }
                                });
                            }
                            document.getElementsByClassName("leavebuy")[0].onclick = function () {
                                $.ajax({
                                    url: 'marketphp/buyMerch.php',
                                    data: {
                                        buyCount: buyCount,
                                        memId: memid,
                                        ModelIdFirst: ModelIdFirst,
                                        tradePriceFirst: tradePriceFirst,
                                        ModelIdSec: ModelIdSec,
                                        tradePriceSec: tradePriceSec,
                                        ModelIdThird: ModelIdThird,
                                        tradePriceThird: tradePriceThird,

                                        tradeTime: tradeTime,
                                        wearing: wearing,
                                        wearHead: wearHead,
                                        wearBody: wearBody,
                                        wearSail: wearSail,
                                    },
                                    type: 'GET',
                                    success: function () {
                                        $.ajax({
                                            url: 'marketphp/goToShipYard.php',
                                            data: {
                                                goToShipYard: 1,
                                            },
                                            type: 'GET',
                                            success: function () {

                                            },
                                            error: function (e) {

                                            }
                                        });
                                    },
                                    error: function (e) {

                                    },
                                    complete: function () {
                                        location.reload(true);
                                    }
                                });
                            }
                        } else {
                            alert("沒錢還想白吃白喝R???");
                        }

                    },
                });
            } else {
                alert("您尚未登入!!!");
                document.getElementsByClassName("lightbox")[0].style.display = "block";
                createbtn(btnpri);
            }
        }

    }


};

buyMerchActivity();

document.getElementsByClassName("leave")[0].onclick = function () {
    document.getElementsByClassName("lightbox")[0].style.display = "none";
}

document.getElementById("signUp").onclick = function () {
    $.ajax({
        url: 'marketphp/goToShipYard.php',
        data: {
            goToShipYard: 1,
        },
        type: 'GET',
        success: function () {
            console.log("寫入session");
        },
        error: function (e) {
            console.log("寫入session失敗");
        }
    });
    location.reload(true);
}
document.getElementById("btnver").onclick = function () {
    $.ajax({
        url: 'marketphp/goToShipYard.php',
        data: {
            goToShipYard: 1,
        },
        type: 'GET',
        success: function () {
            console.log("寫入session");
        },
        error: function (e) {
            console.log("寫入session失敗");
        }
    });
    location.reload(true);
}

//////////////////////////////////////////////////////////////////////////////

if (w > 768) {
    var isOnDiv = false;
    $(".sYMTypeBox").mouseenter(function () { isOnDiv = true; });
    $(".sYMTypeBox").mouseleave(function () { isOnDiv = false; });

    $(".shipYard").bind('mousewheel', function (event) {
        if (event.originalEvent.wheelDelta >= 0) {

            if (isOnDiv == false) {
                window.scrollTo(0, 0);
                // document.getElementsByClassName("shipYardBanner")[0].style.opacity = "1";
            }

            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                // you're at the bottom of the page
            } else {
                // document.getElementsByClassName("shipYardBanner")[0].style.opacity = "1";
            }
        }
        else {
            window.scrollTo(0, document.body.scrollHeight);
            // document.getElementsByClassName("shipYardBanner")[0].style.opacity = "0";
        }
    });
}

console.log("goToShipYard", goToShipYard, "previewMerchId", previewMerchId, "previewMerchType", previewMerchType);

// if ( memid !== "tourist") {
//     document.getElementsByClassName("lightbox")[0].style.display = "none";
// }

if (w < 768) {
    setTimeout(function () {
        var ownedCountInphone = document.getElementsByClassName("ownedMerch");
        for (var i = 0; i < ownedCountInphone.length; i++) {
            ownedCountInphone[i].parentNode.parentNode.style.order = "-1";
            // alert(ownedCountInphone[i].parentNode.parentNode.style.order);
        }
    },2000);
    document.getElementsByClassName("sYMTypeBox")[0].onclick = function(){
        window.scrollTo(0, 200);
    };
}