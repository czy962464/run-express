<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
} 
include '../../public/common/config.php';
$name=$_POST['name'];
$id=$_POST['id'];
$sql="update status set name='{$name}' where id={$id}";
$smt=$pdo->prepare($sql);
if($smt->execute()){
	echo "<script>location='index.php'</script>";
}
?>