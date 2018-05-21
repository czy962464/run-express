<?php
	session_start();
	// print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>购物车</title>
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
		<!--header star-->
		<header class="mui-bar mui-bar-nav" id="header">
			<a class="btn" href="javascript:history.go(-1)">
	            <i class="iconfont icon-fanhui"></i>
	        </a>
	        <div class="top-sch-box top-sch-boxtwo flex-col">
	                      购物车
	        </div>
	       
	        <a class="btn" href="clearcar.php">
	            <!-- <i style="color:#f00;font-size:20px">清空购物车</i> -->
	            全部移除<i class="iconfont icon-lajixiang"></i>
	        </a>
	    </header>
	    <!--header end-->
	    
	    <div class="warp warptwo clearfloat">
	    	<div class="shopcar clearfloat" >

	    		<?php
	    			$tot=0;
	    			if(!$_SESSION['shops']){
	    			echo '<img src="../../admin/public/images/gwc.jpg" alt="" style="width:200px;height:150px;margin-left:25%;margin-top:30%">';
	    			echo "<br>";
	    				echo '<span style="width:200px;height:150px;margin-left:25%;margin-top:30%"> 您还未加购买商品，请先<a href="../cation.php" style="color:#ea0" >购买</a></span>';
	    			}else{
						foreach ($_SESSION['shops'] as $shop) {
	    				$tot+=$shop['price']*$shop['num'];	    				    			    	
	    		?>

	    		<div class="list clearfloat fl">
	    			<a href="delete.php?id=<?php echo $shop['id']?>">
	    			<div class="xuan clearfloat fl">
	    				<div class="radio" > 
						    <label>
						        <input type="checkbox" name="id" value="<?php echo $shop['id'] ?>" />
						        <div class="option"></div>
						    </label>
						</div>
	    			</div>
	    			</a>
	    			<a href="../detail.php?shop_id=<?php echo $shop['id'] ?>">
		    			<div class="tu clearfloat fl">
		    				<span></span>
		    				<img src="../../admin/public/upload/<?php echo $shop['img'] ?>"/>
		    			</div>
		    			<div class="right clearfloat fl">
		    				<p class="tit over"><?php echo $shop['name'] ?></p>
		    				<p class="fu-tit over">颜色：金色  内存：1287G</p>
		    				<!-- <p class="jifen over">2998购物币+700积分</p> -->
		    				<p>价格：<?php echo $shop['price'] ?>元</p>
		    				<p>库存：<?php echo $shop['stock'] ?>件</p>
		    				<div class="bottom clearfloat">
		    					<div class="zuo clearfloat fl">
		    						<ul>
		    							<li><a href="jian.php?id=<?php echo $shop['id']?>"><img src="../public/img/jian.png"/></li>
		    							<li><?php echo $shop['num']?></li>
		    							<li><a href="jia.php?id=<?php echo $shop['id']?>"><img src="../public/img/jia.png"/></a></li>
		    						</ul>
		    					</div>
		    					<a href="delete.php?id=<?php echo $shop['id']?>"><i class="iconfont icon-lajixiang fr"></i></a>
		    				</div>
		    				<p>总价：<?php echo $shop['price']*$shop['num'] ?>元</p>
		    			</div>
	    			</a>
	    		</div>
	    		<?php
	    			}
	    		
	    		?>
	    		
	    	</div>
	    </div>
	    
	    <!--settlement star-->
	    <div class="settlement clearfloat">
	    	<div class="zuo clearfloat fl box-s">
	    		合计：<span><?php echo $tot?>元</span>
	    	</div>
	    	<a href="../person/choice_address.php" class="fl db">
	    		立即结算
	    	</a>
	    	<!-- <a href="delete.php?id=<?php echo $shop['id']?>"><i class="iconfont icon-lajixiang fr"></i></a> -->
	    	<?php
	    		}
	    	?>
	    </div>
	    <!--settlement end-->
	    
		<!--footer star-->
	    <footer class="page-footer fixed-footer" id="footer">
			<ul>
				<li>
					<a href="../index.php">
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
					<a href="../person/index.php">
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
	<script type="../text/javascript" src="public/js/hmt.js" ></script>
	<script src="../public/slick/slick.js" type="text/javascript" ></script>
	<!--插件-->
	<link rel="stylesheet" href="../public/css/swiper.min.css">
	<script src="../public/js/swiper.jquery.min.js"></script>
</html>
