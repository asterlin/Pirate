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
    <style>
    .btnpri{
            border: 1px solid transparent;
        }
    </style>
</head>

<body>
    <div class="backstage">
        <?php
        require_once("backMenu.php");
        ?>
        <div class="contentWrap">
            <div class="content">
                <h3 class="titlePri">管理員帳號管理</h3>
                <a href="backNewManager.php">
                    <button class="btnpri"><span>新增</span></button>
                </a>
                <div class="dataTable">
                    <table>
                        <tr>
                            <th>管理員帳號</th>
                            <th>管理員密碼</th>
                            <th>註冊時間</th>
                            <th>權限</th>
                            <th>編輯</th>
                        </tr>
                        <tr>
                        <?php
                        while ($memberRow = $manager->fetch()) {
                            ?>
                            <td><?php echo $memberRow['managerAcc'] ?></td>
                            <td><?php echo $memberRow['managerPsw'] ?></td>
                            <td><?php echo $memberRow['managerSignUpTime'] ?></td>
                            <td><?php echo $memberRow['managerStatus'] ?></td>
                            
                            </tr>
                        <?php
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