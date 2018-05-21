<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
} 
include '../../public/common/config.php';
$username=$_POST['username'];
$password=$_POST['password'];
$id=$_POST['id'];
$sql="update user set username='{$username}',password='{$password}' where id={$id}";
$smt=$pdo->prepare($sql);
if($smt->execute()){
	echo "<script>location='index.php'</script>";
}
?>