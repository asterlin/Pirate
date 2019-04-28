<?php 
    session_start();

    try{
        require_once('backstage/php/connectPirates.php');

            $sql = "update member set memId=:memId, memPsw=:memPsw, memNic=:memNic,
        
        $member = $pdo->prepare($sql);
        $member->bindValue(":memId",$_POST["memId"]);
        $member->bindValue(":memPsw",$_POST["memPsw"]);
        $member->bindValue(":memNic",$_POST["memNic"]);
        $member->execute();
        // echo 'true';
    }catch(PDOException $e){
        echo "失敗",$e->getMessage();
        echo "行號",$e->getLine();
        // echo "QQ";
    }
?>