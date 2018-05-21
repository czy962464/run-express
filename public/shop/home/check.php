<?php
header("Content-type:text/html; charset=utf-8");
session_start();
include '../public/common/config.php';
$username=$_POST['username'];
$password=$_POST['password'];

$sql="select id,username from user where username='{$username}' and password='{$password}' ";
$smt=$pdo->prepare($sql);
$smt->execute();
$row=$smt->fetch();

if($row){
	$_SESSION['home_userid']=$row['id'];
    $_SESSION['home_username']=$row['username'];
	echo "<script>location='person/index.php'</script>";
}
else{
	echo "<script language=javascript>alert('用户名密码错误');history.back();</script>";
}
?>