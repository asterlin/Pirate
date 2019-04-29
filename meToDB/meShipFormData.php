<?php
    session_start();

    try {
        require_once("../backstage/php/connectPirates.php");
        $sql = "update member set memPsw = :memPsw where memId = :memId ";
        
        $member = $pdo->prepare($sql);
        $member->bindValue(':memPsw', $_REQUEST['memPsw']);
        $member->bindValue(':memId', $_REQUEST['memId']);
        // $member->bindValue(':memNic', $_REQUEST['memNic']);
        $member->execute();
    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>";
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
        echo $errMsg;
    }
