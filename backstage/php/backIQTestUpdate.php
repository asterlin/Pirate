<?php
session_start();
$errMsg = "";
try{
  require_once("connectPirates.php");
  $sql = "update iqtest set testId = :testId, testText = :testText, point = :point, option1 = :option1, option2 = :option2, option3 = :option3, option4 = :option4, answer = :answer where testId = :testId;";
  $iqtest = $pdo->prepare($sql);
  

  $iqtest->bindValue(":testId",$_REQUEST["testId"]);
  $iqtest->bindValue(":testText",$_REQUEST["testText"]);
  $iqtest->bindValue(":point",$_REQUEST["point"]);
  $iqtest->bindValue(":option1",$_REQUEST["option1"]);
  $iqtest->bindValue(":option2",$_REQUEST["option2"]);
  $iqtest->bindValue(":option3",$_REQUEST["option3"]);
  $iqtest->bindValue(":option4",$_REQUEST["option4"]);
  $iqtest->bindValue(":answer",$_REQUEST["answer"]);
  $iqtest->execute();

}catch (PDOException $e) {
  $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
  $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}
  echo $errMsg;
?>