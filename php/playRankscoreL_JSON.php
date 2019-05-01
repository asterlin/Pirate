<?php
try{
  require_once("../backstage/php/connectPirates.php");
  $sql = "select * from member order by highscoreL";
  $member = $pdo->query( $sql );
  
  if( $member->rowCount() == 0 ){
    echo "[]";
  }else{
    $arr = [];
    while($memRow = $member->fetch(PDO::FETCH_ASSOC)){
      $arr[] = $memRow;
    }
    echo json_encode($arr);
  }	
}catch(PDOException $e){
  echo $e->getMessage();
}
?>