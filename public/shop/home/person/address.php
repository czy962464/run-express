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
//联系方式表

		    		 $sql="select * from touch where user_id={$user_id} ";
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
    <title>管理收货地址</title>
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
		background-color: #fff;
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
			<a href="./index.php"><i class="iconfont icon-fanhui fl"></i></a>
			<p>管理收货地址</p>
	    </header>
	    <div id="main" class="mui-clearfix contaniner">

	    	<?php
	    	if(!$user_id){
	    		echo '<img src="../../admin/public/images/dz.jpg" style="width:100%">';
	    		echo "<div style='margin-left:30%;color:#222'>您还未登录，请<a href='../login.php' style='color:#ea0'>登录</a></div>";
		    		 	
		    		}else{
		    			while($rowTouch=mysqli_fetch_array($rst)){
		    			
		    			$rows[]=$rowTouch;	
		    		 }
		    		
	    	if(!$rows){
	    		echo '<img src="../../admin/public/images/shdz.jpg" style="margin-top:50px;margin-left:20px">';echo "<br>";
	    		echo "<div style='margin-left:20%'> 您还没有收获地址信息，请<a href='add_address.php' style='color:#ec0'>添加</a></div>";
	    	}else{
	    		foreach ($rows as $row) {

	    		
	    	?>
	    	<div class="addlist clearfloat">
	    		<div class="top clearfloat box-s">
	    			
	    			<ul>
	    				<li>
	    					<span class="fl"><?php echo $row['name'] ?></span>
	    					<span class="fr"><?php echo $row['phone'] ?></span>
	    				</li>
	    				<li>
	    					<?php echo $row['addr'] ?>
	    				</li>
	    			</ul>
	    		</div>
	    		<div class="bottom clearfloat box-s">
	    			<section class="shopcar clearfloat">
						<div class="radio fl"> 
						    <label>
						        <input type="radio" name="sex" value="">
						        <div class="option"></div>
						        <!-- <span class="mradd smradd fl">设为默认</span> -->
						    </label>
						</div>
						
						<div class="right fr clearfloat">
							<a href="addr_del.php?id=<?php echo $row['id']?>" class="fr">
								<i class="iconfont icon-lajixiang"></i>
								删除
							</a>
							<a href="edit_address.php?id=<?php echo $row['id']?>" class="fr">
								<i class="iconfont icon-shouji"></i>
								编辑
							</a>							
						</div>
					</section>
	    		</div>
	    	</div>
	    	
	    	<?php
	    		}
	    		echo "</div>";
	    
     	echo '<a href="add_address.php" class="address-add fl">添加新地址</a>';
	    	}}
	    	?>
	    	
	    	
	    	
	    
	</body>
	<script type="text/javascript" src="../public/js/jquery-1.8.3.min.js" ></script>
	<script src="../public/js/fastclick.js"></script>
	<script src="../public/js/mui.min.js"></script>
	<script type="text/javascript" src="../public/js/hmt.js" ></script>
</html>  