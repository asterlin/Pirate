<?php
ob_start();
session_start();
$errMsg = "";

try {
    require_once("backstage/php/connectPirates.php");
    //"select * from traderecord";
    //交易紀錄
    $traderecord = "select * from traderecord JOIN treasurelist ON traderecord.treaId = treasurelist.treaId ";
    $traderecord = $pdo->query($traderecord);

    //發文紀錄
    $articlelist = "select * from articlelist ";
    $articlelist = $pdo->query($articlelist);

    //持有造型
    $mycustom = "select * from customlist JOIN mycustom ON customlist.modelId = mycustom.modelId ";
    $mycustom = $pdo->query($mycustom);
} catch (PDOException $e) {
    $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>";
    $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}

echo $errMsg;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>《大海賊帝國》去追尋吧！</title>
    <link rel="stylesheet" href="css/me.css">
    <link rel="stylesheet" href="css/wavebtn.css">
    

    <style>
    canvas{
        border: 1px solid gainsboro;
    }
    #tools img{
        width: 100px;
    }
    #shipArea{
        position: relative;
        height: 120%;
    }
    /* #shipArea img{
        width: 750px;
        position: absolute;
    } */
    #partSail,#partBody,#partHead,#drawFrame{
        width: 100%;
        height:100%;
        position: absolute;
    }
    #drawFlag,#combineShip{
        position: absolute;
        width: 100%;
        height: 100%;
    }
    #pen{
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background: rgba(0,0,0,0.3);
        position: absolute;
        top: 0;
        left: 0;
        pointer-events: none;
    }
    </style>
</head>

