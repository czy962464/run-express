<?php
	// $pdo=new PDO('mysql:host=localhost;dbname=shop','root','123456');
	$pdo=new PDO('mysql:host=139.129.208.229;dbname=jing','root','032a82067b');

	
	$pdo->exec('set names utf8');
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
?>