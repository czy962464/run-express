<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
} 
include '../../public/common/config.php';
// include '../../public/common/function.php';
$img=$_POST['img'];
$pos=$_POST['pos'];

$url=$_POST['url'];

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
$sql="update advert set img='{$img}',pos='{$pos}',url='{$url}' where id={$id}";
    $smt=$pdo->prepare($sql);
    if($smt->execute()){
		echo "<script>location='index.php'</script>";
		}

?>