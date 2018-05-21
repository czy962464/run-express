<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>index</title>
    <link rel="stylesheet" href="../public/bs/css/bootstrap.min.css">
    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/bs/js/bootstrap.min.js"></script>
    <script src="../public/js/jquery.toggle.js"></script>
    <script src="../public/bs/js/holder.min.js"></script>
    <script src="../public/bs/js/docs.min.js"></script>

    <style>
        body{
            overflow-x:hidden;
                   }
        .narbar {
            background: #f2f2f2;
        }
         .pc-nav li{
            float:left;
            padding-left:10px;
            list-style-type:none;
         }
        .pc-nav ul li a{
            text-decoration: none;
        }
        .img1{
            width:100%;
        }
        .header{
            height:125px;
            background: #ffffff;
        }
        .logo{
            margin-top:30px;

            float:left;
        }
        .search{
            margin-top:35px;
            float:right;
            height:65px;
            width:500px;
            

        }
        .search-top{
            height:32px;
            border:3px solid #c00;
        }
        .search-form{
            width:413px;
            line-height:24px;
            /*padding:5px;*/
            border:0 none;
            color:#666;
        }
        .search-form:focus{
            outline:none;
        }
        .search-btn{
            width:80px;
            line-height:25px;
            text-align: center;
            border:0;
            font-size:16px;
            background:#c00 ;
            color:#fff;
            cursor:pointer;
            float:right;

        }
        .search-bottom{
            width:500px;
            height:30px;
            padding-top:5px;
            /*overflow:hidden;*/
        }
        .search-bottom ul li{
            float:left;
            list-style-type:none;
            padding-right:10px;
            letter-spacing: 1px;
        }
        .search-bottom ul li a{
            text-decoration: none;

        }
        .search-bottom ul li a:hover{
            color:#f00;
        }
        .hot{
            color:#c00;
        }
        /*主要内容*/
        .menu{
                    height:470px;
                    background: #ccc url("http://img07.jiuxian.com/bill/2017/0930/647a031ba9834ecbb92387689db31abf.jpg") -300px;

                }
        .menu-top{
            width:100%;
            height:34px;
            background:#900;
            margin-top:0;
        }
        .menu-nav{
            margin-left:100px;
        }
        .menu-nav li{
            float:left;
            list-style-type:none;
            text-align: center;
            margin-left: 10px;
            line-height: 34px;
        }
        .menu-nav li a{
            text-decoration: none;
            color:#fff;
            cursor:pointer;
        }
        .menu-nav li a:hover{
            color:#f00;
        }
        .menu-list{
            background: #ce171f;
            width:160px;
            padding-left:10px;

        }
        .menu-navbar{
            padding-left:50px;
        }
        .menu-body{
            position:relative;
            width:1300px;
            height:436px;
            /*background: #ccc;*/
            margin:0 auto;
        }
        .menu-body-content{
            background: #900;
            width:160px;
            height:436px;
            margin-left:0;
        }
        .menu-body-content ul{
           padding-left:0;

        }
        .menu-body-content ul li{
            list-style-type:none;
            color:#f2f2f2;
            line-height: 25px;
            text-align: center;
        }
        .menu-body-content ul li:hover{
            /*background: #f2f2f2;*/
            /*color:#ce171f;*/
            cursor:pointer;  
        }
        .menu-body-content .right{
            height:436px;
            width:1140px;
            background:#f2f2f2;
            position:absolute;
            left:160px;
            top:0px;
            display:none;

        }
        .menu-body-content .right h3,p{
            text-align: left;
            color:#000;

        }

    </style>

