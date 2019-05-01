<?php
ob_start();
session_start();
?>
<?php
$errMsg = "";
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "update member set intelligence = :int,strength = :str,agile = :agi, luck = :lcu,memLv = 7,memExp = 0,memMoney = 1000,playedTimes = 5 where memId = :memId";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(":int",$_REQUEST["int"]);
  $statement->bindValue(":str",$_REQUEST["str"]);
  $statement->bindValue(":agi",$_REQUEST["agi"]);
  $statement->bindValue(":lcu",$_REQUEST["lcu"]);
  $statement->bindValue(":memId",$_SESSION["memId"]);
  $statement->execute();
  
}catch (PDOException $e) {
  $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
  $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}
  echo $errMsg;
?>