<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g3;charset=utf8";
	$user = "root";
<<<<<<< HEAD
	$password = "0218";
=======
	$password = "6666";
>>>>>>> 21e82d6efbb15993facafabeea0a1eb17511d8dd
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);
?>