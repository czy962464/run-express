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
//广告表
$sqlAdvert = 'select * from `advert`';
// $sqlAdvert = "select * from 'advert'";
$rstAdvert = mysqli_query($link, $sqlAdvert);

$posts = array();
while($rowAdvert= mysqli_fetch_array($rstAdvert )) {
    // $posts[] = $row;
    $rowAds[$rowAdvert['pos']] = $rowAdvert;
}
//品牌表
$sqlBrand = "select * from brand";

$rstBrand = mysqli_query($link, $sqlBrand);
$rowBrand= mysqli_fetch_array($rstBrand);
  // print_r($rowBrand);  

//商品表
$sqlShop = "select shop.* from shop,brand where shop.brand_id=brand.id and shop.shelf=1 order by rand()";

$rstShop = mysqli_query($link, $sqlShop);

//$posts = array();
while($rowShop= mysqli_fetch_array($rstShop )) {
    
	$rowShops[$rowShop['brand_id']] = $rowShop;
}


mysqli_close($link);

?>
	

<!DOCTYPE >
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>首页</title>
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
			<!-- <a class="btn slide-menu" href="#">
	            <i class="iconfont icon-iconfontcaidan"></i>
	        </a> -->
	        <div class="top-sch-box flex-col">
	        	<form action="select.php" method="post">
	            <div class="centerflex">
	                
	                <input type="text" name="key_word" value="" class="sch-txt" placeholder="输入您要搜索的商品" />
	          <!--       <input type="text" name="key_run" value="" class="sch-txt" placeholder="输入您要搜索的商品" />
	                <input type="text" name="key_network" value="" class="sch-txt" placeholder="输入您要搜索的商品" />
	                <input type="text" name="key_fuselage" value="" class="sch-txt" placeholder="输入您要搜索的商品" /> -->
	               
	            <input type="submit" class="fdj iconfont icon-sousuo" value="搜索" style='height:0.45rem; font-size: .3rem;margin-top: -.5rem;margin-right:-.3rem;'></div>
				


	        </form>
	        </div>
	        <!-- <a class="btn" href="#">
	            <i class="iconfont icon-erweima"></i>
	        </a> -->
	        <?php
	        	if(!$_SESSION['home_userid']){
	        		echo "<a href='login.php' style='color:#f00'>登录</a>";
	        	}else{
	        		echo "<span style='color:#f00'>欢迎{$_SESSION['home_username']}</span>|<a href='logout.php' style='color:#f00'>退出</a>";
	        	}
	        ?>
	    </header>
	   
	    <!--header end-->
	    
	    <!-- 侧边导航 -->
		<div class="slide-mask"></div>
		
		<div id="main" class="clearfloat warp">			
		    <div class="mui-content">
				<!--banner开始-->
				<div class="banner swiper-container">
		            <div class="swiper-wrapper" style="height:auto">
		               <div class="swiper-slide" style="height:auto"><a href="javascript:void(0)"><img class="swiper-lazy" data-src="../admin/public/uploadadvert/<?php echo $rowAds[0]['img']
		               // foreach ($posts as $p) {
		               // 	echo $p['img'];
		               	# code...
		               // }
		               ?>" alt=""></a></div> 
		                <!-- <div class="swiper-slide" style="height:auto"><a href="javascript:void(0)"><img class="swiper-lazy" data-src="../admin/public/upload/a.jpg" alt=""></a></div>
		                <div class="swiper-slide" style="height:auto"><a href="javascript:void(0)"><img class="swiper-lazy" data-src="../admin/public/upload/b.jpg" alt=""></a></div>
		                <div class="swiper-slide" style="height:auto"><a href="javascript:void(0)"><img class="swiper-lazy" data-src="public/upload/banner.jpg" alt=""></a></div> -->
		            </div>
		        </div>
		        <!--banner结束-->
		        <!--第一栏分类开始-->
		        <div class="cation clearfloat box-s">
		        	<ul>
		        		<li>
		        			<a href="javascript:">
		        				<img src="public/img/icon1.png"/>
		        				<p>报单专区</p>
		        			</a>
		        		</li>
		        		<li>
		        			<a href="javascript:">
		        				<img src="public/img/icon2.png"/>
		        				<p>联盟商家</p>
		        			</a>
		        		</li>
		        		<li>
		        			<a href="javascript:">
		        				<img src="public/img/icon3.png"/>
		        				<p>猜你喜欢</p>
		        			</a>
		        		</li>
		        		<li>
		        			<a href="javascript:">
		        				<img src="public/img/icon4.png"/>
		        				<p>热门商品</p>
		        			</a>
		        		</li>
		        	</ul>
		        </div>
		        <!--第一栏分类结束-->
		        <!--滚动公告开始-->
		        <!-- <div class="notice clearfloat box-s">
		        	<p class="tit clearfloat fl">利民公告：</p>
		        	<div class="left fl clearfloat box-s">
						<div class="slider autoplay">
						</div>							
					</div>		
					<a href="#" class="nmore clearfloat fr">更多</a>
		        </div> -->
		        <!--滚动公告结束-->
		        
		        <!--boutique star-->
		        <div class="boutique clearfloat box-s">
		        	<div class="boutit clearfloat">
		        		<span></span>
		        		<samp>精品任选</samp>
		        	</div>
		        	<div class="content clearfloat">
		        		<ul>
		        			<li>
		        				<a href="#">
		        					<img src="../admin/public/uploadadvert/<?php echo $rowAds[1]['img']
		               
		               ?>" />
		        				</a>
		        			</li>
		        			<li>
		        				<a href="#">
		        					<img src="../admin/public/uploadadvert/<?php echo $rowAds[2]['img']
		               // foreach ($posts as $p) {
		               // 	echo $p['img'];
		               	# code...
		               // }
		               ?>"/>
		        				</a>
		        			</li>
		        		</ul>
		        	</div>
		        </div>
		        <!--boutique end-->
		        
		        <!--seller star-->
		        <div class="seller clearfloat">
		        	<!-- <div class="boutit clearfloat">
		        		<span></span>
		        		<samp>热卖推荐</samp>
		        	</div>
		        	<div class="content clearfloat">
		        		<div class="left clearfloat fl">
		        			<a href="detail.php">
			        			<div class="top clearfloat box-s">
			        				<p class="tit over">天天特惠</p>
			        				<span class="over db">每天10点 爆款抢不停</span>
			        			</div>
			        			<div class="tu">
			        				<img src="public/upload/3.jpg"/>
			        			</div>
		        			</a>
		        		</div>
		        		<div class="right clearfloat fr">
		        			<div class="top clearfloat fl">
		        				<a href="detail.php">
			        				<div class="zuo clearfloat fl box-s">
			        					<p class="tit over">酒水饮料</p>
				        				<span class="over db">炫彩预调鸡尾酒</span>
			        				</div>
			        				<div class="tu clearfloat fr">
			        					<span></span>
			        					<!-- <img src="public/upload/4.jpg"/> -->
			        					<!-- <img src="../admin/public/upload/<?php echo $rowShops[1]['img']?>"
			        				</div>
		        				</a>
		        			</div>
		        		<div class="top clearfloat fl">
		        				<a href="detail.php">
			        				<div class="zuo clearfloat fl box-s">
			        					<p class="tit over">酒水饮料</p>
				        				<span class="over db">炫彩预调鸡尾酒</span>
			        				</div>
			        				<div class="tu clearfloat fr">
			        					<span></span>
			        					<img src="../admin/public/upload/<?php echo $rowShops[1]['img']?>"
			        				</div>
		        				</a>
		        			</div>
		        		</div> --> 
		        	</div>
		        </div>
		        <!--seller end-->
		        
		        <!--onnew star-->
		        <div class="onnew clearfloat">
		        	<div class="boutit clearfloat">
		        		<span></span>
		        		<samp>每周上新</samp>
		        	</div>
		        	<div class="content clearfloat">
		        		<div class="top clearfloat">
		        			<div class="list clearfloat fl ">
		        				<a href="detail.php?shop_id=<?php echo $rowShops[12]['id']?>">
			        				<!-- <div class="zuo clearfloat fl box-s" style="margin-top: 20px">
			        					<p class="tit over">电器数码</p>
				        				<span class="over db">大屏就是小米max</span>
			        				</div>  -->
			        				<div class="tu clearfloat fr" style="margin-right:45px;">
			        					<span></span>
			        					<img src="../admin/public/upload/<?php echo $rowShops[12]['img']?>"/>
			        				</div>
		        				</a>
		        			</div>
		        			<div class="list clearfloat fl ">
		        				<a href="detail.php?shop_id=<?php echo $rowShops[13]['id']?>">
			        				<!-- <div class="zuo clearfloat fl box-s" style="margin-top: 20px">
			        					<p class="tit over">电器数码</p>
				        				<span class="over db"><?php echo $rowBrand[13]['name']?></span>
			        				</div> -->
			        				<div class="tu clearfloat fr" style="margin-right:45px;">
			        					<span></span>
			        					<img src="../admin/public/upload/<?php echo $rowShops[13]['img']?>"/>
			        				</div>
		        				</a>
		        			</div>
		        		</div>
		        		<div class="bottom clearfloat">
		        			<div class="list clearfloat fl">
		        				<a href="detail.php?shop_id=<?php echo $rowShops[14]['id']?>">
		        					<!-- <div class="shang clearfloat fl box-s">
			        					<p class="tit over">一起玩耍</p>
				        				<span class="over db">一款贱贱的ted熊</span>
			        				</div> -->
			        				<div class="tu clearfloat fr" style="margin-top:25px;">
			        					<span></span>
			        					<img src="../admin/public/upload/<?php echo $rowShops[14]['img']?>"/>
			        				</div>
		        				</a>
		        			</div>
		        			<div class="list clearfloat fl">
		        				<a href="detail.php?shop_id=<?php echo $rowShops[4]['id']?>">
		        					<!-- <div class="shang clearfloat fl box-s">
			        					<p class="tit over">一起玩耍</p>
				        				<span class="over db">一款贱贱的ted熊</span>
			        				</div> -->
			        				<div class="tu clearfloat fr" style="margin-top:25px;">
			        					<span></span>
			        					<img src="../admin/public/upload/<?php echo $rowShops[17]['img']?>"/>
			        				</div>
		        				</a>
		        			</div>
		        			<div class="list clearfloat fl">
		        				<a href="detail.php?shop_id=<?php echo $rowShops[16]['id']?>">
		        					<!-- <div class="shang clearfloat fl box-s">
			        					<p class="tit over">一起玩耍</p>
				        				<span class="over db">一款贱贱的ted熊</span>
			        				</div> -->
			        				<div class="tu clearfloat fr" style="margin-top:25px;">
			        					<span></span>
			        					<img src="../admin/public/upload/<?php echo $rowShops[16]['img']?>"/>
			        				</div>
		        				</a>
		        			</div>
		        		</div>
		        	</div>
		        </div>
		        
		        <!--theme end-->
		        
		        <!--like star-->
		        <!-- <div class="like clearfloat box-s">
		        	<div class="boutit clearfloat">
		        		<span></span>
		        		<samp>猜你喜欢</samp>
		        	</div>
		        	<div class="content clearfloat">
		        		<div class="list clearfloat fl">
		        			<a href="detail.php">
			        			<div class="tu clearfloat">
			        				<img src="../admin/public/upload/<?php echo $rowShops[16]['img']?>"/>
			        			</div>
			        			<div class="bottom clearfloat box-s">
			        				<p class="over"><?php echo $rowShops[16]['name']?></p>
			        				<span>¥<?php echo $rowShops[15]['price']?></span>
			        			</div>
		        			</a>
		        		</div>
		        		<div class="list clearfloat fl">
		        			<a href="detail.php">
			        			<div class="tu clearfloat">
			        				<img src="../admin/public/upload/<?php echo $rowShops[16]['img']?>"/>
			        			</div>
			        			<div class="bottom clearfloat box-s">
			        				<p class="over"><?php echo $rowShops[16]['name']?></p>
			        				<span>¥<?php echo $rowShops[15]['price']?></span>
			        			</div>
		        			</a>
		        		</div>
		        		<div class="list clearfloat fl">
		        			<a href="detail.php">
			        			<div class="tu clearfloat">
			        				<img src="public/upload/9.jpg"/>
			        			</div>
			        			<div class="bottom clearfloat box-s">
			        				<p class="over">休闲运动男女鞋春夏秋冬款</p>
			        				<span>¥108.00</span>
			        			</div>
		        			</a>
		        		</div>
		        		<div class="list clearfloat fl">
		        			<a href="detail.php">
			        			<div class="tu clearfloat">
			        				<img src="public/upload/9.jpg"/>
			        			</div>
			        			<div class="bottom clearfloat box-s">
			        				<p class="over">休闲运动男女鞋春夏秋冬款</p>
			        				<span>¥108.00</span>
			        			</div>
		        			</a>
		        		</div>
		        	</div>
		        </div> -->
		        <!--like end-->
	        </div
		</div>
		<!--footer star-->
		<footer class="page-footer fixed-footer" id="footer">
			<ul>
				<li class="active">
					<a href="index.php">
						<i class="iconfont icon-shouye"></i>
						<p>首页</p>
					</a>
				</li>
				<li>
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
		<script type="text/javascript" src="public/js/jquery-1.8.3.min.js" ></script>
		<script src="public/js/others.js"></script>
		<script type="text/javascript" src="public/js/hmt.js" ></script>
		<script src="public/slick/slick.js" type="text/javascript" ></script>
		<!--插件-->
		<link rel="stylesheet" href="public/css/swiper.min.css">
		<script src="public/js/swiper.jquery.min.js"></script>
		<!--新闻资讯滚动-->
		<script type="text/javascript">
			$('.autoplay').slick({
			  slidesToShow: 1,
			  slidesToScroll: 1,
			  autoplay: true,
			  autoplaySpeed: 2000,
			});
		</script>
		
	</body>

</html>