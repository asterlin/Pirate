<?php
ob_start();
session_start();
if (isset($_SESSION['managerAcc']) == false) {
    header('location:backLogin.html');
}
$errMsg = "";

try {
    require_once("php/connectPirates.php");
    $sql = "select * from manager";
    $manager = $pdo->query($sql);
} catch (PDOException $e) {
    $errMsg .=  "錯誤原因" . $e->getMessage() . "<br>";
    $errMsg .=  "錯誤行號" . $e->getLine() . "<br>";
}

echo $errMsg;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/backStage.css">
    <link rel="stylesheet" href="../css/wavebtn.css">
</head>

<body>
    <div class="backstage">
    <?php
        require_once("backMenu.php");
        ?>
        <div class="contentWrap">
            <div class="content">
                <h3 class="titlePri">寶物拍賣紀錄查詢</h3>
                <div class="dataTable">
                    <table>
                        <tr>
                            <th>賣家會員帳號</th>
                            <th>上架時間</th>
                            <th>買家會員帳號</th>
                            <th>寶物名稱</th>
                            <th>價格</th>
                            <th>交易時間</th>
                        </tr>
                        <?php
                        try {
                            require_once("php/connectPirates.php");
                            $sql = "select * from traderecord r join treasurelist l on r.treaId = l.treaId;";
                            $traderecord=$pdo->query($sql);

                            if ($traderecord->rowCount() == 0) {
                                echo "沒有商品!!!";
                            } else {
                                $record = $traderecord->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($record as $i=>$recordRow) {
                                    ?>	
                                    
                                    <tr>
                                    <td class="treaNo"><?php echo $recordRow["salerId"]; ?></td>
                                    <td class="treaNo"><?php echo $recordRow["saleTime"]; ?></td>
                                    <td class="treaNo"><?php echo $recordRow["buyerId"]; ?></td>
                                    <td class="treaNo"><?php echo $recordRow["treaName"]; ?></td>
                                    <td class="treaNo"><?php echo $recordRow["price"]; ?></td>
                                    <td class="treaNo"><?php echo $recordRow["tradeTime"]; ?></td>
                                    </tr>
                                  
                                    
                                <?php
                               
                                }
                            }
                        } catch (PDOException $e) {
                            echo "error";
                        }
                    ?>
                </table>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/wavebtn.js"></script>
</body>

</html>