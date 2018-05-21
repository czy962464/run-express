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
$id=$_GET['id'];
	$sql="delete from touch where id={$id}";
	if(mysqli_query($link,$sql)){
		echo "<script>location='address.php'</script>";
	}
mysqli_close($link);

?>