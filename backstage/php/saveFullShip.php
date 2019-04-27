<?php
session_start();
$img = $_POST['fullShipImg'];
$headSrc = $_POST['headSrc'];
$bodySrc = $_POST['bodySrc'];
$sailSrc = $_POST['sailSrc'];

$errMsg ='' ;
try {

require_once('connectPirate.php');

//從資料庫取得船各部位ID
$sql = "select modelId from customList where modelImg in ('{$headSrc}','{$bodySrc}','{$sailSrc}')";
$staModelId = $pdo->query($sql);

$rowsModelId = $staModelId->fetchAll(PDO::FETCH_ASSOC);
$custList = [];
foreach($rowsModelId as $i => $row){
    $custList[] = $row['modelId'];
}
//將船各部位ID以一陣列存入server session
$_SESSION['custList'] = $custList;


//圖片儲存路徑
define('UPLOAD_PATH','img/');

//接收data url

//編輯data url字串、轉譯
$img = str_replace('data:image/png;base64,','',$img);
$img = str_replace(' ','+',$img);
$data = base64_decode($img);

//儲存圖案碼至路徑
$file = UPLOAD_PATH.'fullShip'.uniqid().'.png';
$success = file_put_contents($file, $data);

//到底會不會成功呢
$output = ($success)? "<img src='{$file}'>" : "<p>what's wrong?</p>";
$_SESSION['fullShipDir'] = $file; //全船路徑存入server session，之後給註冊使用
echo $file;

} catch (PDOException $e) {
    $errMsg .= "錯誤行：".$e->getLine()."<br>";
    $errMsg .= "錯誤原因：".$e->getMessage()."<br>";
    echo $errMsg;
}


?>