<?php
session_start();
// include '../../public/common.config.php';
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
$sql="select * from shop where id={$id}";
$rst=mysqli_query($link, $sql);
$posts=array();
$row=mysqli_fetch_array($rst);
if($row['stock']>0){
	$_SESSION['shops'][$id]=$row;
	$_SESSION['shops'][$id]['num']=1;
	//print_r($_SESSION);
	echo "<script>location='shopcar.php'</script>";

}else{
	echo "<script>alert('您所购买的商品库存不足')</script>";
	echo "<script>location='../index.php'</script>";
	


}

mysqli_close($link);

?>
