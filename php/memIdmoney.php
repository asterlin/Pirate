
<?php
$memId = $_REQUEST["memId"];

try {
	require_once("../backstage/php/connectPirates.php");
    $sql = "select * from member where memId = '$memId'";
    $member=$pdo->query($sql);
} catch (PDOException $e) {

    $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
    $errMsg .= "行號 : ".$e -> getLine()."<br>";
    
}
while( $tradRow = $member->fetch(PDO::FETCH_ASSOC)){ 
    
  $memIdMoney = $tradRow["memMoney"];
    echo $memIdMoney;
}
?>