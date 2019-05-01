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
        <div class="menu">
            <div id="logo">
                <img src="../image/logo.svg" alt="">
            </div>
            <p>Hi~ 管理員 <span id="manager">景承</span>♥</p>
            <p>你好^___^</p>
            <ul class="menuUl">
                <li>
                    <a href="backAdministrator.html">管理員帳號管理</a>
                </li>
                <li>
                    <a href="backMember.html">會員帳號管理</a>
                </li>
                <li>
                    <a href="backOfficialMerch.html">官方商品管理</a>
                </li>
                <li>
                    <a href="backMerchRecord.html">造型記錄查詢</a>
                </li>
                <li>
                    <a href="backTreasure.html">寶物商品管理</a>
                </li>
                <li>
                    <a href="backTreasureRocard.html">寶物拍賣紀錄查詢</a>
                </li>
                <li>
                    <a href="backIQTest.html">測驗題目管理</a>
                </li>
                <li>
                    <a href="backBarArticle.html">討論區文章檢舉管理</a>
                </li>
                <li>
                    <a href="backBarCommend.html">討論區留言檢舉管理</a>
                </li>
                <a href="#" class="btnpri" id="logout">
                    <span>登出</span>
                </a>
            </ul>
        </div>
        <div class="contentWrap">
            <div class="content">
                <h3 class="titlePri">官方商品管理</h3>
                <div class="custToolBox">
                    <button id="addMerch" href="javascript:;">
                        <span>新增</span>
                        <span>+</span>
                    </button>
                </div>
                <div class="dataTable">
                    <table id="merchTable">


                        <tr>
                            <th>造型編號</th>
                            <th>造型名稱</th>
                            <th>造型部位</th>
                            <th>圖片</th>
                            <th>是否為客製化造型</th>
                            <th>價錢</th>
                            <th>上下架狀態</th>
                        </tr>
                        <?php
try {
    require_once("php/connectPirates.php");
    $sql = "select * from customlist ORDER BY modelId DESC;";
    $product=$pdo->query($sql);

    if ($product->rowCount() == 0) {
        echo "沒有商品!!!";
    } else {
        $prods = $product->fetchAll(PDO::FETCH_ASSOC);

        foreach ($prods as $i=>$prodRow) {
            ?>	
            <tbody>
            <tr>
            <td class="merchNo"><?php echo $prodRow["modelId"]; ?></td>
            <td class="merchName"><input type="text" name="merchName" value='<?php echo $prodRow["modelName"]; ?>' placeholder="請輸入造型名稱"></td>
            <td class="merchPart">
              <select name="merchPart">
                  <option value="1"
                   <?php
                    if ($prodRow["modelPart"]==1) {
                        echo "selected";
                    } ?> 
                  >船頭</option>
                  <option value="2"
                  <?php
                    if ($prodRow["modelPart"]==2) {
                        echo "selected";
                    }; ?> 
                  >船身</option>
                  <option value="3"
                  <?php
                    if ($prodRow["modelPart"]==3) {
                        echo "selected";
                    }; ?> 
                  >船帆</option>
              </select>
            </td>
            <?php
            ?>
            <td class="merchImg">
                <img src="image/merchProduct/<?php echo $prodRow["modelImg"]; ?>" class="imgPreview">
                <input class="merchInputImg" type="file" value="../<?php echo $prodRow["modelImg"]; ?>">
            </td>   
            </td>
            <td class="cusYN">
                <select name="cusYN">
                    <option value="0"
                        <?php
                            if ($prodRow["forCust"]==0) {
                                echo "selected";
                            }; ?> 
                    >客製化造型</option>
                    <option value="1"
                        <?php
                            if ($prodRow["forCust"]==1) {
                                echo "selected";
                            }; ?> 
                    >商城造型</option>
                </select>
            </td>
            <td class="merchPrice"><input type="text" name="oMPrice" value="<?php echo $prodRow["price"]; ?>"></td>
            <td class="saleYN">
            <select class="saleYN" name="saleYN">
                <option value="1"
                    <?php
                        if ($prodRow["modelStatus"]==1) {
                            echo "selected";
                        }; ?> 
                >上架中</option>
                <option value="0"
                    <?php
                        if ($prodRow["modelStatus"]==0) {
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

          <?php
        }
    }
} catch (PDOException $e) {
    echo "error";
}
?>
                    </table>
                </div>
                <div class="pagination">
                    <ul>
                        <li id="left"><a href="#">
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
    
    <script src="js/backOfficialMerch.js"></script>
</body>

</html>