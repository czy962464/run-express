<?php
	session_start();

	$id=$_GET['id'];

	//unset删除变量
	unset($_SESSION['shops'][$id]);
	echo "<script>location='shopcar.php'</script>";

?>