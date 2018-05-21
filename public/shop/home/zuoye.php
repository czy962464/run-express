
<?php 

// 首先，需要搞清实现的效果或者内容

// 1，模糊查询
// 实现模糊插叙：需要的内容是什么？

// select * from use2 where 字段 like 模糊查询的内容
// 有字段，模糊查询内容，两个内容需要通过前端来输入

// 2，排序方式
// select * from use2 order by 字段 排序方式
// 字段，排序方式需要前端输入


// 模糊查询的字段和排序方式的字段，是两个不同的参数，有可能一样，也可能不一样


// 3，查询内容以表格形式输出页面
// 通过MySQLi，执行SQL语句，返回执行结果，通过循环变量数组，生成html中的table表格 
// 捋清思路是最重要的

// 1，接收前端传递的参数

// 2，检验参数是否符合规范

// 3，指定SQL语句，通过MySQLi执行SQL语句，获得结果

// 4，生成table表格
// 1，接收前端参数

$key = $_POST['key'];
$a = $_POST['type'];
// $b = $_POST['paixu'];
$c = $_POST['price'];
// echo $key , "<br>" ,$a ,"<br>", $b, "<br>" ,$c;
// 前端，通过select传递的参数都是数字，需要通过数组，将其转化为对应的字段
// 第一个select对应的内容
$x= array("run" , "fuselage", "network");
// $a与$x 配合实现 where 字段 like 模糊查询内容中的额字段
// 
$type = $x[$a];
// 第二个select对应的内容
// 
// $b与$y 配合实现的是，order by 字段 排序方式 ，语句中的字段的数据
// $y = array("id" , "age" , "pay");
// $paixu = $y[$b];
// 第三个select对应的内容
$z = array("asc" , "desc");
$price = $z[$c];
// 2，检验参数是否符合规范
// 执行MySQLi

// 1，链接数据库

// $host = 'localhost';

// $user = 'root';

// $password = '123456';

// $database = 'shop';
$host = '139.129.208.229';

$user = 'root';

$password = '032a82067b';

$database = 'jing';
$port=3306;

$link = mysqli_connect($host , $user , $password , $database , $port);
mysqli_set_charset($link,'utf8');

// 2，指定SQL语句 ， 这是最关键的一步

$query = "select shop.id,shop.name,shop.price from shop where {$type} like '%{$key}%' ";

// 执行SQL语句
// 

$result = mysqli_query($link , $query);


// 执行的查询语句，$result 数据类型为对象，需要转化为数组
// 
$posts = array();
while($return = mysqli_fetch_assoc($result)) {
	echo "<pre>";
    
	print_r($return);
}




// 关闭数据库

mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<!-- 	<table border="1px">
		<tr>
			<td>序号</td>
			<td>姓名</td>
			<td>年龄</td>
			<td>性别</td>
			<td>城市</td>
			<td>部门</td>
			<td>薪酬</td>
		</tr>
<?php foreach ((array)$return as $value) { ?>
		<tr>
			<td><?php echo $value[0] ?></td>
			<td><?php echo $value[1] ?></td>
			<td><?php echo $value[2] ?></td>
			<td><?php echo $value[3] ?></td>
			<td><?php echo $value[4] ?></td>
			<td><?php echo $value[5] ?></td>
			<td><?php echo $value[6] ?></td>
		</tr>

<?php } ?>
	</table> -->
</body>
</html>