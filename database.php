<?php
// php中的一个数据库可能有一个或多个扩展，其中既有官方的，也有第三方提供的。Mysql常用的扩展有原生的mysql库，增强版的mysqli扩展，还可以使用pdo进行连接和操作。
// 不同的扩展提供基本相似的方法，不同的是可能具备一些新特性，以及操作性能可能会有所不同。
// 检查mysql扩展是否已经安装
//if(function_exists('mysql_connect')){
//    echo 'mysql扩展已安装';
//    // mysql扩展进行数据库连接的方法
//    $link = mysql_connect('mysql_host','mysql_user','mysql_password');
//    mysql_select_db('db_name'); // 选择数据库
//    mysql -hlocalhost -uusername -p
//    //连接数据库
//    mysql_connect('127.0.0.1', 'code1', '');
//    mysql_select_db('code1');
//    mysql_query("set names 'utf8'");
//    //在这里进行数据查询
//    $res = mysql_query('select * from user limit 1');
//    $row = mysql_fetch_array($res);
//}else{
//    echo 'mysql扩展未安装';
//}
//// 检查mysqli扩展是否安装
//if(function_exists('mysqli_connect')){
//    echo 'mysqli扩展已安装';
////    $link = mysqli_connect('mysql_host','mysql_user','mysql_passwork');
//    $link = mysqli_connect('172.16.8.95','root','root');
//    var_dump($link);
//}else{
//    echo 'mysqli扩展未安装';
//}
// PDO扩展
//$dsn = 'mysql:dbname=testdb;host=127.0.0.1';
//$user = 'dbuser';
//$password = 'dbpass';
//$dbh = new PDO($dsn, $user, $password);
//$dsn = 'mysql:dbname=test;host=172.16.8.95';
//$user = 'root';
//$password = 'root';
//$dbh = new PDO($dsn, $user, $password);

$link = mysqli_connect('172.16.8.95','root','root') or die('数据库连接失败');
mysqli_select_db($link, 'test');
mysqli_query($link, 'set names utf8');
$result = mysqli_query($link,'select * from test limit1');
$row = mysqli_fetch_assoc($result); // 只获取关联索引数组
$roww = mysqli_fetch_array($result,MYSQLI_ASSOC);
print_r($row);
$row1 = mysqli_fetch_row($result); // 只获取数字索引数组
$row11 = mysqli_fetch_array($result,MYSQLI_NUM); // 只获取数字索引数组
print_r($row1);
$row2 = mysqli_fetch_array($result); // 默认包含数字索引的下标以及字段名关联索引的下标
print_r($row2);

//默认的，PHP使用最近的数据库连接执行查询，但如果存在多个连接的情况，则可以通过参数指令从那个连接中进行查询。
//
//$link1 = mysql_connect('127.0.0.1', 'code1', '');
//$link2 = mysql_connect('127.0.0.1', 'code1', '', true); //开启一个新的连接
//$res = mysql_query('select * from user limit 1', $link1); //从第一个连接中查询数据
//已知的数据变量有
$name = '李四';
$age = 18;
$class = '高三一班';
//在这里进行数据查询
$sql = "insert into test(name, age, class) values('$name', '$age', '$class')";
$ret = mysqli_query($link, $sql); //执行插入语句
$uid = mysqli_insert_id($link);
echo $uid;
$data = array();
while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

// 查询分页数据
// limit m,n 从m行后取n行数据，php中我们需要构造m，n来获取某一页中所有数据。
// 假定当前页为$page,每页显示$pagesize调数据，$start为当前页前面所有数据。$start = ($page-1)*$pagesize
//预设翻页参数
$page = 2;
$pagesize = 2;
//在这里构建分页查询
$start = ($page-1)*$pagesize;
$sql = "select * from test limit $start,$pagesize";
//获取翻页数据
$result = mysqli_query($link,$sql);
$data = array();
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $data[] = $row;
}
echo '<pre>';
print_r($data);
echo '</pre>';
// php更新与删除数据
//预设数据以便进行更新操作
mysqli_query($link,"insert into test(name, age, class) values('王二', 19, '高三五班')");
$id = mysqli_insert_id($link);
//在这里更新id为$id的行的名字为李白
mysqli_query($link,"update test set name='李白' where id=$id");
//输出更新数据条数
echo '数据更新行数：'.mysqli_affected_rows($link);
mysqli_query($link,"delete from test where id='$id'");
echo '数据删除行数'.mysqli_stmt_affected_rows($link);

// 关闭数据库连接
// 当数据库操作完成以后，可以使用mysql_close关闭数据库连接，默认，当php执行完毕以后，会自动关闭数据库连接。
mysqli_close($link);
// 虽然php会自动关闭数据库连接，一般情况下已经满足需求，但是在对比性能要求比较高的情况下，可以在进行完数据库操作后，尽快关闭数据连接，以节省资源，提高性能。
