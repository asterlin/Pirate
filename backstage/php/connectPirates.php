<?php
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g3;charset=utf8";
	$user = "root";
<<<<<<< HEAD
	$password = "iiii";
=======
	$password = "6666";
>>>>>>> 50b0decf93d84671f1866af9073b1934cc9ba627
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);
?>