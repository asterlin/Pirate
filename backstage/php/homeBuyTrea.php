<?php
session_start();

$tradeId = $_POST['tradeId'];
$memId = $_POST['memId'];
$msg = [];
$errMsg ='' ;
try {
    require_once('connectPirates.php');

if(isset($_SESSION['memId'])){
    $pdo->beginTransaction();

    // echo "您的登入帳號為{$_SESSION['memId']}";
    $sql = "select memNic, memMoney from member where memId = '$memId'";
    $staBuyer =  $pdo -> query($sql);
    $rowBuyer = $staBuyer->fetch(PDO::FETCH_ASSOC);
    
    $buyer = $_SESSION['memId'];
    $msg['memNic']=$rowBuyer['memNic'];

    //取得寶物資料
    $sql = "select r.salerId, r.treaId, r.price,l.treaName 
        from traderecord r
        join treasurelist l on r.treaId = l.treaId
        where tradeId ={$tradeId}";
    $staTrea = $pdo->query($sql);
    $rowTrea = $staTrea -> fetch(PDO::FETCH_ASSOC);
    $trea = $rowTrea['treaId'];
    $amt = $rowTrea['price'];
    $saler = $rowTrea['salerId'];
    $msg['price']=$amt;
    $msg['treaName']=$rowTrea['treaName'];


    //取得賣家資料
    $sql = "select memNic, memMoney from member where memId = '{$saler}'";
    $staSaler = $pdo -> query($sql);
    $rowSaler = $staSaler->fetch(PDO::FETCH_ASSOC);
    // echo $staSaler->fetch(PDO::FETCH_ASSOC)['memMoney'];
    
    

    $amt = $rowTrea['price'];
    if($rowBuyer['memMoney'] > $rowTrea['price']){

        
        $buyerMoney = $rowBuyer['memMoney'] - $amt;
        $salerMoney = $rowSaler['memMoney'] + $amt;
        $tradeDate = date('Y-m-d', time());
        $sql = "update member set memMoney = {$buyerMoney} where memId = '{$buyer}'";
        $staPay = $pdo -> exec($sql);
        $msg['buyerMoney']=$buyerMoney;

        $sql = "update member set memMoney = {$salerMoney} where memId = '{$saler}'";
        $staEarn = $pdo ->exec($sql);

        $sql = "update traderecord
            set buyerId = '{$buyer}', tradeTime = '{$tradeDate}'
            where tradeId = {$tradeId};";
        $staRec = $pdo ->exec($sql);




        if($staPay && $staEarn && $staRec){
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            $pdo -> commit();
        }else{
            $msg['staPay']=$staPay;
            $msg['staEarn']=$staEarn;
            $msg['staRec']=$staRec;
            $msg['msg']="未知錯誤，請聯絡景成";
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            $pdo -> rollback();
        }

    }else{
        $msg['msg']="錢錢不夠喔";
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        $pdo -> rollback();
    }

    
}else{
    $msg['msg']="您尚未登入";
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
}

} catch (PDOException $e) {
    $errMsg .= "錯誤行：".$e->getLine()."<br>";
    $errMsg .= "錯誤原因：".$e->getMessage()."<br>";
    echo $errMsg;
}


?>