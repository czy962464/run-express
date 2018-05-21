<?php
session_start();
if(!$_SESSION['admin_userid']){
    echo "<script>location='../login.php'</script>";
    exit;
} 
	include '../../public/common/config.php';
	// include 'page.class.php';
	//每页三条
	
	// $sqlTot="select count(*) from touch";
	// $smtTot=$pdo->prepare($sqlTot);
	// $smtTot->execute();
	// $tot=$smtTot->fetchColumn();

	
	// $page=new Page($tot,2);


    $touch_id=$_GET['touch_id'];
	$sql="select * from touch where id={$touch_id} ";
	$smt=$pdo->prepare($sql);
	$smt->execute();
	$rows=$smt->fetchAll();
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>后台</title>
    <link rel="stylesheet" href="../../public/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/index.css">
    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/bs/js/bootstrap.min.js"></script>
    <script src="../../public/js/jquery.toggle.js"></script>
    <script src="../../public/bs/js/holder.min.js"></script>

<style>
tr,th{
    text-align: center;
}
</style>
</head>


<body>
	<div class="row">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">后台</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../../index.php" class='home-page'>首页</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">后台管理<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><?php echo $_SESSION['admin_username']?></a></li>
                                <li><a href="#myModal" data-toggle="modal">修改密码</a></li>
                                <li><a href="../loginout.php" class='quit'>退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">修改密码</h4>
                    </div>
                    <div class="modal-body">
                        <form action="../adminupdate.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputUsername">用户名</label>
                                <input type="text" class="form-control" id="exampleInputUsername" placeholder="Username" name="username" value='<?php echo $_SESSION['admin_username']?>' disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">新密码</label>
                                <input type="password" class="form-control" id="exampleInputpassword" placeholder="Password" name="password">
                            </div>
                            
                       
                            <div>
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">ok</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--左侧-->
        
            <div class="col-md-2">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="flase" aria-controls="collapseOne">
                                    会员管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="list-group">
                                <a href="../user/add.php" class="list-group-item" >添加
                                </a>                
                                <a href="../user/index.php" class="list-group-item" >查看
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    广告管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="list-group">
                                <a href="../advert/add.php" class="list-group-item">添加
                                </a>                            
                                <a href="../advert/index.php" class="list-group-item">查看
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                                    品牌管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="list-group">
                                <a href="../brand/add.php" class="list-group-item">添加
                                </a>
                                <a href="../brand/index.php" class="list-group-item">查看
                                </a>
                            </div>
                        </div>
                    </div>
                  
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseTwo">
                                    商品管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="list-group">
                                <a href="../shop/add.php" class="list-group-item">添加
                                </a>                            
                                <a href="../shop/index.php" class="list-group-item">查看
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingEight">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseTwo">
                                    评论管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="list-group">
                                                           
                                <a href="../comment/index.php" class="list-group-item">查看
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingNight">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNight" aria-expanded="false" aria-controls="collapseTwo">
                                    订单状态管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseNight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="list-group">
                                <a href="../status/add.php" class="list-group-item">添加
                                </a>                            
                                <a href="../status/index.php" class="list-group-item">查看
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading" role="tab" id="headingTen">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseTwo">
                                    订单管理
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="list-group">
                                                       
                                <a href="index.php" class="list-group-item">查看
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>


	<!-- <div class="container"> -->
		<div class="col-md-10 main">
		<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>编号</th>
                <th>姓名</th>
				<th>地址</th>
                <th>电话</th>
				<th>邮箱</th>
			</tr>
			<?php
			foreach($rows as $row)
			{
				echo '<tr>';
				echo "<td>{$row['id']}</td>";
				echo "<td>{$row['name']}</td>";
                echo "<td>{$row['addr']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['email']}</td>";
				echo '</tr>';
			}
			?>
		</table>
        <a href='index.php' class='btn btn-danger btn-search'>返回</a>
		
		<!-- <div>
			<?php
			
		    $page->show();

		    ?>
		</div> -->
		
	</div>
</body>
<script>
    $('.quit').click(function(){
        yes=confirm("您确定要退出系统吗？");
        if(!yes){
            return false;
        }
    });
</script>
<script>
    $('.home-page').click(function(){
        yes=confirm("您确定要进入首页吗？");
        if(!yes){
            return false;
        }
    });
</script>
</html>