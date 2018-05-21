<?php
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


$id=$_GET['shop_id'];


//商品表
$sqlShop = "select * from shop where id={$id}";

$rstShop = mysqli_query($link, $sqlShop);

$posts = array();
$rowShop=mysqli_fetch_array($rstShop);
//print_r($rowShop);
//评价表
$sqlComment = "select * from comment,user where comment.user_id=user.id and comment.shop_id={$id}";

$rstComment = mysqli_query($link, $sqlComment);

$posts = array();
while($rowComment=mysqli_fetch_array($rstComment)){
	$rowComments[]=$rowComment;
};
//print_r($rowComments);

mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>评论页</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script src="public/js/rem.js"></script> 
    <script src="public/js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="public/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/page.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/mui.min.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/loading.css"/>
    <link rel="stylesheet" type="text/css" href="public/slick/slick.css"/>
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
		<!--header <style type="text/css"></style>ar-->
	    <header class="mui-bar mui-bar-nav" id="header">
			<a class="btn" href="./index.php">
	            <i class="iconfont icon-fanhui"></i>
	        </a>
	        <div class="top-sch-box top-sch-boxtwo flex-col">
	            <ul>
	            	<li><a href="detail.php?shop_id=<?php echo $rowShop['id'] ?>">商品</a></li>
	            	<li><a href="shopdetail.php?shop_id=<?php echo $rowShop['id'] ?>">详情</a></li>
	            	<li class="cur"><a href="#">评价</a></li>
	            </ul>
	        </div>
	        <a class="btn" href="#">
	            <i class="iconfont icon-gouwuche"></i>
	            <span>2</span>
	        </a>
	    </header>
		<!--header end-->
		
		<div class="warp warptwo clearfloat">
			<div class="detail clearfloat">
				<!--banner star-->
				<!-- <div class="banner swiper-container">
		           
		            <div class="swiper-pagination"></div>
		        </div> -->
				<!--banner end-->
				<div class="middle clearfloat box-s">
					<a href="shopdetail.php?shop_id=<?php echo $rowShop['id'] ?>">
						<span class="fl">商品详情</span>
						<i class="iconfont icon-jiantou1 fr"></i>
					</a>
				</div>
				
				<div class="top clearfloat box-s">

					<?php 
					if($rowComments){
						foreach ($rowComments as $rowcmt) {			
				?>
					<div class="shang clearfloat">
						<div><?php echo $rowcmt['username'] ?></div>
						<div class="zuo clearfloat fl over2 box-s">
							<?php echo $rowcmt['content'] ?>
						</div>
						
					</div>
				<?php
					}
						}else{
				?>
					<div class="shang clearfloat">
						
						<div class="zuo clearfloat fl over2 box-s">
							 暂无任何评论
						</div>
						
					</div>
				<?php
					}
				?>
				</div>
				
					
				
			</div>
		</div>
		
		<!--footerone star-->
		<div class="footerone clearfloat">
			<div class="left clearfloat fl">
				<ul>
					<li>
						<a href="#">
							<i class="iconfont icon-shangcheng"></i>
							<p>商城</p>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="iconfont icon-kefu1"></i>
							<p>客服</p>
						</a>
					</li>				
				</ul>
			</div>
			<div class="right clearfloat fl">
				<a href="shopcar/insert.php?id=<?php echo $rowShop['id'] ?>" class="btn fl" onClick="toshare()">加入购物车</a>
				<a href="confirm.php" class="btn btnone fl">立即购买</a>
			</div>
		</div>
		<!--footerone end-->
		
		<!--这里是弹出购物车内容-->
		<div class="am-share">
		<div class="am-share-footer"><button class="share_btn"><img src="public/img/chahao.png"/></button></div>
		  <div class="am-share-sns box-s">
		     <div class="sdetail clearfloat">
		     	<div class="top clearfloat">
		     		<div class="tu clearfloat fl">
		     			<span></span>
		     			<img src="public/upload/22.jpg"/>
		     		</div>
		     		<div class="you clearfloat fl">
		     			<p class="tit">小米Max</p>
		     			<span>2998购物币+700积分</span>
		     		</div>
		     	</div>
		     	<div class="middle clearfloat">
		     		<p>颜色分类</p>
		     		<div class="xia clearfloat">
		     			<ul>
			     			<li class="ra3 cur">金色</li>
			     			<li class="ra3">灰色</li>
			     		</ul>
		     		</div>		     		
		     	</div>
		     	<div class="middle clearfloat">
		     		<p>机身内存</p>
		     		<div class="xia clearfloat">
		     			<ul>
			     			<li class="ra3 cur">128G</li>
			     			<li class="ra3">16G</li>
			     		</ul>
		     		</div>		     		
		     	</div>
		     	<div class="bottom clearfloat">
		     		<p class="fl">购买数量</p>
		     		<div class="you clearfloat fr">
		     			<ul>
		     				<li><img src="public/img/jian.jpg"/></li>
		     				<li>1</li>
		     				<li><img src="public/img/jia.jpg"/></li>
		     			</ul>
		     		</div>
		     	</div>
		     </div>
		  </div>
		  <a href="confirm.php" class="shop-btn db">确定</a>
		</div>
		
		<!--footer star-->
	    <footer class="page-footer fixed-footer" id="footer">
			<ul>
				<li>
					<a href="index.php">
						<i class="iconfont icon-shouye"></i>
						<p>首页</p>
					</a>
				</li>
				<li class="active">
					<a href="cation.php">
						<i class="iconfont icon-icon04"></i>
						<p>分类</p>
					</a>
				</li>
				<li>
					<a href="shopcar/shopcar.php">
						<i class="iconfont icon-gouwuche"></i>
						<p>购物车</p>
					</a>
				</li>
				<li>
					<a href="login.php">
						<i class="iconfont icon-yonghuming"></i>
						<p>我的</p>
					</a>
				</li>
			</ul>
		</footer>
		<!--footer end-->
	</body>
	<script type="text/javascript" src="public/js/jquery-1.8.3.min.js" ></script>
	<script src="public/js/mui.min.js"></script>
	<script src="public/js/others.js"></script>
	<script type="text/javascript" src="public/js/hmt.js" ></script>
	<script src="public/slick/slick.js" type="text/javascript" ></script>
	<script type="text/javascript" src="public/js/shopcar.js" ></script>
	<!--插件-->
	<link rel="stylesheet" href="public/css/swiper.min.css">
	<script src="public/js/swiper.jquery.min.js"></script>
</html>
	