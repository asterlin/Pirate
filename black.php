
<?php 
$errMsg = '';
try {
	require_once("backstage/php/connectPirates.php");
    $sql = "select * from traderecord where buyerId IS NULL";
    $traderecord=$pdo->query($sql);
} catch (PDOException $e) {

    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo $errMsg;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>大海賊帝國</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/wavebtn.css">
    <link rel="stylesheet" href="css/balance.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/black.css">
    <link rel="stylesheet" href="css/lightbox.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <!-- <script src="js/black.js"></script> -->
    <!-- <script src="js/balance.js"></script> -->
    

</head>
<body>
    <?php require_once('header.php') ?>
    <h1 class="titlePri top">海上市集</h1>
    <div class="marTitBox">
        
        <a class=" marTitInBox" href="black.php">
            <h2 class="marTypeTit titleSec">黑市</h2>
        </a>
        <a class=" marTitInBox" href="market.php">

            <h2 class="marTypeTit titleSec">造船廠</h2>
        </a>
        <div class="clearfix"></div>
    </div>
    <div class="marMain blackMarket">
    <div class="black">
    <div class="gosellpagewrap">
        <a id="gosellpage" class="btnsec " href="#">
            <span>販賣寶物</span>
        </a>
    </div>
    
    <div class="treawrap flex"> 
        <div class="filterCheck " style="display:none">
            <input class="treaCheckbox" type="checkbox" value="treaInt" name="ckbox0"><label>智力</label>
            <input class="treaCheckbox" type="checkbox" value="treaStr" name="ckbox1"><label>力量</label>
            <input class="treaCheckbox" type="checkbox" value="treaAgi" name="ckbox2"><label>敏捷</label>
            <input class="treaCheckbox" type="checkbox" value="treaLuk" name="ckbox2"><label>幸運</label>
        </div>
<?php 
	while( $tradRow = $traderecord->fetch(PDO::FETCH_ASSOC)){ 
    
        $saleTime = $tradRow["saleTime"];
        $today3 = date("Y-m-d", strtotime('-2 days'));
        $remaining = (strtotime( $saleTime) - strtotime($today3))/(60*60*24);
        if($remaining <= 3 and $remaining >= 0 and $tradRow['salerId']!= $_SESSION["memId"]){//$_SESSION["memId"]
        
?>

<?php 
    session_start();
    echo $filterCheck;
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
}
?>

<?php 

while( $treaRow = $treasurelist->fetch(PDO::FETCH_ASSOC)){
    $count+=1; 
        if($treaRow["treaStatus"] == 1 ){ 
             
?>
    
            
        <div class="textS treaRecommend col-12 col-md-4 col-xl-3">
            <h3 class="treaName"><?php echo $treaRow["treaName"]; ?></h3>
            <div class="salerId">
                <span>賣家:<?php echo $tradRow["salerId"]; ?></span>
            </div>
            <p>智力+ <?=$treaRow["treaInt"];?>
                    力量+ <?=$treaRow["treaStr"];?>
                    敏捷+ <?=$treaRow["treaAgi"];?>
                    幸運+ <?=$treaRow["treaLuk"];?></p>
            <img src="image/treasure/<?php echo $treaRow["treaImg"];?>" class="treaImg">
            <div class="treaRadar">
                <p>天賦分佈</p> 
            </div>
            <p>價格:<?php echo $tradRow["price"]; ?>G</p>
            <p>剩餘時間:<?php $saleTime = $tradRow["saleTime"];
                $today3 = date("Y-m-d", strtotime('-3 days'));
                echo (strtotime( $saleTime) - strtotime($today3))/(60*60*24);
            ?>天</p>

            <form action="change.php" class="treachange">
                <input type="hidden" name="salerId" value="<?php echo $tradRow["salerId"]; ?>">
                <input class="tradeId" type="hidden" name="tradeId" value=<?php echo $tradRow["tradeId"];?>>
                <input class="price" type="hidden" name="price" value=<?php echo $tradRow["price"];?>>
                <input type="submit" style="display:none">
                <input id="memMoney" type="hidden" value= "<?php echo $_SESSION["memMoney"];?>">
                <input type="hidden" value="<?php echo $tradRow["price"]; ?>">
                <div class="treabuywrap">
                    <a class="btnpri treabuy" >
                        <span>購買</span>
                    </a>
                </div>
            </form>
        </div>
        <?php  
        }}
        ?>
    
    
    <?php
        }}
    ?>
    </div>
    
    <div class="lightbox buysucbox" ><!-- 購買燈箱 -->
        <div class="popbg"></div>
        <div class="info">
            <div class="axis axis1"></div>
            <div class="axis axis2"></div>
            <div class="leave"></div>
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
            session_start();
            
            try {
                $memId = $_SESSION["memId"];//$_SESSION["memId"]
                $sql = " select * from traderecord r join treasurelist l on r.treaId = l.treaId";
                $traderecords = $pdo -> query($sql);
            } catch (PDOException $e) {
                $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
                $errMsg .= "行號 : ".$e -> getLine()."<br>";
                echo $errMsg;
                
            }
        ?>


        <?php 
        
            while( $treaRow = $traderecords -> fetch(PDO::FETCH_ASSOC)){ 
                $saleTime = $treaRow["saleTime"];
                $today3 = date("Y-m-d", strtotime('-2 days'));
                $remaining = (strtotime( $saleTime) - strtotime($today3))/(60*60*24);
                if($treaRow["treaStatus"] == 1 and $treaRow["salerId"] == $memId and $treaRow["buyerId"] == NULL and $remaining <= 3 and $remaining >= 0){  
        ?>
        
        <div class="treaRecommend col-12 col-md-4 col-xl-3">
            <h3 class="treaName"><?php echo $treaRow["treaName"]; ?></h3>
            <p> 智力+ <?=$treaRow["treaInt"];?>
                力量+ <?=$treaRow["treaStr"];?>
                敏捷+ <?=$treaRow["treaAgi"];?>
                幸運+ <?=$treaRow["treaLuk"];?></p>
            <img src="image/treasure/<?php echo $treaRow["treaImg"];?>" class="treaImg" >
            
            <div class="treaRadar">
                <p>天賦分佈</p> 
            </div>
            <p>價格:<?php echo $treaRow["price"]; ?>G</p>
            <p>剩餘時間:<?php $saleTime = $treaRow["saleTime"];
                $today3 = date("Y-m-d", strtotime('-3 days'));
                echo (strtotime( $saleTime) - strtotime($today3))/(60*60*24);
            ?>天</p>
        </div>


        <?php
             }}
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
        <div class="lightbox ">
            <div class="popbg"></div>
            <div class="info">
                <div class="axis axis1"></div>
                <div class="axis axis2"></div>
                <div id="selltreaclose" class="leave"></div>
                <div class="paper">
                    <h2 class="titlePri" >新增商品</h2>
                    <p>1.請選擇欲出售的寶物</p>
                    <div class="holdtrea">
                        <p>寶物</p>
                        <div class="holdtrealist">
                            <?php
                                $memId = $_SESSION["memId"];
                                while( $treaRow = $treasurestorage -> fetch(PDO::FETCH_ASSOC)){ 
                                if($treaRow["memId"] == $memId){
                            ?>
                            <?=$treaRow["treaName"];?>
                            <input class="storId" type="hidden" value="<?=$treaRow["storId"];?>">
                            <input class="treaId" type="hidden" value="<?=$treaRow["treaId"];?>">
                            <img class = "card" src="image/treasure/<?=$treaRow["treaImg"];?>" alt="" width="10%" hight="10%">
                           
                            
                            <?php
                                }}
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
                                <img id="baBase" class="base" src="image/black/base.png" alt="" width="30%">
                                <img id="baRod" class="rod" src="image/black/rod.png" alt="" width="80%">
                                <img id="baLcsl" class="lcsl" src="image/black/scales.png" alt="" width="20%">
                                <img id="baRcsl" class="rcsl" src="image/black/scales.png" alt="" width="20%">
                                <img id="batreasure" class="treasure" src="" alt="">
                                 <p id="bapromptprice" class="promptprice"></p><!-- 推薦價格-->
                            </div>
                            <div class="sellshelf">
                                <a id="sellshelfbtn" class="btnpri " href="#">
                                    <span>上架</span>
                                </a>
                                <a id="selloffbtn" class="btnpri " href="#">
                                    <span>取消</span>
                                </a>
                                 
                            </div>
                            <p>上架期限: 72小時</p>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </div>

    <script>

        $(document).ready(function(){
          

            // black
            var count = $('.treabuy').size();
            var count5 = $('.card').size();
            console.log(count5);
            document.getElementById("sellnewbtn").addEventListener("click",selltreaboxopen);
            // document.getElementById("sellshelfbtn").addEventListener("click",selltreaboxclose);
            for(i=0; i <count; i++)
            document.getElementsByClassName("treabuy")[i].addEventListener("click",buy); 
            document.getElementsByClassName("successclose")[0].onclick =off; 
            document.getElementsByClassName("leave")[0].onclick =off;

            
            for(var j=0; j <= (count5-1); j++)
            document.getElementsByClassName("card")[j].onclick = getclick;
            document.getElementById("baprice").onkeyup = judge;
            document.getElementById("gosellpage").onclick = gosellpage;
            
        });
    </script>
    </div>
    </div>
    <?php require_once('footer.php') ?>
    <?php require_once('lightbox.php') ?>


</body>
</html>


    
<script src="js/verification.js"></script>
<script src="js/balance.js"></script>
<script src="js/black.js"></script>
<script src="js/wavebtn.js"></script>





