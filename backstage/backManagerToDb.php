<?php
 ob_start();
 session_start();
//  header("location:backManager.php");

 $errMsg = "";

 try {
     require_once("php/connectPirates.php");
     $sql = "select * from manager where managerAcc = :managerAcc";
     $manager = $pdo->prepare($sql);
     $manager -> bindValue(':managerAcc', $_REQUEST['managerAcc']);
     $manager ->execute();

     if ($manager -> rowCount() != 0) {
        //  echo "false";
     } else {
         $sql = "insert into manager values(:managerAcc, :managerPsw, now(), 1)";
         $manager = $pdo -> prepare($sql);
         $manager -> bindValue(':managerAcc', $_REQUEST['managerAcc']);
         $manager -> bindValue(':managerPsw', $_REQUEST['managerPsw']);
         $manager -> execute();
         header('location:backManager.php');
     }

 } catch (PDOException $e) {
     $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>";
     $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
     echo $errMsg;
 }
