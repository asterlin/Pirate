<?php
    try {
        require_once("backstage/php/connectPirates.php");

        //交易紀錄變數命名------------------------------------------------------------------------
        $traderecord = "select * from traderecord JOIN treasurelist ON traderecord.treaId = treasurelist.treaId ";
        $traderecord = $pdo->query($traderecord);

        $traderecord->bindColumn("buyerId", $buyerId); //自己的ID
        $traderecord->bindColumn("treaName", $treaName); //寶物名稱
        $traderecord->bindColumn("saleTime", $saleTime);//上架時間
        $traderecord->bindColumn("salerId", $salerId); //買方ID
        $traderecord->bindColumn("tradeTime", $tradeTime);//交易時間
        $traderecord->bindColumn("price", $price);//價錢
        $traderecord->execute();
        //----------------------------------------------------------------------------------------
        

        //發文紀錄變數命名--------------------------------------------------------------------------
        $articlelist = "select * from articlelist ";
        $articlelist = $pdo->query($articlelist);

        // $articlelist->bindColumn("memId", $memId);//發文ID
        $articlelist->bindColumn("artTitle", $artTitle);//發文主題
        $articlelist->bindColumn("artTime", $artTime);//發文時間
        $articlelist->bindColumn("msgAmt", $msgAmt);//討論人數
        $articlelist->bindColumn("clickAmt", $clickAmt);//點擊次數
        $articlelist->bindColumn("artId", $artId);//文章流水號
        $traderecord->execute();
        //------------------------------------------------------------------------------------------


        //持有造型變數命名-------------------------------------------------------------------------------
        $mycustom = "select * from customlist JOIN mycustom ON customlist.modelId = mycustom.modelId ";
        $mycustom = $pdo->query($mycustom);

        // $mycustom->bindColumn("memId", $memId);//持有者ID
        $mycustom->bindColumn("modelImg", $modelImg);//造型圖
        $mycustom->bindColumn("modelPart", $modelPart);//類別
        $mycustom->execute();
        //-----------------------------------------------------------------------------------------------


        //持有寶物變數命名---------------------------------------------------------------------------------
        $treasurestorage = "select * from treasurestorage JOIN treasurelist ON treasurestorage.treaId = treasurelist.treaId ";
        $treasurestorage = $pdo->query($treasurestorage);

        // $treasurestorage->bindColumn("memId", $memId);//持有者ID
        $treasurestorage->bindColumn("treaName", $treaName);//寶物名
        $treasurestorage->bindColumn("treaImg", $treaImg);//寶物圖
        $treasurestorage->bindColumn("treaStr", $treaStr);//力量
        $treasurestorage->bindColumn("treaInt", $treaInt);//智力
        $treasurestorage->bindColumn("treaAgi", $treaAgi);//敏捷
        $treasurestorage->bindColumn("treaLuk", $treaLuk);//幸運
        $treasurestorage->execute();
        //--------------------------------------------------------------------------------------------------
        
    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>";
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    }

    echo $errMsg;
?>

