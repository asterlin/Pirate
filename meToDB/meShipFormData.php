<?php
    session_start();

    try {
        require_once("../backstage/php/connectPirates.php");
        $sql = "update member set memPsw=:memPsw,intelligence=:int,strength=:str,agile=:age,luck=:lck,talentPointsRemain=:points where memId=:memId";
        
        $member = $pdo->prepare($sql);
        $member->bindValue(':memId', $_REQUEST['memId']);
        $member->bindValue(':memPsw', $_REQUEST['memPsw']);
        $member->bindValue(':int', $_REQUEST['int']);
        $member->bindValue(':str', $_REQUEST['str']);
        $member->bindValue(':age', $_REQUEST['age']);
        $member->bindValue(':lck', $_REQUEST['lck']);
        $member->bindValue(':points', $_REQUEST['points']);
        $member->execute();
    } catch (PDOException $e) {
        $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>";
        $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
        echo $errMsg;
    }
