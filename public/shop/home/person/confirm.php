<?php
session_start();
	// print_r($_POST);
header("content-type:text/html;charset=utf-8");
$host = '139.129.208.229';

$user = 'root';

$password = '032a82067b';

$database = 'jing';
$port = 3306;
$link = mysqli_connect($host, $user, $password, $database, $port);
mysqli_set_charset($link,'utf8');

$dingdanhao=time().mt_rand();
$user_id=$_SESSION['home_userid'];

$time=time();

$touch_id=$_POST['touch_id'];
// echo $touch_id;
// exit;
foreach ($_SESSION['shops'] as $shop) {
	// print_r($shop);
	$sql="insert into indent(dingdanhao,user_id,time,touch_id,shop_id,price,num) values('{$dingdanhao}','{$user_id}','{$time}','{$touch_id}','{$shop['id']}','{$shop['price']}','{$shop['num']}')";
	mysqli_query($link,$sql);

	$st=$shop['stock']-$shop['num'];
	$sqlStock="update shop set stock='{$st}'  where id={$shop['id']}";
		 mysqli_query($link,$sqlStock);//减库存



}

$_SESSION['shops']=array();//清空购物车
	echo "<script>alert('您的订单号为：{$dingdanhao}')</script>";
	echo "<script>location='order.php'</script>";



// $user_id=$_SESSION['home_userid'];

// 		    		 $sql="select * from touch where user_id={$user_id} ";
// 		    		 $rst=mysqli_query($link,$sql);
// 		    		 $posts = array();
// 		    		 while($rowTouch=mysqli_fetch_array($rst)){
		    			
// 		    			$rows[]=$rowTouch;	
// 		    		 }
		    		 // print_r($rows);		    	
mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>确认订单</title>
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
    <link rel="stylesheet" type="text/css" href="../public/slick/slick.css"/>
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
		<!--header star-->
		<header class="mui-bar mui-bar-nav" id="header">
			<a class="btn" href="javascript:history.go(-1)">
	            <i class="iconfont icon-fanhui"></i>
	        </a>
	        <div class="top-sch-box top-sch-boxtwo flex-col">
	                      确认订单
	        </div>
	    </header>
	    <!--header end-->
	    
	    <div class="warp warptwo clearfloat">
	    	<div class="confirm clearfloat">
	    		<div class="add clearfloat box-s">
	    			<a href="choice-address.php">
		    			<div class="left clearfloat fl">
		    				<i class="iconfont icon-dizhi1"></i>
		    			</div>
		    			<div class="middle clearfloat fl">
		    				<p class="tit">
		    					收货人：王小王&nbsp;&nbsp;&nbsp;&nbsp;15806976589
		    				</p>
		    				<p class="fu-tit over2">
		    					收货地址：安徽省合肥市高新区长江西路拓基城市广场金座A2002
		    				</p>
		    			</div>
		    			<div class="left clearfloat fr">
		    				<i class="iconfont icon-jiantou1"></i>
		    			</div>
	    			</a>
	    		</div>
	    		<div class="lie clearfloat">
					<a href="../detail.php">
						<div class="tu clearfloat fl">
							<img src="public/upload/19.jpg"/>
						</div>
					</a>
					<div class="right clearfloat fl">
						<a href="../detail.php">
							<p class="tit over">小米Max全网通4G大屏智能手机</p>
							<p class="fu-tit">颜色：金色  内存：1287G</p>
						</a>
						<div class="xia clearfloat">
							<a href="../detail.html">
								<p class="jifen fl over">2998购物币+700积分</p>
							</a>
							<span class="fr db">×1</span>
						</div>
					</div>
				</div>
				<div class="gmshu clearfloat box-s fl">
					<div class="gcontent clearfloat">
						<p class="fl">购买数量</p>
			     		<div class="you clearfloat fr">
			     			<ul>
			     				<li><img src="../public/img/jian.jpg"/></li>
			     				<li>1</li>
			     				<li><img src="../public/img/jia.jpg"/></li>
			     			</ul>
			     		</div>
					</div>		     		
		     	</div>
		     	<div class="gmshu gmshutwo clearfloat box-s fl">
					<div class="gcontent clearfloat">
						<p class="fl">配送方式</p>
			     		<div class="you clearfloat fr">
			     			<span>快递 免邮</span>
			     			<i class="iconfont icon-jiantou1"></i>
			     		</div>
					</div>		     		
		     	</div>
		     	<div class="gmshu gmshutwo clearfloat box-s fl">
					<div class="gcontent clearfloat">
						<p class="fl">发票信息</p>
			     		<div class="you clearfloat fr">
			     			<div class="xuan clearfloat">
			     				<div class="radiotwo" > 
								    <label>
								        <input type="radio" name="fapiao" value="" />
								        <div class="option"></div>
								        <span class="opt-text">需要发票</span>
								    </label>
								</div>
			     			</div>
		    				<div class="xuan clearfloat">
			     				<div class="radiotwo" > 
								    <label>
								        <input type="radio" name="fapiao" value="" />
								        <div class="option"></div>
								        <span class="opt-text">不需要发票</span>
								    </label>
								</div>
			     			</div>
			     		</div>
					</div>		     		
		     	</div>
		     	<div class="gmshu gmshuthree clearfloat box-s fl">
					<div class="gcontent clearfloat">
						<p class="fl">买家留言</p>
			     		<div class="you clearfloat fl">
			     			<input type="text" name="" id="" value="" class="text" placeholder="选填 对本次交易需求给商家留言" />
			     		</div>
					</div>		     		
		     	</div>
		     	<div class="gmshu clearfloat box-s fl">
					<p class="fr">共1件商品   合计<samp>￥2998</samp></p>	     		
		     	</div>
		     	<div class="integral clearfloat fl box-s">
		     		<div class="zuo clearfloat fl">
		     			积分&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;可用积分2446
		     		</div>
		     		<div class="you clearfloat fr">
		     			<div class="xuan clearfloat">
		     				<div class="radiothree" > 
							    <label>
							        <input type="checkbox" name="fapiao" value="" />
							        <div class="option"></div>
							    </label>
							</div>
		     			</div>
		     		</div>
		     	</div>
	    	</div>
	    </div>	    
	    
		<!--settlement star-->
	    <div class="settlement clearfloat">
	    	<div class="zuo clearfloat fl box-s">
	    		共<span>1</span>件  总金额：<span>￥2998</span>
	    	</div>
	    	<a href="submit-order.php" class="fl db">
	    		提交订单
	    	</a>
	    </div>
	    <!--settlement end-->
	    
		<!--footer star-->
	    <footer class="page-footer fixed-footer" id="footer">
			<ul>
				<li>
					<a href="index.php">
						<i class="iconfont icon-shouye"></i>
						<p>首页</p>
					</a>
				</li>
				<li>
					<a href="../cation.php">
						<i class="iconfont icon-icon04"></i>
						<p>分类</p>
					</a>
				</li>
				<li class="active">
					<a href="../shopcar.php">
						<i class="iconfont icon-gouwuche"></i>
						<p>购物车</p>
					</a>
				</li>
				<li>
					<a href="../login.php">
						<i class="iconfont icon-yonghuming"></i>
						<p>我的</p>
					</a>
				</li>
			</ul>
		</footer>
		<!--footer end-->
	</body>
	<script type="text/javascript" src="../public/js/jquery-1.8.3.min.js" ></script>
	<script src="../public/js/mui.min.js"></script>
	<script src="../public/js/others.js"></script>
	<script type="text/javascript" src="../public/js/hmt.js" ></script>
	<script src="../public/slick/slick.js" type="text/javascript" ></script>
	<!--插件-->
	<link rel="stylesheet" href="../public/css/swiper.min.css">
	<script src="../public/js/swiper.jquery.min.js"></script>
</html>
