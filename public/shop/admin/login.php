<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" href="../public/bs/css/bootstrap.min.css">
    <script src="../public/js/jquery.min.js"></script>
    <script src="../public/bs/js/bootstrap.min.js"></script>
    <script src="../public/js/jquery.toggle.js"></script>
    <style>
        .panel{
            width:500px;
            height:400px;
            background:#222;
            position:absolute;
            top:50%;
            left:50%;
            margin-top:-200px;
            margin-left:-250px;
            border-radius: 5px;

        }
        h3{text-align: center;
        color:#fff;
        }

    </style>
</head>
<body>
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">
                <h3>登录</h3>
            </div>
        </div>
        <div class="panel-body">
            <form action="check.php" method="post">
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <div class="input-group-addon">
                            <input type="text" class="form-control" placeholder="user" name="username">

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <div class="input-group-addon">
                            <input type="password" class="form-control" placeholder="password" name="password">

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <button class="btn btn-lg btn-block btn-danger">sign in</button>
                        </div>



                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>