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
$time=time();
 $sqlI="select indent.*,status.name,status.id as sid from indent,status where indent.user_id={$user_id} and indent.status_id=status.id group by indent.dingdanhao ";
 $rstI=mysqli_query($link,$sqlI);
 $posts = array();
 while($rowi=mysqli_fetch_array($rstI)){
	
	$rowIs[]=$rowi;	
 }
// print_r($rowIs);
 $sqlS="select indent.id,indent.dingdanhao,indent.price,indent.num,shop.name,shop.img,shop.id from indent,shop where indent.shop_id=shop.id ";
 $rstS=mysqli_query($link,$sqlS);
 $posts = array();
 while($rows=mysqli_fetch_array($rstS)){
	
	$rowSs[]=$rows;	
 }
 
mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>全部订单</title>
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
			<p>全部订单</p>
	    </header>
	    <div id="main" class="mui-clearfix">
	    	<div class="order-top clearfloat">
	    		<ul>
	    			<li class="clearfloat cur"><a href="order.php">全部</a></li>
	    			<li class="clearfloat"><a href="unpay.php">待付款</a></li>
	    			<li class="clearfloat"><a href="undelivery.php">待发货</a></li>
	    			<li class="clearfloat"><a href="ungoods.php">待收货</a></li>
	    			<li class="clearfloat"><a href="uncomment.php">待评价</a></li>
	    		</ul>
	    	</div>
	    	<?php
	    			if($rowIs){
	    				foreach ($rowIs as $rowI) {
	    					foreach ($rowSs as $rowS) {
	    					
	    				
	    	?>
	    	<div class="order-list clearfloat">
	    		
	    		<p class="ordernum box-s">
	    			订单  <?php echo $rowI['dingdanhao']?>
	    			<span><?php echo $rowI['name']?></span>
	    			<span><?php echo date('Y:m:d H:i:s',$rowI['time']) ?></span>
	    		</p>
	    		<div class="list clearfloat fl box-s">
	    			<a href="../detail.php?shop_id=<?php echo $rowS['id']?>">
		    			<div class="tu fl clearfloat">
		    				<img src="../../admin/public/upload/<?php echo $rowS['img']?>"/>
		    			</div>

		    			<div class="middle clearfloat fl">
		    				<p class="tit"><?php echo $rowS['name']?></p>
		    				<p class="fu-tit">月销2000 领券减10元 店长推荐 3月压榨</p>
		    				<p class="price clearfloat">
		    					<span class="xprice fl"><?php echo $rowS['price']*$rowS['num']?></span>
		    					<span class="yprice fl">¥308</span>
		    					<span class="shu"><?php echo $rowS['num']?></span>
		    				</p>
		    			</div>
	    			</a>
	    		</div>
				<?php 
				if($rowI['confirm']) {
					echo "<a href='comment.php?shop_id={$rowS['id']}'>评论</a>";
					echo "&nbsp&nbsp";

	    			echo "<a href='del_order.php?id={$rowI['id']}' \>删除订单</a> ";

				}else{
					echo "<a href='confirm_order.php?dingdanhao={$rowI['dingdanhao']}' \>确认订单</a> ";
					
					echo "<a href='del_order.php?id={$rowI['id']}' \>删除订单</a> ";
				}
					?>
	    		
	    	</div>
	    	<?php
	    	}
	    }
	    }else{
	    	echo "无订单，<script>location='../index.php'</script>";
	    }
	    		?>
	    	<style type="text/css">
	    		.more-btn{width: 25%; padding: 3% 0; text-align: center; background-color: #00CC7D; color: #fff; font-size: .5rem; margin: 5% auto;}
	    	</style>
	    	<a href="#" class="more-btn db ra5">更多</a>
	    </div>
	</body>
	<script type="text/javascript" src="../public/js/jquery-1.8.3.min.js" ></script>
	<script src="../public/js/fastclick.js"></script>
	<script src="../public/js/mui.min.js"></script>
	<script type="text/javascript" src="../public/js/hmt.js" ></script>
</html>
