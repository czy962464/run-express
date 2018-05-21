<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
} 
	include '../../public/common/config.php';
	$id=$_GET['id'];
	$sql="delete from brand where id={$id}";
	$smt=$pdo->prepare($sql);
	if($smt->execute()){
		echo "<script>location='index.php'</script>";
	}
?>