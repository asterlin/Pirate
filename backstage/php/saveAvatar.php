<?php
session_start();

$errMsg ='' ;
try {

require_once('connectPirate.php');


//圖片儲存路徑
define('UPLOAD_PATH','img/');

//接收data url
$img = $_POST['avatarImg'];

//編輯data url字串、轉譯
$img = str_replace('data:image/png;base64,','',$img);
$img = str_replace(' ','+',$img);
$data = base64_decode($img);

//儲存圖案碼至路徑
$file = UPLOAD_PATH.'avatar'.uniqid().'.png';
$success = file_put_contents($file, $data);

//到底會不會成功呢
$output = ($success)? "<img src='{$file}'>" : "<p>what's wrong?</p>";
$_SESSION['avaratDir'] = $file; //存入server session，之後給註冊使用
echo $file;

} catch (PDOException $e) {
    $errMsg .= "錯誤行：".$e->getLine()."<br>";
    $errMsg .= "錯誤原因：".$e->getMessage()."<br>";
    echo $errMsg;
}


?>