<?php
session_start();
$errMsg = "";
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "select * from customlist JOIN mycustom ON customlist.modelId = mycustom.modelId where memId = :memId";
  $mycustom = $pdo->query( $sql );
  $mycustom->bindValue(":memId",$_REQUEST["memId"]);
  // $mycustom->bindValue(":memId","test03");
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