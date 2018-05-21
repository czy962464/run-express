<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
} 
	include '../../public/common/config.php';
	$dingdanhao=$_GET['dingdanhao'];
	$sql="delete from indent where dingdanhao='{$dingdanhao}'";
	$smt=$pdo->prepare($sql);
	if($smt->execute()){
		unlink($file);
		unlink($file2);
		echo "<script>location='index.php'</script>";
	}
?>