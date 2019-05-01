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
    <link rel="stylesheet" href="../css/backOfficialMerch.css">
    <link rel="stylesheet" href="../css/wavebtn.css">
    <script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <div class="backstage">
    <?php
        require_once("backMenu.php");
        ?>
        
        <div class="contentWrap">
            <div class="content">
                <h3 class="titlePri">官方商品管理</h3>
                <div class="custToolBox">
                    <button id="addTrea" href="javascript:;">
                        <span>新增</span>
                        <span>+</span>
                    </button>
                </div>
                <div class="dataTable">
                    <table id="merchTable">

                        <form action="editTrea.php" method="GET">
                        <tr>
                            <th>寶物編號</th>
                            <th>寶物名稱</th>
                            <th>圖片</th>
                            <th>智力</th>
                            <th>力量</th>
                            <th>敏捷</th>
                            <th>幸運</th>
                            <th>上下架狀態</th>
                        </tr>
<?php
try {
            require_once("php/connectPirates.php");
            $sql = "select * from treasurelist;";
            $product=$pdo->query($sql);

            if ($product->rowCount() == 0) {
                echo "沒有商品!!!";
            } else {
                $prods = $product->fetchAll(PDO::FETCH_ASSOC);

                foreach ($prods as $i=>$prodRow) {
                    ?>	
                <tbody>
                <tr>
                <td class="treaNo"><?php echo $prodRow["treaId"]; ?></td>
                <td class="treaName"><input type="text" name="treaName" value='<?php echo $prodRow["treaName"]; ?>' placeholder="請輸入造型名稱"></td>
                <td class="treaImg">
                    <img src="../image/treasure/<?php echo $prodRow["treaImg"]; ?>" class="imgPreview">
                    <input class="treaInputImg" type="file" value="../<?php echo $prodRow["treaImg"]; ?>">
                </td>
                <td class="treaInt"><input type="text" name="treaInt" value='<?php echo $prodRow["treaInt"]; ?>' placeholder="請輸入能力值"></td>
                <td class="treaStr"><input type="text" name="treaStr" value='<?php echo $prodRow["treaStr"]; ?>' placeholder="請輸入能力值"></td>
                <td class="treaAgi"><input type="text" name="treaAgi" value='<?php echo $prodRow["treaAgi"]; ?>' placeholder="請輸入能力值"></td>
                <td class="treaLuk"><input type="text" name="treaLuk" value='<?php echo $prodRow["treaLuk"]; ?>' placeholder="請輸入能力值"></td>
    
                <td class="saleYN">
                <select class="saleYN" name="saleYN">
                    <option value="1"
                        <?php
                            if ($prodRow["treaStatus"]==1) {
                                echo "selected";
                            }; ?> 
                    >上架中</option>
                    <option value="0"
                        <?php
                            if ($prodRow["treaStatus"]==0) {
                                echo "selected";
                            }; ?> 
                    >已下架</option>
                </select>
                </td>
                <td>
                <button class="updateList" style="display:none">修改</button>
                <button class="addToList removeIt">刪除</button>
                </td>
                <?php
                ?>
                </tr>
                </tbody>
                </form>
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

    <script src="js/backOfficialTrea.js"></script>
</body>

</html>