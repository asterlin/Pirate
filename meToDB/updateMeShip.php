<?php
session_start();
// exit("hello");
// $memId = '$_REQUEST["memId"]';
$errMsg = "";
$_SESSION["memId"] = "test03";  //........................should delete this line
$wearList = $_REQUEST["wearList"];
// exit($_SESSION["memId"]);
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "update mycustom set wearing = 1 where modelId in ($wearList) and memId = :memId;
  update mycustom set wearing = 0 where modelId not in ($wearList) and memId = :memId;";
  
  $mycustom = $pdo->prepare( $sql );
  $mycustom -> bindValue( ":memId", $_SESSION["memId"] );
  $mycustom -> execute( );
  echo "OK";
}catch(PDOException $e){
  echo $e->getMessage();
}
?>