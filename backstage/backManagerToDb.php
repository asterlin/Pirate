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

    //  $today = getdate();
    //  date("Y-m-d");  //日期格式化
    //  $year = $today["year"]; //年
    //  $month = $today["mon"]; //月
    //  $day = $today["mday"];  //日
    //  $hours = $today["hours"]; //時
    //  $minutes = $today["minutes"]; //分
    //  $seconds = $today["seconds"]; //秒
    //  $today_date = $year."-".$month."-".$day." ".$hours.":".$minutes.":".$seconds;

    //  echo $today_date;
    //  exit();

    //  $tradeTime;
    //  $tradeTime = new Date();
    //  $tradeTime = tradeTime.getFullYear() + '-' +
    //      ('00' + (tradeTime.getMonth() + 1)).slice(-2) + '-' +
    //      ('00' + tradeTime.getDate()).slice(-2) + ' ' +
    //      ('00' + tradeTime.getHours()).slice(-2) + ':' +
    //      ('00' + tradeTime.getMinutes()).slice(-2) + ':' +
    //      ('00' + tradeTime.getSeconds()).slice(-2);
  
     if ($manager -> rowCount() != 0) {
         echo "false";
     } else {
         $sql = "insert into manager values(:managerAcc, :managerPsw, now(), 1)";
         $manager = $pdo -> prepare($sql);
         $manager -> bindValue(':managerAcc', $_REQUEST['managerAcc']);
         $manager -> bindValue(':managerPsw', $_REQUEST['managerPsw']);
         $manager -> execute();
     }
 } catch (PDOException $e) {
     $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>";
     $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
     echo $errMsg;
 }
