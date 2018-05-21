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

$shop_id=$_GET['shop_id'];
//联系方式表
$time=time();
 $sql="select * from shop where id={$shop_id}";
 $rst=mysqli_query($link,$sql);
 $posts = array();
 $row=mysqli_fetch_array($rst);
	
		
 
// print_r($rowIs);
 $sqlS="select indent.dingdanhao,indent.price,indent.num,shop.name,shop.img,shop.id from indent,shop where indent.shop_id=shop.id ";
 $rstS=mysqli_query($link,$sqlS);
 $posts = array();
 while($rows=mysqli_fetch_array($rstS)){
	
	$rowSs[]=$rows;	
 }
 // print_r($rowSs);
mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>收货评价</title>
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
			<p>收货评价</p>
	    </header>
	    <form action="comment_insert.php" method="post">
	    <div id="main" class="mui-clearfix">
	    	
	    	<div class="assess clearfloat">
	    		<div class="top clearfloat box-s">
	    			<div class="tu fl clearfloat">
	    				<img src="../../admin/public/upload/<?php  echo $row['img'];?>"/>
	    			</div>
	    			<div class="pinfen fl clearfloat">
	    				<p class="tit"><?php  echo $row['name']?></p>
	    				<div class="assess-right">
	    					<img onclick="level(1)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(2)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(3)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(4)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(5)" src="../public/img/detail-iocn001.png"/>
	    				</div>
	    			</div>
	    		</div>
	    		<textarea name="content" rows="4" placeholder="请写下对宝贝的感受吧，对他人帮助很大哦" ></textarea>
	    		<input type="hidden" name="shop_id" value="<?php echo $_GET['shop_id']?>">
	    		<div class="bottom clearfloat box-s fl">
	    			<p class="ztpinfen">整体评分</p>
	    			<ul>
						<li>
							物流速度评价
						</li>
						<li class="assess-right">
							<img onclick="level(1)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(2)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(3)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(4)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(5)" src="../public/img/detail-iocn001.png"/>
						</li>
					</ul>
					<ul>
						<li>
							服务质量评价
						</li>
						<li class="assess-right">
							<img onclick="level(1)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(2)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(3)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(4)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(5)" src="../public/img/detail-iocn001.png"/>
						</li>
					</ul>
					<ul>
						<li>
							配送员满意度
						</li>
						<li class="assess-right">
							<img onclick="level(1)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(2)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(3)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(4)" src="../public/img/detail-iocn001.png"/>
							<img onclick="level(5)" src="../public/img/detail-iocn001.png"/>
						</li>
					</ul>
	    		</div>
	    	</div>
	    </div>	 
     	<input type="submit" class="address-add fl ra3">
     		
     	</form>
	</body>
	<script type="text/javascript" src="../public/js/jquery-1.8.3.min.js" ></script>
	<script src="../public/js/fastclick.js"></script>
	<script src="../public/js/mui.min.js"></script>
	<script type="text/javascript" src="../public/js/hmt.js" ></script>
	<script type="text/javascript">
		function level(s)
		{			
			var str = '';		
			var k = 6-s;			
			for(i=1;i<s+1;i++)			{	
				str += "<img onclick='level("+i+")' src='../public/img/detail-iocn01.png'/>";
			}
			for(j=1;j<k;j++)
			{
				var d=j+s
				str += "<img onclick='level("+d+")' src='../public/img/detail-iocn001.png'/>";
			}		
			$('.assess-right').html(str);
		}		
	</script>
</html>
