<!-- articleImg -->
<?php
$errMsg = "";
try {
	switch($_FILES['articleImg']['error']){
		case 0:
				$dir = "../image/bar/DB/";
				if( file_exists($dir) === false){
					mkdir( $dir ); //make directory
				}
				$from = $_FILES['articleImg']['tmp_name'];
				$to = $dir . $_FILES['articleImg']['name'];
				copy($from, $to);
				echo "上傳成功<br>";
				break;	
		case 1:
				echo "上傳檔案太大, 不得超過", ini_get("upload_max_filesize") ,"<br>";
				break;
		case 2:
				echo "上傳檔案太大, 不得超過", $_POST["MAX_FILE_SIZE"], "位元組<br>";
				break;
		case 3:
				echo "上傳檔案不完整<br>";
				break;
		case 4:
				echo "没選送檔案<br>";
				break;
		default:
				echo "請聯絡網站維護人員<br>";
				echo "error code : ", $_FILES['articleImg']['error'],"<br>";
	};
	// $_FILES['articleImg']['name'] = "test";
	require_once("../connectPirate.php");
	$sql = "INSERT INTO `articlelist` VALUES( NULL, :memId, :artTitle, NOW(), :artText, 0, 0, 0,:artImg,:artCat)";
	$addArt = $pdo ->prepare( $sql );
	$addArt-> bindValue(":memId", $_REQUEST["memId"]);
	$addArt-> bindValue(":artTitle", $_REQUEST["articleTit"]);
	$addArt-> bindValue(":artText", $_REQUEST["articleCont"]);
	$addArt-> bindValue(":artImg", $_FILES['articleImg']['name']);
	$addArt-> bindValue(":artCat", $_REQUEST["articleType"]);
	$addArt-> execute();	
	header("location:../bar.php");
}catch ( PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	  $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
}

?> 
