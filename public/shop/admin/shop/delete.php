<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
} 
	include '../../public/common/config.php';
	$id=$_GET['id'];
	$img=$_GET['img'];
	$file="../public/upload/{$img}";
	$file2="../public/upload/thumb_{$img}";
	$sql="delete from shop where id={$id}";
	$smt=$pdo->prepare($sql);
	if($smt->execute()){
		unlink($file);
		unlink($file2);
		echo "<script>location='index.php'</script>";
	}
?>