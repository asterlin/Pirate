<?php
ob_start();
session_start();
if (isset($_SESSION['managerAcc']) == false) {
    header('location:backLogin.html');
}
$errMsg = "";

try {
    require_once("php/connectPirates.php");
    $sql = "select * from artrespond";
    $artrespond = $pdo->query($sql);
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
                <h3 class="titlePri">討論區留言管理</h3>
                <div class="dataTable">
                    <table>
                        <tr>
                            <th>留言編號</th>
                            <th>文章編號</th>
                            <th>留言者編號</th>
                            <th>留言內容</th>
                            <th>留言時間</th>
                        </tr>
            <?php while (($artrespondRow = $artrespond->fetch(PDO::FETCH_ASSOC)) {
                    $msgTime = substr( $artrespondRow["msgTime"] , 0, 10);
                    $msgTimeStr = str_replace("-","","$msgTime");
            ?>  
                        
                        <tr>
                            <td><?php echo $artrespondRow["msgId"];?></td>
                            <td><?php echo $artrespondRow["artId"]; ?></td>
                            <td><?php echo $artrespondRow["memId"]; ?></td>
                            <td><?php echo $artrespondRow["msgText"]; ?></td>
                            <td><?php echo $msgTimeStr; ?></td>
                        </tr>
            <?php}?>
                    </table>
                </div>
                <div class="pagination">
                    <ul>
                        <li id="left"> <a href="#">
                                < </a> </li> <li> <a href="#">1</a></li>
                        <li> <a href="#">2</a></li>
                        <li> <a href="#">3</a></li>
                        <li> <a href="#">4</a></li>
                        <li> <a href="#">5</a></li>
                        <li class="right"> <a href="#"> > </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/wavebtn.js"></script>
</body>

</html>