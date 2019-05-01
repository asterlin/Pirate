<?php
session_start();
$no = $_REQUEST["no"];
$memId = "test01";//$_SESSION["memId"]
$treaId = $_REQUEST["treaId"];
$storId = $_REQUEST["storId"];
$price = $_REQUEST["price"];

?>

<?php
    if($no === '1'){
        try {
                require_once("marketphp/connectPirates.php");
                $sql = " select * from traderecord where treaId = '$treaId' and buyerId IS NOT NULL";
                $traderecord = $pdo -> query($sql);
                if($traderecord->rowCount()==0){
                    echo "[]";
            }else{
                $j=0;
                $allprice = 0;
                $treaRow = $traderecord -> fetchAll(PDO::FETCH_ASSOC);
                foreach ($treaRow as $i=>$sellprice){
                    $allprice = ($allprice + $sellprice["price"]);
                    $j++;
                }
                $average = ($allprice/$j);
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
            require_once("marketphp/connectPirates.php");
            $sql ="INSERT INTO traderecord (salerId,treaId,price,saleTime) VALUES ('$memId','$treaId',$price,'$date')";
            $pdo->exec($sql);
            
    
        } catch (PDOException $e) {
            $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
            $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
        }
        echo $sql;
        // try {
           
        //     $sqlDel = "DELETE FROM treasurestorage WHERE storId=:storId";
        //     $storageDel = $pdo->prepare($sqlDel);
        //     $storageDel->bindValue(":storId", $storId);
        //     $mstorageDel->execute();
        // } catch (PDOException $e) {
        //     $errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
        //     $errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";
        //     }
    
    }   
    ?> 
    

