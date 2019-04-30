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
    <link rel="stylesheet" href="css/balance.css">
    <link rel="stylesheet" href="css/lightbox.css">
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
            } if (isset($_SESSION['memId'])) {
                ?>
            var memid = "<?php echo $_SESSION['memId']; ?>";
            <?php $memid = $_SESSION['memId'];
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
<div class="lightbox">
        <div class="popbg"></div>
        <div class="info">
            <div class="axis axis1"></div>
            <div class="axis axis2"></div>
            <div class="leave"></div>
            <div class="paper">

                <div id="tab-demo">
                
                    <div id="tab01" class="tab-inner">
                        <h2 class="titlePri" >成為海賊</h2>
                        
                            <label>帳號:</label>
                            <input id="signmemId" type="text" name="memId"><br>
                            <label>密碼:</label>
                            <input id="signmemPsw" type="password" name="memPsw"><br>
                            
                            <a id="signUp"class="btnpri" href="javascript:;">
                                <span>登入</span>
                            </a>
                       
                    </div>

                    <div id="tab02" class="tab-inner">
                        <h2 class="titlePri" >成為海賊</h2>
                        <form action="registered.php" id="loginforma">
                            <div class="Data-Title">
                                <label for="memId">帳號:</label><br>
                                <label for="memNic">暱稱:</label><br>
                                <label for="memPsw">密碼:</label><br>
                                <label for="memCon">確認密碼:</label><br>
                            </div>
                            <div class="Data-Items">
                                <input type="text" id="memId" name="memId"><br>
                                <input type="text" id="memNic" name="memNic"><br>
                                <input type="password" id="memPsw" name="memPsw"><br>
                                <input type="password" id="memCon" name="memCon"><br>
                            </div>
                            <div class="verification">
                                <h2>請旋轉到正確位置</h2>
                                <a id="signlbtn" href="javascript:;">左</a>
                                <img id="signnew" src="image/new.png" alt="" width="100px" height="100px">
                                <a id="signrbtn" href="javascript:;">右</a>
                                <!-- <a id="signconfirm" type="submit">提交</a> -->
                                <div id="signcontent"></div>
                            </div>
                            <div class="clearfix"></div>
                            <a id="btnver" class="btnpri" href="javascript:;" >
                                <span>驗證身份</span>
                            </a>
                            
                        </form>
                    </div>
                    <ul class="tab-title">
                        <li><a class="signIn" href="#tab01">登入頁</a></li>
                        <li>/</li>
                        <li><a class="register" href="#tab02">註冊頁</a></li>
                    </ul>
             </div>
   
  
         </div>
    </div>
        </div>
    <div class="marWrap">
        <header>
            <h1 class="titlePri" id="headerLogo"><a href="index.php">
                    <img src="image/logo.svg" alt="大海賊帝國">
                </a></h1>
            <nav id="headerMenu">
                <ul>
                    <li><a href="game.html">海賊試煉場</a></li>
                    <li><a href="market.php">海上市集</a></li>
                    <li><a href="bar.php">情報酒館</a></li>
                    <li><a href="me.php">俺の海賊船</a></li>
                </ul>
            </nav>
            <div>
                <ul id="headerMe">
                    <li id="headerMeID">
                        <a href="javascript:;">我是大帥哥</a>
                    </li>
                    <li id="headerMeLv">lv.<span>7</span>
                        <div id="headerExpBar">
                            <div id="headerExpLine"></div>
                            <p id="headerExp"><span>1000</span>/<span>10000</span></p>
                        </div>

                    </li>
                    <li id="headerMeMoney">金幣<span>100</span>G</li>
                    <li id="headerMeShip"><a href="javascript:;">
                            <img src="image/ship/shipTemp.png" alt="角色頭像">
                        </a></li>
                    <li id="headerMeTalentS">力量<span>◆◆◆◆◇</span></li>
                    <li id="headerMeTalentL">幸運<span>5</span></li>
                    <li id="headerMeTalentA">敏捷<span>5</span></li>
                    <li id="headerMeTalentI">智力<span>5</span></li>
                </ul>
            </div>
        </header>
        <div class="marBanner">
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
        </div>
        <div class="marMain blackMarket">
            <!------------ 黑市在這 --------------------->
            <?php
            $errMsg = '';
            try {
                require_once("marketphp/connectPirates.php");
                $sql = "select * from traderecord where buyerId IS NULL";
                $traderecord=$pdo->query($sql);
            } catch (PDOException $e) {
                $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
                $errMsg .= "行號 : ".$e -> getLine()."<br>";
                echo $errMsg;
            }
            ?>
    

    
    <!-- <script src="js/black.js"></script> -->
    <!-- <script src="js/balance.js"></script> -->
    
    <!-- <script>
        var $filterCheck;
        function filterCheck(e){
            $filterCheck = e.target.value;
            console.log($filterCheck);
        }

        function init(){
            for(var i=0; i<=3; i++)
            document.getElementsByClassName("treaCheckbox")[i].addEventListener("click",filterCheck);
            console.log();
        }
        window.onload = init;
    </script> -->
    <!-- <script>
        function buy(){
            console.log(1);
            document.getElementsByClassName("buysucbox")[0].style.display = 'block'; // i代入這個頁面的第幾個燈箱
            
        }
        function off(){
            // document.getElementsByClassName("buysucbox")[0].style.display = 'none';  // i代入這個頁面的第幾個燈箱
        }



        function init(){
            // var count = ;
            // console.log(count); 
            for(i=0; i <= 1; i++)
            document.getElementsByClassName("treabuy")[i].addEventListener("click",buy);
            document.getElementsByClassName("successclose")[0].onclick =off; 
            // document.getElementsByClassName("leave")[0].onclick =off;
            
        }

        window.onload = init;
    </script> -->
</head>
<body>
    
    <a id="gosellpage" class="btnsec " href="javascript:;">
        <span>賣東西</span>
    </a>
    <div class="treawrap flex"> 
        <div class="filterCheck "style="display:none">
            <input class="treaCheckbox" type="checkbox" value="treaInt" name="ckbox0"><label>智力</label>
            <input class="treaCheckbox" type="checkbox" value="treaStr" name="ckbox1"><label>力量</label>
            <input class="treaCheckbox" type="checkbox" value="treaAgi" name="ckbox2"><label>敏捷</label>
            <input class="treaCheckbox" type="checkbox" value="treaLuk" name="ckbox2"><label>幸運</label>
        </div>
<?php
    while ($tradRow = $traderecord->fetch(PDO::FETCH_ASSOC)) {
        $saleTime = $tradRow["saleTime"];
        $today3 = date("Y-m-d", strtotime('-2 days'));
        $remaining = (strtotime($saleTime) - strtotime($today3))/(60*60*24);
        if ($remaining <= 3 and $remaining >= 0 and $tradRow['salerId']!= 'test01') {
            //$_SESSION["memId"]
        
            // session_start();
            // echo $filterCheck;
            try {
                $filter = '';//and treaStr >= 1
                $sql = "select * from treasurelist where treaId = ? $filter ";
                $treasurelist=$pdo->prepare($sql);
                // $treasurelist->bindValue(":treaId",$tradRow["treaId"]);
                $treasurelist->execute([$tradRow["treaId"]]);
            } catch (PDOException $e) {
                $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
                $errMsg .= "行號 : ".$e -> getLine()."<br>";
                echo $errMsg;
            } ?>

<?php
    $count =0;
            while ($treaRow = $treasurelist->fetch(PDO::FETCH_ASSOC)) {
                $count+=1;
                if ($treaRow["treaStatus"] == 1) {
                    ?>
    
            
        <div class="treaRecommend col-12 col-md-4 col-xl-3">
            <h3 class="treaName"><?php echo $treaRow["treaName"]; ?></h3>
            <div class="salerId">
                <span>賣家:<?php echo $tradRow["salerId"]; ?></span>
            </div>
            <p>智力+ <?=$treaRow["treaInt"]; ?>
                    力量+ <?=$treaRow["treaStr"]; ?>
                    敏捷+ <?=$treaRow["treaAgi"]; ?>
                    幸運+ <?=$treaRow["treaLuk"]; ?></p>
            <img src="images//<?php echo $treaRow["treaImg"]; ?>" class="treaImg">
            <div class="treaRadar">
                <p>天賦分佈</p> 
            </div>
            <p>價格:<?php echo $tradRow["price"]; ?>G</p>
            <p>剩餘時間:<?php $saleTime = $tradRow["saleTime"];
                    $today3 = date("Y-m-d", strtotime('-2 days'));
                    echo(strtotime($saleTime) - strtotime($today3))/(60*60*24); ?>天</p>

            <form action="change.php" class="treachange">
                <input type="hidden" name="salerId" value="<?php echo $tradRow["salerId"]; ?>">
                <input class="tradeId" type="hidden" name="tradeId" value=<?php echo $tradRow["tradeId"]; ?>>
                <input class="price" type="hidden" name="price" value=<?php echo $tradRow["price"]; ?>>
                <input type="submit" style="display:none">
                <input id="memMoney" type="hidden" value = 600>
                <?php
                // $_SESSION["memMoney"];
                ?>
                <input type="hidden" value="<?php echo $tradRow["price"]; ?>">
                
                <div class="treabuywrap">
                    <a class="btnpri treabuy" >
                        <span>購買</span>
                    </a>
                </div>
            </form>
        </div>
        <?php
                }
            } ?>
    
    
    <?php
        }
    }
    ?>
    </div>
    
    <div class="lightbox buysucbox" ><!-- 購買燈箱 -->
        <div class="popbg"></div>
        <div class="info">
            <div class="axis axis1"></div>
            <div class="axis axis2"></div>
            <div class="leaveBM"></div>
            <div class="paper">
                <h2 class="titlePri buysuccess" >購買成功</h2>
                <a class="btnpri successclose">
                    <span>關閉</span>
                </a>
            </div>
        </div>
    </div> 


    <div class="sellpage flex">
        <div class="sellnew">
            <a id="sellnewbtn" class="btnsec ">
                <span>新增商品</span>
            </a>
        </div> 
        <?php
            
            
            try {
                $memId = 'test01';//$_SESSION["memId"]
                $sql = " select * from traderecord r join treasurelist l on r.treaId = l.treaId";
                $traderecords = $pdo -> query($sql);
            } catch (PDOException $e) {
                $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
                $errMsg .= "行號 : ".$e -> getLine()."<br>";
                echo $errMsg;
            }
        ?>


        <?php
        
            while ($treaRow = $traderecords -> fetch(PDO::FETCH_ASSOC)) {
                $saleTime = $treaRow["saleTime"];
                $today3 = date("Y-m-d", strtotime('-2 days'));
                $remaining = (strtotime($saleTime) - strtotime($today3))/(60*60*24);
                if ($treaRow["treaStatus"] == 1 and $treaRow["salerId"] == $memId and $treaRow["buyerId"] == null and $remaining <= 3 and $remaining >= 0) {
                    ?>
        
        <div class="treaRecommend col-12 col-md-4 col-xl-3">
            <h3 class="treaName"><?php echo $treaRow["treaName"]; ?></h3>
            <p> 智力+ <?=$treaRow["treaInt"]; ?>
                力量+ <?=$treaRow["treaStr"]; ?>
                敏捷+ <?=$treaRow["treaAgi"]; ?>
                幸運+ <?=$treaRow["treaLuk"]; ?></p>
            <img src="images//<?php echo $treaRow["treaImg"]; ?>" class="treaImg">
            
            <div class="treaRadar">
                <p>天賦分佈</p> 
            </div>
            <p>價格:<?php echo $treaRow["price"]; ?>G</p>
            <p>剩餘時間:<?php $saleTime = $treaRow["saleTime"];
                    $today3 = date("Y-m-d", strtotime('-2 days'));
                    echo(strtotime($saleTime) - strtotime($today3))/(60*60*24); ?>天</p>
        </div>


        <?php
                }
            }
        ?>
    </div>
    <?php
    try {
        $sql = " select * from treasurestorage r join treasurelist l on r.treaId = l.treaId";
        $treasurestorage = $pdo -> query($sql);
    } catch (PDOException $e) {
        $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
        $errMsg .= "行號 : ".$e -> getLine()."<br>";
        echo $errMsg;
    }

    ?>

    <div class="selltreabox">
        <div class="lightbox">
            <div class="popbg"></div>
            <div class="info">
                <div class="axis axis1"></div>
                <div class="axis axis2"></div>
                <div class="leaveBM"></div>
                <div class="paper">
                    <h2 class="titlePri" >新增商品</h2>
                    <p>1.請選擇欲出售的寶物</p>
                    <div class="holdtrea">
                        <p>寶物</p>
                        <div class="holdtrealist">
                            <?php
                                $memId = 'test01';//$_SESSION["memId"]
                                while ($treaRow = $treasurestorage -> fetch(PDO::FETCH_ASSOC)) {
                                    if ($treaRow["memId"] == $memId) {
                                        ?>
                            <?php $treaRow["treaName"]; ?>
                            <input class="storId" type="hidden" value="<?php echo $treaRow["storId"]; ?>">
                            <input class="treaId" type="hidden" value="<?php echo $treaRow["treaId"]; ?>">
                            <img class = "card" src="<?=$treaRow["treaImg"]; ?>" alt="" width="10%" hight="10%">
                           
                            
                            <?php
                                    }
                                }
                            ?>      
                        </div>

                        
                        <form class="flex" action="">
                            <div class="sellbid">
                                
                                <p>2.請輸入欲賣出售價</p>
                                <p>您的售價<input id="baprice" class="price" type="text" value="">G</p>
                                <p id="baprompt"class = "sellquotes"></p>

                                <input type="submit" style="display:none">
                                <!-- 送出玩家名字寶物編號價格背包寶物編號當下日期-->
                                
                            </div>

                            <div  class="balance">
                                <img id="baBase" class="base" src="base.png" alt="" width="30%">
                                <img id="baRod" class="rod" src="rod.png" alt="" width="80%">
                                <img id="baLcsl" class="lcsl" src="scales.png" alt="" width="20%">
                                <img id="baRcsl" class="rcsl" src="scales.png" alt="" width="20%">
                                <img id="batreasure" class="treasure" src="" alt="">
                                 <p id="bapromptprice" class="promptprice"></p><!-- 推薦價格-->
                            </div>
                            <div class="sellshelf">
                                <a id="sellshelfbtn" class="btnpri " href="#">
                                    <span>上架</span>
                                </a>
                                 
                            </div>
                            <p>上架期限: 72小時</p>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>
    <!-- <script src="js/balance.js"></script>
    <script src="js/black.js"></script> -->
    <!-- <script>
        $(document).ready(function(){
            // black
            var count = $('.treabuy').size();
            document.getElementById("sellnewbtn").addEventListener("click",selltreaboxopen);
            // document.getElementById("sellshelfbtn").addEventListener("click",selltreaboxclose);
            for(i=0; i <count; i++)
            document.getElementsByClassName("treabuy")[i].addEventListener("click",buy); 
            document.getElementsByClassName("successclose")[0].onclick =off; 
            document.getElementsByClassName("leave")[0].onclick =off;
            for(var j=0; j<=2; j++)
            document.getElementsByClassName("card")[j].onclick = getclick;
            document.getElementById("baprice").onkeyup = judge;
            document.getElementById("gosellpage").onclick = gosellpage;
            
        });
    </script> -->




    





            
            <!------------ 黑市在這 --------------------->
        </div>
        <div class="marMain shipYard">

        
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
                                    <img class="sYMerchHeadImg" merchId="1" src="image/product/100.png">
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
                                    <img class="sYMerchBodyImg" merchId="2" src="image/product/300.png">
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
                                    <img class="sYMerchSailImg" merchId="3" src="image/product/200.png">
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
                                    <img class="sYMerchHeadImg" merchId="5" src="image/product/101.png">
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
                                    <img class="sYMerchBodyImg" merchId="6" src="image/product/301.png">
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
                                    <img class="sYMerchSailImg" merchId="7" src="image/product/201.png">
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
                                    <img class="sYMerchHeadImg" merchId="8" src="image/product/102.png">
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
                                    <img class="sYMerchBodyImg" merchId="9" src="image/product/302.png">
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
                                    <img class="sYMerchSailImg" merchId="10" src="image/product/202.png">
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
                                    <img class="sYMerchHeadImg" merchId="<?php echo $headproductRow["modelId"]; ?>" src="image/product/<?php echo $headproductRow["modelImg"]; ?>">
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
                                    <img class="sYMerchBodyImg" merchId="<?php echo $bodyproductRow["modelId"]; ?>" src="image/product/<?php echo $bodyproductRow["modelImg"]; ?>">
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
                                    <img class="sYMerchSailImg" merchId="<?php echo $sailproductRow["modelId"]; ?>" src="image/product/<?php echo $sailproductRow["modelImg"]; ?>">
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
                                                                            <img class="previewHeadBox" src="image/product/">
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
                                                                            <img class="previewBodyBox" src="image/product/">
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
                                                                            <img class="previewSailBox" src="image/product/">
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
                                                                            <img class="previewHeadBox" src="image/product/<?php echo $wearingImg ?>">
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
                                                                            <img class="previewBodyBox" src="image/product/<?php echo $wearingImg ?>">
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
                                                                            <img class="previewSailBox" src="image/product/<?php echo $wearingImg ?>">
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
                                                                            <img class="previewHeadBox" src="image/product/100.png">
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
                                                                            <img class="previewBodyBox" src="image/product/300.png">
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
                                                                            <img class="previewSailBox" src="image/product/200.png">
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

                        <img id="sYHead" defaultId="100.png" src="image/product/100.png">
                        <img id="sYBody" defaultId="100.png" src="image/product/300.png">
                        <img id="sYSail" defaultId="100.png" src="image/product/200.png">
                        
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
                        <a href="shipRank.php">
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
    <script>

//     //  black
function selltreaboxopen(){

    document.getElementsByClassName("selltreabox")[0].style.display = "block";
    
}
function buy(e){
    var memMoney = parseInt(document.getElementById("memMoney").value);
    var buyprice = e.target.parentNode.parentNode.previousSibling.previousSibling.value;
    console.log(buyprice);
    
    if( memMoney >= buyprice){
        document.getElementsByClassName("buysucbox")[0].style.display = 'block'; // i代入這個頁面的第幾個燈箱
        e.target.parentNode.parentNode.parentNode.setAttribute("tradeId","tradeId");
    }else{
        alert('金錢不足');
    }
    
}
function off(){
    document.getElementsByClassName("buysucbox")[0].style.display = 'none';  // i代入這個頁面的第幾個燈箱

    var form = document.querySelectorAll("form");
    for(var i = 0; i < form.length; i++){
        if(form[i].hasAttribute("tradeId")){
            form[i].submit();
        }
    }
}
function gosellpage(){
    console.log("FF");
    if($('#gosellpage span').text() == "賣東西"){   
        $('#gosellpage span').text("返回黑市")
        document.getElementsByClassName("treawrap")[0].style.display = "none";
        document.getElementsByClassName("sellpage")[0].style.display = "flex";
    }else{
        $('#gosellpage span').text("賣東西");
        document.getElementsByClassName("sellpage")[0].style.display = "none";
        document.getElementsByClassName("treawrap")[0].style.display = "flex";
    }
    createbtn(btnsec);
 

}
{
}
document.getElementById("sellnewbtn").onclick = function(){
            console.log("wow");
            selltreaboxopen();
        }
function getclick(e){
    
    $('.card').css('border','');
    e.target.style.border = "2px solid red";
    document.getElementsByClassName("treasure")[0].src = e.target.src;
    $("#batreasure").css('visibility','none');
    var treaId = e.target.previousSibling.previousSibling.value;
    var storId = e.target.previousSibling.previousSibling.previousSibling.previousSibling.value;
    
	$.ajax({
        url: 'promptprice.php',
        data: {treaId:treaId,storId:storId,no:'1'},
        type: 'GET',
        success: function(data){
            var thistreaId = treaId;
            var thisstorId = storId;
            document.getElementById("sellshelfbtn").onclick = function(){
                var price = parseInt(document.getElementById("baprice").value);
                console.log(price);
                $.ajax({
                    url: 'promptprice.php',
                    data: {price:price,no:'0',treaId:thistreaId,storId:thisstorId},
                    type: 'GET',
                    success: function(data){
                        console.log(data);
                        document.getElementsByClassName("selltreabox")[0].style.display = "none";
                    },
                    error: function(e){
                        console.log(123);
                    }
                });
            };
            $('#bapromptprice').html(data);
            $('#baprice').val(data);
        },
    });
    // $.ajax.response;
     
    judge();
    document.getElementById("baprompt").innerHTML = "符合市場價格";
    document.getElementById("baRod").style.transform =`rotate(0deg)`;
    document.getElementById("baLcsl").style.top = "30%";
    document.getElementById("baRcsl").style.top = "30%";
    document.getElementById("batreasure").style.top = "45%";
    document.getElementById("bapromptprice").style.top = "60%";

}
    function blackMarketStart(){
        console.log(111);
        function gosellpage(){

            if($('#gosellpage span').text() == "賣東西"){   
                $('#gosellpage span').text("返回黑市")
                document.getElementsByClassName("treawrap")[0].style.display = "none";
                document.getElementsByClassName("sellpage")[0].style.display = "flex";
            }else{
                $('#gosellpage span').text("賣東西");
                document.getElementsByClassName("sellpage")[0].style.display = "none";
                document.getElementsByClassName("treawrap")[0].style.display = "flex";
            }
            createbtn(btnsec);
        }
        
        var count = $('.treabuy').size();
        // document.getElementById("sellnewbtn").addEventListener("click",selltreaboxopen);
        document.getElementById("sellnewbtn").onclick = function(){
            console.log("wow");
            selltreaboxopen();
        }
        // document.getElementById("sellshelfbtn").addEventListener("click",selltreaboxclose);
        for(i=0; i <count; i++){
            document.getElementsByClassName("treabuy")[i].addEventListener("click",buy); 
        }
        
        document.getElementsByClassName("successclose")[0].onclick =off; 
        document.getElementsByClassName("leaveBM")[0].onclick =off;
        
        for(var j=0; j<1; j++){
            document.getElementsByClassName("card")[j].onclick = function(){
                getclick();
            } 
            }
        
            function judge(){
    var price = document.getElementById("bapromptprice").innerHTML;
   
    var myprice = (document.getElementById("baprice").value - price); //$('#price').val();
    console.log(price);
    var rodrotate = -(myprice*0.05);
    var cslup = 30 - (myprice*0.035);
    var csldown = 30 + (myprice*0.035);
    var treaup = 45 - (myprice*0.035);
    var treadown = 45 + (myprice*0.035);
    var promptpriceup = 60 - (myprice*0.035);
    var promptpricedown = 60 + (myprice*0.035);

    if(myprice > price){
        document.getElementById("baprompt").innerHTML = "高於市場價格";
        document.getElementById("baRod").style.transform = "rotate("+ rodrotate +"deg)";
        document.getElementById("baLcsl").style.top = `${cslup}%`;
        document.getElementById("baRcsl").style.top = `${csldown}%`;
        document.getElementById("batreasure").style.top = `${treaup}%`;
        document.getElementById("bapromptprice").style.top = `${promptpricedown}%`;
    }
    else if(myprice < price){
        console.log(1);
        document.getElementById("baprompt").innerHTML = "低於市場價格";
        document.getElementById("baRod").style.transform = "rotate("+ rodrotate +"deg)";
        document.getElementById("baLcsl").style.top = `${csldown}%`;
        document.getElementById("baRcsl").style.top = `${cslup}%`;
        document.getElementById("batreasure").style.top = `${treadown}%`;
        document.getElementById("bapromptprice").style.top = `${promptpriceup}%`;
    }
    else{
        document.getElementById("baprompt").innerHTML = "符合市場價格";
        document.getElementById("baRod").style.transform =`rotate(0deg)`;
        document.getElementById("baLcsl").style.top = "30%";
        document.getElementById("baRcsl").style.top = "30%";
        document.getElementById("batreasure").style.top = "45%";
        document.getElementById("bapromptprice").style.top = "60%";
    }
}
        document.getElementById("baprice").onkeyup = judge;
        document.getElementById("gosellpage").onclick = function(){
            gosellpage();
        } 
    }

    blackMarketStart();
    
    </script>

    
    <script src="js/market.js"></script>
    <script src="js/login.js"></script>
    <script src="js/header.js"></script>
    <script src="js/verification.js"></script>
    <script src="js/compass.js"></script>
    <script src="js/reset.js"></script>
    <script src="js/getStatus.js"></script>
    <script src="js/balance.js"></script>
    <script src="js/black.js"></script>
    
    <script>
// var compass;
// var playTimeCount=0;
// var rankFly;
// var gameStartTimer;
// var bazierRank;
// var memId=$('#getSession').text();
// var memLv=parseInt($('#blueLv span').text());
// var memExp=parseInt($('#blueLv span').text());
// var memMoney=parseInt($('#blueLv span').text());
// var playedTimes=parseInt($('#blueGameTime span').text());
// var int=parseInt($('#blueInt span').text());
// var str=parseInt($('#blueStr span').text());
// var lcu=parseInt($('#blueLuck span').text());
// var agi=parseInt($('#blueAgi span').text());
// var rwd=$('#playTitleSec').width();
// memLv=100;
// memExp=100;
// memMoney=1000;
// playedTimes=2000;
// int=100;
// str=200;
// lcu=300;
// agi=400;


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
function selltreaboxopen(){

    document.getElementsByClassName("selltreabox")[0].style.display = "block";
    document.getElementsByClassName("selltreabox")[0].getElementsByClassName("lightbox")[0].style.display = "block";
    

}
document.getElementById("sellnewbtn").onclick = function(){

    selltreaboxopen();
}
</script>
</body>

</html>