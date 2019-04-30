<?php

$buyCount = $_GET["buyCount"];          //購買商品數
$memId = $_GET["memId"];                //使用者 Id
$tradeTime = $_GET["tradeTime"];        //交易時間
$wearing = $_GET["wearing"];            //是否穿著商品

$wearHead = $_GET["wearHead"];          //穿著商品 Id
$wearBody = $_GET["wearBody"];          //穿著商品 Id
$wearSail = $_GET["wearSail"];          //穿著商品 Id

//直接購買
if($buyCount == 0){

    $ModelId = $_GET["ModelId"];
    $tradePrice = $_GET["tradePrice"];

    try {

        require_once("connectPirates.php");
        $sqlBuy = "INSERT INTO mycustom (memId,ModelId,tradeTime,wearing) VALUES ('$memId',$ModelId,'$tradeTime',$wearing);";
        $pdo->exec($sqlBuy);

        $sqlCost = "UPDATE member SET memMoney=memMoney-$tradePrice  WHERE memId='$memId'";
        $pdo->exec($sqlCost);

        if($wearing == 1) {
            $sqlWearDisable = "UPDATE mycustom SET wearing=0  WHERE memId='$memId'";
            $pdo->exec($sqlWearDisable);

            $sqlWearInable = "UPDATE mycustom SET wearing=1  WHERE (memId='$memId' and ModelId=$wearHead);
                UPDATE mycustom SET wearing=1 WHERE (memId='$memId' and  ModelId=$wearBody);
                UPDATE mycustom SET wearing=1  WHERE (memId='$memId' and  ModelId=$wearSail)";
            $pdo->exec($sqlWearInable);
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo "error";
    }

//一鍵購買
}elseif ($buyCount > 0) {
    $ModelId[0] = $_GET["ModelIdFirst"];                        //商品 a ID
    $tradePriceFirst = $_GET["tradePriceFirst"];                //商品 a 價格
    $ModelId[1] = $_GET["ModelIdSec"];                          //商品 b ID
    $tradePriceSec = $_GET["tradePriceSec"];                    //商品 b 價格
    $ModelId[2] = $_GET["ModelIdThird"];                        //商品 c ID
    $tradePriceThird = $_GET["tradePriceThird"];                //商品 c 價格
    $tradePrice = $tradePriceFirst+$tradePriceSec+$tradePriceThird;//交易總價格
    
    try {

        require_once("connectPirates.php");

        for($i=2;$i>=0;$i--){
            $ModelIds = $ModelId[$i];
            if($ModelIds != 0){
                $sqlBuy = "INSERT INTO mycustom (memId,ModelId,tradeTime,wearing) VALUES ('$memId',$ModelIds,'$tradeTime', $wearing);"; //
                $pdo->exec($sqlBuy);
            }
        }

        $sqlCost = "UPDATE member SET memMoney=memMoney-$tradePrice  WHERE memId='$memId'";
        $pdo->exec($sqlCost);

        if($wearing == 1) {
           
            $sqlWearDisable = "UPDATE mycustom SET wearing=0  WHERE memId='$memId'";    //把使用者所有穿著取消
            $pdo->exec($sqlWearDisable);

            $sqlWearInable = "";

            if($wearHead!==0){
                $sqlWearInable .=  "UPDATE mycustom SET wearing=1  WHERE (memId='$memId' and ModelId=$wearHead);";//再把使用者選取商品穿著上去
            }
            if($wearBody!==0){
                $sqlWearInable .= "UPDATE mycustom SET wearing=1 WHERE (memId='$memId' and  ModelId=$wearBody);";
            }
            if($wearSail!==0){
                $sqlWearInable .=  "UPDATE mycustom SET wearing=1  WHERE (memId='$memId' and  ModelId=$wearSail);";
            }

            $pdo->exec($sqlWearInable);
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo "error";
    }

}
?>