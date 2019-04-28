<?php
  try{
    require_once("../connectPirate.php");
    $sqlAddClickAmt = " UPDATE articlelist SET clickAmt=(clickAmt+1) WHERE artId=:artId";
    $addClickAmt = $pdo->prepare( $sqlAddClickAmt );
    $addClickAmt->bindValue(":artId", $_REQUEST["artId"]);
    // $artBox->bindValue(":artId", 14);
    $addClickAmt->execute();

    $sqlArtBox = "select * from artrespond join member on (artrespond.memId = member.memId) where artrespond.artId=:artId";
    $artBox = $pdo->prepare( $sqlArtBox );
    $artBox->bindValue(":artId", $_REQUEST["artId"]);
    // $artBox->bindValue(":artId", 14);
    $artBox->execute();
    $artBoxRow = $artBox ->fetchAll(PDO::FETCH_ASSOC);
    // echo json_encode($artBoxRow);
    echo json_encode($artBoxRow);
    // while($artBoxRow = $artBox ->fetch(PDO::FETCH_ASSOC)){
    //     echo json_encode($artBoxRow);
    // }
  } catch(PDOException $e){
      // echo $e->getMessage();
    };
?>