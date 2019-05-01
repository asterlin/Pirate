<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g3;charset=utf8";
<<<<<<< HEAD
	$user = "cd106g3";
	$password = "cd106g3";
=======
	$user = "root";
	$password = "6666";
>>>>>>> 80c983e0f57006bd8b622a8848daa3992c4acd7d
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);
?>