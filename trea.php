<?php
    try {
        require_once("backstage/php/connectPirates.php");
        $sql = " select * from treasurestorage r join treasurelist l on r.treaId = l.treaId";
        $treasurestorage = $pdo -> query($sql);
    } catch (PDOException $e) {
        $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
        $errMsg .= "行號 : ".$e -> getLine()."<br>";
        echo $errMsg;    
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   
    <div class="holdtrea">
        <p>寶物</p>
        <div class="holdtrealist">
            <?php
                // $memId = 'test01';//$_SESSION["memId"]
                while( $treaRow = $treasurestorage -> fetch(PDO::FETCH_ASSOC)){ 
                if($treaRow["memId"] == $memId){
            ?>
            <?=$treaRow["treaImg"];?>
            <?php
                }}
            ?>      
        </div>
    </div>

</body>
</html>

