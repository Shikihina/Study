<?php
$dsn= "mysql:host=127.0.0.1;dbname=chatdb;charset=utf8"; 

try{
$db = new PDO($dsn,"root","");
$ps = $db->query("SELECT * FROM `chat-tb` ORDER BY ban DESC");
}catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
$result="";
while($r = $ps->fetch()){ 
   $result.=$r['dat']."<br>".$r['nam']."：".$r['mes']."<br><hr>";
}
 //jsonとして出力
header('Content-type: application/json');
echo json_encode($result,JSON_UNESCAPED_UNICODE);
