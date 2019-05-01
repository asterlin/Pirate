<?php
ob_start();
session_start();
if (isset($_SESSION['managerAcc']) == false) {
    header('location:backLogin.html');
}
$errMsg = "";

try {
    require_once("php/connectPirates.php");
    $sql = "select count(*) totalRecord from artrespond";
    $artresponds = $pdo->query($sql);
    $artrespondsRow = $artresponds->fetch();

    $totalRecCount = $artrespondsRow["totalRecord"];
    //determin: record per page
    $numPerPage = 8;
    //get total page
    $totalPages = ceil($totalRecCount / $numPerPage);   

    //get current page data
    if(isset($_REQUEST["pageNo"]) == true){
        $pageNo = $_REQUEST["pageNo"];
    }else{
        $pageNo = 1;
    }

    $start = ($pageNo-1) * $numPerPage;
    $sql = "select * from artrespond limit $start, $numPerPage";
    $artresponds = $pdo->query($sql);
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
            <?php while ($artrespondsRow = $artresponds->fetch(PDO::FETCH_ASSOC)) {
        $msgTime = substr($artrespondRow["msgTime"], 0, 10);
        $msgTimeStr = str_replace("-", "", "$msgTime"); ?>
                        <tr>
                            <td><?php echo $artrespondsRow["msgId"]; ?></td>
                            <td><?php echo $artrespondsRow["artId"]; ?></td>
                            <td><?php echo $artrespondsRow["memId"]; ?></td>
                            <td><?php echo $artrespondsRow["msgText"]; ?></td>
                            <td><?php echo $msgTime; ?></td>
                        </tr>
            <?php
    }?>
                    </table>
                </div>
                <div class="pagination">
                    <ul>
                    <?php
                        for ($i=1; $i<=$totalPages; $i++) {
                            ?>
                            <li> <a href="?pageNo=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/wavebtn.js"></script>
</body>

</html>