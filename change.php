<?php
$salerId = $_REQUEST["salerId"];
$tradeId = $_REQUEST["tradeId"];
$treaprice = (int)$_REQUEST["price"];
$memMoney = (int)$_SESSION["memMoney"];
$memprice = ($memMoney - $treaprice);
$salerprice = ($memMoney + $treaprice);
$memId = 'ww';//$_SESSION['memId']
try{
    session_start();
    $date = date("Y-m-d");
    $memId = 'sasa'; //$_SESSION["memId"]
    require_once("backstage/php/connectPirates.php");
    $sql = "UPDATE traderecord SET buyerId = 'ww',tradeTime = '$date' where tradeId= '$tradeId'";
    $traderecord = $pdo->exec( $sql );

    $sql = "UPDATE member SET memMoney = 600 where memId= '$memId'";//$memprice
    $member = $pdo->exec( $sql );

    $sql = "UPDATE member SET memMoney = 500 where memId= '$salerId'";//$salerprice
    $member = $pdo->exec( $sql );
    header("Location:black.php");
  
  }catch(PDOException $e){
    
  }

    
?>

