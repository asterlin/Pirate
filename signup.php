<?php
$memId = $_POST["memId"];
$memPsw = $_POST["memPsw"];
$errMsg = "";
try {
    require_once("backstage/php/connectPirates.php");
    $sql = "select * from member where memId=:memId and memPsw=:memPsw"; //''
    $member = $pdo->prepare( $sql ); //先編譯好
    $member->bindValue(":memId", $memId); //代入資料
    $member->bindValue(":memPsw", $memPsw);
    $member->execute();//執行之

    if( $member->rowCount() == 0 ){//找不到
        $errMsg .= "帳密錯誤, <a href='signUp.html'>重新登入</a><br>";
    }else{
        $memRow = $member->fetch(PDO::FETCH_ASSOC);
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
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="css/lightbox.css">
<link rel="stylesheet" href="css/login.css">
</head>
<body>

  <div class="lightbox">
        <div class="popbg"></div>
        <div class="info">
            <div class="axis axis1"></div>
            <div class="axis axis2"></div>
            <div class="leave"></div>
            <div class="paper">
                <p>
                    <?php 
                        if($errMsg !=""){
                            echo $errMsg;
                        }else{
                            echo $memRow["memNic"], " 您好~<br>";
                        }
                    ?>
                </p>
            </div>
        </div>
    </div>   

</body>
</html>