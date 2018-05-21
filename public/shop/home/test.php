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
$rowBrand= mysqli_fetch_assoc($rstBrand);
print_r($rowBrand["id"]);

mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<!-- 确保：1，form表单参数配置正确 
			   2，input标签需要有name属性
	-->



	<form action="zuoye.php" method="post">
		
		<!-- 通过input标签，输入需要查找内容的关键词 -->
		<input type="text" name="key" placeholder="请输入需要查询的信息"><br>

		<!-- 通过select，选择需要查询的字段 -->
		<select name="type">
			<option value="0">run</option>
			<option value="1">fuselage</option>
			<option value="2">network</option>
			<!-- <option value="3">性别</option>
			<option value="4">城市</option>
			<option value="5">部门</option>
			<option value="6">薪酬</option> -->
		</select><br><br>
		

		<!-- 选择输出内容的排序方式 -->
		请您选择输出内容的排序方式<br>

		

		<select name="price">
			<option value="0">升序</option>
			<option value="1">降序</option>
		</select>

		<br>
		<button type="submit">查询</button> 

	</form>
</body>
</html>