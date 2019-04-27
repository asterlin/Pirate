<?php
$errMsg = "";
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "UPDATE member SET intelligence = 45 WHERE memId = 'test03'";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(":intelligence",8);
  $statement->execute();  
  // echo "異動{$affectedRows}筆資料成功";
  $affectedRows = $pdo->exec( $sql );//下指令
  echo "異動{$affectedRows}筆資料成功";
}catch (PDOException $e) {
  $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
  $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}
  echo $errMsg;
?>