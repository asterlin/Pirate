<?php
ob_start();
session_start();
if (isset($_SESSION['managerAcc']) == false) {
    header('location:backLogin.html');
}
$errMsg = "";

try {
    require_once("php/connectPirates.php");
    $sql = "select * from iqtest";
    $iqtest = $pdo->query($sql);
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
                <h3 class="titlePri">測驗題目管理</h3>
                <div class="dataTable">
                    <table>
                        <tr>
                            <th>題目編號</th>
                            <th>題目內容</th>
                            <th>給分</th>
                            <th>選項1</th>
                            <th>選項2</th>
                            <th>選項3</th>
                            <th>選項4</th>
                            <th>正確選項</th>
                            <th>編輯</th>
                        </tr>
                        <tr>
                        <?php
                            while ($iqtestRow = $iqtest->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                            <td><?php echo $iqtestRow['testId'] ?></td>
                            <td> <input class="testText" type="text" value="<?php echo $iqtestRow['testText'] ?>"> </td>
                            <td> <input class="point" type="text" value="<?php echo $iqtestRow['point'] ?>"></td>
                            <td> <input class="option1" type="text" value="<?php echo $iqtestRow['option1'] ?>"></td>
                            <td> <input class="option2" type="text" value="<?php echo $iqtestRow['option2'] ?>"></td>
                            <td> <input class="option3" type="text" value="<?php echo $iqtestRow['option3'] ?>"></td>
                            <td> <input class="option4" type="text" value="<?php echo $iqtestRow['option4'] ?>"></td>
                            <td> <input class="answer" type="text" value="<?php echo $iqtestRow['answer'] ?>"></td>
                            <td>
                            <button type="submit" class="btnpri IQmodify"><span>修改</span></button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/wavebtn.js"></script>
    <script src="js/backIQTest.js"></script>
</body>

<script>

// testText = $('#testText').val();
// console.log(testText)

// $(document).ready(function () {
//         $('.IQmodify').click(backIQTest)
//     });
</script>

</html>