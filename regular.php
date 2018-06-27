<?php
// 正则表达式 对字符串进行操作的一种逻辑公式，用一些特定的字符组成一个规则的字符串，称之为正则匹配模式。
// php中使用pcre库函数进行正则匹配，preg_match用于执行一个正则匹配，判断一类字符模式是否存在。
$p = '/苹果/'; // 正则表达式
$str = "我喜欢吃苹果";
if (preg_match($p, $str)) { // 匹配源字符串中是否存在苹果字符串
    echo '匹配成功';
}
//pcre库函数中，正则匹配模式使用分隔符与元字符组成。分隔符可以是非数字、非反斜线、非空格的任意字符。经常使用的分隔符是正斜线(/)、hash符号(#)以及取反符号(~)
// /foo bar/ #^[^0-9]$#  ~php~
// 如果模式中包含分隔符，需要使用反斜杠(\)进行转义。 /http:\/\// 如果模式中包含较多的分隔字符，建议更换其他字符作为分隔符，也可以采用
// preg_quote进行转义
$p = 'http://';
$p = '/'.preg_quote($p, '/').'/';
echo $p;
// 分隔符后面可以使用模式修饰符，模式修饰符包括：i，m，s，x等，使用i修饰符可以忽略大小写匹配。
$str = "Http://www.imooc.com/";
if(preg_match('/http/i', $str)){
    echo '忽略大小写匹配成功';
}
// 元字符与转义 正则表达式中具有特殊含义的字符称之为元字符，常见的元字符有：
// 1、\ 一般用于转义字符 2、^ 端言目标的开始位置（或在多行模式下是行首）3、$ 断言目标结束位置（或在多行模式下是行尾）
// 4、. 默认匹配换行符外的任何字符 5、[ 开始字符类的定义 ] 结束字符类的定义 | 开始一个可选分支 6、( 子组的开始标记 ) 子组的结束标记
// 7、? 作为量词，表示0次或1次匹配 + 量词，一次或多次匹配 * 0次或多次匹配 8、{ 自定义量词开始标记 } 自定义量词结束标记
// \s匹配任意的空白符，包括空格，制表符，换行符 [^\s]非空白符 [^\s]+ 一次或多次匹配非空白符
$p = '/^我[^\s]+(苹果|香蕉)$/';
$str = '我喜欢吃香蕉';
if(preg_match($p,$str)){
    echo '香蕉匹配成功';
}
// 元字符具有两种使用场景，一种可以在任何地方都能使用，另一种只能在方括号内使用，在方括号内使用的有\转义字符，^仅在作为第一个字符（方括号内）时，表明字符类取反。-标记字符范围。
// ^在方括号外面，表示断言目标的开始位置，在方括号内部代表字符类取反，方括号内的减号-标记字符范围，0-9表示0-9之间所有数字。

// \w匹配字母、数字、下划线。
$p = '/[\w\.\-]+@[a-z0-9\-]+\.(com|cn)/';
$str = "我的邮箱是Spark.eric@imooc.com";
preg_match($p,$str,$match);
var_dump($match);
//preg_match — 执行一个正则表达式匹配preg_match ( $pattern , $subject , $matches )搜索subject与pattern给定的正则表达式的一个匹配。
//参数 ：pattern : 要搜索的模式，字符串类型(正则表达式)。subject : 输入的字符串。
//matches :（可有可无）如果提供了参数matches，它将被填充为搜索结果。 $matches[0]将包含完整模式匹配到的文本， $matches[1] 将包含第一个捕获子组匹配到的文本，以此类推。

//匹配str中的电话，\d匹配数字
$p = '/\d+\-\d+/';
$str = "我的电话是010-12345678";
preg_match($p, $str, $match);
echo $match[0]; // 结果为010-12345678

// 贪婪模式与懒惰模式
// 正则表达式中每个元字符匹配一个字符，当使用+之后会变的贪婪，它将尽可能多的匹配字符，但使用?字符时，它将尽可能少的匹配字符，既是懒惰模式。
// 贪婪模式：在可匹配与可不匹配的时候，优先匹配。
// 懒惰模式：在可匹配与可不匹配的时候，优先不匹配。
$p = '/\d?\-\d?/';
$str = "我的电话是010-12345678";
preg_match($p, $str, $match);
echo $match[0]; // 结果为0-1
// 当知道所匹配的字符长度时，可以使用{}指定匹配字符数。
$p = '/\d{3}\-\d{8}/';
$str = "我的电话是010-12345678";
preg_match($p, $str, $match);
echo $match[0]; //结果为：010-12345678

//匹配str中的姓名
$p = '/\w+:(\w+\s\w+)/';
$str = "name:steven jobs";
preg_match($p, $str, $match);
echo $match[1]; //结果为：steven jobs

