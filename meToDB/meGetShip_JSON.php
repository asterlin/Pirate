<?php
session_start();
// $memId = '$_REQUEST["memId"]';
$errMsg = "";
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "select * from customlist JOIN mycustom ON customlist.modelId = mycustom.modelId where memId = 'test03'";
  $mycustom = $pdo->query( $sql );
  // $mycustom->bindValue(":memId",$memId);
  $mycustom->execute();
  if( $mycustom->rowCount() == 0 ){
    echo "[]";
  }else{
    $arr = [];
    while($mycustomRow = $mycustom->fetch(PDO::FETCH_ASSOC)){
      $arr[] = $mycustomRow;
    }
    echo json_encode($arr);
  }	
}catch(PDOException $e){
  echo $e->getMessage();
}
?>