<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g3;charset=utf8";
	$user = "root";
<<<<<<< HEAD:backstage/php/connectPirates.php
	$password = "6666"; 	
=======
	$password = "0218";
>>>>>>> 6e17014e939b58e711f8123d3aa0913cc9330654:meToDB/connectPirates.php
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);
?>