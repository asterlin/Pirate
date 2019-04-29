<?php
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "select * from member where memId=:memId";
  $status = $pdo->prepare( $sql );
  $status->bindValue(":memId",$_REQUEST["memId"]);
  $status->execute();
  if( $status->rowCount() == 0 ){
    echo "[]";
  }else{
    $arr = [];
    $statusRow = $status->fetch(PDO::FETCH_ASSOC);
    $arr[] = $statusRow;
    echo json_encode($arr);
  }	
}catch(PDOException $e){
  echo $e->getMessage();
}
?>