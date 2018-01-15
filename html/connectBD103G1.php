<?php
  $dsn = "mysql:host=localhost;port=3306;dbname=BD103G1;charset=utf8";
  $user="root";
  $password="root";
  $options = array( PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
  $pdo = new PDO($dsn, $user,$password,$options);
?>