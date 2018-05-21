<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>添加新地址</title>
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
			<p>添加新地址</p>
			
	    </header>
	    <div id="main" class="mui-clearfix add-address">
	    	<form action="insert_addr.php" method="post">
		    	<div class="plist clearfloat data">
					<ul>
						<li class="clearfloat">
							<a href="#">
								<p class="fl">收货人姓名</p>
								<input type="text" class="fl shuru" name="name" id="" value="" >
							</a>
						</li>
						<li class="clearfloat">
							<a href="#">
								<p class="fl" >联系电话</p>
								<input type="text" name="phone">
							</a>
						</li>
						<li class="clearfloat">
							<a href="#">
								<p class="fl" >邮箱</p>
								<input type="text" name="email">
							</a>
						</li>
						
					</ul>
				</div>
				<textarea name="addr" rows="4" cols="" placeholder="请填写详细地址，不少于5个字" class="textare box-s"></textarea>
		    	<div class="address-btn clearfloat">
		    		<span class="szwmr fl">设为默认</span>
		    		<a href="#" class="toggle toggle--on fr"></a>
		    	</div>
		    	<input type='submit' class="fr baocun" value='保存'>
	    	</form>
	    </div>
	</body>
	<script type="text/javascript" src="../public/js/jquery-1.8.3.min.js" ></script>
	<script src="../public/js/fastclick.js"></script>
	<script src="../public/js/mui.min.js"></script>
	<script type="text/javascript" src="../public/js/hmt.js" ></script>
	<script type="text/javascript" src="../public/js/jquery.min.js"></script>
	<!--默认按钮-->
	<script type="text/javascript">
	$('.toggle').click(function(e){
	
		var toggle = this;
		
		e.preventDefault();
	
		$(toggle).toggleClass('toggle--on').toggleClass('toggle--off').addClass('toggle--moving');
	
		setTimeout(function(){
			$(toggle).removeClass('toggle--moving');
		}, 200)
		
	});
	</script>
</html>
