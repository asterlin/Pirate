<?php
$errMsg = "";
try {
	require_once("../connectPirate.php");
	$sql = "INSERT INTO `artrespond`  VALUES (NULL,:artId,:memId,:msgText,NOW())";
	// exit($sql);
	$addArtRespond = $pdo->prepare( $sql );
	$addArtRespond->bindValue(":artId", $_REQUEST["navyReport"]);
	$addArtRespond->bindValue(":memId", $_REQUEST["memId"]);
	$addArtRespond->bindValue(":msgText", $_REQUEST["addArtRespondCont"]);
	$addArtRespond->execute();
	$artId =  $_REQUEST["artId"];
	header("location:../bar.php?from=artRespond&artId=$artId");

} catch (PDOException $e) {
  $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
  $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
}
   
?> 