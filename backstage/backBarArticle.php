<?php
ob_start();
session_start();
if (isset($_SESSION['managerAcc']) == false) {
    header('location:backLogin.html');
}
$errMsg = "";

try {
    require_once("php/connectPirates.php");
    $sql = "select * from articlelist";
    $articlelist = $pdo->query($sql);
    $articlelist->execute();
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
                <h3 class="titlePri">討論區文章檢舉管理</h3>
                <div class="dataTable">
                    <table>
                        <tr>
                            <th>文章編號</th>
                            <th>文章主題</th>
                            <th>發表會員</th>
                            <th>文章內容</th>
                            <th>文章留言數</th>
                            <th>文章觀看數</th>
                            <th>發表時間</th>
                        </tr>
        <?php while($articlelistRow = $articlelist->fetch(PDO::FETCH_ASSOC)) {
                    $artTime = substr( $articlelistRow["artTime"] , 0, 10);
                    $artTimeStr = str_replace("-","","$artTime");
              ?>
                        <tr>
                            <td><?php echo $articlelistRow["artId"];?></td>
                            <td><?php echo $articlelistRow["artTitle"];?></td>
                            <td><?php echo $articlelistRow["memId"];?></td>
                            <td><?php echo $articlelistRow["artText"];?></td>
                            <td><?php echo $articlelistRow["msgAmt"];?></td>
                            <td><?php echo $articlelistRow["clickAmt"];?></td>
                            <td><?php echo $artTimeStr?></td>
                        </tr>
        <?php}?>
                        <!-- <tr>
                            <td>1314520</td>
                            <td>131452</td>
                            <td>【競技】如何打贏大媽</td>
                            <td>景成</td>
                            <td>我討厭大媽</td>
                            <td>19/02/30</td>
                            <td><input type="button" value="刪除"></td>
                        </tr> -->
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