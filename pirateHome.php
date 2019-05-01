<?php
session_start();
$errMsg ='' ;
try {
    require_once('backstage\php\connectPirates.php');

    //取得客製的船體們，用在客製的panel
    $sql = "select * from customlist where forCust = 1 ";
    $staCust = $pdo->query($sql);
    $rowCust = $staCust->fetchAll(PDO::FETCH_ASSOC);
    foreach($rowCust as $i => $data){
        switch($data['modelPart']){
            case "1":
                $DIYheads[] = $data['modelImg'];
                break;
            case "2":
                $DIYbodys[] = $data['modelImg'];
                break;
            case "3":
                $DIYSails[] = $data['modelImg'];
                break;
        }
    }

    //取得懸賞排行
    $sql = "SELECT memNic, highscoreL, shipImgAll FROM `member` where highscoreL is NOT null order by highscoreL ASC LIMIT 1;";
    $staGameHiL = $pdo -> query($sql);
    $sql = "SELECT memNic, highscoreM, shipImgAll FROM `member` where highscoreM is NOT null order by highscoreM ASC LIMIT 1;";
    $staGameHiM = $pdo -> query($sql);
    $sql = "SELECT memNic, highscoreH, shipImgAll FROM `member` where highscoreH is NOT null order by highscoreH ASC LIMIT 1;";
    $staGameHiH = $pdo -> query($sql);

    $rowGameHiL = $staGameHiL->fetch(PDO::FETCH_ASSOC);
    $rowGameHiM = $staGameHiM->fetch(PDO::FETCH_ASSOC);
    $rowGameHiH = $staGameHiH->fetch(PDO::FETCH_ASSOC);

    //如果沒有最高分
   if(!isset($rowGameHiL))$rowGameHiL = array('memNic'=>'從缺','highscoreL'=>'--');
   if(!isset($rowGameHiM))$rowGameHiM = array('memNic'=>'從缺','highscoreM'=>'--');
   if(!isset($rowGameHiH))$rowGameHiH = array('memNic'=>'從缺','highscoreH'=>'--');

    //取得最新寶物(篩選條件1.無購買人2.三天內)
    if(isset($_SESSION['memId'])){ //如果是登入中，就不顯示他的商品
        $sql = "
        select *
        from traderecord r 
        join treasurelist l on r.treaId = l.treaId 
        join member m on r.salerId = m.memId
        where r.buyerId is null and datediff(CURDATE() , r.saleTime) <= 3 and salerId != '{$_SESSION['memId']}'
        order by saleTime desc limit 9
        ;";
    }else{
        $sql = "
        select *
        from traderecord r 
        join treasurelist l on r.treaId = l.treaId 
        join member m on r.salerId = m.memId
        where r.buyerId is null and datediff(CURDATE() , r.saleTime) <= 3
        order by saleTime desc limit 9
        ;";
    }
    $staProds = $pdo -> query($sql);
    $rowsProds = $staProds->fetchAll(PDO::FETCH_ASSOC);
    //送商品列表資料給js
   ?>
   <script>var homeProdArr = <?php echo json_encode($rowsProds) ?>;</script>
   <?php

    //酒館熱門消息
    $sqlHotIssue = "select * from articlelist join member on(articlelist.memId = member.memId) order by clickAmt desc limit 4";
    $hotIssue = $pdo->prepare( $sqlHotIssue );
    $hotIssue->execute();

    //酒館最新消息
    $sqlNews = "select * from articlelist join member on(articlelist.memId = member.memId) order by artTime desc limit 4";
    $news = $pdo->prepare( $sqlNews );
    $news->execute();

} catch (PDOException $e) {
    $errMsg .= "錯誤行：".$e->getLine()."<br>";
    $errMsg .= "錯誤原因：".$e->getMessage()."<br>";
    echo $errMsg;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>《大海賊帝國》說走就走！來場海上冒險吧！</title>
    
    
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/wavebtn.css">
    <link rel="stylesheet" href="css/gameGps.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <?php require_once('header.php') ?>
    <div id="homeBanner">
        <p class="textEmphasis">
            如果我們的夢想可以引導你的方向，<br><strong class="textHiliR">那就去追尋吧！</strong><br>
        </p>
        <img id="homeBannerLogo" src="image/logo.svg" alt="大海賊帝國">
        <div id="homepixiCanvas"></div>
        <div id="wrapShipArea">
            <div id="bannerShip">
                <img src="image/ship/300.png" alt="船身">
                <img src="image/ship/200.png.svg" alt="船帆">
                <img src="image/ship/100.png" alt="船頭">
            </div>
            <button class="btnsec scrToDIY"><span>成為海賊</span></button>
        </div>
    </div>
    <div id="homeDIY">
        <p class="textEmphasis">四個步驟打造<strong class="textHiliR">專屬海賊船</strong></p>
        <div id="shipArea">
            <img src="image/ship/<?php echo $DIYbodys[count($DIYbodys)-1] ?>" alt="挑選船身" id="partBody">
            <object data="image/ship/<?php echo $DIYSails[count($DIYSails)-1] ?>.svg" type="image/svg+xml" id="partSail"></object>
            <img src="image/ship/<?php echo $DIYheads[count($DIYheads)-1] ?>" alt="挑選船頭" id="partHead">
            <canvas id="combineShip">
                你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我....好吧，請你<strong>下載並使用<a href="https://www.google.com/intl/zh-TW_ALL/chrome/">google chrome</a></strong>開啟這個網頁吧
            </canvas>
            <canvas id="drawFlag">
                你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我....好吧，請你<strong>下載並使用<a href="https://www.google.com/intl/zh-TW_ALL/chrome/">google chrome</a></strong>開啟這個網頁吧(ㄏ￣▽￣)ㄏ   ㄟ(￣▽￣ㄟ)
            </canvas>
            <div id="pen"></div>
        </div>
        <div id="DIYPanel">
            <ol id="DIYStatus">
                <li class="DIYStatusDot current"><p class="textS">挑選船型</p>
                </li>
                <div class="DIYStatBar">
                    <div class="DIYStatLine"></div>
                </div>
                <li class="DIYStatusDot"><p class="textS">創作海賊旗</p></li>
                <div class="DIYStatBar">
                    <div class="DIYStatLine"></div>
                </div>
                <li class="DIYStatusDot"><p class="textS">預覽完稿</p></li>
            </ol>
            <div id="DIYSlides">
                <div id="DIYShip" class="DIYSlide">
                    <div id="DIYBodys" >
                        <p class="textS">選擇船身</p>
                        <?php
                        foreach ($DIYbodys as $key => $value) {
                        ?>
                        <label>
                            <input type="radio" name="DIYbody" id="" checked>
                            <img src="image/ship/<?php echo $value ?>" alt="船身<?php echo $key ?>" class="DIYbody" id="DIYbody<?php echo $key ?>">
                        </label>
                        <?php
                        }
                        ?>
                    </div>
                    <div id="DIYHeads" >
                        <p class="textS">選擇船頭</p>
                        <?php
                        foreach ($DIYheads as $key => $value) {
                        ?>
                        <label>
                            <input type="radio" name="DIYhead" id="" checked>
                            <img src="image/ship/<?php echo $value ?>" alt="船頭<?php echo $key ?>" class="DIYhead" id="DIYhead<?php echo $key ?>">
                        </label>
                        <?php
                        }
                        ?>
                    </div>
                    <div id="DIYSails">
                        <p class="textS">選擇船帆</p>
                        <?php
                        foreach ($DIYSails as $key => $value) {
                        ?>
                        <label>
                            <input type="radio" name="DIYSail" id="" checked>
                            <img src="image/ship/<?php echo $value ?>.svg" alt="船頭<?php echo $key ?>" class="DIYSail" id="DIYSail<?php echo $key ?>">
                        </label>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div id="DYIFlag" class="DIYSlide">
                    <p class="textS">請直接在船帆<span class="textHiliR">紅色虛線</span>作畫，<br>
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
                    <img src="" alt="預覽海賊船" id="shipPreview">
                    <button class="btnpri invisible loginHere" id="finishDIY" ><span>完成製作</span></button>
                    
                </div>
                <div class="clearfix"></div>
            </div>
            <button class="btnsec invisible" id="DIYPrev" ><span>上一步</span></button>
            
            <button class="btnsec" id="DIYNext"><span>下一步</span></button>
        </div>
    </div>
    <div id="homeGame">
        <h2><a href="play.html" class="textHiliB">海賊試煉場</a></h2>
        <p class="textEmphasis">駕駛海賊船，挑戰<strong class="textHiliR">海賊試煉遊戲</strong>
        </p>
        <div id="homeGamePlay" class="scaleBorder">
            <video autoplay=autoplay>
            <source src="image\play\video.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
            </video>
            <div class="homeGamePlayBtn">
                <a href="play.php#game">
                <div class="button_border">
                    <div class="border_in">
                    </div>
                    <div class="border_out">
                        <svg viewBox="0 0 88 88">
                            <path class="border" d="M39.2,86C19.7,83.8,4.2,68.3,2,48.8"></path>
                            <path class="border" d="M86,48.8c-2.2,19.5-17.7,35-37.2,37.2"></path>
                            <path class="border" d="M48.8,2c19.5,2.2,35,17.7,37.2,37.2"></path>
                            <path class="border" d="M2,39.2C4.2,19.7,19.7,4.2,39.2,2"></path>
                        </svg>
                    </div>
                </div>
                </a>
            </div>
            <p class="textM" id="homeGameMsg">
                航行指南：<br>
                按下<span class="textHiliB">START!</span> 、移動滑鼠避開礁石、航向目標吧！<br>
                <br>
                ※為您推薦<span class="textHiliR">初階試煉</span>，通關即可獲得<span class="textHiliR">金幣300G</span>！
            </p>    
        </div>
        <div id="homeGameRank">
            <p >
                <span class="textEmphasis">遊戲高分<strong class="textHiliR">懸賞排行</strong>等你挑戰！</span><br>
                <span class="textS">
                    還沒有海賊船嗎?立即
                    <a class="scrToDIY" href="javascript:;">成為海賊</a>
                </span>
            </p>
            <div class="homeWanteds">
                <div class="wrapWanted">
                    <div class="wanted">
                        <img class="wantedPaper" src="image/home/wanted.svg" alt="懸賞單低階第一">
                        <p class="wantName"><?php echo $rowGameHiL['memNic']; ?></p>
                        <p class="wantScore">高階試煉 <?php echo $rowGameHiL['highscoreL'];  ?>秒</p>
                        <img class="wantedShip" src="image/ship/<?php echo $rowGameHiL['shipImgAll'];  ?>" alt="<?php echo $rowGameHiL['memNic']; ?>的海賊船">
                    </div>
                </div>
                <div class="wrapWanted">
                    <div class="wanted">
                        <img class="wantedPaper" src="image/home/wanted.svg" alt="懸賞單中階第一">
                        <p class="wantName"><?php echo $rowGameHiM['memNic']; ?></p>
                        <p class="wantScore">中階試煉 <?php echo $rowGameHiM['highscoreM'];  ?>秒</p>
                        <img class="wantedShip" src="image/ship/<?php echo $rowGameHiM['shipImgAll'];  ?>" alt="<?php echo $rowGameHiM['memNic']; ?>的海賊船">
                    </div>
                </div>
                <div class="wrapWanted">
                    <div class="wanted">
                        <img class="wantedPaper" src="image/home/wanted.svg" alt="懸賞單初階第一">
                        <p class="wantName"><?php echo $rowGameHiH['memNic']; ?></p>
                        <p class="wantScore">初階試煉 <?php echo $rowGameHiH['highscoreH'];  ?>秒</p>
                        <img class="wantedShip" src="image/ship/<?php echo $rowGameHiH['shipImgAll'];  ?>" alt="<?php echo $rowGameHiH['memNic']; ?>的海賊船">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="homeGameGPS">
        <p class="textEmphasis"> <span class="smaller">「我把所有的財寶都放在那裡了！」</span><br>
            置身偉大航道，在<strong class="textHiliR">真實世界啟航尋寶</strong>
        </p>
        <div id="gpsWrap">
            <div id="gpsMap"><img src="image\play\mapL.png" alt="GPS啟航尋寶"></div>
            <img src="image/gpsGame/cloudLeft.png" alt="雲" id="gpsCloudLeft"> 
            <img src="image/gpsGame/cloudRight.png" alt="雲" id="gpsCloudRight">
            <div class="homeGamePlayBtn">
                <a href="play.php#gpsWrap">
                <div class="button_border">
                    <div class="border_in">
                    </div>
                    <div class="border_out">
                        <svg viewBox="0 0 88 88">
                            <path class="border" d="M39.2,86C19.7,83.8,4.2,68.3,2,48.8"></path>
                            <path class="border" d="M86,48.8c-2.2,19.5-17.7,35-37.2,37.2"></path>
                            <path class="border" d="M48.8,2c19.5,2.2,35,17.7,37.2,37.2"></path>
                            <path class="border" d="M2,39.2C4.2,19.7,19.7,4.2,39.2,2"></path>
                        </svg>
                    </div>
                </div>
                </a>
            </div>
        </div>

    </div>
    <div id="homeGameTrea">
        <img src="image/gpsGame/treaBoxOpen.svg" alt="藏寶箱">
        <div class="homeTreaImg">
            <img src="image/treasure/001.png" alt="寶物">
        </div>
        <div class="homeTreaImg">
            <img src="image/treasure/010.png" alt="寶物">
        </div>
        <div class="homeTreaImg">
            <img src="image/treasure/013.png" alt="寶物">
        </div>
    </div>
    <div class="clearfix"></div>

    <div id="homeMarket">
        <h2><a href="market.html">海上市集</a></h2>
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

            <div id="homeMarketProdInfo">
                <div id="homeWrapProd" class="homeWrapProd active">
                    <img id="homeProdImg" class="homeProdImg" src="image/treasure/006.png" alt="寶物6">
                    <div class="homeProdInfoCard">
                        <p id="homeProdName" class="homeProdName textM"></p>
                        <p class="homeProdPrice textM">
                            價格：<strong id="homeProdPrice" class="textHiliR"></strong> G
                            <a href="javascript:;" class="btnpri" id="homeProdBuy" tradeId=""><span>直接購買</span></a>
                        </p>
                        <p class="homeProdSaler textS">賣家：<span id="homeProdSaler"></span></p>
                        <p class="homeProdTalent textS">寶物天賦：<br>
                            力量：<span id="homeProdStr"></span><br>
                            智力：<span id="homeProdInt"></span><br>
                            幸運：<span id="homeProdLuc"></span><br>
                            敏捷：<span id="homeProdAgi"></span>
                            <div id="homeProdTalentImg">
                                <!-- <canvas id="homeTalentRadar"></canvas> -->
                            </div>
                        </p>
                    </div>
                </div>
                <i id="homeProdPrev" class='fas fa-arrow-circle-left '></i>
                <i id="homeProdNext" class='fas fa-arrow-circle-right'></i>
            </div>
            <ul>
                <?php
                foreach ($rowsProds as $key => $row) {
                ?>
                    <li class="homeTreaBtn">
                        <p class="TreaBtnName textS"><?php echo $row['treaName'] ?></p>
                        <img src="image/treasure/<?php echo $row['treaImg'] ?>" alt="寶物<?php echo $row['treaName'] ?>" tradeId="<?php echo $row['tradeId'] ?>" >
                    </li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <p class="textS">來去<a href="market.html">海上市集</a>逛逛更多寶物！</p>
        <!-- <div id="homeMarketShipRank">
            <p class="textEmphasis"></p>
        </div> -->
    </div>
    <div id="homeBar">
        <h2><a href="bar.html">情報酒館</a></h2>
        <p class="textEmphasis">眾所皆知的<span class="textHiliR">熱門八卦</span>你不能不知道</p>
        <div id="hotIssue">
            <?php 
            while($hotIssueRow = $hotIssue ->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="hotIssueBox">
                <a href="bar.php?from=index&artId=<?php echo $hotIssueRow["artId"];?>" class="hotIssueBoxLink artShow">
                    <div class="hotIssueBoxInfo">
                        <img src="image/bar/DB/<?php echo $hotIssueRow["artImg"];?>" alt="情報圖片">
                    </div>
                    <div class="hotIssueBoxCont">
                        <h4 class="textM artTit"><?php echo $hotIssueRow["artTitle"];?></h4>
                        <p class="textS hotIssueBoxContText"></p>
                        <span class="hotIssueBoxView newsBoxView"><?php echo $hotIssueRow["clickAmt"]?></span>
                        <span class="hotIssueBoxCommend newsBoxCommend"><?php echo $hotIssueRow["msgAmt"]?></span>
                    </div>
                </a>
            </div>
            <?php    
            $arr[]=$hotIssueRow["artText"];
            }
            $jsonStr = json_encode($arr);
            ?>  
    <script>
        var arrhotIssue = <?php echo $jsonStr;?>;
        console.log(arrhotIssue);
    </script>

        </div>    
        <p class="textEmphasis">Follow<strong class="textHiliR">最新消息</strong>走在時代尖端</p>
        <div id="newsBoxWrap">
            <?php
            while ($newsRow = $news ->fetch(PDO::FETCH_ASSOC)){
            $newsCat;
            $newsBoxNameColor;
            switch ($newsRow["artCat"]) {
            case "1": $newsCat = "尋寶"; 
            $newsBoxNameColor = "newsBoxNameGps";break;
            case "2": $newsCat = "試煉";
            $newsBoxNameColor = "newsBoxNameTraining"; break;
            case "3": $newsCat = "其他";
            $newsBoxNameColor = "newsBoxNameOther" ; break;
            case "4": $newsCat = "官方";
            $newsBoxNameColor = "newsBoxNameNavy" ; break;
            default:break;
            };
            $artTime = substr( $newsRow["artTime"] , 0, 10);
            $artTimeStr = str_replace("-","","$artTime");
            ?>
            <div class="newsBox artShow">
                <div class="newsBoxInfo">
                    <div class="newsBoxInfoCont">
                        <span class="newsBoxName <?php echo $newsBoxNameColor;?>"><?php echo $newsCat;?></span>
                        <div class="newsBoxTit artTit"><a href="<?php echo $newsRow["artId"];?>"><?php echo $newsRow["artTitle"];?></a>
                        </div>
                    </div>
                    <div class="newsInfo">
                        <span class="newsBoxView"><?php echo $newsRow["clickAmt"];?></span>
                        <span class="newsBoxCommend"><?php echo $newsRow["msgAmt"];?></span>
                    </div>
                    <div class="newsOwner">
                        <a href="javascript:;"><?php echo $newsRow["memNic"];?></a>
                        <span class="newsBoxTime"><?php echo $artTimeStr ?></span>
                    </div>
                </div>
                <!-- 此列疑似造成跑版 -->
                <div class="newsBoxArti"><?php echo $newsRow["artText"];?></div>
            </div>
            <?php
            }
            ?>
        </div>
        <p class="textS homeMore">噓...你不知道的江湖謠言，聽聽
            <a href="bar.html">情報酒館</a>
            的大家怎麼說...
        </p>
    </div>
    <div id="homeEnd">
        <p class="textEmphasis">說走就走<br>
            <strong class="textHiliR">來場海上冒險吧！</strong>
        </p>
        <p class="textM">
            加入大海賊帝國，立即<br>
            <a class="scrToDIY" href="javascript:;">成為海賊<br>
                <img src="image\ship\shipComplete.png" alt="龍舟">
            </a>
        </p>
    </div>

    <?php require_once('footer.php') ?>

<!-- 以下為燈箱 -->
<?php require_once('lightbox.php') ?>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/iro.min.js"></script>
    <script src="js\TweenMax.min.js"></script>
    <script src="js\ScrollMagic.min.js"></script>
    <script src="js\debug.addIndicators.min.js"></script>
    <script src="js\animation.gsap.min.js"></script>
    <script src="js/iro.min.js"></script>
    <script src="js\pixi.min.js"></script>
    <script src="js/wavebtn.js"></script>
    <script src="js/header.js"></script>
    <script src="js/shipDIY.js"></script>
    <script src="js/homeMapPIXI.js"></script>
    <script src="js/verification.js"></script>
    <script src="js/home.js"></script>
    </body>
</html>