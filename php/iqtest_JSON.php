<?php
ob_start();
session_start();
?>
<?php
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "select * from iqtest";
  $iqtest = $pdo->query( $sql );
  
  if( $iqtest->rowCount() == 0 ){
    echo "[]";
  }else{
    $arr = [];
    while($iqRow = $iqtest->fetch(PDO::FETCH_ASSOC)){
      $arr[] = $iqRow;
    }
    echo json_encode($arr);
  }	
}catch(PDOException $e){
  echo $e->getMessage();
}
?>