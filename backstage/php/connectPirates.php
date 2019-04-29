<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g3;charset=utf8";
	$user = "root";
<<<<<<< HEAD
	$password = "6666";
=======
	$password = "0218";
>>>>>>> 41c09dbd1ad7bf5822a7cc90afe872ea0f82d154
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);
?>