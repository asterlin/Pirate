<?php
session_start();
$salerId = $_REQUEST["salerId"];
$errMsg = '';
$buymemMoney = 0;
try {
	require_once("backstage/php/connectPirates.php");
    $sql = "select * from member where memId = '$salerId'";
    $member=$pdo->query($sql);
} catch (PDOException $e) {

    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    echo $errMsg;
}
while( $tradRow = $member->fetch(PDO::FETCH_ASSOC)){ 
    
  $buymemMoney = $tradRow["memMoney"];}



$tradeId = $_REQUEST["tradeId"];
$treaprice = (int)$_REQUEST["price"];
$memMoney = (int)$_SESSION["memMoney"];
$memprice = ($memMoney - $treaprice);
$salerprice = ($buymemMoney + $treaprice);
$memId = $_SESSION['memId'];//$_SESSION['memId']
$_SESSION['memMoney'] = $memprice;

 



try{
    
    $date = date("Y-m-d");
    $memId = $_SESSION['memId']; //$_SESSION["memId"]
    require_once("backstage/php/connectPirates.php");
    $sql = "UPDATE traderecord SET buyerId = 'ww',tradeTime = '$date' where tradeId= '$tradeId'";
    $traderecord = $pdo->exec( $sql );

    $sql = "UPDATE member SET memMoney = $memprice where memId= '$memId'";//$memprice
    $member = $pdo->exec( $sql );

    $sql = "UPDATE member SET memMoney = $salerprice where memId= '$salerId'";//$salerprice
    $member = $pdo->exec( $sql );
    header("Location:black.php");
  
  }catch(PDOException $e){
    
  }

    
?>