// 正则表达式的目的：实现了比字符串处理函数跟家灵活的处理方式，主要用来判断字符串中是否存在，字符串的替换、分隔字符串、获取模式子串等。
// php使用prce函数来进行正则处理，通过设定好的模式，然后调用相关的处理函数来取得匹配结果。
// preg_match 用来执行一个匹配，可以简单的判断模式否匹配成功，或取得一个匹配结果。返回值是匹配成功的次数0或者1，在匹配到1次之后就会停止搜索。
$subject = 'abcdef';
$pattern = '/def/';
$num = preg_match($pattern, $subject, $matches);
echo $num;
print_r($matches);

$subject = "abcdef";
$pattern = '/a(.*?)d/';
$num = preg_match($pattern, $subject, $matches);
echo $num;
print_r($matches); //结果为：Array ( [0] => abcd [1] => bc )

$subject = "my email is spark@imooc.com";
//在这里补充代码，实现正则匹配，并输出邮箱地址
$pattern = '/[\w+\s]{3}(\w+@\w+\.com)/';
preg_match($pattern,$subject,$matches);
print_r($matches[1]);

// preg_match只能匹配一次结果，匹配所有的结果需要用preg_match_all,可循环获取一个列表的匹配结果数组。
$p = "|<[^>]+>(.*?)</[^>]+>|i";
$str = "<b>example: </b><div align=left>this is a test</div>";
preg_match($p, $str, $matches);
print_r($matches);
preg_match_all($p, $str, $matches);
print_r($matches);
// $matches结果排序为$matches[0]保存完整模式的所有匹配, $matches[1] 保存第一个子组的所有匹配，以此类推。
$p = "/<tr><td>(.*?)<\/td>\s*<td>(.*?)<\/td>\s*<\/tr>/i";
$str = "<table> <tr><td>Eric</td><td>25</td></tr> <tr><td>John</td><td>26</td></tr> </table>";
preg_match_all($p, $str, $matches);
print_r($matches);

$str = "<ul>
            <li>item 1</li>
            <li>item 2</li>
        </ul>";
//在这里补充代码，实现正则匹配所有li中的数据
$p = '/<li>(.*)<\/li>/i';
preg_match_all($p,$str,$matches);
print_r($matches[1]);

// 正则表达式的搜索和替换
$string = 'April 15，2014';
$pattern = '/(\w+) (\d+)，(\d+)/i';
$replacement = '$3，${1}，$2'; // $1和${1}写法等效
echo preg_replace($pattern, $replacement, $string); // 结果为2014，April，15

// 正则表达式去掉多余的空格字符
$str = 'one   two';
$str = preg_replace('/\s+/', ' ', $str);
echo $str; // 'one two'

// 精确的替换目标字符串的内容
$patterns = array ('/(19|20)(\d{2})-(\d{1,2})-(\d{1,2})/',
    '/^\s*{(\w+)}\s*=/');
$replace = array ('\3/\4/\1\2', '$\1 =');//\3等效于$3,\4等效于$4，依次类推
echo preg_replace($patterns, $replace, '{startDate} = 1999-5-27'); //结果为：$startDate = 5/27/1999
//详细解释下结果：(19|20)表示取19或者20中任意一个数字，(\d{2})表示两个数字，(\d{1,2})表示1个或2个数字，(\d{1,2})表示1个或2个数字。^\s*{(\w+)}\s*=表示以任意空格开头的，并且包含在{}中的字符，
//并且以任意空格结尾的，最后有个=号的。

// 将目标字符串$str中的文件名替换后增加em标签
$str = '主要有以下几个文件：index.php, style.css, common.js';
$p = '/\w+\.\w+/i';
$str = preg_replace($p, '<em>$0</em>', $str); //$0应该是$p所能匹配到的整个字符串，也就是这题的index.php, style.css, common.js（一次匹配一个）
echo $str;

// 正则表达式常用匹配案例
$user = array(
    'name' => 'spark1985',
    'email' => 'spark@imooc.com',
    'mobile' => '13312345678'
);
//进行一般性验证
if (empty($user)) {
    die('用户信息不能为空');
}
if (strlen($user['name']) < 6) {
    die('用户名长度最少为6位');
}
//用户名必须为字母、数字与下划线
if (!preg_match('/^\w+$/i', $user['name'])) {
    die('用户名不合法');
}
//验证邮箱格式是否正确
if (!preg_match('/^[\w\.]+@\w+\.\w+$/i', $user['email'])) {
    die('邮箱不合法');
}
//手机号必须为11位数字，且为1开头
if (!preg_match('/^1\d{10}$/i', $user['mobile'])) {
    die('手机号不合法');
}
echo '用户信息验证成功';
