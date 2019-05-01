<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>《大海賊帝國》去追尋吧！</title>
    <link rel="stylesheet" href="css/wavebtn.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/slick/slick.css">
    <link rel="stylesheet" href="css/compass.css">
    <link rel="stylesheet" type="text/css" href="css/slick/slick-theme.css">
    <link rel="stylesheet" href="css/market.css">
</head>

<body>
<script>
        <?php if (isset($_SESSION['goToShipYard'])) {
    ?>
            var goToShipYard  = "<?php echo $_SESSION['goToShipYard']; ?>";
            <?php
} else {
        ?>  var goToShipYard = -1;
            <?php
    }
            if (isset($_SESSION['previewMerchId'])) {
                ?>
                var previewMerchId = "<?php echo $_SESSION['previewMerchId']; ?>"
            <?php
            } else {
                ?>  var previewMerchId = -1; <?php ;
            }
            if (isset($_SESSION['previewMerchType'])) {
                ?>
            var  previewMerchType = "<?php echo $_SESSION['previewMerchType']; ?>";
            <?php
            } else {
                ?>  var previewMerchType = -1; <?php ;
            }
            if (isset($_SESSION["memId"])) {
                ?>
                var memid = "<?php echo $_SESSION["memId"]; ?>";
            <?php $memid = $_SESSION["memId"];
            } else {
                ?>
                var memid = "tourist";
            <?php
            $memid = "tourist";
            }
            
    unset($_SESSION['goToShipYard']);
    unset($_SESSION['previewMerchId']);
    unset($_SESSION['previewMerchType']);
?>

</script>

    <div class="marWrap">
<<<<<<< HEAD
    <label for="burgerCtrl">
        <input type="checkbox" name="" id="burgerCtrl">
        <div id="burger">
            <div class="burgerLine"></div>
            <div class="burgerLine"></div>
        </div>
    </label>
    <header class=""><!-- homeHeadHide-->
        <h1 id="headerLogo"><a href="index.php">
            <img src="image/logo.svg" alt="大海賊帝國">
        </a></h1>
        <nav id="headerMenu" >
            <ul>
                <li class="menuSwitch">
                    <a href="play.php">海賊試煉場</i></a>
                    <ul class="headerSub">
                        <li><a href="play.php#game">海賊試煉</a></li>
                        <li><a href="play.php#gpsWrap">啟航尋寶</a></li>
                    </ul>
                </li>
                <li class="menuSwitch">
                    <a href="market.php">海上市集</i></a>
                    <ul class="headerSub">
                        <li><a href="market.php">黑市</a></li>
                        <li><a href="market.php">造船廠</a></li>
                    </ul>
                </li>
                <li class="menuSwitch"><a href="bar.php">情報酒館</a></li>
                <li class="menuSwitch">
                    <a href="me.php">俺の海賊船</i></a>
                    <ul class="headerSub">
                        <li class="loginHere"><a href="javascript:;">登入</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    
        <div class="marBanner">
            <!-- 廣告動畫 -->
    <div class="marketADCont" data-hover-only="true" >
            <div class="piratesLoadingWrap">
                <div class="loadingWavesBox lWBFront">
                    <img src="image/market//loadingWaves.png">
                    <img src="image/market//loadingWaves.png">
                    <img src="image/market//loadingWaves.png">
                    <img src="image/market//loadingWaves.png">
                    <img src="image/market//loadingWaves.png">
                </div>
                <div class="loadingsYItembg">
                    <div class="loadingsRDNWrap"></div>
                </div>

                <div class="pirateLoadingShip">
                    <img class="loadingBody" src="image/merchProduct/300.png">
                    <img class="loadingHead" src="image/merchProduct/102.png">
                    <img class="loadingSail" src="image/merchProduct/204.png">
                </div>
                <div class="pirateLoadingShip pirateShipSec">
                    <img class="loadingBody" src="image/merchProduct/302.png">
                    <img class="loadingHead" src="image/merchProduct/101.png">
                    <img class="loadingSail" src="image/merchProduct/203.png">
                </div>
                <div class="pirateLoadingShip pirateShipThird">
                    <img class="loadingBody" src="image/merchProduct/305.png">
                    <img class="loadingHead" src="image/merchProduct/105.png">
                    <img class="loadingSail" src="image/merchProduct/201.png">
                </div>
                <div class="loadingWavesBox lWBBack">
                    <img src="image/market//loadingWaves.png">
                    <img src="image/market//loadingWaves.png">
                    <img src="image/market//loadingWaves.png">
                    <img src="image/market//loadingWaves.png">
                    <img src="image/market//loadingWaves.png">
                </div>
            </div>

    </div>

            <!-- 廣告動畫 -->
