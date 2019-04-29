<?php
session_start();

$tradeId = $_POST['tradeId'];

$errMsg ='' ;
try {
    require_once('connectPirates.php');

if(isset($_SESSION['memId'])){
    $pdo->beginTransaction();

    // echo "您的登入帳號為{$_SESSION['memId']}";
    $sql = "select memNic, memMoney from member where memId = '{$_SESSION['memId']}'";
    $staBuyer =  $pdo -> query($sql);
    $rowBuyer = $staBuyer->fetch(PDO::FETCH_ASSOC);

    $buyer = $_SESSION['memId'];

    //取得寶物資料
    $sql = "select salerId, treaId, price from traderecord where tradeId = {$tradeId}";
    $staTrea = $pdo->query($sql);
    $rowTrea = $staTrea -> fetch(PDO::FETCH_ASSOC);
    $trea = $rowTrea['treaId'];
    $amt = $rowTrea['price'];
    $saler = $rowTrea['salerId'];

    //取得賣家資料
    $sql = "select memNic, memMoney from member where memId = '{$saler}'";
    $staSaler = $pdo -> query($sql);
    $rowSaler = $staSaler->fetch(PDO::FETCH_ASSOC);
    // echo $staSaler->fetch(PDO::FETCH_ASSOC)['memMoney'];
    
    

    $amt = $rowTrea['price'];
    if($rowBuyer['memMoney'] > $rowTrea['price']){
        echo "錢錢夠";

        
        $buyerMoney = $rowBuyer['memMoney'] - $amt;
        $salerMoney = $rowSaler['memMoney'] + $amt;
        $tradeDate = date('Y-m-d', time());
        $sql = "update member set memMoney = {$buyerMoney} where memId = '{$buyer}'";
        $staPay = $pdo -> exec($sql);

        $sql = "update member set memMoney = {$salerMoney} where memId = '{$saler}'";
        $staEarn = $pdo ->exec($sql);

        $sql = "update traderecord
            set buyerId = '{$buyer}', tradeTime = '{$tradeDate}'
            where tradeId = {$tradeId};";
        $staRec = $pdo ->exec($sql);

        if($staPay && $staEarn && $staRec){
            echo "貌似都有成功";
            $pdo -> commit();
        }else{
            echo "哪裡不成功...";
            $pdo -> rollback();
        }

    }else{
        echo "錢錢不夠";
        $pdo -> rollback();
    }

    
}else{
    echo "您尚未登入";
}

} catch (PDOException $e) {
    $errMsg .= "錯誤行：".$e->getLine()."<br>";
    $errMsg .= "錯誤原因：".$e->getMessage()."<br>";
    echo $errMsg;
}


?>