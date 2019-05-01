<?php
ob_start();
session_start();
?>
<?php
$errMsg = "";
try{
  require_once("../connectPirate.php");
  if ($_REQUEST["type"] == "prizeBonus") {
    $sql = "UPDATE member SET memMoney= memMoney+:prizeBonus WHERE memId =:memId ";
    $prize = $pdo->prepare($sql);
    $prize->bindValue(":prizeBonus",$_REQUEST["value"]);
    $prize->bindValue(":memId",$_SESSION["memId"]);
  } else {
    $sql = "INSERT INTO treasurestorage VALUES(:memId, :treaId, 1)";
    $prize = $pdo->prepare($sql);
    $prize->bindValue(":treaId",$_REQUEST["value"]);
    $prize->bindValue(":memId",$_SESSION["memId"]);
  }
  $prize->execute();

}catch (PDOException $e) {
  $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
  $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}
  echo $errMsg;
?>