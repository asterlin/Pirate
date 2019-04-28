<?php
  try{
    require_once("../connectPirate.php");
    if ($_REQUEST["artCat"] != 0) {
      $sqlNews = "select * from articlelist join member on(articlelist.memId = member.memId) where artCat=:artCat order by artTime";
    } else {
      $sqlNews = "select * from articlelist join member on(articlelist.memId = member.memId) order by artTime";
    }
    
    $news = $pdo->prepare( $sqlNews );
    $news->bindValue(":artCat", $_REQUEST["artCat"]);
    // $news->bindValue(":artCat", 1);
    $news->execute();
    $newsRow = $news ->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($newsRow);
    // while($newsRow = $news ->fetch(PDO::FETCH_ASSOC)){
    //     echo json_encode($newsRow);
    // }
  } catch(PDOException $e){
      echo $e->getMessage();
    };
?>