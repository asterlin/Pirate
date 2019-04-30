<?php
	$memId = $_GET["memId"];
	require_once("connectPirates.php");

	try {

        $getMyCustomSql = "select ModelId from mycustom where memId=:memId and wearing=1";
        $getMyCustom=$pdo->prepare($getMyCustomSql);
        $getMyCustom->bindValue(":memId", $memId);
        $getMyCustom->execute();
        $getMyCustoms = $getMyCustom->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($getMyCustoms as $i=>$getMyCustomRow) {
            $myCustoms[$i] = $getMyCustomRow["ModelId"];
            echo $myCustoms;
        }
        
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo "error";
    }











    
?>