<?php
 ob_start();
 session_start();
 $errMsg = "";

 try {
    require_once("php/connectPirates.php");
    $sql = "update manager set managerStatus = :managerStatus where managerAcc = :managerAcc";
    $manager = $pdo->prepare($sql);
    $manager -> bindValue(':managerStatus', $_REQUEST['managerStatus']);
    $manager -> bindValue(':managerAcc',  $_REQUEST['managerAcc']);
    $manager ->execute();
    echo "<script>alert('成功修改管理員狀態 ~');location.href='backManager.php';</script>";
} catch (PDOException $e) {
    $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>";
    $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
    echo $errMsg;
}
 ?>
