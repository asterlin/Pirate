<?php
ob_start();
session_start();
if (isset($_SESSION['managerAcc']) == false) {
    header('location:backLogin.html');
}
$errMsg = "";

try {
    require_once("php/connectPirates.php");
    $sql = "select count(*) totalRecord from member";
    $records = $pdo->query($sql);
    $recordsRow = $records->fetch();

    //get total record count
    $totalRecCount = $recordsRow["totalRecord"];
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
    $sql = "select * from member limit $start, $numPerPage";
    // exit($sql);
    $members = $pdo->query($sql);


    // $totalRec = $members->fetchColumn();
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
    <link rel="stylesheet" href="../css/wavebtn.css">
    <link rel="stylesheet" href="../css/backStage.css">
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
    </div>
    <div class="contentWrap">
        <div class="content">
            <h3 class="titlePri">會員管理</h3>
            <div class="dataTable">
                <table>
                    <tr>
                        <th>帳號</th>
                        <th>ID</th>
                        <th>等級</th>
                        <th>金錢</th>
                        <th>得票數</th>
                        <th>海賊船</th>
                        <th>狀態</th>
                        <th>編輯狀態</th>
                        <!-- <th>編輯狀態</th> -->
                    </tr>
                    <tr>
                    <?php
                    while ($memberRow = $members->fetch()) {
                        ?>
                        <td><?php echo $memberRow['memId'] ?></td>
                        <td><?php echo $memberRow['memNic'] ?></td>
                        <td><?php echo $memberRow['memLv'] ?></td>
                        <td><?php echo $memberRow['memMoney'] ?></td>
                        <td><?php echo $memberRow['shipTotalVote'] ?>
                        </td>
                        <td><?php echo $memberRow['shipImgAll'] ?></td>
                        <form action="backMemberStatus.php">
                        <td>
                            <label>
                                <input type="radio" name="accStatus" value="1" <?php echo $memberRow['accStatus'] == 1 ? 'checked' : '' ?>>
                                正常
                            </label>
                            <label>
                                <input type="radio" name="accStatus" value="0" <?php echo $memberRow['accStatus'] == 0 ? 'checked' : '' ?>>
                                禁言
                            </label>
                        </td>
                        <td>
                            <input type="hidden" name="memId" value="<?php echo $memberRow['memId'] ?>">
                            <button type="submit"><span>修改</span></button>
                        </td>
                    </form>
                        </tr>
                    <?php
                    }
                ?>
                </table>
            </div>
            <div class="pagination">
                <ul>
                        
                        <?php
                        for( $i=1; $i<=$totalPages; $i++){
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