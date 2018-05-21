<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>登录</title>
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
		<form action='check.php' method='post' class="login clearfloat box-s">
			<h3>会员登录</h3>
			<div class="list clearfloat">
				<ul>
					<li class="ra3">
						<p class="fl clearfloat">
							<span class="opa5"></span>
							<i class="iconfont icon-yonghuming"></i>
						</p>
						<div class="nr clearfloat fl">
							<span class="opa3"></span>
							<input type="text" name="username" id="username" value="" placeholder="用户姓名" />
						</div>
					</li>
					<li class="ra3">
						<p class="fl clearfloat">
							<span class="opa5"></span>
							<i class="iconfont icon-mima"></i>
						</p>
						<div class="nr clearfloat fl">
							<span class="opa3"></span>
							<input type="password" name="password" id="password" value="" placeholder="登录密码" />
						</div>
					</li>
					<li class="ra3">
						<p class="fl clearfloat">
							<span class="opa5"></span>
							<i class="iconfont icon-yanzhengma"></i>
						</p>
						<div class="nr nrtwo clearfloat fl">
							<span class="opa3">
							<input type="text" class='code' name="fcode" id="" value="" placeholder="验证码" />
							<samp class="db fr"></samp>
							</span>
						</div>
					</li>
				</ul>
			</div>
			<div class="mima clearfloat">
				<ul>
					<li class="fl">
						<div class="xuan clearfloat fl">
		    				<div class="radiofour" > 
							    <label>
							        <input type="checkbox" name="" value="" />
							        <div class="option"></div>
							        <span class="opt-text">记住密码</span>
							    </label>
							</div>
		    			</div>
					</li>
					<li class="fr">
						<a href="verification.php">找回密码？</a>
					</li>
				</ul>
			</div>
			<div class="login-btn">
				<input type='submit' value='登录' class='toLogin'/>
					
				
				<!-- <a href="register.php" class="btn">
					<span class="opa5"></span>
					<samp>注册</samp>
				</a> -->

				<a href='register.php'>注册</a>
			</div>
		</form>
		<footer class="page-footer fixed-footer" id="footer">
			<ul>
				<li>
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
				<li  class="active">
					<a href="login.php">
						<i class="iconfont icon-yonghuming"></i>
						<p>我的</p>
					</a>
				</li>
			</ul>
		</footer>
	</body>
</html>
<script>
	$('.login').submit(function(){
		if($('#username').val()==''||$('#password').val()==''){
			alert('用户名或密码不能为空');
			return false;
		}else{
			if($('.db').html() == $('.code').val()){
				return true
			}else{
				alert('验证码错误')
				return false
			}
			
		}
	})
	 // 58--64    91--96     
	 // 48--122
	 //将抽取出来符合条件的字符存入到数组中  6个
	 // 如果抽出的字符编码值 在  58--64  或  91--96之间 重新抽一次
	function yzm(){
	 	var arr = [];//存放验证码
	 	for( var i = 0 ; i < 4 ; i ++ ){
	 		var code = getRand(48,122);
	 		if( code >= 58 && code <= 97){
	 			i--;//重复循环当前i的值一次  
	 		}else{
	 			arr.push( String.fromCharCode(code) );
	 		}
	 	}
	 	return arr.join("");
	}
	//alert( yzm() )
	$('.db').html(yzm());
	$('.db').click(function(){
	    $('.db').html(yzm());
	})
	//获取任意区间值函数
	function getRand(min,max){
		return Math.round( Math.random()*(max-min) + min );
	}
</script>