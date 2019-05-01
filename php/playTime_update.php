<?php
$errMsg = "";
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "update member set highscoreL=:highscoreL,playedTimes=playedTimes-1,memMoney=memMoney+:memMoney,memLv=:memLv,memExp=:memExp where memId=:memId";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(":highscoreL",$_REQUEST["highscoreL"]);
  $statement->bindValue(":memMoney",$_REQUEST["memMoney"]);
  $statement->bindValue(":memId",$_REQUEST["memId"]);
  $statement->bindValue(":memLv",$_REQUEST["memLv"]);
  $statement->bindValue(":memExp",$_REQUEST["memExp"]);
  
  $statement->execute();
}catch (PDOException $e) {
  $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
  $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}
  echo $errMsg;
?>