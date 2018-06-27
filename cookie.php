<?php
// cookie 存储在客户端浏览器中的数据，通过cookie跟踪存储用户数据。一般情况下cookie通过http header从服务器端返回到客户端，多数web程序支持cookie操作，cookie存储在
// http的标头之中，必须在其他信息输出之前进行设置，类似于header函数的使用限制。
// php通过setcookie函数进行cookie的设置，任何从浏览器发回的cookie，php自动将其存储在$_COOKIE全局变量中，可以通过$_COOKIE[$key]，形式读取某个cookie值。
// php中的cookie具有广泛的使用，经常用来存储用户的登录信息，购物车等，且在使用会话session时通常使用cookie存储会话id来识别用户。cookie具有有效期，有效期结束后，cookie
// 自动从客户端删除。同时为了安全控制，cookie还可以设置域与路径。
setcookie('test', time()); // time()这个函数获取当前的时间戳(以秒为单位，从1970unix纪元开始)，赋值给名为test的cookie。
ob_start(); //一般设置缓冲区的作用是让传输效率更高。另一方面各网速的不同，可以有效减少数据传输的失败1

print_r($_COOKIE);
$content = ob_get_contents(); // 从缓存区获得的内容赋值给一个变量
$content = str_replace(" ", '&nbsp;', $content); // &nbsp;是urlcode编码的空格。str_replace将空格替换为空格符号
ob_clean();
header("content-type:text/html; charset=utf-8");
echo '当前的Cookie为：<br>';
echo nl2br($content); // echo <br />.$content;
// php设置cookie最常用的方法是使用setcookie函数，setcookie具有7个可选参数，常用到的为前5个。
// name(cookie名)可以通过$_COOKIE['name']进行访问
// value(cookie的值)
// expire 过期时间，unix时间戳格式，默认为0，表示浏览器关闭即失效
// path(有效路径)，若路径设置为/,整个网站都有效
// domain(有效域) 默认整个域名都有效，若设置了www.imooc.com,只在www子域中有效
$value = 'test';
setcookie('TestCookie',$value);
// 有效期一个小时
setcookie('TestCookie',$value,time()+3600);
// 设置路径与域
setcookie('TestCookie',$value,time()+3600,'/path/','imooc.com');// 设置路径与域
// php中还有一个设置cookie的函数，setrawcookie，setrawcookie与setcookie基本一样，唯一不同是value值不会自动进行urlencode,需要在需要的时候，手动的进行urlencode。
setrawcookie('cookie_name',rawurlencode($value),time()+60*60*24*365);
// cookie是通过http标头进行设置的，可以直接使用header方法进行设置
header('Set-Cookie:cookie_name=value');
$value = time();
//在这里设置一个名为test的Cookie
setcookie('test',$value);
if (isset($_COOKIE['test'])) {
    echo 'success';
}
// 删除cookie
setcookie('test','',time()-1); // 过期时间设置成当前时间之前
// 使用header删除cookie
header("Set-Cookie:test=1393832059; expires=".gmdate('D, d M Y H:i:s \G\M\T', time()-1));//gmdate，用来生成格林威治标准时间，以便排除时差的影响。
setcookie('test',time(),0,'/path');// cookie中的路径用来控制设置的cookie在哪个路径下有效，默认为/,在所有路径下都有效，当设定了其他路径之后，则只在设定的路径以及子路径下有效。
// 上面的设置会使test在/path以及子路径/path/abc下都有效，但是在根目录下就读取不到test的cookie值。
// 一般情况下，大多是使用所有路径的，只有在极少数有特殊需求的时候，会设置路径，这种情况下只有在指定的路径中才会传递cookie值，可以节省数据的传输，增强安全性提高性能。


