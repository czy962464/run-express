<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
}  
	include '../../public/common/config.php';
	$name=$_POST['name'];
	
	$sql="insert into brand(name) values('{$name}')";
	$smt=$pdo->prepare($sql);
	if($smt->execute()){
		echo "<script>location='index.php'</script>";
	}
?>