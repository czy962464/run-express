<?php
session_start();
include '../public/common/config.php';

$password=$_POST['password'];

$sql="update user set password={$password} where username='admin'";
$smt=$pdo->prepare($sql);
if($smt->execute()){
	
    $_SESSION=array();

    setcookie('PHPSESSID','',time()-3600,'/');
    session_destroy();
	echo "<script>location='login.php'</script>";
}
?>