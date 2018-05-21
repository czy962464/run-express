<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
}  
	include '../../public/common/config.php';
	// include '../../public/common/function.php';
	$brand_id=$_POST['brand_id'];
	$sname=$_POST['name'];
	$stock=$_POST['stock'];
	$price=$_POST['price'];
	$shelf=$_POST['shelf'];
    $img=$_POST['img'];
	// $src=$FILES['img']['tmp_name'];
	// $name=$_FILES['img']['name'];
	// $ext=array_pop(explode('.',$name));
	// $dst='../public/upload/'.time().mt_rand().'.'.$ext;
	// if(move_uploaded_file($src,$dst)){
	// 	thumb($dst,200,200);
	// 	$img=basename($dst);
		$sql="insert into shop(brand_id,name,stock,price,shelf,img) values('{$brand_id}','{$sname}','{$stock}','{$price}','{$shelf}','{$img}')";
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