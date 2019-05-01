<?php
session_start();
$no = $_REQUEST["no"];
$memId = $_SESSION["memId"];//$_SESSION["memId"]
$treaId = $_REQUEST["treaId"];
$storId = $_REQUEST["storId"];
$price = $_REQUEST["price"];

?>

<?php
    if($no === '1'){
        try {
                require_once("backstage/php/connectPirates.php");
                $sql = " select * from traderecord where treaId = '$treaId' and buyerId IS NOT NULL";
                $traderecord = $pdo -> query($sql);
                if($traderecord->rowCount()==0){
                    echo "沒交易紀錄";
            }else{
                $j=0;
                $allprice = 0;
                $treaRow = $traderecord -> fetchAll(PDO::FETCH_ASSOC);
                foreach ($treaRow as $i=>$sellprice){
                    $allprice = ($allprice + $sellprice["price"]);
                    $j++;
                }
                $average = intval($allprice/$j);
                echo $average;
            }
        } catch (PDOException $e) {
            $errMsg .= "錯誤 : ".$e -> getMessage()."<br>";
            $errMsg .= "行號 : ".$e -> getLine()."<br>";
            echo $errMsg;    
        }
    } else {
        
        
        try {
            $date = date("Y-m-d");
            require_once("connectPirates.php");
            $sql ="INSERT INTO traderecord (salerId,treaId,price,saleTime) VALUES ('$memId','$treaId',$price,'$date')";
            $pdo->exec($sql);
            
    
        } catch (PDOException $e) {
            $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
            $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
        }
        
        try {
           
            $sqlDel = "DELETE FROM treasurestorage WHERE storId = '$storId'";
            $pdo->exec($sqlDel);
          
        } catch (PDOException $e) {
            $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
            $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
            }
    
    }   
    ?> 
    

