<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
}  
	include '../../public/common/config.php';
	// include '../../public/common/function.php';
	$pos=$_POST['pos'];
	$img=$_POST['img'];
	// $url=$_POST['url'];
	
	
	$sql="insert into advert(pos,img,url) values('{$pos}','{$img}','{$url}')";
	$smt=$pdo->prepare($sql);
	if($smt->execute()){
		echo "<script>location='index.php'</script>";
	}
		

	// }

	// $sql="insert into shop(name,brand_id) values('{$name}','{$brand_id}')";
	// $smt=$pdo->prepare($sql);
	// if($smt->execute()){
	// 	echo "<script>location='index.php'</script>";
	//}
?>