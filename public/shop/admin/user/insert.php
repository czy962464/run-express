<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
}  
	include '../../public/common/config.php';
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="insert into user(username,password) values('{$username}','{$password}')";
	$smt=$pdo->prepare($sql);
	if($smt->execute()){
		echo "<script>location='index.php'</script>";
	}
?>