=======
        <label for="burgerCtrl">
            <input type="checkbox" name="" id="burgerCtrl">
            <div id="burger">
                <div class="burgerLine"></div>
                <div class="burgerLine"></div>
            </div>
        </label>
        <header class=""><!-- homeHeadHide-->
            <h1 id="headerLogo"><a href="javascript:;">
                <img src="image/logo.svg" alt="大海賊帝國">
            </a></h1>
            <nav id="headerMenu" >
                <ul>
                    <li class="menuSwitch">
                        <a href="play.php">海賊試煉場</i></a>
                        <ul class="headerSub">
                            <li><a href="play.php#game">海賊試煉</a></li>
                            <li><a href="play.php#gpsWrap">啟航尋寶</a></li>
                        </ul>
                    </li>
                    <li class="menuSwitch">
                        <a href="market.php">海上市集</i></a>
                        <ul class="headerSub">
                            <li><a href="market.php">黑市</a></li>
                            <li><a href="market.php">造船廠</a></li>
                        </ul>
                    </li>
                    <li class="menuSwitch"><a href="bar.php">情報酒館</a></li>
                    <li class="menuSwitch">
                        <a href="me.php">俺の海賊船</i></a>
                        <ul class="headerSub">
                            <li><a href="javascript:;" class="loginHere">登入</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="marBanner">
