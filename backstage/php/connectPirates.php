<?php
    //程式要先上傳
    //再透過demo_projects執行
	$dsn = "mysql:host=localhost;port=3306;dbname=cd106g3;charset=utf8";
	$user = "root";
<<<<<<< HEAD
	$password = "6666";
=======
	$password = "0218";
>>>>>>> 8cb4f42fb28edb6c33af98425134bc3a88b06251
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user, $password, $options);
?>
