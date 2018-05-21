<?php
//print_r($_POST);
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

$username=$_POST['username'];
$password=md5($_POST['password']);
$repassword=md5($_POST['repassword']);
$tel=$_POST['tel'];


$fcode=strtolower($_POST['fcode']);


if($password==$repassword){
	$sql="insert into user(username,password) values ('{$username}','{$password}')";
	if(mysqli_query($link, $sql)){
	$_SESSION['home_username']=$username;
	// $_SESSION['home_password']=$password;
	$_SESSION['home_userid']=mysqli_insert_id($link);
	echo "<script>location='person/index.php'</script>";

	}
}else{
	echo "<script>location='register.php'</script>";
}

mysqli_close($link);
?>