<?php
//データ挿入
$my_nam=htmlspecialchars($_POST["n"], ENT_QUOTES);
$my_mes=htmlspecialchars($_POST["m"], ENT_QUOTES);
$dsn= "mysql:host=127.0.0.1;dbname=chatdb;charset=utf8";   

try{
    
$db = new PDO($dsn,"root","");
$db->query("INSERT INTO `chat-tb` (ban,nam,mes,dat)
        VALUES (NULL,'$my_nam','$my_mes',NOW())");
    
}catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
exit;
