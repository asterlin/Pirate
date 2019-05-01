<?php
    //程式要先上傳
    //再透過demo_projects執行
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g3;charset=utf8";
	$user = "root";
<<<<<<< HEAD
	$password = "0813";
=======
	$password = "0218";
>>>>>>> 37d1c3161bf36a1a7a798b3e91aa355f87050da5
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);
?>
