<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>《大海賊帝國》說走就走！來場海上冒險吧！</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="css/wavebtn.css">
    <link rel="stylesheet" href="css/gameGps.css">
</head>
<body>
    <label for="burgerCtrl">
        <input type="checkbox" name="" id="burgerCtrl">
        <div id="burger">
            <div class="burgerLine"></div>
            <div class="burgerLine"></div>
        </div>
    </label>
    <header class="homeHeadHide">
        <h1 id="headerLogo"><a href="javascript:;">
            <img src="image/logo.svg" alt="大海賊帝國">
        </a></h1>
        <nav id="headerMenu" >
            <ul>
                <li><a href="game.html">海賊試煉場</a></li>
                <li><a href="market.html">海上市集</a></li>
                <li><a href="bar.html">情報酒館</a></li>
                <li><a href="me.html">俺の海賊船</a></li>
            </ul>
        </nav>
    </header>
    <div id="homeBanner">
        <p class="textEmphasis">
            如果我們的夢想可以引導你的方向，<br><strong class="textHiliR">那就去追尋吧！</strong><br>
        </p>
        <img id="homeBannerLogo" src="image/logo.svg" alt="大海賊帝國">
        <div id="pixiCanvas"></div>
        <div id="wrapShipArea">
            <div id="shipArea">
                <img src="image/ship/300.png" alt="挑選船身" id="partBody">
                <object data="image/ship/200.svg" type="image/svg+xml" id="partSail"></object>
                <img src="image/ship/100.png" alt="挑選船頭" id="partHead">
                <canvas id="combineShip">
                    你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我....好吧，請你<strong>下載並使用<a href="https://www.google.com/intl/zh-TW_ALL/chrome/">google chrome</a></strong>開啟這個網頁吧
                </canvas>
                <canvas id="drawFlag">
                    你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我....好吧，請你<strong>下載並使用<a href="https://www.google.com/intl/zh-TW_ALL/chrome/">google chrome</a></strong>開啟這個網頁吧(ㄏ￣▽￣)ㄏ   ㄟ(￣▽￣ㄟ)
                </canvas>
                <div id="pen"></div>
            </div>
            <button class="btnsec">成為海賊</button>
        </div>
    </div>
    <div id="homeDIY">
        <p class="textEmphasis">四個步驟打造<strong class="textHiliR">專屬海賊船</strong></p>
        <div id="DIYPanel">
            <ol id="DIYStatus">
                <li class="current fin"><p class="textS">挑選船型</p>
                </li>
                <div class="DIYStatBar">
                    <div class="DIYStatLine"></div>
                </div>
                <li class="current"><p class="textS">創作海賊旗</p></li>
                <div class="DIYStatBar">
                    <div class="DIYStatLine"></div>
                </div>
                <li><p class="textS">預覽完稿</p></li>
            </ol>
            <div id="DIYSlides">
                <div id="DIYShip" class="DIYSlide">
                    <div id="DIYBodys" >
                        <p class="textS">選擇船身</p>
                        <img src="image/ship/300.png" alt="船身1" class="DIYbody" id="DIYbody1">
                        <img src="image/ship/301.png" alt="船身2" class="DIYbody" id="DIYbody2">
                        <img src="image/ship/302.png" alt="船身3" class="DIYbody" id="DIYbody3">
                    </div>
                    <div id="DIYHeads" >
                        <p class="textS">選擇船頭</p>
                        <img src="image/ship/100.png" alt="船頭1" class="DIYHead" id="DIYHead1">
                        <img src="image/ship/101.png" alt="船頭2" class="DIYHead" id="DIYHead2">
                        <img src="image/ship/102.png" alt="船頭3" class="DIYHead" id="DIYHead3">
                    </div>
                    <div id="DIYSails">
                        <p class="textS">選擇船帆</p>
                        <img src="image/ship/200.svg" alt="船桅1" class="DIYSail" id="DIYSail1">
                        <img src="image/ship/201.svg" alt="船桅2" class="DIYSail" id="DIYSail2">
                        <img src="image/ship/202.svg" alt="船桅3" class="DIYSail" id="DIYSail3">
                    </div>
                </div>
                <div id="DYIFlag" class="DIYSlide">
                    <p class="textS">請直接在船帆<span class="textHiliR">紅色虛線</span>作畫，<br>
                        <span class="textHiliR">紅色虛線</span>區域為海賊旗繪製區<br>
                        下方工具列可調整畫筆及顏色</p>
                    <span id="penColor"></span>
                    <span class="penWidth" LW="5"></span>
                    <span class="penWidth" LW="10"></span>
                    <span class="penWidth" LW="15"></span>
                    <span class="penWidth" LW="20"></span>
                    <i class='fas fa-eraser' id="eraser"></i>
                    <i class='fas fa-trash-alt' id="cleanDraw"></i>
                    <div id="color-picker-container"></div><br>
                </div>
                <div id="DIYPreview" class="DIYSlide">
                    <p class="textS">已裁切船帆</p>
                <!-- <canvas id="shipPreview"></canvas> -->

                </div>
                <div class="clearfix"></div>
            </div>
            <button class="btnsec" id="DIYPrev" >上一步</button>
            <button class="btnsec" id="DIYNext">下一步</button>
            <button class="btnpri" id="finishDIY" >完成製作</button>
        </div>
    </div>
    <div id="homeGame">
        <h2><a href="javascript:;" class="textHiliB">海賊試煉場</a></h2>
        <p class="textEmphasis">駕駛海賊船，挑戰<strong class="textHiliR">海賊試煉遊戲</strong>
        </p>
        <div id="homeGamePlay" class="scaleBorder">
            <!-- 使否先放張圖片？ -->
            <p class="textM" id="homeGameMsg">
                航行指南：<br>
                按下<span class="textHiliB">START!</span> 、移動滑鼠避開礁石、航向目標吧！<br>
                <br>
                ※為您推薦<span class="textHiliR">初階試煉</span>，通關即可獲得<span class="textHiliR">金幣300G</span>！
            </p>    
        </div>
        <div id="homeGameRank">
            <p >
                <span class="textEmphasis">遊戲高分榜：<strong class="textHiliR">懸賞排行</strong>等你挑戰！</span><br>
                <span class="textS">
                    還沒有海賊船嗎?立即
                    <a href="javascript:;">成為海賊</a>
                </span>
            </p>
            <div class="homeWanteds">
                <div class="wrapWanted">
                    <div class="wanted">
                        <img class="wantedPaper" src="image/home/wanted.svg" alt="懸賞單低階第一">
                        <p class="wantName">我是大帥哥</p>
                        <p class="wantScore">高階試煉34.38秒</p>
                        <img class="wantedShip" src="image/ship/ship.png" alt="我是大帥哥的海賊船">
                    </div>
                </div>
            <div class="wrapWanted">
                <div class="wanted">
                    <img class="wantedPaper" src="image/home/wanted.svg" alt="懸賞單中階第一">
                    <p class="wantName">我是大帥哥</p>
                    <p class="wantScore">中階試煉34.38秒</p>
                    <img class="wantedShip" src="image/ship/ship.png" alt="我是大帥哥的海賊船">
                </div>
            </div>
            <div class="wrapWanted">
                <div class="wanted">
                    <img class="wantedPaper" src="image/home/wanted.svg" alt="懸賞單高階第一">
                    <p class="wantName">我是大帥哥</p>
                    <p class="wantScore">初階試煉34.38秒</p>
                    <img class="wantedShip" src="image/ship/ship.png" alt="我是大帥哥的海賊船">
                </div>
            </div>
        </div>
    </div>
    <div id="homeGameGPS">
        <p class="textEmphasis"> <span class="smaller">「我把所有的財寶都放在那裡了！」</span><br>
            置身偉大航道，在<strong class="textHiliR">真實世界啟航尋寶</strong>
        </p>
        <div id="gameGpsMap"></div>
        <div id="gameGpsLotto">
            <table>
                <tr>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_0"></td>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_1"></td>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_2"></td>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_3"></td>
                </tr>
                <tr>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_11"></td>
                    <td colspan="2" rowspan="2" id="gameGpsLottoShow">
                    </td>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_4"></td>
                </tr>
                <tr>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_10"></td>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_5"></td>
                </tr>
                <tr>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_9"></td>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_8"></td>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_7"></td>
                    <td class="gameGpsLottoUnit" id="gameGpsLottoUnit_6"></td>
                </tr>
            </table>   
        </div>
    </div>
    <div id="homeGameTrea">
        <img src="image/gpsGame/treaBoxOpen.svg" alt="藏寶箱">
        <div class="homeTreaImg">
            <img src="image/treasure/trea4.svg" alt="寶物">
        </div>
        <div class="homeTreaImg">
            <img src="image/treasure/trea5.svg" alt="寶物">
        </div>
        <div class="homeTreaImg">
            <img src="image/treasure/trea6.svg" alt="寶物">
        </div>
    </div>
    <div class="clearfix"></div>
    <div id="homeMarket">
        <h2><a href="javascript:;">海上市集</a></h2>
        <p class="textEmphasis">甚麼都買、甚麼都賣、甚麼都不奇怪</p>
        <div id="homeMarketProds">
            <div id="homeMarketBlack">
                <p class="textL">黑市</p>
                <p class="textM">尋寶沒有合適的寶物？<br>
                    也許其他海賊有在賣呢...</p>
            </div>
            <div id="homeMarketShip">
                <p class="textL">造船廠</p>
                <p class="textM">不定期推出海賊船造型</p>
            </div>
            <ul>
                <li class="homeTreaBtn"><img src="image/treasure/trea1.svg" alt="寶物1"></li>
                <li class="homeTreaBtn"><img src="image/treasure/trea2.svg" alt="寶物2"></li>
                <li class="homeTreaBtn"><img src="image/treasure/trea3.svg" alt="寶物3"></li>
                <li class="homeTreaBtn"><img src="image/treasure/trea4.svg" alt="寶物4"></li>
                <li class="homeTreaBtn"><img src="image/treasure/trea5.svg" alt="寶物5"></li>
            </ul>
            <div id="homeMarketProdInfo">
                <div class="homeWrapProd">
                    <img class="homeProdImg homeProdAct" src="image/treasure/trea6.svg" alt="寶物6">
                    <div class="homeProdInfoCard">
                        <p class="homeProdName textM homeProdAct">八加九大刀</p>
                        <p class="homeProdPrice textM homeProdAct">
                            價格：<strong class="textHiliR">890G</strong>
                            <p class="btnpri homeProdAct">直接購買</p>
                        </p>
                        <p class="homeProdSaler textS homeProdAct">賣家：景成</p>
                        <p class="homeProdTalent textS homeProdAct">天賦分布：<br>
                            <img src="image/ship/radar.png" alt="天賦圖">
                        </p>
                    </div>
                </div>
                <div class="homeWrapProd">
                    <img class="homeProdImg" src="image/treasure/trea7.svg" alt="寶物7">
                    <div class="homeProdInfoCard">
                        <p class="homeProdName textM">八加十大刀</p>
                        <p class="homeProdPrice textM">
                            價格：<strong class="textHiliR">810G</strong>
                            <p class="btnpri">直接購買</p>
                        </p>
                        <p class="homeProdSaler textS">賣家：景成</p>
                        <p class="homeProdTalent textS">天賦分布：<br>
                            <img src="image/ship/radar.png" alt="天賦圖">
                        </p>
                    </div>
                </div>
                <div class="homeWrapProd">
                    <img class="homeProdImg" src="image/treasure/trea1.svg" alt="寶物1">
                    <div class="homeProdInfoCard">
                        <p class="homeProdName textM">八加十一大刀</p>
                        <p class="homeProdPrice textM">
                            價格：<strong class="textHiliR">811G</strong>
                            <p class="btnpri">直接購買</p>
                        </p>
                        <p class="homeProdSaler textS">賣家：景成</p>
                        <p class="homeProdTalent textS">天賦分布：<br>
                            <img src="image/ship/radar.png" alt="天賦圖">
                        </p>
                    </div>
                </div>
                <div class="homeWrapProd">
                    <img class="homeProdImg" src="image/treasure/trea4.svg" alt="寶物4">
                    <div class="homeProdInfoCard">
                        <p class="homeProdName textM">八加十二大刀</p>
                        <p class="homeProdPrice textM">
                            價格：<strong class="textHiliR">812G</strong>
                            <p class="btnpri">直接購買</p>
                        </p>
                        <p class="homeProdSaler textS">賣家：景成</p>
                        <p class="homeProdTalent textS">天賦分布：<br>
                            <img src="image/ship/radar.png" alt="天賦圖">
                        </p>
                    </div>
                </div>
                <div class="homeWrapProd">
                    <img class="homeProdImg" src="image/treasure/trea3.svg" alt="寶物3">
                    <div class="homeProdInfoCard">
                        <p class="homeProdName textM">八加十三大刀</p>
                        <p class="homeProdPrice textM">
                            價格：<strong class="textHiliR">813G</strong>
                            <p class="btnpri">直接購買</p>
                        </p>
                        <p class="homeProdSaler textS">賣家：景成</p>
                        <p class="homeProdTalent textS">天賦分布：<br>
                            <img src="image/ship/radar.png" alt="天賦圖">
                        </p>
                    </div>
                </div>
                <i id="homeProdNext" class='fas fa-arrow-circle-right'></i>
                <i id="homeProdPrev" class='fas fa-arrow-circle-left'></i>
            </div>
            <ul>
                <li class="homeTreaBtn"><img src="image/treasure/trea7.svg" alt="寶物7"></li>
                <li class="homeTreaBtn"><img src="image/treasure/trea2.svg" alt="寶物2"></li>
                <li class="homeTreaBtn"><img src="image/treasure/trea2.svg" alt="寶物2"></li>
                <li class="homeTreaBtn"><img src="image/treasure/trea2.svg" alt="寶物2"></li>
                <li class="homeTreaBtn"><img src="image/treasure/trea2.svg" alt="寶物2"></li>
            </ul>
        </div>
        <p class="textS">來去<a href="market.html">海上市集</a>逛逛更多寶物！</p>
        <!-- <div id="homeMarketShipRank">
            <p class="textEmphasis"></p>
        </div> -->
    </div>
    <div id="homeBar">
        <h2><a href="javascript:;">情報酒館</a></h2>
        <p class="textEmphasis">眾所皆知的<span class="textHiliR">熱門八卦</span>你不能不知道</p>
        <div id="homeBarHot">
            <article class="homeHotCard">
                <p>
                    <img src="image/home/hot1.png" alt="【競技】如何打贏大媽">
                    <span class="textL">【尋寶】聽說大祕寶在綠島石朗!?</span><br>
                    <span class="textM">
                        官方釋出消息，最新限定活動以潛水為主題，需潛入海中才能獲得...閱讀更多
                    </span>
                </p>
                <p class="textS">
                    <i class='fas fa-eye'></i>
                    717
                    <i class='fas fa-comment-dots'></i>
                    7214
                </p>
                <div class="clearfix"></div>
            </article>
            <article class="homeHotCard">
                <p>
                    <img src="image/home/hot2.png" alt="【競技】如何打贏大媽">
                    <span class="textL">【競技】如何打贏大媽</span><br>
                    <span class="textM">
                        這次活動角竟然是酒吞，讚嘆營運 為了不讓縮圖停在怪怪的地方先上個預覽圖，請見諒ˊˋ 以下是全...繼...閱讀更多
                    </span>
                </p>
                <p class="textS">
                    <i class='fas fa-eye'></i>
                    824
                    <i class='fas fa-comment-dots'></i>
                    412
                </p>
                <div class="clearfix"></div>
            </article>
            <article class="homeHotCard">
                <p>
                    <img src="image/home/hot1.png" alt="【競技】如何打贏大媽">
                    <span class="textL">【尋寶】聽說大祕寶在綠島石朗!?</span><br>
                    <span class="textM">
                        官方釋出消息，最新限定活動以潛水為主題，需潛入海中才能獲得...閱讀更多
                    </span>
                </p>
                <p class="textS">
                    <i class='fas fa-eye'></i>
                    717
                    <i class='fas fa-comment-dots'></i>
                    7214
                </p>
                <div class="clearfix"></div>
            </article>
            <article class="homeHotCard">
                <p>
                    <img src="image/home/hot2.png" alt="【競技】如何打贏大媽">
                    <span class="textL">【競技】如何打贏大媽</span><br>
                    <span class="textM">
                        這次活動角竟然是酒吞，讚嘆營運 為了不讓縮圖停在怪怪的地方先上個預覽圖，請見諒ˊˋ 以下是全...繼...閱讀更多
                    </span>
                </p>
                <p class="textS">
                    <i class='fas fa-eye'></i>
                    824
                    <i class='fas fa-comment-dots'></i>
                    412
                </p>
                <div class="clearfix"></div>
            </article>
        </div>
        <p class="textEmphasis">Follow<strong class="textHiliR">最新消息</strong>走在時代尖端</p>
        <div id="homeBarNew">
            <article class="homeNewsCard">
                <p class="textM cardCat">綜合討論</p>
                <p class="textL cardTitle">【尋寶】2019新地圖
                    <span>尋寶</span>
                </p>
                <p class="textS cardIcon">
                    <i class='fas fa-eye'></i>
                    82
                    <i class='fas fa-comment-dots'></i>
                    412
                </p>
                <p class="textS cardTime">
                    2019/10/10
                    景成
                </p>
                <div class="clearfix"></div>
            </article>
            <article class="homeNewsCard">
                <p class="textM cardCat">綜合討論</p>
                <p class="textL cardTitle">【尋寶】2019新地圖
                    <span>尋寶</span>
                </p>
                <p class="textS cardIcon">
                    <i class='fas fa-eye'></i>
                    82
                    <i class='fas fa-comment-dots'></i>
                    42
                </p>
                <p class="textS cardTime">
                    2019/10/10
                    景成
                </p>
                <div class="clearfix"></div>
            </article>
            <article class="homeNewsCard">
                <p class="textM cardCat">綜合討論</p>
                <p class="textL cardTitle">【尋寶】2019新地圖
                    <span>尋寶</span>
                </p>
                <p class="textS cardIcon">
                    <i class='fas fa-eye'></i>
                    84
                    <i class='fas fa-comment-dots'></i>
                    14
                </p>
                <p class="textS cardTime">
                    2019/10/10
                    景成
                </p>
                <div class="clearfix"></div>
            </article>
            <article class="homeNewsCard">
                <p class="textM cardCat">綜合討論</p>
                <p class="textL cardTitle">【尋寶】2019新地圖
                    <span>尋寶</span>
                </p>
                <p class="textS cardIcon">
                    <i class='fas fa-eye'></i>
                    8
                    <i class='fas fa-comment-dots'></i>
                    0
                </p>
                <p class="textS cardTime">
                    2019/10/10
                    景成
                </p>
                <div class="clearfix"></div>
            </article>
        </div>
        <p class="textS homeMore">噓...你不知道的江湖謠言，聽聽
            <a href="javascript:;">情報酒館</a>
            的大家怎麼說...
        </p>
    </div>
    <div id="homeEnd">
        <p class="textEmphasis">說走就走<br>
            <strong class="textHiliR">來場海上冒險吧！</strong>
        </p>
        <p class="textM">
            加入大海賊帝國，立即<br>
            <a href="javascript:;">成為海賊</a>
        </p>
    </div>

    <footer>
        <img src="image/logo.svg" alt="logo">
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/iro.min.js"></script>
    <script src="js\TweenMax.min.js"></script>
    <script src="js\ScrollMagic.min.js"></script>
    <script src="js\debug.addIndicators.min.js"></script>
    <script src="js\animation.gsap.min.js"></script>
    <script src="js\pixi.min.js"></script>
<script src="js/header.js"></script>
    <script src="js/gameGps.js"></script>
    <script src="js/wavebtn.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBKB16XDqQ6Qnki2BdJUQXXP4hEpK0_2wo&callback=initMap"></script>
    <script src="js/iro.min.js"></script>
    <script src="js/shipDIY.js"></script>
    <script src="js/home.js"></script>
    </body>
</html>