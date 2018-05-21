<?php
session_start();
include '../public/common/config.php';
$username=$_POST['username'];
$password=$_POST['password'];

$sql="select id,username from user where username='{$username}' and password='{$password}' and isadmin=1 ";
$smt=$pdo->prepare($sql);
$smt->execute();
$row=$smt->fetch();
if($row){
	$_SESSION['admin_userid']=$row['id'];
    $_SESSION['admin_username']=$row['username'];
	echo "<script>location='index.php'</script>";

}
else{
	echo "<script>location='login.php'</script>";
}
?>