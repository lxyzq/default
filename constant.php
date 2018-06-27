<?php
// 自定义常量
// bool define(string $constant_name,mixed $value[, $case_sensitive = true])
// mixed可以接受多种不同的类型，$case_sensitive = true 表示默认为布尔类型true。true不敏感，false敏感。不指定第三个参数为false，敏感
// 常量主要功效是可以避免重复定义，篡改变量值。在我们进行团队开发时，或者代码量很大的时候，对于一些第一次定义后不改变的量，如果我们使用变量，在不知情的情况下，
//使用同一变量名时，变量值就会被替换掉，从而会引发服务器执行错误的任务。
//此外，使用常量还能提高代码的可维护性。如果由于某些原因，常量的值需要变更时候，我们只需要修改一个地方。例如在做计算中，起初我们取圆周率为3.14，
//于是很多计算中我们都使用3.14进行计算，当要求计算精度提高，圆周率需要取3.142的时候，我们不得不修改所有使用3.14的代码，倘若代码量比较多时，不仅工作量大，还可能遗漏。
$p = "PII";
define("PI",3.14,true);
define($p,3.14);
echo PI;
echo pi;
echo "<br />";
echo PII;
define("a","aaa");
echo A;
echo "<br />";

// 系统常量，php已经定义好的常量
echo __FILE__; // php程序文件名，获取当前文件在服务器的物理地址
echo "<br />";
echo __LINE__; // php程序文件行数，当前代码在第几行
echo "<br />";
echo PHP_VERSION; // 当前解析器的版本号。它可以告诉我们当前PHP解析器的版本号，我们可以提前知道我们的PHP代码是否可被该PHP解析器解析。
echo "<br />";
echo PHP_OS; // 执行当前PHP版本的操作系统名称。它可以告诉我们服务器所用的操作系统名称，我们可以根据该操作系统优化我们的代码。

// 常量获取的两种方式
//mixed constant(string constant_name)
//第一个参数constant_name为要获取常量的名称，也可为存储常量名的变量。
//如果成功则返回常量的值，失败则提示错误信息常量没有被定义。（注：mixed表示函数返回值类型为多种不同的类型，string表示参数类型为字符串类型）
$p="";
//定义圆周率的两种取值
define("PI1",3.14);
define("PI2",3.142);
//定义值的精度
$height = "中";
//根据精度返回常量名，将常量变成了一个可变的常量
if($height == "中"){
    $p = "PI1";
}else if($height == "低"){
    $p = "PI2";
}
$r=1;
$area = constant($p)*$r*$r;
echo $area;

// 判断常量是否被定义，bool defined(string constants_name)
define("PI1",3.14);
$p = "PI1";
$is1 = defined($p); // true
$is2 = defined('PI2'); // fasle
var_dump($is1);
var_dump($is2);