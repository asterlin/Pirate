<?php
$memId = $_POST["memId"];
$memPsw = $_POST["memPsw"];
$memNic = $_POST["memNic"];
$fullShipDir = $_POST['fullShipDir'];
$custList = explode(",",$_POST['custList']);
$avatarDir = $_POST['avatarDir'];



$errMsg = "";
try {
    require_once("backstage/php/connectPirates.php");
    $sql = "select memId from member where memId = :memId";
    $staCheck = $pdo -> prepare($sql);
    $staCheck -> bindValue(":memId", $memId);
    $staCheck -> execute();
    if( $staCheck -> fetch()) echo "error";
    else{
        
        $pdo->beginTransaction();
        
        //寫入一筆新資料

        $sql = "insert into member 
        (memId, memPsw,memNic, shipImgAll,avatarImg) 
        values (:memId, :memPsw, :memNic, '{$fullShipDir}','{$avatarDir}')";
        $member = $pdo->prepare( $sql );
        $member->bindValue(":memId", $memId);
        $member->bindValue(":memPsw", $memPsw);
        $member->bindValue(":memNic", $memNic);
        $member->execute();


        $regiDate = date('Y-m-d', time());

        //輸入船體部位
        $sql = "insert into mycustom
        values (?, ?,'{$regiDate}',1)";
        $staCust = $pdo -> prepare($sql);
        foreach($custList as $data){
        $staCust -> bindValue(1, $memId);
        $staCust -> bindValue(2, $data);
        $staCust->execute();
        };
        //註冊成功
        $sql = "select * from member where memId=:memId";
        $member = $pdo->prepare( $sql );
        $member->bindValue(":memId", $memId);
        $member->execute();

        $arr = [];
        $memRow = $member->fetch(PDO::FETCH_ASSOC);
        $arr[] = $memRow;

        echo json_encode($arr);

        // $pdo->commit();
    } 

}catch (PDOException $e) {
    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
}
?>