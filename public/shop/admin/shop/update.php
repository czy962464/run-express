<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
} 
include '../../public/common/config.php';
// include '../../public/common/function.php';
$brand_id=$_POST['brand_id'];
$name=$_POST['name'];
$stock=$_POST['stock'];
$price=$_POST['price'];
$shelf=$_POST['shelf'];
$img=$_POST['img'];
$id=$_POST['id'];
// $imgerror=$_FILES['img']['error'];
// if($imgerror===0){

// }else{
// 	$sql="update shop set brand_id='{$brand_id}',name='{$name}',stock='{$stock}',price='{$price}',shelf='{$shelf}' where id={$id}";
//     $smt=$pdo->prepare($sql);
//     if($smt->execute()){
// 		echo "<script>location='index.php'</script>";
// }
// }
$sql="update shop set brand_id='{$brand_id}',name='{$name}',stock='{$stock}',price='{$price}',shelf='{$shelf}',img='{$img}' where id={$id}";
    $smt=$pdo->prepare($sql);
    if($smt->execute()){
		echo "<script>location='index.php'</script>";
		}

?>