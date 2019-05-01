<?php
$memId = $_REQUEST["signmemId"];
$memPsw = $_REQUEST["signmemPsw"];
$errMsg = "";
try {
    require_once("backstage/php/connectPirates.php");
    $sql = "select * from member where memId=:memId and memPsw=:memPsw"; //''
    $member = $pdo->prepare( $sql ); //先編譯好
    $member->bindValue(":memId", $memId); //代入資料
    $member->bindValue(":memPsw", $memPsw);
    $member->execute();//

    if( $member->rowCount() == 0 ){//找不到
        echo 0;
        $errMsg .= "帳密錯誤, <a href='signUp.html'>重新登入</a><br>";
    }else{
        $arr = [];
        $memRow = $member->fetch(PDO::FETCH_ASSOC);
        $arr[] = $memRow;
        echo json_encode($arr);
        //登入成功,將登入者的資料寫入session
        session_start();
        $_SESSION["memId"] = $memRow["memId"];
        $_SESSION["memPsw"] = $memRow["memPsw"];
        $_SESSION["memNic"] = $memRow["memNic"];
        $_SESSION["memLv"] = $memRow["memLv"];
        $_SESSION["memExp"] = $memRow["memExp"];
        $_SESSION["memMoney"] = $memRow["memMoney"];
        $_SESSION["intelligence"] = $memRow["intelligence"];
        $_SESSION["strength"] = $memRow["strength"];
        $_SESSION["agile"] = $memRow["agile"];
        $_SESSION["luck"] = $memRow["luck"];
        $_SESSION["shipTotalVote"] = $memRow["shipTotalVote"];
        $_SESSION["shipImgAll"] = $memRow["shipImgAll"];
        $_SESSION["avatarImg"] = $memRow["avatarImg"];
        $_SESSION["playedTimes"] = $memRow["playedTimes"];
        $_SESSION["talentPointsRemain"] = $memRow["talentPointsRemain"];
    }
} catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
}
?>  
