<?php
ob_start();
session_start();
$errMsg = "";

try {
    require_once("connectPirates.php");
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
    <!-- <style>
    .btnpri{
            border: 1px solid transparent;
        }
    </style> -->
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
<<<<<<< HEAD
                    <button class="btnpri">新增</button>
=======
                    <button>
                        <span>新增</span>
                        <span>+</span>
                </button>
>>>>>>> 80c983e0f57006bd8b622a8848daa3992c4acd7d
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
                        <?php
                        while ($memberRow = $manager->fetch()) {
                            ?>
<<<<<<< HEAD
                            <td><?php echo $memberRow['managerAcc'] ?></td>
                            <td><?php echo $memberRow['managerPsw'] ?></td>
                            <td><?php echo $memberRow['managerSignUpTime'] ?></td>
                            <td><?php echo $memberRow['managerStatus'] ?></td>
                            
=======
                            <td><?php echo $managerRow['managerAcc'] ?></td>
                            <td><?php echo $managerRow['managerPsw'] ?></td>
                            <td><?php echo $managerRow['managerSignUpTime'] ?></td>
                            <form action="backManagerStatus.php">
                            <td>
                            <label>
                                <input type="radio" name="managerStatus" value="1" <?php echo $managerRow['managerStatus'] == 1 ? 'checked' : '' ?>>
                                開啟
                            </label>
                            <label>
                                <input type="radio" name="managerStatus" value="0" <?php echo $managerRow['managerStatus'] == 0 ? 'checked' : '' ?>>
                                關閉
                            </label>
                            </td>
                            <td>
                            <input type="hidden" name="managerAcc" value="<?php echo $managerRow['managerAcc'] ?>">
                            <button type="submit"><span>修改</span></button>
                            </td>
                            </form>
>>>>>>> 80c983e0f57006bd8b622a8848daa3992c4acd7d
                            </tr>
                        <?php
                        }
                    ?>
                    </table>
                </div>
                <!-- <div class="pagination">
                    <ul>
                        <li id="left"> <a href="#">
                                < </a> </li> <li> <a href="#">1</a></li>
                        <li> <a href="#">2</a></li>
                        <li> <a href="#">3</a></li>
                        <li> <a href="#">4</a></li>
                        <li> <a href="#">5</a></li>
                        <li class="right"> <a href="#"> > </a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <script src="../js/wavebtn.js"></script>
</body>

</html>