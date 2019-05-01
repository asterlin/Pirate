<?php
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "select * from member where memId=:memId";
  $member = $pdo->prepare( $sql );
  $member->bindValue(":memId",$_REQUEST["memId"]);
  $member->execute();
  if( $member->rowCount() == 0 ){
    echo "[]";
  }else{
    $memRow = $member->fetch(PDO::FETCH_ASSOC)
    }
    echo json_encode($memRow);
  }
}catch(PDOException $e){
  echo $e->getMessage();
}
?>