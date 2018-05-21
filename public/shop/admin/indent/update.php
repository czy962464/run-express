<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
} 
include '../../public/common/config.php';
$dingdanhao=$_POST['dingdanhao'];
$status_id=$_POST['status_id'];

$sql="update indent set status_id={$status_id} where dingdanhao='{$dingdanhao}'";
    $smt=$pdo->prepare($sql);
    if($smt->execute()){
		echo "<script>location='index.php'</script>";
		}

?>