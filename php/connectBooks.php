<?php
	$dsn = "mysql:host=localhost;port=3308;dbname=bd103g1;charset=utf8";
	$user = "root";
	$psw = "zxc123";
	$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$pdo = new PDO( $dsn, $user,$psw, $options );
?>