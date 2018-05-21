<?php
session_start();
header("content-type:text/html;charset=utf-8");
// $host = 'localhost';
// $user = 'root';
// $password = '123456';
// $database = 'shop';
$host = '139.129.208.229';

$user = 'root';

$password = '032a82067b';

$database = 'jing';
$port = 3306;
$link = mysqli_connect($host, $user, $password, $database, $port);
mysqli_set_charset($link,'utf8');
$user_id=$_SESSION['home_userid'];
	 $sql="select * from touch where user_id={$user_id}";
	 $rst=mysqli_query($link,$sql);
	 $posts = array();
	 
	 // print_r($rows);
mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>选择收货地址</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="../public/js/rem.js"></script> 
    <script src="../public/js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/page.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/mui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="../public/css/loading.css"/>
<script type="text/javascript">
	$(window).load(function(){
		$(".loading").addClass("loader-chanage")
		$(".loading").fadeOut(300)
	})
</script>
<style>
	body{
		background-color:#fff; 
	}
</style>
</head>
<!--loading页开始-->
<div class="loading">
	<div class="loader">
        <div class="loader-inner pacman">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
	</div>
</div>
<!--loading页结束-->
	<body>
		<header class="mui-bar mui-bar-nav report-header box-s" id="header">
			<a href="javascript:history.go(-1)"><i class="iconfont icon-fanhui fl"></i></a>
			<p>选择收货地址</p>
			<span class="fr baocun"><a href="address.php">管理</a></span>			
	    </header>
	    <div id="main" class="mui-clearfix add-address choice-address">
	    	<form action="confirm.php" method="post">
	    	<?php
	    	if(!$user_id){

echo '<img src="../../admin/public/images/dz.jpg" style="width:100%">';
	    		echo "<div style='margin-left:30%;color:#222'>您还未登录，请<a href='../login.php' style='color:#ea0'>登录</a></div>";
	    	
	 }else{
	 	while($rowt=mysqli_fetch_array($rst)){
		$rows[]=$rowt;	
	    }
	    		if($rows){
	    			foreach ($rows as $row) {
		
	    ?>
	    	<div class="addlist clearfloat">

	    		<div class="top clearfloat box-s">
	    			<div class="xuan clearfloat fl">
	    				<div class="radio"> 
						    <label>
						        <input type="radio" name="touch_id" value="<?php echo $row['id']?>" checked>
						        <div class="option" style="width:20px;height:20px"></div>
						    </label>
						</div>
	    			</div>
	    				<div>&nbsp</div>
	    				<div>&nbsp</div>
	    			<ul>
	    				<li>
	    					<span class="fl"><?php echo $row['name']?></span>
	    					<span class="fr"><?php echo $row['phone']?></span>
	    				</li>
	    				<!-- <li>
	    					<span class="moren">[默认地址]</span><?php echo $row['addr']?>
	    				</li> -->
	    			</ul>
	    		</div>
	    	</div>

	    	<?php
	    		}
	    		echo "<input type='submit' value='确认订单' style='margin-left: 40%;'>";
	    	
	    }else{
	    		// echo "<div style='height:400px;width:100%;background-color:#222'>";
	    		echo '<img src="../../admin/public/images/shdz.jpg" style="margin-top:50px;margin-left:20px">';echo "<br>";
	    		echo "<div style='margin-left:20%'> 您还没有收获地址信息，请<a href='add_address.php' style='color:#ec0'>添加</a></div>";
	    		// echo "</div>";
	    	}
	    }

	    	?>
	    	
			</form>
	    	
	    </div>
	</body>
	<script type="text/javascript" src="../public/js/jquery-1.8.3.min.js" ></script>
	<script src="../public/../public/js/fastclick.js"></script>
	<script src="../public/js/mui.min.js"></script>
	<script type="text/javascript" src="../public/js/hmt.js" ></script>
	<script type="text/javascript" src="../public/js/jquery.min.js"></script>
</html>
