<?php
session_start();
header("content-type:text/html;charset=utf-8");
// $host = 'localhost';
// $user = 'root';
// $password = '123456';
// $database = 'shop';
$host = '139.129.208.229';

$user = 'root';

$password = '032a82067b';

$database = 'jing';
$port = 3306;
$link = mysqli_connect($host, $user, $password, $database, $port);
mysqli_set_charset($link,'utf8');

$user_id=$_SESSION['home_userid'];
$content=$_POST['content'];
$shop_id=$_POST['shop_id'];
$time=time();

 $sql="insert into comment(user_id,content,shop_id,time) values('{$user_id}','{$content}','{$shop_id}','$time') ";
 if(mysqli_query($link,$sql)){
 	echo "<script>location='../detail.php?shop_id={$shop_id}'</script>";
 }
 
mysqli_close($link);

?>