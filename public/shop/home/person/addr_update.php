<?php
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
$id=$_POST['id'];
// echo $id;
// exit;
$name=$_POST['name'];
$phone=$_POST['phone'];
$addr=$_POST['addr'];
$email=$_POST['email'];
$sql = "update touch set name='{$name}',phone='{$phone}',addr='{$addr}',email='{$email}' where id={$id}";

if(mysqli_query($link, $sql)){
	echo "<script>location='address.php'</script>";}
// 	echo "1";
// }else{
// 	echo "0";}
mysqli_close($link);

?>