<body>

    <!-- 選單 -->
    <label for="burgerCtrl">
        <input type="checkbox" name="" id="burgerCtrl">
        <div id="burger">
            <div class="burgerLine"></div>
            <div class="burgerLine"></div>
        </div>
    </label>
    <header>
        <h1 id="headerLogo"><a href="index.html">
                <img src="image/logo.svg" alt="大海賊帝國">
            </a></h1>
        <nav id="headerMenu">
            <ul>
                <li><a href="game.html">海賊試煉場</a></li>
                <li><a href="market.html">海上市集</a></li>
                <li><a href="bar.html">情報酒館</a></li>
                <li><a href="me.html">俺の海賊船</a></li>
            </ul>
        </nav>
    </header>


    <div class="meTitle">
        <h1 class="titlePri">俺の海賊船</h1>
    </div>

    <div class="wrap">
        <div class="col-12 col-md-12 col-xl-4 drawing">
            <img src="image/background/blueprint.png" alt="">
            <div class="meShip">
                <div id="shipArea">
                    <!-- 為了取得外聯SVG的內文使用於船帆遮罩，使用object標籤 -->
                    <img src="image/ship/300.png" alt="挑選船身" id="partBody">
                    <object data="image/ship/200.svg" type="image/svg+xml" id="partSail"></object>
                    <img src="image/ship/100.png" alt="挑選船頭" id="partHead">
                        <canvas id="combineShip">
                            你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我....好吧，請你<strong>下載並使用<a href="https://www.google.com/intl/zh-TW_ALL/chrome/">google chrome</a></strong>開啟這個網頁吧
                        </canvas>
                        <canvas id="drawFlag">
                            你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我你看不到我....好吧，請你<strong>下載並使用<a href="https://www.google.com/intl/zh-TW_ALL/chrome/">google chrome</a></strong>開啟這個網頁吧(ㄏ￣▽￣)ㄏ   ㄟ(￣▽￣ㄟ)
                        </canvas>
                     <!-- <div id="pen"></div> -->
                </div>
            </div>
            <a href="">
                <button class="btnpri"><span>儲存</span></button>
            </a>
        </div>
        <!-- 個人資訊 -->
        <div class="col-12 col-md-12 col-xl-4 boxNews">
            <div class="meNews">
                <ul class="col-12 col-md-5 field">
                    <li>
                        帳號: <span><?php echo $_SESSION["memId"]; ?></span>
                    </li>
                    
                    <li>
                        ID: <input type="text" name="memName" value=" <?php echo $_SESSION["memNic"];  ?> " maxlength="12"
                                readonly id="memName">
                    </li>
                    <li>
                        LV: <span> <?php echo $_SESSION["memLv"];  ?> </span>
                      
                    </li>
                    <li>
                          EXP:<span> <?php echo $_SESSION["memExp"];  ?>/100 </span>
                    </li>
                    <li>
                        金幣: <span> <?php echo $_SESSION["memMoney"];  ?> </span> G
                    </li>
                    <li>
                        <button class="btnpri butNews" id="edit"><span>編輯</span></button>
                        <button class="btnpri butNews" id="carryOut"><span>完成</span></button>
                    </li>
                </ul>
                <!-- 雷達圖 -->
                <div class="col-12 col-md-7 radar">
                    <h3>天賦值: <span id="points"> <?php echo $_SESSION["talentPointsRemain"];?> </span> 點</h3>
                    <canvas id="myChart" width='400' height='400' style="display: inline-block; width:400px; height:400px;"></canvas>
                    <button id="butS" class="but">力量</button>
                    <button id="butI" class="but">智力</button>
                    <button id="butL" class="but">幸運</button>
                    <button id="butA" class="but">敏捷</button>
                </div>
            </div>
            <!-- 寶物造型頁籤 -->
            <div class="col-12  bookMark">
                <div id="js-tabs">
                    <div id="tabs-nav">
                        <a href="#tab0" onclick="jsTabs(event,'tab0');return false"
                            class="tabs-menu tabs-menu-active">寶物</a>
                        <a href="#tab1" onclick="jsTabs(event,'tab1');return false" class="tabs-menu">造型</a>
                    </div>
                    <div class="tabs-container">
                        <div id="tab0" class="tabs-panel" style="display:block">
                            <div class="content">
                                <ul>
                                
                                    <li>
                                        <img src="image/treasure/trea1.svg" alt="">
                                    </li>
                                    <li>
                                        <img src="image/treasure/trea2.svg" alt="">
                                    </li>
                                    <li>
                                        <img src="image/treasure/trea3.svg" alt="">
                                    </li>
                                    <li>
                                        <img src="image/treasure/trea4.svg" alt="">
                                    </li>
                                    <li>
                                        <img src="image/treasure/trea5.svg" alt="">
                                    </li>
                                    <li>
                                        <img src="image/treasure/trea6.svg" alt="">
                                    </li>

                                     
                                </ul>
                            </div>
                        </div>
                        <div id="tab1" class="tabs-panel">
                        <div class="content">
                            <ul>
                                <?php
                                    $memId = $_SESSION["memId"];
                                    while ($mycustomRow = $mycustom->fetch(PDO::FETCH_ASSOC)) {
                                        if ($mycustomRow["memId"] == $memId) {
                                ?>      
                                    <li>
                                        <img src="image/product/<?php echo $mycustomRow['modelImg']?>" alt="">
                                    </li>
                                <?php
                                        }
                                    }
                                ?>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-xl-4 filewrap">
            <div id="js-tabs1" class="js-tabs1">
                <div id="tabs-nav1">
                    <a href="#tab2" onclick="jsTabs1(event,'tab2');return false"
                        class="tabs-menu1 tabs-menu-active1">交易紀錄</a>
                    <a href="#tab3" onclick="jsTabs1(event,'tab3');return false" class="tabs-menu1">發文紀錄</a>
                </div>
                <div class="tabs-container1">
                    <div id="tab2" class="tabs-panel1" style="display:block">
                        <?php
                            $memId = $_SESSION["memId"];
                            while ($traderecordRow = $traderecord->fetch(PDO::FETCH_ASSOC)) {
                                if ($traderecordRow["buyerId"] == $memId) {
                                    ?>
                    <div class="tt textS">
                            <ul>
                                <li>寶物名稱: <span><?php echo $traderecordRow['treaName']?></span> </li>
                                <li>上架時間: <span><?php echo $traderecordRow['saleTime']?></span> </li>
                                <li>買家暱稱: <span><?php echo $traderecordRow['salerId']?></span> </li>
                                <li>交易時間: <span><?php echo $traderecordRow['tradeTime']?></span> </li>
                                <li>價格: <span> <?php echo $traderecordRow['price']?> </span> </li>
                            </ul>
                        </div>
                    <?php
                                }
                            }
                    ?>
                    </div>
                    <div id="tab3" class="tabs-panel1">
                    <?php
                        $memId = $_SESSION["memId"];
                        while ($articlelistRow = $articlelist->fetch(PDO::FETCH_ASSOC)) {
                            if ($articlelistRow["memId"] == $memId) {
                                ?>
                    <div class="tt textS">
                            <ul>
                                <li>主題: <span><?php echo $articlelistRow['artTitle']?></span> </li>
                                <li>發文時間: <span><?php echo $articlelistRow['artTime']?></span> </li>
                                <li>討論人數: <span><?php echo $articlelistRow['msgAmt']?></span> 次</li>
                                <li>點擊次數: <span><?php echo $articlelistRow['clickAmt']?></span> 次</li>
                                <li><button class="btnpri"><span><a href="ber.php?from=me&artId=<?php echo $articlelistRow['artId']?>">前往文章</a></span></button></li>
                            </ul>
                        </div>
                    <?php
                            }
                        }
                    ?>

                    </div>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>
    </div>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/header.js"></script>
    <script src="js/myRadar.js"></script>
    <script src="js/me.js"></script>
    <script src="js/wavebtn.js"></script>
    <!-- <script src="js/shipDIY.js"></script> -->
    <!-- <script>
        window.addEventListener("load", getMyInfo());
    </script> -->
    <script>
		var chart;//radar圖名稱
		var graphDataNew = [1,2,3,4];//從資料庫載入的Radar數值
		function plusSkill(e){
			point = parseInt($('#myPoint').text());
			if(point){
				$('#myPoint').text(point-1);
				graphDataNew[$(this).index()] += 1;
				chart.data.datasets[0].data=graphDataNew;
				chart.update();//更新radar圖
			}
		}
		$(document).ready(function(){
			chartRadar(graphDataNew);//從資料庫載入的Radar數值,初始化用
			$('.btnPlus').click(plusSkill);
		});
	</script>

</body>

</html>