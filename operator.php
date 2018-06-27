<?php
/**
 * PHP运算符一般分为算术运算符、赋值运算符、比较运算符、三元运算符、逻辑运算符、字符串连接运算符、错误控制运算符。
 */
// 算术运算符
$english = 110; //英语成绩
$math= 118; //数学成绩
$biological = 80; //生物成绩
$physical = 90; //物理成绩
$sum = $english + $math + $biological +$physical; // 总分
$avg = $sum / 4; //平均分
$x = $math - $english; // 数学比英语高几分
$x2 = $english*$english; // 英语成绩的平方
$x3 = $english % 100; // 取模
echo "总分:".$sum."<br />";
echo "平均分:".$avg."<br />";
echo "数学比英语高的分数:".$x."<br />";
echo "英语成绩的平方:".$x2."<br />";
echo "取模:".$x3."<br />";
// 取模算术符
$maxLine = 4; //每排人数
$no = 17;//学生编号
$line = ceil($no / $maxLine); // 计算在第几排
$row = $no % $maxLine ? $no % $maxLine : $maxLine; // 取模运算符计算所在位置
echo "编号<b>".$no."</b>的座位在第<b>".$line."</b>排第<b>".$row."</b>个位置";

// 赋值运算符= &
$a = "我在慕课网学习PHP！";
$b = $a; // 右边表达式的值赋给左边的运算数，右边表达式的值复制了一份，交给左边的运算数。首先给左边的运算数申请了一块内存，然后把复制的值放到了这个内存中。
$c = &$a; // 引用赋值，两个变量指向同一个数据。两个变量共享一块内存，如果这个内存中存储的数据变了，两个变量的值都会发生变化。
$a = "我天天在慕课网学习PHP！";
echo $b."<br />"; // 我在慕课网学习PHP！
echo $c."<br />"; // 我天天在慕课网学习PHP！

// 比较运算符，等于、全等、不等、大于、小于
$a = 1;
$b = "1";
var_dump($a == $b); // 等于 true
echo "<br />";
var_dump($a === $b); // 全等于 false
echo "<br />";
var_dump($a != $b); // 不等于 false
echo "<br />";
var_dump($a <> $b); // 不等于 false
echo "<br />";
var_dump($a !== $b); // 不全等于 true
echo "<br />";
var_dump($a < $b); // 小于 false
echo "<br />";

$c = 5;
var_dump($a < $c); // 小于 true
echo "<br />";
var_dump($a > $c); // 大于 false
echo "<br />";
var_dump($a <= $c); // 小于或等于 true
echo "<br />";
var_dump($a >= $c); // 大于或等于 false
echo "<br />";
var_dump($a >= $b); // 大于或等于 true
echo "<br />";

// 三元运算符
$a = 78;//成绩
$b = $a >= 60 ? "及格":"不及格";
echo $b;
echo "<br />";

// 逻辑运算符
$a = TRUE; //A同意
$b = TRUE; //B同意
$c = FALSE; //C反对
$d = FALSE; //D反对
//咱顺便复习下三元运算符
echo ($a and $b) ? '通过' : '不通过'; // 逻辑与，所有人都同意，才会通过。 $a and $b
echo "<br />";
echo ($a or $c) ? '通过' : '不通过'; // 逻辑或，一个人同意就会会通过。 $a or $b
echo "<br />";
echo ($a xor $c xor $d) ? "通过" : "不通过"; // 逻辑异或 有且仅有一个为true，返回true
echo "<br />";
echo !$c ? "通过":"不通过"; // 逻辑非
echo "<br />";
echo $a && $d ? "通过" : "不通过"; // 逻辑与
echo "<br />";
echo $b ||$c || $d ? "通过" : "不通过"; // 逻辑或

// 字符串连接运算符。链接运算符.将右参数附加到左参数后边所得的字符串。 连接赋值运算符.=将右边参数附加到左边的参数后
$a = "张先生";
$tip = $a . "，欢迎您咋慕课网学习PHP！";
$b = "东边日出西边雨";
$b .= "，道是无晴却有晴";
$c = "东边日出西边雨";
$c = $c . "，道是无晴却有晴";
echo  $tip."<br />";
echo  $b."<br />";
echo  $c."<br />";

// 错误控制运算符@对于一些可能会在运行过程中出错的表达式时，我们不希望出错的时候给客户显示错误信息，这样对用户不友好。于是，可以将@放置在一个PHP表达式之前，该表达式可能产生的任何错误信息都被忽略掉；错误控制前缀“@”不会屏蔽解析错误的信息，不能把它放在函数或类的定义之前，也不能用于条件结构例如if和foreach等。错误控制前缀“@”不会屏蔽解析错误的信息，不能把它放在函数或类的定义之前，也不能用于条件结构例如if和foreach等。
$conn = @mysqli_connect("localhost","username","password");
echo "出错了，错误原因是：".$php_errormsg;
?>