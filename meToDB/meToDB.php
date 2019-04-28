<?php
    try {
        require_once("backstage/php/connectPirates.php");

        //交易紀錄變數命名
        $traderecord = "select * from traderecord JOIN treasurelist ON traderecord.treaId = treasurelist.treaId ";
        $traderecord = $pdo->query($traderecord);

        $traderecord->bindColumn("buyerId", $buyerId);
        $traderecord->bindColumn("treaName", $treaName);
        $traderecord->bindColumn("saleTime", $saleTime);
        $traderecord->bindColumn("salerId", $salerId);
        $traderecord->bindColumn("tradeTime", $tradeTime);
        $traderecord->bindColumn("price", $price);
        $traderecord->execute();

        
        //發文紀錄變數命名
        $articlelist = "select * from articlelist ";
        $articlelist = $pdo->query($articlelist);

        $articlelist->bindColumn("memId", $memId);
        $articlelist->bindColumn("artTitle", $artTitle);
        $articlelist->bindColumn("artTime", $artTime);
        $articlelist->bindColumn("msgAmt", $msgAmt);
        $articlelist->bindColumn("clickAmt", $clickAmt);
        $articlelist->bindColumn("artId", $artId);
        $traderecord->execute();



        //持有造型變數命名
        $mycustom = "select * from customlist JOIN mycustom ON customlist.modelId = mycustom.modelId ";
        $mycustom = $pdo->query($mycustom);

        $mycustom->bindColumn("memId", $memId);
        $mycustom->bindColumn("modelImg", $modelImg);
        $mycustom->bindColumn("modelPart", $modelPart);
        $mycustom->execute();

    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>";
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }

    echo $errMsg;
?>

