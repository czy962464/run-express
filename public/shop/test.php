<?php
header("content-type:text/html;charset=utf-8");

//通过MySQLi函数库，实现SQL语句操作数据库，需要5个过程

//1，链接数据库

//使用MySQLi函数：mysqli_connect($host, $user, $password, $database, $port, $socket)

//相关参数

//$host:服务器的地址
//目前链接的本地的数据库，
//参数为：localhost 或者 127.0.0.1
//
//项目当中会有相应的服务器地址

//$user:链接MySQL数据库的用户名
//参数：root 默认值

//$password:链接MySQL数据库的密码
//参数：'' 默认值

//$database:指定使用的数据库
//参数：psd1801


//$port:MySQL监听的端口
//参数：3306


//$socket：目前不会使用到


//函数：mysqli_connect()，如果链接成功，返回的是关于数据库信息的一个对象，如果链接失败，返回布尔值false


$host = 'localhost';

$user = 'root';

$password = '123456';

$database = 'shop';

$port = 3306;

$link = mysqli_connect($host, $user, $password, $database, $port);


//形参和实参的概念

//实参：实际的参数，在函数之外的参数

//形参：形式的参数，存在于函数之内的参数




//2，执行SQL语句




//如果执行时，显示中文有问题，是编码格式设置有问题
//PHP7.0，mysql5.7以上版基本不会出现问题
//低版本：执行 sql语句： set names utf8


//mysqli_query($link , 'set names utf8');






//使用MySQLi函数 mysqli_query($link , $query)

//相关参数

//$link：链接成功的数据库的信息。
//
//$query：需要执行的SQL语句，以字符串的形式定义

//函数mysqli_query()的返回值
//失败：返回布尔值false
//
//成功：查询操作返回值是一个对象
//	       增加，删除，修改操作返回值为布尔值true	


$query = 'select * from `advert`';

$result = mysqli_query($link, $query);

//print_r($result);
//$result = mysqli_query($con, $sql);
$posts = array();
while($row = mysqli_fetch_array($result)) {
    $rowAds[$posts['pos']] = $row;
}
// echo $posts[1][pos];
 
// foreach ($posts as $p) {
// 	echo $p[pos];
// 	# code...
// }
//print_r($posts);
//3,将mysqli_query()执行结果转化为数组

//使用函数：mysqli_fetch_all($result)

//$result：就是mysql_query()的执行结果

//数组是一个二维数组，一维二维都是索引数组，只有数据库中表结构中的数据，没有表结构中的字段

//$return = mysqli_fetch_all($result);

//echo "<pre>";
//print_r($return);
//echo "</pre>";


//4，关闭数据库

//函数：mysqli_close($link)

//参数：

//$link：是mysqli_connect()的执行结果



mysqli_close($link);

?>