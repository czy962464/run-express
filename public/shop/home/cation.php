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
//品牌表

		    		 $sqlBrand='select * from `brand`';
		    		 $rstBrand=mysqli_query($link,$sqlBrand);
		    		 $posts = array();
		    		 while($rowBrand=mysqli_fetch_array($rstBrand)){
		    			// $rowBrands[$rowBrand['id']] = $rowBrand;
		    			$rowBrands[]=$rowBrand;	
		    		 }
		    	 // print_r($rowBrands);


	//商品表
	$sqlShop = "select shop.*,brand.name from shop,brand where shop.brand_id=brand.id and shop.shelf=1 order by rand()";

	$rstShop = mysqli_query($link, $sqlShop);
$posts = array();
	while($rowShop=mysqli_fetch_array($rstShop )) {
    
	 $rowShops[$rowShop['brand_id']] = $rowShop;
	//$rowShops[]=$rowShop;	
	}
//print_r($rowShops);

mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>分类</title>
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
	        <div class="top-sch-box flex-col">
	           <form action="select.php" method="post">
	            <div class="centerflex">
	                
	                <input type="text" name="key_word" value="" class="sch-txt" placeholder="输入您要搜索的商品" />
	               
	            	            <input type="submit" class="fdj iconfont icon-sousuo" value="搜索" style='height:0.45rem; font-size: .3rem;margin-top: -.5rem;margin-right:-.3rem;'></div>
	        </form>
	        </div>
	        <a class="btn" href="#">
	            <i class="iconfont icon-erweima"></i>
	        </a>
	    </header>
	    <!--header end-->
	    
	    <div class="warp clearfloat">
	    	<!--cation star-->
		    <div class="cations clearfloat">
		    	<?php
		    	foreach ($rowBrands as $row) {
		    	 	# code...
		    	// foreach ($rowShops as $rowshop) {
		    	 	# code...
		    	?>
		    	
		        <div class="list clearfloat fl">
		    		<a href="list.php?brand_id=<?php echo $row['id']?>">
			    		<p class="tit over box-s" align="center"><?php echo $row['name'] ?></p>
			    		<div class="tu">
			    			<img src="../admin/public/upload/<?php echo $rowShops[$row['id']]['img'] ?>"/>
			    		</div>
		    		</a>
		    	</div>
		    	<?php 
		    	// }

		    	}
		    	?>	
		    	
		    	</div> 
		    </div>
		    <!--cation end-->
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
					<a href="person/index.php">
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
	<!--插件-->
	<link rel="stylesheet" href="public/css/swiper.min.css">
	<script src="public/js/swiper.jquery.min.js"></script>
</html>