>>>>>>> 2683a3ecabb9536141e511d85ceb7db44d7bebb3
            <div class="mlslBox">
                <img class="mlsl" src="image/market/mlsl.png" alt="">
            </div>
            <img class="marBoard" src="image/market/bmBoard.png">
            <img class="marBoard" src="image/market/sYBoard.png">
            <img class="marBoard currentBoard" src="image/market/bmBoard.png">

            <h1 class="titlePri">海上市集</h1>
            <div class="marTitBox">
                <img class="titFrame" src="image/market/titFrame.png" alt="">
                <a class="marTitInBox" href="javascript:;">

                    <h2 class="marTypeTit titleSec">黑市</h2>
                </a>
                <a class="marTitInBox" href="javascript:;">

                    <h2 class="marTypeTit titleSec">造船廠</h2>
                </a>
                <div class="clearfix"></div>
            </div>

            <span>購買海賊船造型，追趕年度最新流行！(單押skr)</span>
            <span class="thisWeekTitle">本周新品</span>
            <a href="javascript:;" class="goToSMarketTitle" href="javascript:;">
                <img class="sYDownarrow" src="image/market/lArrow.png">
                <span>立即前往商城</span>
                <img class="sYDownarrow" src="image/market/lArrow.png">
            </a>
        </div>
        <div class="marMain blackMarket">
            <!------------ 黑市在這 --------------------->
            
            <!------------ 黑市在這 --------------------->
        </div>
        <div class="marMain shipYard">

        <span class="sYShopTitle">造船廠商城</span>
        <a href="shipRank.php" class="goToSSRTitle" href="javascript:;"><span>查看其他玩家造型</span></a>
            <div class="shipYardCont">
                <div class="sYMList">
                    <div class="sYTypeTagBox">
                        <a class="merchType merchTypeHot" href="javascript:;">
                            <h4>熱門</h4>
                        </a>
                        <a class="merchType merchTypHead" href="javascript:;">
                            <h4>船頭</h4>
                        </a>
                        <a class="merchType merchTypeBody" href="javascript:;">
                            <h4>船身</h4>
                        </a>
                        <a class="merchType merchTypSail" href="javascript:;">
                            <h4>船帆</h4>
                        </a>
                    </div>
                    <div class="sYMTypeBox">



                        <section class="typeHot regular slider">
                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchHeadImg" merchId="1" src="image/merchProduct/100.png">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3>北境船首</h3>
                                        <span>價格 :</span><span class="sYIntroPrice">300G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchBodyImg" merchId="2" src="image/merchProduct/300.png">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3>北境船身</h3>
                                        <span>價格 :</span><span class="sYIntroPrice">300G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchSailImg" merchId="3" src="image/merchProduct/200.png">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3>北境船帆</h3>
                                        <span>價格 :</span><span class="sYIntroPrice">300G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchHeadImg" merchId="5" src="image/merchProduct/101.png">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3>凱岩船頭</h3>
                                        <span>價格 :</span><span class="sYIntroPrice">300G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchBodyImg" merchId="6" src="image/merchProduct/301.png">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3>凱岩船身</h3>
                                        <span>價格 :</span><span class="sYIntroPrice">300G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchSailImg" merchId="7" src="image/merchProduct/201.png">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3>凱岩船帆</h3>
                                        <span>價格 :</span><span class="sYIntroPrice">300G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchHeadImg" merchId="8" src="image/merchProduct/102.png">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3>風暴船首</h3>
                                        <span>價格 :</span><span class="sYIntroPrice">300G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchBodyImg" merchId="9" src="image/merchProduct/302.png">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3>風暴船身</h3>
                                        <span>價格 :</span><span class="sYIntroPrice">300G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchSailImg" merchId="10" src="image/merchProduct/202.png">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3>風暴船帆</h3>
                                        <span>價格 :</span><span class="sYIntroPrice">300G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <section class="typeHead regular slider">

                        <?php
                            try {
                                require_once("marketphp/connectPirates.php");
                                $headsql = "select * from customlist WHERE modelPart=1 ORDER BY modelId DESC;";
                                $headproduct=$pdo->query($headsql);

                                if ($headproduct->rowCount() == 0) {
                                    echo "沒有商品!!!";
                                } else {
                                    $headproducts = $headproduct->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($headproducts as $i=>$headproductRow) {
                                        ?>

                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchHeadImg" merchId="<?php echo $headproductRow["modelId"]; ?>" src="image/merchProduct/<?php echo $headproductRow["modelImg"]; ?>">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3><?php echo $headproductRow["modelName"]; ?></h3>
                                        <span>價格 :</span><span class="sYIntroPrice"><?php echo $headproductRow["price"]; ?>G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php
                                    }
                                }
                            } catch (PDOException $e) {
                                echo "error";
                            }
                            ?>

                        </section>

                        <section class="typeBody regular slider">

                        <?php
                            try {
                                require_once("marketphp/connectPirates.php");
                                $bodysql = "select * from customlist WHERE modelPart=2 ORDER BY modelId DESC;";
                                $bodyproduct=$pdo->query($bodysql);

                                if ($bodyproduct->rowCount() == 0) {
                                    echo "沒有商品!!!";
                                } else {
                                    $bodyprods = $bodyproduct->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($bodyprods as $i=>$bodyproductRow) {
                                        ?>

                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchBodyImg" merchId="<?php echo $bodyproductRow["modelId"]; ?>" src="image/merchProduct/<?php echo $bodyproductRow["modelImg"]; ?>">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3><?php echo $bodyproductRow["modelName"]; ?></h3>
                                        <span>價格 :</span><span class="sYIntroPrice"><?php echo $bodyproductRow["price"]; ?>G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php
                                    }
                                }
                            } catch (PDOException $e) {
                                echo "error";
                            }
                            ?>

                        </section>
                        <section class="typeSail regular slider">

                        <?php
                            try {
                                require_once("marketphp/connectPirates.php");
                                $sailsql = "select * from customlist WHERE modelPart=3 ORDER BY modelId DESC;";
                                $sailproduct=$pdo->query($sailsql);

                                if ($sailproduct->rowCount() == 0) {
                                    echo "沒有商品!!!";
                                } else {
                                    $sailprods = $sailproduct->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($sailprods as $i=>$sailproductRow) {
                                        ?>
                                
                            <div class="sYMerch">
                                <a class="sYMerchImg" href="javascript:;">
                                    <img class="sYMerchSailImg" merchId="<?php echo $sailproductRow["modelId"]; ?>" src="image/merchProduct/<?php echo $sailproductRow["modelImg"]; ?>">
                                    <img class="unvisibleBtn" src="image/market/unvisable.png">
                                    <img class="visibleBtn" src="image/market/visible.png">
                                </a>
                                <div class="sYMerchIntroBox">
                                    <div class="sYMerchText">
                                        <h3><?php echo $sailproductRow["modelName"]; ?></h3>
                                        <span>價格 :</span><span class="sYIntroPrice"><?php echo $sailproductRow["price"]; ?>G</span>
                                    </div>
                                    <div class="sYMerchBtn">
                                        <a class="btnpri sYBuyBtn" href="javascript:;">
                                            <span>立即購買</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <?php
                                    }
                                }
                            } catch (PDOException $e) {
                                echo "error";
                            }
                            ?>

                        </section>
                    </div>
                </div>



                <div class="mSSDCont">
                    <canvas id="drawLineCanvas" width="828" height="520"></canvas>
                    <div class="sYMerchPreviewBox">
                        <div class="sYMerchPreviewshelf">

                        <?php
                                    try {
                                        echo "
                                                <script>
                                                    var myCustoms = new Array();

                                                </script>";
                                        if (isset($memid)) {
                                            echo "<script>memId = '$memid' </script>";
                                        
                                        
                                        
                                            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////改動態抓會員id

                                            require_once("marketphp/connectPirates.php");

                                            $getOwnedMerchsql = "select ModelId from mycustom where memId=:memid";
                                            $getOwnedMerch=$pdo->prepare($getOwnedMerchsql);
                                            $getOwnedMerch->bindValue(":memid", $memid);
                                            $getOwnedMerch->execute();
                                            $getOwnedMerchs = $getOwnedMerch->fetchAll(PDO::FETCH_ASSOC);
        
                                        
                                            

                                            foreach ($getOwnedMerchs as $i=>$getOwnedMerchsRow) {
                                                $myCustoms[$i] = $getOwnedMerchsRow["ModelId"];
                                                echo "
                                            <script>
                                                    myCustoms[$i] = $myCustoms[$i];
                                            </script>";
                                            }
                                        
                                            $getwearingIdsql = "select ModelId from mycustom where memId=:memid and wearing=1";
                                            $getwearingId=$pdo->prepare($getwearingIdsql);
                                            $getwearingId->bindValue(":memid", $memid);
                                            $getwearingId->execute();

                                            if ($getwearingId->rowCount() == 0) {
                                                echo "<script>alert('您尚未完成海賊船客製!!!');</script>"; ?>
                                                <div class="merchPartBox merchHead">
                                                                    <div class="merchPartImg">
                                                                        <span class="sYMerchCircle"></span>
                                                                        <a href="javascript:;">
                                                                            <img class="previewHeadBox" src="image/merchProduct/">
                                                                        </a>
                                                                    </div>

                                                                    <div class="merchPartintro">
                                                                        <a href="javascript:;">
                                                                            <h3></h3>
                                                                        </a>
                                                                        <span class="SYPriceTag">價格 :</span>
                                                                        <span class="merchPartPrice">0</span>
                                                                        <a class="SYremoveMerch" href="javascript:;">
                                                                            x
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <div class="merchPartBox merchBody">
                                                                    <div class="merchPartImg">
                                                                        <span class="sYMerchCircle"></span>
                                                                        <a href="javascript:;">
                                                                            <img class="previewBodyBox" src="image/merchProduct/">
                                                                        </a>
                                                                    </div>
                                                                    <div class="merchPartintro">
                                                                        <a href="javascript:;">
                                                                            <h3></h3>
                                                                        </a>
                                                                        <span class="SYPriceTag">價格 :</span>
                                                                        <span class="merchPartPrice">0</span>
                                                                        <a class="SYremoveMerch" href="javascript:;">
                                                                            x
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="merchPartBox merchSail">
                                                                    <div class="merchPartImg">
                                                                        <span class="sYMerchCircle"></span>
                                                                        <a href="javascript:;">
                                                                            <img class="previewSailBox" src="image/merchProduct/">
                                                                        </a>
                                                                    </div>
                                                                    <div class="merchPartintro">
                                                                        <a href="javascript:;">
                                                                            <h3></h3>
                                                                        </a>
                                                                        <span class="SYPriceTag">價格 :</span>
                                                                        <span class="merchPartPrice">0</span>
                                                                        <a class="SYremoveMerch" href="javascript:;">
                                                                            x
                                                                        </a>
                                                                    </div>
                                                                </div>
                                            <?php
                                            } else {
                                                $getwearingIds = $getwearingId->fetchAll(PDO::FETCH_ASSOC);
        
                                                foreach ($getwearingIds as $i=>$getwearingIdRow) {
                                                    $mywearing = $getwearingIdRow["ModelId"];
                                                
                                                    $getwearingsql = "select * from customlist WHERE ModelId=:modelId";
                                                    $getwearing = $pdo->prepare($getwearingsql);
                                                    $getwearing->bindValue(":modelId", $mywearing);
                                                    $getwearing->execute();

                                                    if ($getwearing->rowCount() == 0) {
                                                        echo "<script>alert('您尚未擁有造型!!!');</script>";
                                                    } else {
                                                        $getwearings = $getwearing->fetchAll(PDO::FETCH_ASSOC);

                                                        foreach ($getwearings as $i=>$getwearingRow) {
                                                            $wearing = $getwearingRow["modelPart"];
                                                            $wearingName = $getwearingRow["modelName"];
                                                            $wearingImg = $getwearingRow["modelImg"];
                                                            $wearingPrice = "裝備中";
                                                        
                                                            if ($wearing == 1) {
                                                                echo "<script>var defaultHeadId = '$mywearing' </script>";
                                                                echo "<script>var myDefaultHeadName = '$wearingName'</script>"; ?>
                                                            <div class="merchPartBox merchHead">
                                                                    <div class="merchPartImg">
                                                                        <span class="sYMerchCircle"></span>
                                                                        <a href="javascript:;">
                                                                            <img class="previewHeadBox" src="image/merchProduct/<?php echo $wearingImg ?>">
                                                                        </a>
                                                                    </div>

                                                                    <div class="merchPartintro">
                                                                        <a href="javascript:;">
                                                                            <h3><?php echo $wearingName ?></h3>
                                                                        </a>
                                                                        <span class="SYPriceTag">價格 :</span>
                                                                        <span class="merchPartPrice"><?php echo $wearingPrice ?></span>
                                                                        <a class="SYremoveMerch" href="javascript:;">
                                                                            x
                                                                        </a>
                                                                    </div>

                                                                </div>

                                                            <?php
                                                            } elseif ($wearing == 2) {
                                                                echo "<script>var defaultBodyId = '$mywearing' </script>";
                                                                echo "<script>var myDefaultBodyName = '$wearingName'</script>"; ?>

                                                                <div class="merchPartBox merchBody">
                                                                    <div class="merchPartImg">
                                                                        <span class="sYMerchCircle"></span>
                                                                        <a href="javascript:;">
                                                                            <img class="previewBodyBox" src="image/merchProduct/<?php echo $wearingImg ?>">
                                                                        </a>
                                                                    </div>
                                                                    <div class="merchPartintro">
                                                                        <a href="javascript:;">
                                                                            <h3><?php echo $wearingName ?></h3>
                                                                        </a>
                                                                        <span class="SYPriceTag">價格 :</span>
                                                                        <span class="merchPartPrice"><?php echo $wearingPrice ?></span>
                                                                        <a class="SYremoveMerch" href="javascript:;">
                                                                            x
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            <?php
                                                            } elseif ($wearing == 3) {
                                                                echo "<script>var defaultSailId = '$mywearing' </script>";
                                                                echo "<script>var myDefaultSailName = '$wearingName'</script>"; ?>

                                                                <div class="merchPartBox merchSail">
                                                                    <div class="merchPartImg">
                                                                        <span class="sYMerchCircle"></span>
                                                                        <a href="javascript:;">
                                                                            <img class="previewSailBox" src="image/merchProduct/<?php echo $wearingImg ?>">
                                                                        </a>
                                                                    </div>
                                                                    <div class="merchPartintro">
                                                                        <a href="javascript:;">
                                                                            <h3><?php echo $wearingName ?></h3>
                                                                        </a>
                                                                        <span class="SYPriceTag">價格 :</span>
                                                                        <span class="merchPartPrice"><?php echo $wearingPrice ?></span>
                                                                        <a class="SYremoveMerch" href="javascript:;">
                                                                            x
                                                                        </a>
                                                                    </div>
                                                                </div>

                                                            <?php
                                                            } ?>

                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } catch (PDOException $e) {
                                        echo "error";
                                    }
                                     ?>     
                                                                <?php if (isset($memid)) {
                                         echo `<div class="merchPartBox merchHead">
                                                                    <div class="merchPartImg">
                                                                        <span class="sYMerchCircle"></span>
                                                                        <a href="javascript:;">
                                                                            <img class="previewHeadBox" src="image/merchProduct/100.png">
                                                                        </a>
                                                                    </div>

                                                                    <div class="merchPartintro">
                                                                        <a href="javascript:;">
                                                                            <h3>北境船首</h3>
                                                                        </a>
                                                                        <script>var myDefaultHeadName = "北境船首", defaultHeadId = 1;</script>
                                                                        <span class="SYPriceTag">價格 :</span>
                                                                        <span class="merchPartPrice">200G</span>
                                                                        <a class="SYremoveMerch" href="javascript:;">
                                                                            x
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <div class="merchPartBox merchBody">
                                                                    <div class="merchPartImg">
                                                                        <span class="sYMerchCircle"></span>
                                                                        <a href="javascript:;">
                                                                            <img class="previewBodyBox" src="image/merchProduct/300.png">
                                                                        </a>
                                                                    </div>
                                                                    <div class="merchPartintro">
                                                                        <a href="javascript:;">
                                                                            <h3>北境船身</h3>
                                                                        </a>
                                                                        <script>var myDefaultBodyName = "北境船身", defaultBodyId = 2;</script>
                                                                        <span class="SYPriceTag">價格 :</span>
                                                                        <span class="merchPartPrice">200G</span>
                                                                        <a class="SYremoveMerch" href="javascript:;">
                                                                            x
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="merchPartBox merchSail">
                                                                    <div class="merchPartImg">
                                                                        <span class="sYMerchCircle"></span>
                                                                        <a href="javascript:;">
                                                                            <img class="previewSailBox" src="image/merchProduct/200.png">
                                                                        </a>
                                                                    </div>
                                                                    <div class="merchPartintro">
                                                                        <a href="javascript:;">
                                                                            <h3>北境船帆</h3>
                                                                        </a>
                                                                        <script>var myDefaultSailName = "北境船帆", defaultSailId = 3;</script>
                                                                        <span class="SYPriceTag">價格 :</span>
                                                                        <span class="merchPartPrice">200G</span>
                                                                        <a class="SYremoveMerch" href="javascript:;">
                                                                            x
                                                                        </a>
                                                                    </div>
                                                                </div>
`;
                                     }?>
                                                                
                        </div>

                        <a class="sYbuymerchesBtn btnpri" href="javascript:;">
                            <span class="buyAllIntro">一鍵購買</span>
                        </a>
                        <span class="buyAllinfo">#購買預覽中的造型</span>
                        <a class="sYClosePreviewBtn" href="javacsript:;">x</a>
                    </div>
                    <div class="sYShipPreviewBox">

                        <img id="sYHead" defaultId="100.png" src="image/merchProduct/100.png">
                        <img id="sYBody" defaultId="100.png" src="image/merchProduct/300.png">
                        <img id="sYSail" defaultId="100.png" src="image/merchProduct/200.png">
                        
                        <a class="sYPreviewBtn" href="javascript:;">
                            <span>查看目前選擇部位</span><img src="image/market/zoom.png">
                        </a>
                        <a class="sYReverseBtn" href="javascript:;">
                            <span>初始化造型</span><img src="image/market/reverse.png">
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="sYToolBox">

                        <a href="shipRank.php">
                            <span>+更多熱門造型 :</span>
                        </a>
                        <a class="sYGoToShiprank" href="shipRank.php">
                            <h4>船匠排行</h4>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="lightbox sYBuyMerchLightBox">
        <div class="popbg"></div>
        <div class="info">
            <div class="axis axis1"></div>
            <div class="axis axis2"></div>
            <div class="leavebuy"></div>
            <div class="paper">
                <h2 class="titleThi">購買成功!!!</h2>
                <span class="sYLtext">直接穿上美美的造型?</span>
                <div class="sYLBtnBox">
                    <a class="sYLStorBtn" href="javascript:;">
                        <span>不了，謝謝</span>
                    </a>
                    <a class="btnpri sYLWearBtn" href="#">
                        <span>穿著新造型</span>
                    </a>
                    
                </div>
                
            </div>
        </div>
    </div>  
            
        </div>
    </div>
    <div id="compass">
		<img src="image/compass_inner.png" alt="in" id="in">
		<img src="image/compass_outter.png" alt="out" id="out">
		<div id="compassBlue">
			<div id="blueImg" class="blueInfo"><img src="" alt=""></div>
			<div id="blueName" class="blueInfo"></div>
			<div id="blueLv" class="blueInfo">Lv<span></span></div>
			<div id="blueExp" class="blueInfo"><span></span>/100</div>
			<div id="blueMoney" class="blueInfo">金幣<span></span>G</div>
			<div id="blueStr" class="blueInfo">力量<span></span></div>
			<div id="blueLuck" class="blueInfo">幸運<span></span></div>
			<div id="blueAgi" class="blueInfo">敏捷<span></span></div>
			<div id="blueInt" class="blueInfo">智力<span></span></div>
			<div id="blueGameTime" class="blueInfo">體力值<span></span></div>
		</div>
	</div>
    <script src="js/wavebtn.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="js/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    
    <script src="js/login.js"></script>
    <script src="js/header.js"></script>
    <script src="js/verification.js"></script>
    <script src="js/compass.js"></script>
    <script src="js/reset.js"></script>
    <script src="js/getStatus.js"></script>
    
    <!-- <script src="js/TweenMax.min.js"></script>
    <script src="js/tweenmax.js"></script>
    <script src="js/ScrollMagic.min.js"></script>
    <script src="js/animation.gsap.min.js"></script>
    <script src="js/parallax.js"></script> -->
    <script src="js/market.js"></script>
    <!-- <script src="js/storm.js"></script> -->
    <script>
        var compass;
        var playTimeCount=0;
        var rankFly;
        var gameStartTimer;
        var bazierRank;
        // var memId=$('#getSession').text();
        var memLv=parseInt($('#blueLv span').text());
        var memExp=parseInt($('#blueLv span').text());
        var memMoney=parseInt($('#blueLv span').text());
        var playedTimes=parseInt($('#blueGameTime span').text());
        var int=parseInt($('#blueInt span').text());
        var str=parseInt($('#blueStr span').text());
        var lcu=parseInt($('#blueLuck span').text());
        var agi=parseInt($('#blueAgi span').text());
        var rwd=$('#playTitleSec').width();
        memLv=100;
        memExp=100;
        memMoney=1000;
        playedTimes=2000;
        int=100;
        str=200;
        lcu=300;
        agi=400;
        $(document).ready(function(){
        getStatus();
        });

        // $(document).ready(function(){
        // //還沒登入compass = none
        // if(memId!=''){
        // 	$('#compass').css('display','block');
        // }else{
        // 	$('#compass').css('display','none');
        // }
        // //rwd compass = none
        // if(rwd==375){
        // 	$('#compass').css('display','none');
        // }else{
        // 	$('#compass').css('display','block');
        // }
        // reset();
        // getStatus();
        // //lightbox 離開
        // $('.checkToLeave').click(function(){$('.lightbox').css('display','none');});
        // $('.popbg').click(function(){$('.lightbox').css('display','none');});
        // $('.leave').click(function(){$('.lightbox').css('display','none');})

        // // 寫入遊戲測驗時間
        // $('#winbox .checkToLeave').click(function(){
        // 	playedTimes-=1;
        // 	updateScore();
        // 	getScoreL();
        // 	getStatus();
        // 	playTimeCount=0;
        // });
        // $('#losebox .checkToLeave').click(function(){
        // 	playedTimes-=1;
        // 	updateScore();
        // 	getScoreL();
        // 	getStatus();
        // 	playTimeCount=0;
        // });
        // // 跑tweenmax
        // playTweenMax();

        // // playBtn
        // if(memId!=''){
        // 	$('.button_border').click(function(){
        // 		if(playedTimes==0){
        // 			$('#playedTimesBox .lightbox').css('display','block');
        // 		}else{
        // 			$('#playSpark').css('clipPath','circle(1900px)');
        // 			gameStartTimer = setInterval(play,1000);
        // 		}
        // 	});
        // }else{
        // 	$('#loginbox .lightbox').css('display','block');
        // }

        // function play(){
        // 	clearInterval(gameStartTimer);
        // 	$('.button_border').css('display','none');
        // 	$('#defaultCanvas0').css('display','block');
        // 	playTimer = setInterval(playTime,1000)
        // }
        // function playTime(){
        // 	playTimeCount+=1;
        // 	console.log('playTimeCount: ',playTimeCount);
        // }
        // });
</script>
</body>

</html>