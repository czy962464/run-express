<?php

    include '../public/common/config.php';
   // include '../../public/common/page.class.php';
    //每页三条
     $k=$_POST['key_word'];
    $sql="select * from brand where name like '%{$k}%'" ;
    $smt=$pdo->prepare($sql);
    $smt->execute();
    $rows=$smt->fetchAll();
    print_r($rows);
    if($rows){
    // 	$id=$rows['id'];
    // 	echo "<script>location='list.php?brand_id={$id}'</script>";
    // }
    // print_r($rows_id);
    // echo $rows['id'];
    foreach ($rows as $row) {
    		echo "<script>location='list.php?brand_id={$row['id']}'</script>";
    }
}
?>
