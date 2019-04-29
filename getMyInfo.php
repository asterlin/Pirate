<?php
$errMsg = "";
    try{
        require_once("backstage/php/connectPirates.php");
        $sql = "select * from member where memId=:memId";
        $getMyInfo = $pdo->prepare($getMyInfo);
        $addClickAmt->bindValue(":memId", $_REQUEST["memId"]);
        $getMyInfo->execute();
        $getMyInfoRow = $getMyInfo->fetch(PDO::FETCH_ASSOC);
        echo json_encode($getMyInfoRow);
    }catch(PDOException $e){
        echo $e->getMessage();
        };
?>
