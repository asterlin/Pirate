<?php
    //程式要先上傳
    //再透過demo_projects執行
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g3;charset=utf8";
	$user = "root";
<<<<<<< HEAD:connectPirate.php
<<<<<<< HEAD
	$password = "6666";
=======
	$password = "0218";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);
?>?>>>>>>>> 6e17014e939b58e711f8123d3aa0913cc9330654
=======
	$password = "0813";
>>>>>>> homeBy7175:backstage/php/connectPirates.php
	$options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);  
?>