</head>
<body>
    <div class=" nav nav-tabs narbar navbar-default ">
        <div class="container">
            <div class="row">
                <ul class="pc-nav">
                    <ul class="navbar-left">
                        <li><span>欢迎来酒仙</span></li>
                        <li><a href="#"class="upriver">请登录</a></li>
                        <li><a href="#" class="upriver">注册</a></li>
                    </ul>
                    <ul class="navbar-right">
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle upriver" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">我的酒仙 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="#">我的订单</a></li>
                        <li><a href="">物流</a></li>
                        <li><a href="">我的优惠券</a></li>
                        </ul>
                            </li>
                        <li><a href="#" class="upriver">会员</a></li>
                        <li><a href="#" class="upriver">购物车</a></li>
                        <li><a href="#" class="upriver">网站导航</a></li>
                        <li><a href="#" class="upriver">客户服务</a></li>
                    </ul>
                </ul>
            </div>
        </div>
        <div class="banner">
            <img class="img1" src="public/images/e3d69d1873e04746adbab957c9abdfa7.gif">
        </div>
        <div class="header">
            <div class="container">
                <!-- <div class="logo">
                <img src="http://misc.jiuxian.com/img/newIndexImg/logo.png?20160405">
                </div> -->
                <div class="search">
                    <div class="search-top">
                        <form action="">
                            <input type="text" class="search-form" placeholder="酒仙特卖">
                            <input type="submit" class="search-btn" value=" 搜&nbsp索">
                        </form>
                    </div>
                    <div class="search-bottom">
                        <ul class="search-a" style="margin-left:0px">
                            <li><a href="" class="hot">茅台</a></li>
                            <li><a href="">五粮液</a></li>
                            <li><a href="" class="hot">啤酒</a></li>
                            <li><a href="">酒鬼</a></li>
                            <li><a href="">洋河</a></li>
                            <li><a href="" class="hot">拉菲</a></li>
                            <li><a href="">奔富</a></li>
                            <li><a href="">优级杏花村</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="menu">
                <div class="menu-top">
                    <ul class="menu-nav">
                        <li class="menu-list"><a href="">全部商品分类</a></li>
                        <li class="menu-navbar"><a href="">首页</a></li>
                        <li class="menu-navbar"><a href="">领券中心</a></li>
                        <li class="menu-navbar"><a href="">值得买</a></li>
                        <li class="menu-navbar"><a href="">葡萄酒馆</a></li>
                        <li class="menu-navbar"><a href="">洋酒馆</a></li>
                        <li class="menu-navbar"><a href="">老酒</a></li>
                        <li class="menu-navbar"><a href="">清仓</a></li>
                        <li class="menu-navbar"><a href="">新品</a></li>
                        <li class="menu-navbar"><a href="">CLUB会员</a></li>
                    </ul>
                </div>
                <div class="menu-body">
                    <div class="menu-body-content">
                        <ul>
                            <li>
                                <span>一键选酒</span>
                                <div class="right">
                                    <h3>一键选酒</h3>
                                    <p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                                </p>
                                </div>
                            </li>
                            <li><span>白酒</span>
                                <div class="right">
                                    <p>白酒</p>
                                </div>
                            </li>
                            <li><span>葡萄酒</span>
                                <div class="right">
                                    <p>葡萄酒</p>
                                </div>
                            </li>
                            <li><span>洋酒</span>
                                <div class="right">
                                    <p>洋酒</p>
                                </div>
                            </li>
                            <li><span>啤酒/黄酒/养生酒</span>
                                <div class="right">
                                    <p>啤酒/黄酒/养生酒</p>
                                </div>
                            </li>
                            <li><span>食尚</span>
                                <div class="right">
                                    <p>食尚</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-inner">
                    <div class="item" active>
                        <img src="public/images/1.jpg">
                    </div>
                    <div class="item">
                        <img src="public/images/2.jpg">

                    </div>
                    <div class="item">
                        <img src="public/images/3.jpg">

                    </div>
                </div>
                </div>

                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

        </div>
    </div>



</body>
<script>

    $(".menu-body-content ul li").mouseenter(function()
    {
        $(this).css({"background":"#f2f2f2","color":"#900"});
        $(".menu-body-content ul li").not($(this)).css({"background":"#900","color":"#fff"});
        $(this).find(".right").show();
        $(".right").not($(this).find(".right")).hide();
    });
    $(".menu-body-content ul li").mouseleave(function(){
        $(this).css({"background":"#900","color":"#fff"});
        $(".menu-body-content ul li").not($(this)).css({"background":"#900","color":"#fff"});
       $(this).find(".right").hide();
    });
</script>
</html>
