<?php
$errMsg = "";
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "update mycustom set wearing=:wearing where memId='test03'";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(":wearing",$_REQUEST["wearing"]);
  // $statement->bindValue(":memId",$_REQUEST["memId"]);
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