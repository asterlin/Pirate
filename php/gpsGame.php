<?php
ob_start();
session_start();
?>
<?php
$errMsg = "";
$_SESSION["memId"]= "test01";
try{
  require_once("../connectPirates.php");
  if ($_REQUEST["treaId"] == undefined) {
    $sql = "UPDATE member SET memMoney= memMoney+:prizeBonus WHERE memId =:memId ";
    $prize = $pdo->prepare($sql);
    $prize->bindValue(":prizeBonus",$_REQUEST["prizeBonus"]);
    $prize->bindValue(":memId",$_SESSION["memId"]);
  } else {
    $sql = "INSERT INTO treasurestorage VALUES( :memId, :treaId, NULL";
    $prize = $pdo->prepare($sql);
    $prize->bindValue(":treaId",$_REQUEST["treaId"]);
    $prize->bindValue(":memId",$_SESSION["memId"]);
  }
  $prize->execute();

  // echo "異動{$affectedRows}筆資料成功";
  $prizeRows = $pdo->exec( $sql );//下指令
  echo "異動{$prizeRows}筆資料成功";
}catch (PDOException $e) {
  $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>"; 
  $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}
  echo $errMsg;
?>