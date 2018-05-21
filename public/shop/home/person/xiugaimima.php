<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../public/bs/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/index.css">
    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/bs/js/bootstrap.min.js"></script>
    <script src="../../public/js/jquery.toggle.js"></script>
    <script src="../../public/bs/js/holder.min.js"></script>
</head>
<body>
	<form action="userupdate.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputUsername">用户名</label>
                                <input type="text" class="form-control" id="exampleInputUsername" placeholder="Username" name="username" value='<?php echo $_SESSION['home_username']?>' disabled>
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
	
</body>
</html>