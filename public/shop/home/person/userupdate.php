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
$password=$_POST['password'];
$sql = "update user set password={$password} where username='{$_SESSION[home_username]}'";

if(mysqli_query($link, $sql)){
	echo "<script>location='../login.php'</script>";}
// 	echo "1";
// }else{
// 	echo "0";}
mysqli_close($link);

?>