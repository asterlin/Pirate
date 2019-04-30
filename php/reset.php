<?php
$errMsg = "";
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "updateintelligence=:intelligence,strength=:strength,agile=:agile,luck=:luck where memId=:memId" member set playedTimes=:playedTimes,memMoney=:memMoney,memLv=:memLv,memExp=:memExp,;
  $statement = $pdo->prepare($sql);
  $statement->bindValue(":memId",$_REQUEST["memId"]);
  $statement->bindValue(":playedTimes",$_REQUEST["playedTimes"]);
  $statement->bindValue(":memMoney",$_REQUEST["memMoney"]);
  $statement->bindValue(":memLv",$_REQUEST["memLv"]);
  $statement->bindValue(":memExp",$_REQUEST["memExp"]);
  $statement->bindValue(":intelligence",$_REQUEST["int"]);
  $statement->bindValue(":strength",$_REQUEST["str"]);
  $statement->bindValue(":agile",$_REQUEST["agi"]);
  $statement->bindValue(":luck",$_REQUEST["lcu"]);
  $statement->execute();
  // 

  // echo "異動{$affectedRows}筆資料成功";
  $affectedRows = $pdo->exec( $sql );//下指令
  echo "異動{$affectedRows}筆資料成功";
}catch (PDOException $e) {
  $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
  $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}
  echo $errMsg;
?>