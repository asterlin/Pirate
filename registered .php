<?php


$errMsg = "";
    try {
        
        if($_REQUEST["memPsw"] != $_REQUEST["memCon"]){

            $errMsg .= "密碼驗證錯誤, <a href='signUp.html'>重新註冊</a><br>";
                    
        }else{
            require_once("backstage/php/connectPirates.php");
            $sql = "insert into member (memId, memPsw,memNic) values (:memId, :memPsw, :memNic)";
            $member = $pdo->prepare( $sql );
            $member->bindValue(":memId", $_REQUEST["memId"]);
            $member->bindValue(":memPsw", $_REQUEST["memPsw"]);
            $member->bindValue(":memNic", $_REQUEST["memNic"]);
            $member->execute();


            //註冊成功,將登入者的資料寫入session
            $sql = "select * from member where memId=:memId";
            $member = $pdo->prepare( $sql );
            $member->bindValue(":memId", $_REQUEST["memId"]);
            $member->execute();
            $memRow = $member->fetch(PDO::FETCH_ASSOC);
            session_start();
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
            $_SESSION["memId"] = $_REQUEST["memId"];
            $_SESSION["memPsw"] = $_REQUEST["memPsw"];
            $_SESSION["memNic"] = $_REQUEST["memNic"];
        }




    

    } catch (PDOException $e) {
    $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
    $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
    }	


   
?> 
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
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
                        echo "註冊成功";
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>    
   
</body>
</html>