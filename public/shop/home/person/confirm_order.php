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
$dingdanhao=$_GET['dingdanhao'];
$confirm=1;
$sql="update indent set confirm =1 where dingdanhao='{$dingdanhao}'";
if(mysqli_query($link,$sql)){
	echo "<script>location='order.php'</script>";
}

mysqli_close($link);

?>