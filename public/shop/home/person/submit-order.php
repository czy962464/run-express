<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>提交订单</title>
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
			<p>提交订单</p>
	    </header>
	    <div id="main" class="mui-clearfix contaniner sorder">	    	
	    	<div class="warning clearfloat box-s">
    			提示：请在24小时内完成在线支付，逾期将视为订单无效
    		</div>
    		<div class="odernum clearfloat">
    			<ul>
    				<li>您的订单号：1298451221</li>
    				<li>应付金额：<span>￥598.00</span></li>
    			</ul>
    		</div>
    		<div class="pay-method clearfloat">
    			<ul>
    				<li>请选择支付方式</li>
    			</ul>
    		</div>
	    	<div class="addlist clearfloat">
	    		<div class="bottom clearfloat box-s">
	    			<section class="shopcar clearfloat">
						<div class="radio radiosss fr"> 
						    <label>
						        <input type="radio" name="sex" value="">
						        <div class="option"></div>
						    </label>
						</div>
						<div class="sorder-list clearfloat fl">
							<i class="iconfont icon-weixinzhifu fl"></i>
							<div class="zuo fl">
								<p class="tit">微信支付</p>
								<p class="fu-tit">亿万用户的选择，更快更安全</p>
							</div>							
						</div>
					</section>
	    		</div>
	    		<div class="bottom clearfloat box-s">
	    			<section class="shopcar clearfloat">
						<div class="radio radiosss fr"> 
						    <label>
						        <input type="radio" name="sex" value="">
						        <div class="option"></div>
						    </label>
						</div>
						<div class="sorder-list clearfloat fl">
							<i class="iconfont icon-zhifubao fl"></i>
							<div class="zuo fl">
								<p class="tit">支付宝</p>
								<p class="fu-tit">客户端支持最便捷！可银行卡支付！</p>
							</div>							
						</div>
					</section>
	    		</div>
	    		<div class="bottom clearfloat box-s">
	    			<section class="shopcar clearfloat">
						<div class="radio fr"> 
						    <label>
						        <input type="radio" name="sex" value="">
						        <div class="option"></div>
						    </label>
						</div>
						<div class="sorder-list clearfloat fl">
							<i class="iconfont icon-yinxingqia fl"></i>
							<div class="zuo fl">
								<p class="tit">银行卡</p>
								<p class="fu-tit">需要先开通网银</p>
							</div>							
						</div>
					</section>
	    		</div>
	    	</div>
	    	<a href="#" class="address-add fl">
	     		确认支付
	     	</a>
	    </div>
	    
	</body>
	<script type="text/javascript" src="public/js/jquery-1.8.3.min.js" ></script>
	<script src="public/js/fastclick.js"></script>
	<script src="public/js/mui.min.js"></script>
	<script type="text/javascript" src="public/js/hmt.js" ></script>
	<script type="text/javascript">
		$(".shopcar-checkbox label").on('touchstart',function(){
			if($(this).hasClass('shopcar-checkd')){
				$(".shopcar-checkbox label").removeClass("shopcar-checkd")
			}else{
				$(".shopcar-checkbox label").addClass("shopcar-checkd")
			}
		})
	</script>
</html>