<?php
    //程式要先上傳
    //再透過demo_projects執行
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g3;charset=utf8";
	$user = "root";
	$password = "iiii";
	$options = array(PDO::ATTR_CASE=>PDO::CASE_NATURAL, PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);  
?>
