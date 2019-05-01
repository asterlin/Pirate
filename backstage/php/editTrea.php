<?php

$doType = $_GET["doType"];
$treaId = $_GET["treaId"];
$treaName = $_GET["treaName"];
$treaImg = $_GET["treaImg"];
$treaInt = $_GET["treaInt"];
$treaStr = $_GET["treaStr"];
$treaAgi = $_GET["treaAgi"];
$treaLuk = $_GET["treaLuk"];
$saleYN = $_GET["saleYN"];
try {
    if ($doType=='insert') {
        require_once("connectPirates.php");
        $sqlIns = "INSERT INTO treasurelist (treaName,treaImg,treaInt,treaStr,treaAgi,treaLuk,treaStatus) VALUES (:treaName,:treaImg,:treaInt,:treaStr,:treaAgi,:treaLuk,:saleYN);";
        $treaIns = $pdo->prepare($sqlIns);
        $treaIns->bindValue(":treaName", $treaName);
        $treaIns->bindValue(":treaImg", $treaImg);
        $treaIns->bindValue(":treaInt", $treaInt);
        $treaIns->bindValue(":treaStr", $treaStr);
        $treaIns->bindValue(":treaAgi", $treaAgi);
        $treaIns->bindValue(":treaLuk", $treaLuk);
        $treaIns->bindValue(":saleYN", $saleYN);
		$treaIns->execute();
		
	}elseif ($doType=='delete') {
		require_once("connectPirates.php");
        $sqlDel = "DELETE FROM treasurelist WHERE treaName=:treaName";
        $treaDel = $pdo->prepare($sqlDel);
        $treaDel->bindValue(":treaName", $treaName);
		$treaDel->execute();
		
	}elseif ($doType=='update') {
		require_once("connectPirates.php");
        $sqlUpd = "UPDATE treasurelist SET treaName=:treaName, treaImg=:treaImg,treaInt=:treaInt, treaStr=:treaStr, treaAgi=:treaAgi, treaLuk=:treaLuk,treaStatus=:saleYN WHERE treaId=:treaId;";
        $treaUpd = $pdo->prepare($sqlUpd);
        $treaUpd->bindValue(":treaName", $treaName);
        $treaUpd->bindValue(":treaImg", $treaImg);
        $treaUpd->bindValue(":treaInt", $treaInt);
        $treaUpd->bindValue(":treaStr", $treaStr);
        $treaUpd->bindValue(":treaAgi", $treaAgi);
        $treaUpd->bindValue(":treaLuk", $treaLuk);
        $treaUpd->bindValue(":saleYN", $saleYN);
        $treaUpd->bindValue(":treaId", $treaId);
        $treaUpd->execute();
        
        
	// }
	

} catch (PDOException $e) {
    echo $e->getMessage();
    echo "error";
}
?>
